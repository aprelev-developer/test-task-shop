<?php

declare(strict_types=1);

use models\UserModel;

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/UserModel.php";

const MIN_PASSWORD_LENGTH = 8;

class Register
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Регистрирует нового пользователя
     * @param string $name Имя пользователя
     * @param string $email Email пользователя
     * @param string $password Пароль пользователя
     * @param string $confirmPassword Повторный пароль пользователя
     *
     * @return bool Возвращает true, если регистрация прошла успешно, иначе false
     */
    public function registerUser(string $name, string $email, string $password, string $confirmPassword): bool
    {
        $validator = new Validator();

        // Валидация данных регистрации
        if (!$validator->validateRegistrationData($name, $email, $password, $confirmPassword)) {
            return false;
        }

        // Хеширование пароля
        $hashedPassword = $this->hashPassword($password);

        // Создание экземпляра модели пользователя
        $userModel = new UserModel($this->pdo);

        // Проверка уникальности email
        if (!$userModel->isEmailUnique($email)) {
            return false;
        }

        // Запись данных в базу данных
        $success = $userModel->createUser($name, $email, $hashedPassword);


           header('Location: /');
       return $success;
    }

    /**
     * Хеширует пароль с использованием алгоритма bcrypt
     *
     * @param string $password Пароль для хеширования
     *
     * @return string Захешированный пароль
     */
    public function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Возвращает сообщение об ошибке валидации
     *
     * @return string Сообщение об ошибке
     */
    public function getValidationError(): string
    {
        return $validator->errorMessage;
    }
}

class Validator
{
    private $errorMessage = '';

    /**
     * Валидирует данные регистрации
     *
     * @param string $email Email пользователя
     * @param string $password Пароль пользователя
     * @param string $confirmPassword Подтверждение пароля
     *
     * @return bool Возвращает true, если данные валидны, иначе false
     */
    public function validateRegistrationData(
        string $name,
        string $email,
        string $password,
        string $confirmPassword
    ): bool {
        // Очистить предыдущее сообщение об ошибке
        $this->errorMessage = '';

        // Проверка на пустые значения
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            $this->errorMessage = 'Пожалуйста, заполните все поля.';
            return false;
        }

        // Проверка имени пользователя
        if (!$this->isValidName($name)) {
            $this->errorMessage = 'Неверный формат имени.';
            return false;
        }

        // Проверка формата email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = 'Неверный формат email.';
            return false;
        }

        // Проверка длины пароля (минимум 8 символов)
        if (strlen($password) < MIN_PASSWORD_LENGTH) {
            $this->errorMessage = 'Пароль должен содержать не менее 8 символов.';
            return false;
        }

        // Проверка совпадения пароля и его подтверждения
        if ($password !== $confirmPassword) {
            $this->errorMessage = 'Пароли не совпадают.';
            return false;
        }

        // Если все проверки пройдены успешно, возвращаем true
        return true;
    }

    /**
     * Проверяет правильность формата имени пользователя.
     *
     * @param string $name Имя пользователя.
     *
     * @return bool Возвращает true, если имя прошло валидацию, иначе false.
     */
    private function isValidName(string $name): bool
    {
        // Проверка на допустимые символы в имени
        if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ\s]+$/u', $name)) {
            return false;
        }

        // Проверка на длину имени (максимум 50 символов)
        if (strlen($name) > 30) {
            return false;
        }

        return true;
    }
}