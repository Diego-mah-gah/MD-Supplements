<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M&D Supplements</title>
    <link rel="stylesheet" href="src/style/style.css" />
    <link rel="shortcut icon" href="src/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="left-header">
            <a href="#home">
                <img src="src/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
            </a>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="O que você está procurando?" oninput="searchProduct(document.getElementById(onclick='searchInput'.value({ $_GET})));">
        </div>
        <div class="cart-shop">
            <i class="fa-solid fa-user" title="Login">
                <a href="" class="icon-button">
                    <i class="fas fa-bars">
                        <img src="src/imgs/usuario.png" alt="usuario" title="login">
                    </i>
                </a>
            </i>

            <i class="fa-solid fa-cart-shopping" title="Carrinho">
                <a href="src/page/carrinho.php" class="icon-button">
                    <i class="fas fa-bars">
                        <img src="src/imgs/carrinho.avif">
                    </i>
                </a>
            </i>
        </div>
        <div class="login-user">
            <div class="login">
                <form action="src/page/login.php" method="POST">
                    <input type="email" name="email" required placeholder="Email"><br>
                    <input type="password" name="senha" required placeholder="Senha"><br>
                    <button type="submit">Entrar</button>
                    <?php
                    include 'src/page/login.php';
                    ?>
                </form>
            </div>

        </div>
    </header>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" style="height:600px;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
        </div>
        <div class="carousel-inner" id="carousel-img" style="height: 600px;">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="src/imgs/leostronda1.jpg" class="d-block w-100" alt="whey Monstro">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:20px;  ">
                        <strong>OS MELHORES SUPLEMENTOS DA CIDADE </strong>
                    </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="src/imgs/creatina-bg.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:2%;">
                        <strong> SUPLEMENTOS PARA DESENVOLVIMENTO FÍSICO </strong>
                    </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="src/imgs/leo-cozinha.jpg" class="d-block w-100" alt="...">
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

    <div class="right-header">
        <a href="https://wa.me/44999649804?text=Olá, eu gostaria de realizar um pedido" target="_blank" class="whatsapp-button">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
        </a>
    </div>

    <div class="category-section">
        <a class="category" href="src/page/creatina.php" style="text-decoration: none;">
            <img src="src/imgs/um-homem-musculoso-sem-camisa-usando-shorts-esportivos-e-pegando-proteina-em-po-de-um-fras.avif" alt="Creatina">
            <p>Creatina</p>
        </a>
        <a class="category" href="src/page/whey.php" style="text-decoration: none;">
            <img src="src/imgs/whey-protein-com-carboidrato.avif" alt="Whey Protein">
            <p>Whey Protein</p>
        </a>
        <a class="category" href="src/page/pre-treino.php" style="text-decoration: none;">
            <img src="src/imgs/homem_atletico_sem_camisa_fazendo_exercicios_de_biceps_com_um_haltere_em_fundo_cinza_vinhe.avif" alt="Pré Treino">
            <p>Pré Treino</p>
        </a>
        <a class="category" href="src/page/emagrecedor.php" style="text-decoration: none;">
            <img src="src/imgs/treino-para-perder-peso-1_edited.avif" alt="Emagrecedor">
            <p>Emagrecedor</p>
        </a>
    </div>


    <div class="best-sellers">
        <h2>Mais vendidos</h2>
        <!-------------------------------- Produtos vão aqui ------------------------------>
        <div class="productList">
            <div class="listOfProducts">
                <div class="container">
                    <div class="row text-center">
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/whey.php" style="text-decoration: none;">
                                <img src="src/imgs/whey.avif" alt="Whey Protein" class="img-fluid" style="max-width: 80px;">
                                <p>Whey</p>
                                <button type="button" class="btn btn-danger" style="background-color:rgb(23, 29, 24); border-radius: 30px;">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/creatina.php" style="text-decoration: none;">
                                <img src="src/imgs/creatine.avif" alt="Creatina" class="img-fluid" style="max-width: 80px; ">
                                <p>Creatina</p>
                                <button type="button" class="btn btn-danger" style="background-color:rgb(23, 29, 24); border-radius: 30px;">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/pre-treino.php" style="text-decoration: none;">
                                <img src="src/imgs/pre-treino.avif" alt="Pré Treino" class="img-fluid" style="max-width: 80px;">
                                <p>Pré-treino</p>
                                <button type="button" class="btn btn-danger" style="background-color:rgb(23, 29, 24); border-radius: 30px;">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/emagrecedor.php" style="text-decoration: none;">
                                <img src="src/imgs/2-hot.avif" alt="Emagrecedor" class="img-fluid" style="max-width: 80px;">
                                <p>Emagrecedor</p>
                                <button type="button" class="btn btn-danger" style="background-color:rgb(23, 29, 24); border-radius: 30px;">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <li>Politicas da Loja</li>
                <li>Politicas de Cookies</li>
                <li> Politicas de Privacidade</li>
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
        </div>
    </footer>

    <script> </script>
    <script src="src/scripts/index.js"></script>
</body>

</html>