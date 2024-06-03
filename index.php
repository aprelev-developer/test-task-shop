<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/Smarty/libs/Smarty.class.php';
require_once 'route/Router.php';
require_once 'lib/DataBase/DatabaseConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/models/ProductModel.php';

define('TEMPLATE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/templates/');
define('TEMPLATE_C_DIR', $_SERVER['DOCUMENT_ROOT'] . '/templates_c/');
define('CONFIGS_DIR', $_SERVER['DOCUMENT_ROOT'] . '/configs/');
define('CACHE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/cache/');

$lessStylesPath = $_SERVER['DOCUMENT_ROOT'] . "/app/style/less/main.less";

$smarty = new Smarty();
$smarty->setTemplateDir(TEMPLATE_DIR)
    ->setCompileDir(TEMPLATE_C_DIR)
    ->setConfigDir(CONFIGS_DIR)
    ->setCacheDir(CACHE_DIR);

$dbConnection = \lib\DatabaseConnection::getInstance();

$url = $_SERVER['REQUEST_URI'];

$router = require $_SERVER['DOCUMENT_ROOT'] . '/route/route.php';

$templatePath = $router->route($url);

$auth = new Auth($dbConnection);
$productModel = new \models\ProductModel($dbConnection);

$info = $auth->isAuthenticated();
$style = $_SERVER['DOCUMENT_ROOT'] . '/app/style/less/main.less';

$title = "Главная Страница";
$test = '/check-status';
$authStatus = $router->route($test);
$smarty->assign('checkStatus', $info);
$smarty->assign('style', $style);
$smarty->assign('title', $title);

// Получение списка продуктов
$products = $productModel->getProducts();

// Передача списка продуктов в Smarty
$smarty->assign('products', $products);

$templatePath = $router->route($url);
$smarty->display($templatePath);

$smarty->assign('lessStylesPath', $lessStylesPath);
