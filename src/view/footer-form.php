<link rel="stylesheet" href="../model/css/footer-form.css">

<div class="form-container">
    <form method="post" class="form">
        <h2 class="form-title">Fale Conosco</h2>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Mensagem:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>