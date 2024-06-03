<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вопросы пользователей</title>
    <link rel="stylesheet" href="../../../public/less/admin/question.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Вопросы пользователей</h1>
        <button id="admin-panel-button" class="button">Панель администратора</button>
    </header>
    <main>
        <section class="questions-list">
            <h2>Список вопросов</h2>
            <table id="questions-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Вопрос</th>
                    <th>Дата</th>
                    <th>Ответ</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody id="questions-tbody">
                <!-- Список вопросов будет динамически добавляться здесь -->
                </tbody>
            </table>
        </section>
    </main>
</div>

<!-- Модальное окно для добавления ответа -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Добавить ответ</h2>
        <form id="answer-form">
            <div class="form-group">
                <label for="answer">Ответ:</label>
                <textarea id="answer" name="answer" rows="4" required></textarea>
            </div>
            <button type="submit" class="button">Отправить</button>
        </form>
    </div>
</div>

<script src="../../../public/js/admin/question.js"></script>
</body>
</html>
