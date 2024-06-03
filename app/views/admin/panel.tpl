<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="../../../public/less/admin/panel.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Панель администратора</h1>
        <button id="logout-button" class="button logout-button">Выход</button>
    </header>
    <main>
        <section class="course-list">
            <h2>Список курсов</h2>
            <table id="course-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody id="course-tbody">
                <!-- Список курсов будет динамически добавляться здесь -->
                </tbody>
            </table>
        </section>
        <section class="add-course">
            <h2>Добавить новый курс</h2>
            <form id="add-course-form">
                <div class="form-group">
                    <label for="course-title">Название курса:</label>
                    <input type="text" id="course-title" name="course-title" required>
                </div>
                <div class="form-group">
                    <label for="course-description">Описание курса:</label>
                    <textarea id="course-description" name="course-description" required></textarea>
                </div>
                <button type="submit">Добавить курс</button>
            </form>
            <div class="button-group">
                <button id="add-test-button" class="button">Добавить тест</button>
                <button id="user-list-button" class="button">Список пользователей</button>
                <button id="question-list-button" class="button">Просмотреть вопросы пользователей</button>
            </div>
        </section>
    </main>
</div>
<script src="../../../public/js/admin/panel.js"></script>
</body>
</html>
