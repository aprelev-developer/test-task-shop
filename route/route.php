<?php
// Файл маршрутизации

// Подключаем класс Router
require_once('Router.php');
use route\Routing\Router;

// Корневой каталог проекта
define('ROOT_DIR', realpath(__DIR__ . '/../'));

// Пути до директорий
define('APP_DIR', realpath(__DIR__ . '/../app'));
define('CONFIG_DIR', realpath(__DIR__ . '/../config'));
define('LIB_DIR', realpath(__DIR__ . '/../lib'));
define('PUBLIC_DIR', realpath(__DIR__ . '/../public'));
define('VAR_DIR', realpath(__DIR__ . '/../var'));

// Пути до дочерних директорий /app
define('VIEWS_DIR', realpath(APP_DIR . '/views'));
define('CONTROLLERS_DIR', realpath(APP_DIR . '/controllers'));
define('MODELS_DIR', realpath(APP_DIR . '/models'));

// Пути до дочерних директорий /views
define('VIEWS_AUTH_DIR', realpath(VIEWS_DIR . '/auth'));

// Пути до дочерних директорий /public
define('CSS_DIR', realpath(PUBLIC_DIR . '/css'));
define('IMAGES_DIR', realpath(PUBLIC_DIR . '/images'));
define('JS_DIR', realpath(PUBLIC_DIR . '/js'));

// Пути до дочерних директорий /var
define('CACHE_DIR', realpath(VAR_DIR . '/cache'));
define('CONFIGS_DIR', realpath(VAR_DIR . '/configs'));
define('TEMPLATE_DIR', realpath(VAR_DIR . '/templates'));
define('TEMPLATE_C_DIR', realpath(VAR_DIR . '/templates_c'));

// Получаем экземпляр соединения с базой данных
$dbConnection = \lib\DatabaseConnection::getInstance();

// Создаем объект маршрутизатора
$router = new Router($dbConnection);

// Добавляем основные маршруты
$router->addRoute('/', 'app/views/index.tpl');
$router->addRoute('/auth', 'app/views/auth/auth.tpl');
$router->addRoute('/register', 'app/views/auth/register.tpl');
$router->addRoute('/main', 'app/views/main.tpl');
$router->addRoute('/products', 'app/views/products/product.tpl');
$router->addRoute('/edit-product/{id}', 'ProductController@editAction');
$router->addRoute('/error', 'app/views/error.tpl');
$router->addRoute('/user_profile', 'app/views/user_profile.tpl');
$router->addRoute('/create-course', 'app/views/create-course.tpl');
$router->addRoute('/create-test', 'app/views/create-test.tpl');
$router->addRoute('/about', 'app/views/about.tpl');
$router->addRoute('/course', 'app/views/client/course.tpl');
$router->addRoute('/contact', 'app/views/contact.tpl');
$router->addRoute('/course', 'app/views/catalog.tpl');

//страница администратора
$router->addRoute('/admin/', 'app/views/admin/panel.tpl');
$router->addRoute('/admin/user_list', 'app/views/admin/user_list.tpl');
$router->addRoute('/admin/question', 'app/views/admin/question.tpl');


// Добавляем маршруты для контроллеров
$router->addRoute('/register-controller', 'Register@registerUser');
$router->addRoute('/auth-controller', 'Auth@authenticate');
$router->addRoute('/check-status', 'Auth@isAuthenticated');
$router->addRoute('/add-product', 'Product@createProduct');
$router->addRoute('/logout', 'Auth@logout');


//добавление стилей
$router->addRoute('/css', 'public/less/main.css');

// Возвращаем объект маршрутизатора
return $router;
