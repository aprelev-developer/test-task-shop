document.addEventListener('DOMContentLoaded', () => {
    const userTableBody = document.getElementById('user-tbody');
    const adminPanelButton = document.getElementById('admin-panel-button');

    // Массив для хранения пользователей
    let users = [
        { id: 1, name: 'Иван Иванов', email: 'ivan@example.com' },
        { id: 2, name: 'Мария Петрова', email: 'maria@example.com' }
    ];

    // Функция для отображения списка пользователей
    const displayUsers = () => {
        userTableBody.innerHTML = '';
        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td><button onclick="deleteUser(${user.id})">Удалить</button></td>
            `;
            userTableBody.appendChild(row);
        });
    };

    // Функция для удаления пользователя
    window.deleteUser = (id) => {
        users = users.filter(user => user.id !== id);
        displayUsers();
    };

    // Обработчик кнопки перехода в панель администратора
    adminPanelButton.addEventListener('click', () => {
        window.location.href = '/admin/';
    });

    // Начальное отображение пользователей
    displayUsers();
});
