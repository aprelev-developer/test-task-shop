<?php

namespace route\Routing;

use models\UserModel;

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/controllers/Register.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/controllers/Auth.php";

use lib\DatabaseConnection;

/**
 * Класс Router для маршрутизации URL-адресов
 */
class Router
{
    private $pdo; // Добавляем переменную для хранения объекта PDO

    public function __construct()
    {
        // Создаем экземпляр PDO при создании объекта Router
        $this->pdo = DatabaseConnection::getInstance();
    }

    /**
     * Массив зарегистрированных маршрутов
     *
     * @var array
     */
    private $routes = [];

    /**
     * Добавляет новый маршрут
     *
     * @param string $url URL-адрес маршрута
     * @param string $path Путь или контроллер с методом
     *
     * @return void
     */
    public function addRoute(string $url, string $path): void
    {
        $this->routes[$url] = $path;
    }

    /**
     * Обрабатывает запрошенный URL-адрес
     *
     * @param string $url Запрошенный URL-адрес
     *
     * @return string Содержимое файла, результат вызова контроллера или страница ошибки
     */
    public function route(string $url): string
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Проверка существования URL в маршрутах
        if (!isset($this->routes[$url])) {
            return $this->renderErrorPage(); // Это вызов страницы ошибки
        }

        $path = $this->routes[$url];

        // Если путь указывает на файл, просто возвращаем его содержимое
        if (is_file($path)) {
            return $path; // Это вызов содержимого файла
        }

        // Если путь указывает на контроллер, вызываем его метод
        if (strpos($path, '@') !== false) {
            [$controller, $method] = explode('@', $path);

            // Проверяем существование контроллера и метода
            if ($this->isValidControllerAction($path)) {
                // Подключаем файл контроллера
                require_once $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/' . $controller . '.php';

                // Создаем экземпляр контроллера
                $controllerInstance = new $controller($this->pdo); // Передаем объект PDO в конструктор

                // Если метод принимает аргументы, то передаем их
                $result = null;
                if (method_exists($controllerInstance, $method)) {
                    $args = [];
                    switch ($method) {
                        case "registerUser":
                            $args = [
                                $_POST['name'] ?? '',
                                $_POST['email'] ?? '',
                                $_POST['password'] ?? '',
                                $_POST['confirm_password'] ?? ''
                            ];
                            break;
                        case "authenticate":
                            $args = [
                                [
                                    'email' => $_POST['email'] ?? '',
                                    'password' => $_POST['password'] ?? ''
                                ]
                            ];
                            break;
                        case "createProduct":
                            $args = [
                                $_POST['name'] ?? '',
                                $_POST['price'] ?? '',
                                $_POST['description'] ?? ''
                            ];
                            break;
                        default:
                            break;
                    }
                    $result = $controllerInstance->$method(...$args);
                } else {
                    $result = $controllerInstance->$method();
                }


                // Проверка существования переменной $smarty
                if (isset($GLOBALS['smarty'])) {
                    $smarty = $GLOBALS['smarty'];
                    // Передаем результат в шаблон
                    $smarty->assign('content', $result);
                    return $smarty->fetch($_SERVER['DOCUMENT_ROOT'] . '/app/views/main.tpl');
                } else {
                    // Если переменная $smarty не определена, возвращаем результат вызова контроллера
                    return $result;
                }
            } else {
                // Если контроллер или метод не существует, выводим ошибку
                return $this->renderErrorPage(); // Это вызов страницы ошибки
            }
        }

        // Если ни файл, ни контроллер не найдены, выводим ошибку
        return $this->renderErrorPage(); // Это вызов страницы ошибки
    }

    /**
     * Проверяет существование контроллера и метода
     *
     * @param string $controllerAction Строка вида "Controller@method"
     *
     * @return bool
     */
    private function isValidControllerAction(string $controllerAction): bool
    {
        // Разбиваем строку вида "Controller@method" на контроллер и метод
        [$controller, $method] = explode('@', $controllerAction);

        $controllerFile = $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/' . $controller . '.php';

        // Проверяем существование файла контроллера
        if (!file_exists($controllerFile)) {
            return false;
        }

        // Подключаем файл контроллера
        require_once $controllerFile;

        // Проверяем существование метода в контроллере
        return method_exists($controller, $method);
    }

    /**
     * Рендерит страницу ошибки
     *
     * @return string Содержимое страницы ошибки
     */
    private function renderErrorPage(): string
    {
        // Проверка существования переменной $smarty
        if (isset($GLOBALS['smarty'])) {
            $smarty = $GLOBALS['smarty'];
            $smarty->assign('error_message', 'Страница не найдена');
            return $smarty->fetch($_SERVER['DOCUMENT_ROOT'] . '/app/views/404.tpl');
        } else {
            return 'Ошибка: переменная $smarty не определена';
        }
    }
}
