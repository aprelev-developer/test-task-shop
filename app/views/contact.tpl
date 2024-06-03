<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Онлайн курсы</title>
    <link rel="stylesheet" href="../../public/less/main.css">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        function init() {
            var myMap = new ymaps.Map("map", {
                center: [54.316667, 48.366667], // Координаты Ульяновска
                zoom: 17 // Увеличение карты
            });
            var myPlacemark = new ymaps.Placemark([54.316667, 48.366667], {
                balloonContent: 'г. Ульяновск, ул. Гончарова, д. 1'
            });
            myMap.geoObjects.add(myPlacemark);
        }
    </script>
</head>
<body>
<header>
    <div class="logo">
        <img src="../../public/images/logo.jpeg" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/about">О нас</a></li>
            <li><a href="/course">Программы</a></li>
            <li><a href="/contact.tpl">Контакты</a></li>
        </ul>
    </nav>
    <div class="auth">
        <button class="register"><a href="/register">Зарегистрироваться</a></button>
        <button class="login"><a href="/auth">Вход</a></button>
    </div>
</header>
<div class="container contact">
    <div id="map" class="map"></div>
    <div class="contact-info">
        <h1>Контакты</h1>
        <p><strong>Адрес:</strong> г. Ульяновск, ул. Гончарова, д. 1</p>
        <p><strong>Телефон:</strong> +7 (495) 123-45-67</p>
        <p><strong>Email:</strong> info@example.com</p>
        <p><strong>Рабочие часы:</strong> Пн-Пт 9:00 - 18:00</p>
    </div>
</div>
</body>
</html>
