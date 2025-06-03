<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M&D Supplements</title>
    <link rel="stylesheet" href="src/model/style/style.css" />
    <link rel="shortcut icon" href="src/model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="left-header">
            <a href="home">
                <img src="src/model/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
            </a>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="O que você está procurando?" oninput="searchProduct(document.getElementById(onclick='searchInput'.value({ $_GET})));">
        </div>
        <div class="cart-shop">

            <!----------------- Ícone do usuário com botão para abrir o modal ----------------->
            <a href="login-page" class="icon-button" data-bs-toggle="modal" data-bs-target="#loginModal">
                <img src="src/model/imgs/usuario.png" alt="usuario" title="login">
            </a>

            <!----------------- Ícone do carrinho ----------------->
            <a href="src/view/page/carrinho.php" class="icon-button">
                <img src="src/model/imgs/carrinho.avif">
            </a>
        </div>

    </header>

    <main>
         <?php

        include 'src/view/produtos.php';

        $pagina = $_GET["param"] ?? "home";

        $pagina = "src/view/{$pagina}.php";
        if (file_exists($pagina)) {
            include $pagina;
        } else {
          "src/view/404.php";
        }
        ?>

    </main>

    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
        </div>
        <div class="carousel-inner" id="carousel-img">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="src/model/imgs/leostronda1.jpg" class="d-block w-100" alt="whey Monstro">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:20px;  ">
                        <strong>OS MELHORES SUPLEMENTOS DA CIDADE </strong>
                    </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="src/model/imgs/creatina-bg.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:2%;">
                        <strong> SUPLEMENTOS PARA DESENVOLVIMENTO FÍSICO </strong>
                    </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="src/model/imgs/leo-cozinha.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:2%;">
                        <strong> PARA GANHO DE MASSA MAGRA </strong>
                    </h5>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" style="background-color:blueviolet; padding:2px 20px; border-radius: 100px 100px;height:60px;margin:auto;" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next" style="background-color:blueviolet; padding:2px 20px; border-radius: 100px 100px;height:60px;margin:auto;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!------------------ Entrar em conversa whatsapp----------------->

    <div class="right-header" id="wa-btn">
        <a href="https://wa.me/44999649804?text=Olá, eu gostaria de realizar um pedido" target="_blank" class="whatsapp-button">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
        </a>
    </div>


    <!-------------------- Ícones dos produtos (círculos) ----------------->
    <div class="category-section">
        <a class="category" href="src/view/creatina.php" style="text-decoration: none;">
            <img src="src/model/imgs/um-homem-musculoso-sem-camisa-usando-shorts-esportivos-e-pegando-proteina-em-po-de-um-fras.avif" alt="Creatina">
            <p>Creatina</p>
        </a>
        <a class="category" href="src/view/whey.php" style="text-decoration: none;">
            <img src="src/model/imgs/whey-protein-com-carboidrato.avif" alt="Whey Protein">
            <p>Whey Protein</p>
        </a>
        <a class="category" href="src/view/pre-treino.php" style="text-decoration: none;">
            <img src="src/model/imgs/homem_atletico_sem_camisa_fazendo_exercicios_de_biceps_com_um_haltere_em_fundo_cinza_vinhe.avif" alt="Pré Treino">
            <p>Pré Treino</p>
        </a>
        <a class="category" href="src/view/emagrecedor.php" style="text-decoration: none;">
            <img src="src/model/imgs/treino-para-perder-peso-1_edited.avif" alt="Emagrecedor">
            <p>Emagrecedor</p>
        </a>
    </div>


    <div class="best-sellers">
        <!-------------------------------- Produtos vão aqui ------------------------------>

        <h2>Mais vendidos</h2>

        
        

    </div>


    <div class="flex-row">
        <div class="container">
            <div class="info-payment">
                <div class="info-item">
                    <img src="src/imgs/truck-fast.png" alt="fast-truck" style="width:48px; height:auto;">
                    <p><strong>
                            Paraná acima de R$ 399,99<br>
                            Santa Catarina acima de R$ 599,99<br>
                            São Paulo acima de R$ 599,99<br>
                            Demais Regiões será cobrado frete<br>
                        </strong>
                    </p>
                </div>
                <div class="info-item">
                    <img src="src/imgs/card-payment.png" alt="credit-card" style="width:48px; height:auto;">
                    <p>
                        <strong>
                            Parcelamos suas compras em 3x sem juros
                        </strong>
                    </p>
                </div>
                <div class="info-item">
                    <img src="src/imgs/locker.png" alt="locker" style="width:48px; height:auto;">
                    <p>
                        <strong>
                            Site 100% seguro
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer>
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
        </div>
        <div class="form">
            <form action="">
                <input type="email"><br>
                <input type="password"><br>
                <input type="text"><br>
                <input type="checkbox"><br>
                <input type="submit"><br>
                <button type="button">Enviar</button>
            </form>
        </div>
    </footer>

    <script> </script>
    <script src="src/scripts/index.js"></script>
</body>

</html>