<footer class="footer">
    <div class="content-wrapper">
        <div class="footer-section">
            <h2 class="form-title">M&D Suplementos</h2>
            <ul class="list-unstyled">
                <li><a href="#" class="text-white">Políticas da Loja</a></li>
                <li><a href="#" class="text-white">Políticas de Cookies</a></li>
                <li><a href="#" class="text-white">Políticas de Privacidade</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h2 class="form-title">
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=kawadiego.soares@gmail.com.com&su=Assunto%20do%20Email&body=Ol%C3%A1%2C%0A%0ATeste%20de%20mensagem.%0A%0AAtenciosamente%2C%0A[Nome%20Cliente]" id="email">
                    Fale Conosco
                </a>
            </h2>
            <div class="social-icons">
                <a href="https://www.instagram.com/" target="_blank">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram">
                    <p>Instagram</p>
                </a>
                <a href="https://www.youtube.com/" target="_blank">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube">
                    <p>Youtube</p>
                </a>
                <a href="https://www.facebook.com/" target="_blank">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook">
                    <p>Facebook</p>
                </a>
            </div>
        </div>

        <div class="footer-section map-section">
            <h2 class="form-title">Nossa Localização</h2>
            <div class="map-container rounded">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.879123456789!2d-46.65657468440636!3d-23.58108396877439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8b1b1b1b1%3A0x123456789abcdef!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1719432000000!5m2!1spt-BR!2sbr"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
    <div class="copyright-section">
        <p>Todos os direitos reservados.</p>
    </div>
</footer>

<style>
    /* Estilos Gerais do Rodapé */
    .footer {
        background-color: #343a40;
        color: #fff;
        font-family: Arial, Helvetica, sans-serif;
        padding: 20px 0;
    }

    .content-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
    }

    .footer-section {
        margin-bottom: 20px;
    }

    .form-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }

    .list-unstyled a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }

    .list-unstyled a:hover {
        color: #ffc107;
    }

    /* Estilos dos Ícones Sociais */
    .social-icons {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .social-icons a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: inherit;
        margin: 10px 0;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: #ffc107;
    }

    .social-icons img {
        width: 32px;
        height: 32px;
        margin-right: 10px;
        transition: filter 0.3s;
    }
    
    .social-icons a:hover img {
        filter: brightness(0) saturate(100%) invert(80%) sepia(35%) saturate(3015%) hue-rotate(345deg) brightness(101%) contrast(100%);
    }

    /* Estilos do Mapa */
    .map-section {
        display: flex;
        flex-direction: column;
    }

    .map-container {
        height: 250px;
        width: 100%;
        overflow: hidden;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
        border-radius: 10px;
    }

    /* Estilos do Copyright */
    .copyright-section {
        text-align: center;
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Media Queries para Responsividade */
    @media (min-width: 901px) {
        .content-wrapper {
            justify-content: space-between;
        }

        .map-section {
            flex: 0 0 60%;
        }

        .footer-section:not(.map-section) {
            flex: 0 0 auto;
        }
    }

    @media (max-width: 900px) {
        .content-wrapper {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-section {
            width: 100%;
            text-align: center;
        }

        .footer-section h2, .footer-section a {
            margin-left: 0;
        }

        .social-icons {
            align-items: center;
        }
    }
</style>
