<?php

declare(strict_types=1);

namespace models;

use PDO;
use PDOException;

class UserModel
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Проверяет уникальность email в базе данных
     *
     * @param string $email Email пользователя
     *
     * @return bool Возвращает true, если email уникальный, иначе false
     */
    public function isEmailUnique(string $email): bool
    {
        try {
            $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetchColumn() === 0;
        } catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Создает нового пользователя в базе данных
     *
     * @param string $username Имя пользователя
     * @param string $email Email пользователя
     * @param string $hashedPassword Захешированный пароль пользователя
     *
     * @return bool Возвращает true, если пользователь успешно создан, иначе false
     */
    public function createUser(string $username, string $email, string $hashedPassword): bool
    {
        try {
            $stmt = $this->pdo->prepare(
                'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)'
            );
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                // Успешное создание пользователя
                header('Location: /'); // Перенаправление на страницу авторизации
                exit; // Завершение выполнения скрипта после перенаправления
            }} catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Получает данные пользователя по его email
     *
     * @param string $email Email пользователя
     * @return array|false Массив данных пользователя или false, если пользователь не найден
     */
    public function getUserByEmail(string $email)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Обработка ошибок при запросе к базе данных
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}
