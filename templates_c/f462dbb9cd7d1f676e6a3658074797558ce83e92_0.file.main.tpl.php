<?php
/* Smarty version 4.5.2, created on 2024-05-13 14:15:49
  from 'C:\OSPanel\domains\phpstorm\test-task-shop\app\views\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6641f665cf0073_45781127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f462dbb9cd7d1f676e6a3658074797558ce83e92' => 
    array (
      0 => 'C:\\OSPanel\\domains\\phpstorm\\test-task-shop\\app\\views\\main.tpl',
      1 => 1715598890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6641f665cf0073_45781127 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['checkStatus']->value) {?>
    <?php echo '<script'; ?>
>
        window.location.href = '/';
    <?php echo '</script'; ?>
>
<?php } else { ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
"/>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <style>
            /* Стили для карточки товара */
            .product-card {
                border: 1px solid #ccc;
                padding: 10px;
                margin: 10px;
                width: 200px;
                float: left;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease-in-out;
            }

            .product-card:hover {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            /* Стили для навигационной панели */
            .navigation {
                padding: 10px;
                background-color: #f0f0f0;
                overflow: auto;
            }

            .add-product {
                float: right;
                cursor: pointer;
            }

            .logout-link {
                float: right;
                margin-left: 10px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
    <div class="navigation">
        <span class="logout-link"><a href="/logout">Выйти</a></span>
        <span class="add-product"><a href="/products">Добавить товар</a></span>
    </div>

    <div class="products-container">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
            <div class="product-card">
                <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h3>
                <p>Цена: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</p>
                <p>Описание: <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
                <a href="/edit-product?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">Редактировать</a>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

    </body>
    </html>
<?php }
}
}
