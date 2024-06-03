<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание теста</title>
    <link rel="stylesheet" href="../../public/less/create-test.css">
</head>
<body>
<div class="container">
    <h1>Создание нового теста</h1>
    <form id="quiz-form">
        <div class="form-group">
            <label for="quiz-name">Название теста</label>
            <input type="text" id="quiz-name" name="quiz-name" required>
        </div>
        <div class="form-group">
            <label for="quiz-description">Описание теста</label>
            <textarea id="quiz-description" name="quiz-description" rows="3" required></textarea>
        </div>
        <div id="questions-container">
            <div class="question-block" id="question-1">
                <h3>Вопрос 1</h3>
                <div class="form-group">
                    <label for="question-1-text">Текст вопроса</label>
                    <textarea id="question-1-text" name="question-1-text" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="question-1-answer-1">Ответ 1</label>
                    <input type="text" id="question-1-answer-1" name="question-1-answer-1" required>
                </div>
                <div class="form-group">
                    <label for="question-1-answer-2">Ответ 2</label>
                    <input type="text" id="question-1-answer-2" name="question-1-answer-2" required>
                </div>
                <div class="form-group">
                    <label for="question-1-answer-3">Ответ 3</label>
                    <input type="text" id="question-1-answer-3" name="question-1-answer-3" required>
                </div>
                <div class="form-group">
                    <label for="question-1-answer-4">Ответ 4</label>
                    <input type="text" id="question-1-answer-4" name="question-1-answer-4" required>
                </div>
                <div class="form-group">
                    <label for="question-1-correct-answer">Правильный ответ</label>
                    <select id="question-1-correct-answer" name="question-1-correct-answer" required>
                        <option value="1">Ответ 1</option>
                        <option value="2">Ответ 2</option>
                        <option value="3">Ответ 3</option>
                        <option value="4">Ответ 4</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="button" onclick="addQuestion()">Добавить вопрос</button>
        <button type="submit">Создать тест</button>
    </form>
</div>
<script src="../../public/js/create-test.js">
</script>
</body>
</html>
