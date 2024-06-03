<?php

declare(strict_types=1);

use models\ProductModel;

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/ProductModel.php";

class Product
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Создает новый товар
     *
     * @param string $name Название товара
     * @param float $price Цена товара
     * @param string $description Описание товара
     *
     * @return bool Возвращает true, если товар успешно создан, иначе false
     */
    public function createProduct(string $name, float $price, string $description): bool
    {
    
        // Валидация данных товара
        $validator = new ProductValidator();
        if (!$validator->validateProductData($name, $price, $description)) {
            return false;
        }

        // Создание экземпляра модели товара
        $productModel = new ProductModel($this->pdo);

        // Создание товара в базе данных
        return $productModel->createProduct($name, $price, $description);
    }
}

class ProductValidator
{
    /**
     * Валидирует данные товара
     *
     * @param string $name Название товара
     * @param float $price Цена товара
     * @param string $description Описание товара
     *
     * @return bool Возвращает true, если данные валидны, иначе false
     */
    public function validateProductData(string $name, float $price, string $description): bool
    {
        // Проверка на пустые значения
        if (empty($name) || empty($price) || empty($description)) {
            return false;
        }

        // Проверка длины названия (максимум 50 символов)
        if (strlen($name) > 50) {
            return false;
        }

        // Проверка длины описания (максимум 255 символов)
        if (strlen($description) > 255) {
            return false;
        }

        // Проверка цены (должна быть положительной)
        if ($price <= 0) {
            return false;
        }

        return true;
    }

    public function editAction($id)
    {
        // Создание экземпляра модели товара
        $productModel = new ProductModel($this->pdo);

        // Получаем данные о товаре из базы данных по $id
        $product = getProductById($id);

        // Если товар не найден, перенаправляем на главную страницу
        if (!$product) {
            header('Location: /');
            exit;
        }

        // Подключаем шаблонизатор и передаем данные в шаблон
        $smarty = new Smarty();
        $smarty->assign('product', $product);
        $smarty->display('app/views/products/edit.tpl');
    }

}
