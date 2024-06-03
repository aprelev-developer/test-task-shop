<?php

declare(strict_types=1);

namespace lib;

use PDO;
use PDOException;

/**
 * Класс DatabaseConnection
 *
 * Представляет соединение с базой данных с использованием PDO.
 */
class DatabaseConnection
{
    private static ?PDO $pdo = null;

    /**
     * Возвращает экземпляр PDO для работы с базой данных.
     *
     * @return PDO Экземпляр PDO.
     * @throws PDOException Если соединение с базой данных не удалось.
     */
    public static function getInstance(): PDO
    {
        if (self::$pdo === null) {

            $host = 'localhost';
            $dbName = 'test-task-shop';
            $username = 'root';
            $password = 'Andreiaprelev1808';

            $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$pdo = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                throw new PDOException("Не удалось подключиться к базе данных: " . $e->getMessage());
            }
        }

        if (!self::$pdo instanceof PDO) {
            throw new PDOException("Не удалось подключиться к базе данных");
        }

        return self::$pdo;
    }
}
