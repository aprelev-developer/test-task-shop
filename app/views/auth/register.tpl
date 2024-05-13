<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="style/less/style.css">
</head>
<body>
<style>
    @font-color: #333;
    @bg-color: #f4f4f4;
    @accent-color: #007bff;

    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        background-color: @bg-color;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: @font-color;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: @font-color;
    }
    input {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: @accent-color;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: darken(@accent-color, 10%);
    }

    p {
        text-align: center;
        color: @font-color;
    }

    a {
        color: @accent-color;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Адаптивные стили */
    @media (max-width: 500px) {
        .container {
            max-width: 90%;
            margin: 20px auto;
        }
    }
</style>

<div class="container">
    <h1>Регистрация</h1>
    <form method="post" action="/register-controller" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Подтвердите пароль</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <p>Уже зарегистрированы? <a href="/">Авторизоваться</a></p>
</div>
<script>
    function validateForm() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;

        if (password.length < 8) {
            alert("Пароль должен содержать не менее 8 символов");
            return false;
        }

        if (password !== confirmPassword) {
            alert("Пароли не совпадают");
            return false;
        }

        return true;
    }
</script>
</body>
</html>