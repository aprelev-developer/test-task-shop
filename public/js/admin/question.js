document.addEventListener('DOMContentLoaded', () => {
    const questionsTableBody = document.getElementById('questions-tbody');
    const adminPanelButton = document.getElementById('admin-panel-button');
    const modal = document.getElementById('modal');
    const closeModal = document.querySelector('.close');
    const answerForm = document.getElementById('answer-form');
    let currentQuestionId = null;

    // Массив для хранения вопросов
    let questions = [
        { id: 1, name: 'Иван Иванов', email: 'ivan@example.com', question: 'Как начать курс?', date: '2024-06-01', answer: '' },
        { id: 2, name: 'Мария Петрова', email: 'maria@example.com', question: 'Какие материалы включены?', date: '2024-06-02', answer: '' }
    ];

    // Функция для отображения списка вопросов
    const displayQuestions = () => {
        questionsTableBody.innerHTML = '';
        questions.forEach(question => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${question.id}</td>
                <td>${question.name}</td>
                <td>${question.email}</td>
                <td>${question.question}</td>
                <td>${question.date}</td>
                <td>${question.answer}</td>
                <td><button onclick="openModal(${question.id})">Ответить</button></td>
            `;
            questionsTableBody.appendChild(row);
        });
    };

    // Функция для открытия модального окна
    window.openModal = (id) => {
        currentQuestionId = id;
        modal.style.display = 'block';
    };

    // Функция для закрытия модального окна
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Функция для добавления ответа
    answerForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const answer = document.getElementById('answer').value;
        questions = questions.map(question => {
            if (question.id === currentQuestionId) {
                return { ...question, answer };
            }
            return question;
        });
        displayQuestions();
        modal.style.display = 'none';
        answerForm.reset();
    });

    // Обработчик кнопки перехода в панель администратора
    adminPanelButton.addEventListener('click', () => {
        window.location.href = '/admin/';
    });

    // Начальное отображение вопросов
    displayQuestions();
});
