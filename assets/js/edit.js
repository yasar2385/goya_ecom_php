document.addEventListener('DOMContentLoaded', () => {
    const closeButton = document.querySelector('.close-button');
    const modal = document.querySelector('.modal');
    const cancelButton = document.querySelector('.cancel-button');

    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    cancelButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    const form = document.getElementById('account-form');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        alert('Form submitted!');
    });
});
