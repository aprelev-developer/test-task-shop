let questionCount = 1;

function addQuestion() {
    questionCount++;
    const questionsContainer = document.getElementById('questions-container');
    const questionBlock = document.createElement('div');
    questionBlock.className = 'question-block';
    questionBlock.id = `question-${questionCount}`;

    questionBlock.innerHTML = `
        <h3>Вопрос ${questionCount}</h3>
        <div class="form-group">
            <label for="question-${questionCount}-text">Текст вопроса</label>
            <textarea id="question-${questionCount}-text" name="question-${questionCount}-text" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="question-${questionCount}-answer-1">Ответ 1</label>
            <input type="text" id="question-${questionCount}-answer-1" name="question-${questionCount}-answer-1" required>
        </div>
        <div class="form-group">
            <label for="question-${questionCount}-answer-2">Ответ 2</label>
            <input type="text" id="question-${questionCount}-answer-2" name="question-${questionCount}-answer-2" required>
        </div>
        <div class="form-group">
            <label for="question-${questionCount}-answer-3">Ответ 3</label>
            <input type="text" id="question-${questionCount}-answer-3" name="question-${questionCount}-answer-3" required>
        </div>
        <div class="form-group">
            <label for="question-${questionCount}-answer-4">Ответ 4</label>
            <input type="text" id="question-${questionCount}-answer-4" name="question-${questionCount}-answer-4" required>
        </div>
        <div class="form-group">
            <label for="question-${questionCount}-correct-answer">Правильный ответ</label>
            <select id="question-${questionCount}-correct-answer" name="question-${questionCount}-correct-answer" required>
                <option value="1">Ответ 1</option>
                <option value="2">Ответ 2</option>
                <option value="3">Ответ 3</option>
                <option value="4">Ответ 4</option>
            </select>
        </div>
    `;
    questionsContainer.appendChild(questionBlock);
}

document.getElementById('quiz-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Тест создан!');
    // Здесь вы можете добавить код для отправки данных формы на сервер
});
