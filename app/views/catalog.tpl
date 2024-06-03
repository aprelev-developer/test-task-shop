<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Онлайн курсы</title>
    <link rel="stylesheet" href="../../public/less/main.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="../../public/images/logo.jpeg" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/about">О нас</a></li>
            <li><a href="/course">Программы</a></li>
            <li><a href="/contact">Контакты</a></li>
        </ul>
    </nav>
    <div class="auth">
        <button class="register"><a href="/register">Зарегистрироваться</a></button>
        <button class="login"><a href="/auth">Вход</a></button>
    </div>
</header>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .search-bar {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .search-bar input {
        margin: 0 5px;
        padding: 5px;
        width: 200px;
    }

    .search-bar button {
        padding: 5px 10px;
    }

    main {
        padding: 20px;
    }

    #programs-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .program-card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        width: 300px;
    }

    .program-card h2 {
        margin-top: 0;
    }

    .program-card ul {
        list-style: none;
        padding: 0;
    }

    .program-card li {
        display: flex;
        justify-content: space-between;
        padding: 5px 0;
    }

    .program-card button {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 5px 10px;
        cursor: pointer;
    }

    .program-card button:hover {
        background-color: #218838;
    }
    .header{
        background-color: white;
        color: black;
        padding: 10px 0;
        text-align: center;
    }

</style>
<div class="header">
    <h1>Программы</h1>
    <div class="search-bar">
        <input type="text" id="search-category" placeholder="Искать категорию...">
        <input type="text" id="search-topic" placeholder="Искать тему...">
        <button onclick="searchPrograms()">Поиск</button>
    </div>
</div>
<main>
    <section id="programs-list">
        <article class="program-card">
            <h2>Разработка</h2>
            <ul>
                <li>PHP<button onclick="addCourse(this)">Просмотреть</button></li>
                <li>C++<button onclick="addCourse(this)">Просмотреть</button></li>
            </ul>
        </article>
        <article class="program-card">
            <h2>Digital-маркетинг</h2>
            <ul>
                <li>SEO/оптимизация<button onclick="addCourse(this)">Просмотреть</button></li>
                <li>Брэнд<button onclick="addCourse(this)">Просмотреть</button></li>
            </ul>
        </article>
        <!-- Дополнительные карточки программ могут быть добавлены здесь -->
    </section>
</main>
<script src="script.js"></script>
</body>
</html>
