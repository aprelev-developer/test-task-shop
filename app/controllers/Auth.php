<?php

declare(strict_types=1);

use models\UserModel;

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/UserModel.php";


class Auth
{
    private PDO $pdo; // Объявляем переменную для хранения объекта PDO

    /**
     * Конструктор класса
     *
     * @param PDO $pdo Объект PDO для работы с базой данных
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Метод для проверки данных об авторизации
     *
     * @param array $data Массив данных для проверки
     *
     * @return bool Возвращает true, если данные прошли проверку, иначе false
     */
    private function checkData(array $data): bool
    {
        // Проверяем, пришли ли данные
        if (empty($data)) {
            return false;
        }

        // Проверяем наличие обязательных полей
        if (!isset($data['email']) || !isset($data['password'])) {
            return false; // Необходимые поля отсутствуют
        }

        return true; // Если все проверки прошли успешно
    }

    /**
     * Метод для авторизации пользователя
     *
     * @param array $data Массив данных для авторизации
     *
     * @return bool Возвращает true, если авторизация прошла успешно, иначе false
     */
    public function authenticate(array $data): bool
    {
        try {
            // Проверяем данные
            if (!$this->checkData($data)) {
                return false;
            }

            // Получаем данные пользователя из базы данных
            $email = $data['email'];
            $password = $data['password'];

            $userModel = new UserModel($this->pdo);
            $userData = $userModel->getUserByEmail($email);

            // Проверяем, найден ли пользователь
            if (!$userData) {
                return false; // Пользователь не найден
            }

            // Проверяем соответствие пароля
            if (password_verify($password, $userData['password'])) {
                // Успешная авторизация
                // Сохраняем информацию о пользователе в сессии
                session_start(); // Начинаем сессию
                $_SESSION['user'] = $userData;
                header('Location: /user_profile');
                exit(); // Важно завершить выполнение скрипта после перенаправления
            } else {
                // Неправильный пароль
                header('Location: /error');
                exit();
            }
        } catch (PDOException $e) {
            // Обработка исключений при работе с базой данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Метод для проверки авторизации пользователя
     *
     * @return bool Возвращает true, если пользователь авторизован, иначе false
     */
    public function isAuthenticated(): bool
    {
        session_start(); // Начинаем сессию
        return isset($_SESSION['user']);
    }

    /**
     * Метод для завершения сессии пользователя
     *
     * @return void
     */
    public function logout(): void
    {
        session_start(); // Начинаем сессию
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /');
    }
}
