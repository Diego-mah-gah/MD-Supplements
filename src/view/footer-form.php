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
            <div class="form-container text-center">
                <form method="post" class="form text-center">
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

                    min-width: 320px;
                    max-width: 400px;
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                    padding: 24px 20px;
                }

            }
        </style>