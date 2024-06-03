<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <link rel="stylesheet" href="../../../public/less/admin/user_list.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Список пользователей</h1>
        <button id="admin-panel-button" class="button">Панель администратора</button>
    </header>
    <main>
        <table id="user-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody id="user-tbody">
            <!-- Список пользователей будет динамически добавляться здесь -->
            </tbody>
        </table>
    </main>
</div>
<script src="../../../public/js/admin/user_list.js"></script>
</body>
</html>
