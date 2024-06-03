<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание курса</title>
    <link rel="stylesheet" href="../../public/less/course.css">
</head>
<body>
<div class="container">
    <h1>Создание нового курса</h1>
    <form id="course-form">
        <div class="form-group">
            <label for="course-name">Название курса</label>
            <input type="text" id="course-name" name="course-name" required>
        </div>
        <div class="form-group">
            <label for="course-description">Описание курса</label>
            <textarea id="course-description" name="course-description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="start-date">Дата начала</label>
            <input type="date" id="start-date" name="start-date" required>
        </div>
        <div class="form-group">
            <label for="end-date">Дата окончания</label>
            <input type="date" id="end-date" name="end-date" required>
        </div>
        <div class="form-group">
            <label for="instructor">Преподаватель</label>
            <input type="text" id="instructor" name="instructor" required>
        </div>
        <div class="form-group">
            <label for="category">Категория курса</label>
            <select id="category" name="category" required>
                <option value="programming">Программирование</option>
                <option value="design">Дизайн</option>
                <option value="marketing">Маркетинг</option>
                <option value="business">Бизнес</option>
            </select>
        </div>
        <div class="form-group">
            <label for="certificate">Прикрепить сертификат (лицензия)</label>
            <input type="file" id="certificate" name="certificate" accept="application/pdf" required>
        </div>
        <button type="submit"><a href="/create-test">Создать курс</a></button>
    </form>
</div>
<script src="../../public/js/create-course.js"></script>
</body>
</html>
