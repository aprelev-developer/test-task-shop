<?php

declare(strict_types=1);

namespace models;

use PDO;
use PDOException;

class ProductModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Получает данные товара по его ID
     *
     * @param int $productId ID товара
     * @return array|false Массив данных товара или false, если товар не найден
     */
    public function getProductById(int $productId)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
            $stmt->bindParam(':id', $productId);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Создает новый товар в базе данных
     *
     * @param string $name Название товара
     * @param float $price Цена товара
     * @param string $description Описание товара
     *
     * @return bool Возвращает true, если товар успешно создан, иначе false
     */
    public function createProduct(string $name, float $price, string $description): bool
    {
        try {
            $stmt = $this->pdo->prepare(
                'INSERT INTO products (name, price, description) VALUES (:name, :price, :description)'
            );
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);

            $result = $stmt->execute();

            if ($result) {
                // Перенаправление на страницу после успешного создания товара
                header("Location: /main");
                exit; // Важно вызвать exit, чтобы остановить дальнейшее выполнение скрипта
            }

            return $result;
        } catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }


    /**
     * Обновляет данные товара в базе данных
     *
     * @param int $productId ID товара
     * @param string $name Название товара
     * @param float $price Цена товара
     * @param string $description Описание товара
     *
     * @return bool Возвращает true, если товар успешно обновлен, иначе false
     */
    public function updateProduct(int $productId, string $name, float $price, string $description): bool
    {
        try {
            $stmt = $this->pdo->prepare(
                'UPDATE products SET name = :name, price = :price, description = :description WHERE id = :id'
            );
            $stmt->bindParam(':id', $productId);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Удаляет товар из базы данных
     *
     * @param int $productId ID товара
     * @return bool Возвращает true, если товар успешно удален, иначе false
     */
    public function deleteProduct(int $productId): bool
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
            $stmt->bindParam(':id', $productId);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Получает все товары из базы данных
     *
     * @return array Массив с информацией о товарах
     */
    public function getProducts(): array
    {
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
