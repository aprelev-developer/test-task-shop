<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet/less" type="text/css" href="../../../public/less/main.less"/>
    <title>Добавляем товары</title>
</head>
<body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 20px;
    }

    .form-container {
        max-width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    button[type="submit"],
    button[type="button"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button[type="button"] {
        background-color: #008CBA;
    }

    button[type="submit"]:hover,
    button[type="button"]:hover {
        background-color: #45a049;
    }

    a {
        color: #fff;
        text-decoration: none;
    }
</style>
<div class="form-container">
    <h2>Добавить товар</h2>
    <form method="POST" id="addProductForm" action="/add-product">
        <div class="form-group">
            <label for="name">Название товара:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="text" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Добавить</button>
        </div>
        <div class="form-group">
            <button type="button"><a href="/main">Вернуться к просмотру товаров</a></button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/less"></script>
</body>
</html>
