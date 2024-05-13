{if !$checkStatus}
    <script>
        window.location.href = '/';
    </script>
{else}
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{$style}"/>
        <title>{$title}</title>
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
        {foreach $products as $product}
            <div class="product-card">
                <h3>{$product.name}</h3>
                <p>Цена: {$product.price}</p>
                <p>Описание: {$product.description}</p>
                <a href="/edit-product?id={$product.id}">Редактировать</a>
            </div>
        {/foreach}
    </div>

    </body>
    </html>
{/if}