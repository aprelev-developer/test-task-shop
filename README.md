# Интернет-магазин на PHP и MySQL

Это простой интернет-магазин, разработанный с использованием архитектуры MVC, шаблонизатора Smarty и CSS-препроцессора Less. Проект содержит панель администратора для управления товарами и витрину для отображения каталога товаров.

## Требования

- PHP 7.4 или выше
- MySQL 5.7 или выше
- Apache веб-сервер

## Установка

1. Клонируйте этот репозиторий на свой локальный компьютер:
git clone https://github.com/your-username/test-task-shop.git
2. Перейдите в директорию проекта:
3. cd test-task-shop
4. 3. Импортируйте файл `test-task-shop.sql` в вашу базу данных MySQL.
4. Отредактируйте файл `lib/DataBase/DatabaseConnection.php` и укажите настройки подключения к вашей базе данных.
5. Убедитесь, что папки `app/tmp` и `public/htaccess` имеют права на запись.

## Настройка

1. Откройте в браузере URL-адрес вашего проекта, например, `http://localhost/test-task-shop/`.
2. Для доступа к панели администратора перейдите по ссылке `http://localhost/test-task-shop/`.

## Использование

### Панель администратора

На странице списка товаров вы можете создавать, просматривать  товары. Для этого используйте соответствующие ссылки и формы.

### Витрина

На главной странице витрины отображается каталог всех доступных товаров.

## Сайт

Так же сайт залит на хостинг:
http://andre6fd.beget.tech/
