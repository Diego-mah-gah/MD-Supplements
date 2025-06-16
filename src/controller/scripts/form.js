const emailInput = document.querySelector('#emailInput');
const nameInput = document.querySelector('#name');
const messageInput = document.querySelector('#message');
const emailForm = document.querySelector('#emailForm');

emailForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const email = emailInput.value.trim();
    const name = nameInput.value.trim();
    const message = messageInput.value.trim();

    if (!name) {
        alert('Por favor, insira seu nome.');
        return;
    }
    if (!email || !validateEmail(email)) {
        alert('Por favor, insira um e-mail válido.');
        return;
    }
    if (!message) {
        alert('Por favor, escreva uma mensagem.');
        return;
    }
});

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}


