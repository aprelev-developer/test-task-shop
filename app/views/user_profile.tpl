<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="../../public/less/user_profile.css">
</head>
<body>
<div class="container">
    <h1>Профиль пользователя</h1>
    <div class="profile">
        <div class="profile-info">
            <img src="../../public/images/profile-photo.jpeg" alt="Аватар пользователя" class="avatar">
            <form id="profile-form">
                <div class="form-group">
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" value="Иван Иванов">
                </div>
                <div class="form-group">
                    <label for="email">Электронная почта:</label>
                    <input type="email" id="email" name="email" value="ivan@example.com">
                </div>
                <div class="form-group">
                    <label for="bio">Биография:</label>
                    <textarea id="bio" name="bio">Краткая биография пользователя...</textarea>
                </div>
                <div class="button-group">
                    <button type="button" onclick="editProfile()">Редактировать</button>
                    <button type="submit">Сохранить</button>
                    <button type="submit"><a href="/create-course" class="create-course-button">Создать курс</a></button>
                    <button type="button"><a href="/" type="button">Перейти на главную страницу</a></button>
                    <button type="button"><a href="/" type="button">Просмотреть добавленные курсы</a></button>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
