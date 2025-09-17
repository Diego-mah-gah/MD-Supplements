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
    <div class="email-container">
        <h2 class="form-title"><a href="https://mail.google.com/mail/?view=cm&fs=1&to=kawadiego.soares@gmail.com.com&su=Assunto%20do%20Email&body=Ol%C3%A1%2C%0A%0ATeste%20de%20mensagem.%0A%0AAtenciosamente%2C%0A[Nome%20Cliente]" id="email">Fale Conosco</a></h2>
    </div>
    <div class="map-container" style="width:100%; max-width:400px; margin: 30px auto 0 auto;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.879123456789!2d-46.65657468440636!3d-23.58108396877439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8b1b1b1b1%3A0x123456789abcdef!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1719432000000!5m2!1spt-BR!2sbr"
            width="800px" height="100%" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>


<style>
    footer {
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        justify-content: space-between;
        padding: 20px 0 0 0;

        .container {
            margin-top: 40px;
            text-align: left;
            display: flex;
            flex-direction: row;
            margin: 40px;
            align-items: center;

            a {
                margin-top: 15px;
                text-decoration: none;
                color: inherit;
                margin-left: 170px;

            }

            li {
                text-align: center;
                margin: 60px;
                list-style: none;
                margin-bottom: 20px;
                font-size: 1.2rem;
            }
        }

        h2 {
            a {
                margin-left: 140px;
            }
        }
    }

    .map-container {
        width: 100%;
        max-width: 1000px;
        height: 350px;
        margin: auto;
        border-radius: 10px;
        overflow: hidden;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
    }

    @media (max-width: 900px) {
        footer {
            flex-direction: column;
            align-items: center;
            padding: 20px 0 0 0;
        }

        .footer .container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            width: 100%;
            text-align: center;
            gap: 0;
        }

        .footer .container a {
            margin: 0 10px;
            padding: 0;
            text-decoration: none;
            color: inherit;
        }

        .footer .container li {
            margin: 0;
            padding: 0 8px;
            list-style: none;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 0;
        }

        .email-container {
            display: none !important;
        }

        .map-container {
            max-width: 100%;
            height: 180px;
            pointer-events: auto !important;
        }

        .map-container iframe {
            height: 180px;
            pointer-events: auto !important;
        }
    }
</style>

<script src="../controller/scripts/form.js"></script>