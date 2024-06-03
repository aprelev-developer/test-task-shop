document.getElementById('course-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    fetch('/path/to/your/api', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alert('Курс создан!');
            // Вы можете добавить дополнительную логику обработки ответа сервера здесь
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
});
