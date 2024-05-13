<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{$style}"/>
    <title>Редактировать товар</title>
</head>
<body>
<h1>Редактировать товар</h1>
<form method="post" action="/update-product">
    <input type="hidden" name="id" value="{$product.id}">
    <label for="name">Название:</label>
    <input type="text" id="name" name="name" value="{$product.name}" required>
    <label for="price">Цена:</label>
    <input type="number" id="price" name="price" value="{$product.price}" step="0.01" required>
    <label for="description">Описание:</label>
    <textarea id="description" name="description" required>{$product.description}</textarea>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>