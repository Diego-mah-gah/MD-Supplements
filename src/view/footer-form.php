<div class="footer">
    <div class="container">
        <a href="">
            <li>Politicas da Loja</li>
        </a>
        <a href="">
            <li>Politicas de Cookies</li>
        </a>
        <a href="">
            <li> Politicas de Privacidade</li>
        </a>
    </div>
    <div class="form-container">
        <form method="post" class="form text-center" action=" https://formsubmit.co/duskkazuki@gmail.com" id="emailForm">
            <h2 class="form-title">Fale Conosco</h2>
            <div class="form-group">
                <input type="hidden" name="_captcha" value="false">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">E-mail:</label>
                <input type="email" id="emailInput" name="email" required>
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="window.location.href='mailto:duskkazuki@gmail.com'">
                Enviar
            </button>
        </form>
    </div>
</div>


<style>
    footer {
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        padding: 40px 0 0 0;

        .container {
            margin-top: 40px;
            padding: 0;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;

            a {
                margin-top: 15px;
                text-decoration: none;
                color: inherit;

            }

            li {

                list-style: none;
                margin-bottom: 12px;
                font-size: 1.2rem;
            }
        }

        .form-container {
            form {
                position:relative;
                max-width: 400px;
                width: 100%;
                margin-left: 300px;
                padding: 20px;
            }
        }

    }
</style>

<script src="../controller/scripts/form.js"></script>