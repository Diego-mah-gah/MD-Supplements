document.getElementById('emailInput').addEventListener('input', function (e) {

    document.querySelectorAll().forEach(input => el.txtContent = '');

    let isValid = true;
    const nameInput = document.getElementById('name').value.trim();
    const emailInput = document.getElementById('emailInput').value.trim();
    const messageInput = document.getElementById('message').value.trim();
    const emailForm = document.getElementById('emailForm').value.trim();

    if (!nameInput) {
        isValid = false;
        document.getElementById('nameError').textContent = 'Por favor, insira seu nome.';
    } else {
        document.getElementById('nameError').textContent = '';
    }
    if (!emailInput || !validateEmail(emailInput)) {
        isValid = false;
        document.getElementById('emailError').textContent = 'Por favor, insira um e-mail válido.';
    } else {
        document.getElementById('emailError').textContent = '';
    }
    if (!messageInput) {
        isValid = false;
        document.getElementById('messageError').textContent = 'Por favor, escreva uma mensagem.';
    } else {
        document.getElementById('messageError').textContent = '';
    }


    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }


    function sendFormData(formData) {
        const messageDiv = document.getElementById('message');
        messageDiv.innerHTML = '<p>Enviando...</p>';
        messageDiv.className = '';

        etch('send_email.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(formData)
        })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    messageDiv.innerHTML = '<p class="success">Mensagem enviada com sucesso!</p>';
                    document.getElementById('contactForm').reset();
                } else {
                    messageDiv.innerHTML = `<p class="error">Erro ao enviar mensagem: ${data}</p>`;
                }
            })
            .catch(error => {
                messageDiv.innerHTML = `<p class="error">Erro na conexão: ${error.message}</p>`;
            });
    }
});

