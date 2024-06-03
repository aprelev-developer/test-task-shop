document.addEventListener('DOMContentLoaded', () => {
    const courseForm = document.getElementById('add-course-form');
    const courseTableBody = document.getElementById('course-tbody');
    const addTestButton = document.getElementById('add-test-button');
    const userQuestionListButton = document.getElementById('user-list-button');
    const userListButton = document.getElementById('question-list-button');
    const logoutButton = document.getElementById('logout-button');

    // Массив для хранения курсов
    let courses = [
        { id: 1, title: 'Курс по JavaScript', description: 'Углубленный курс по JavaScript для начинающих.' },
        { id: 2, title: 'Курс по Python', description: 'Основы программирования на Python.' }
    ];

    // Функция для отображения списка курсов
    const displayCourses = () => {
        courseTableBody.innerHTML = '';
        courses.forEach(course => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${course.id}</td>
                <td>${course.title}</td>
                <td>${course.description}</td>
                <td><button onclick="deleteCourse(${course.id})">Удалить</button></td>
            `;
            courseTableBody.appendChild(row);
        });
    };

    // Функция для добавления нового курса
    const addCourse = (title, description) => {
        const newCourse = {
            id: courses.length ? courses[courses.length - 1].id + 1 : 1,
            title,
            description
        };
        courses.push(newCourse);
        displayCourses();
    };

    // Функция для удаления курса
    window.deleteCourse = (id) => {
        courses = courses.filter(course => course.id !== id);
        displayCourses();
    };

    // Обработчик формы добавления курса
    courseForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const title = document.getElementById('course-title').value;
        const description = document.getElementById('course-description').value;
        addCourse(title, description);
        courseForm.reset();
    });

    // Обработчик кнопки добавления теста
    addTestButton.addEventListener('click', () => {
        window.location.href = '/create-test';
    });

    // Обработчик кнопки списка пользователей
    userListButton.addEventListener('click', () => {
        window.location.href = '/admin/user_list';
    });
    // Обработчик кнопки списка вопросов пользователей
    userQuestionListButton.addEventListener('click', () => {
        window.location.href = '/admin/question';
    });


    // Обработчик кнопки выхода
    logoutButton.addEventListener('click', () => {
        window.location.href = '/logout';
    });

    // Начальное отображение курсов
    displayCourses();
});
