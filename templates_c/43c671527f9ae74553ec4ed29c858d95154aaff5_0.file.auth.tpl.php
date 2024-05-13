<?php
/* Smarty version 4.5.2, created on 2024-05-13 14:06:03
  from 'C:\OSPanel\domains\phpstorm\test-task-shop\app\views\auth\auth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6641f41b45e9d0_84361686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43c671527f9ae74553ec4ed29c858d95154aaff5' => 
    array (
      0 => 'C:\\OSPanel\\domains\\phpstorm\\test-task-shop\\app\\views\\auth\\auth.tpl',
      1 => 1715541079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6641f41b45e9d0_84361686 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['lessStylesPath']->value;?>
" data-type="text/less"/>
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

    input[type="email"],
    input[type="password"] {
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
    <h1>Авторизация</h1>
    <form method="post" action="/auth-controller">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Войти</button>
    </form>
    <p>Еще не зарегистрированы? <a href="register">Зарегистрироваться</a></p>
</div>
<?php echo '<script'; ?>
 src="/js/script.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
