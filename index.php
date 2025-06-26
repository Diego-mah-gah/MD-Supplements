<?php
session_start();
?>

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

    <?php

    $param = isset($_GET["param"]) ? $_GET["param"] : "home";

    if (isset($_GET["param"])) {
        $pagina = "src/view/{$_GET["param"]}.php";
        if (!file_exists($pagina)) {
            header("Location: src/view/pages/404.php");
            exit();
        }
    }
    ?>

</head>

<body>
    <div id="mainBar">
        <button onclick="switchMainBarVisibility()" class="mainBarButton mobile-only">
            <img src="src/model/imgs/menu.svg" alt="Menu" class="menu-icon">
        </button>
        <header class="header" id="navbar">
            <div id="mainContainer">
                <div id="globalContainer">
                    <div class="left-header desktop-only">
                        <a href="index.php" id="home">
                            <img src="src/model/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
                        </a>
                    </div>
                    <div class="search-box desktop-only" >
                        <input type="text" id="searchInput" name="search" placeholder="O que você está procurando?" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button type="submit" onclick="searchProduct(document.getElementById('searchInput').value); return false;"><img src="src/model/imgs/icon-search.gif" alt="search icon"></button>
                        <div id="resultSearch"></div>
                    </div>
                    <div class="cart-shop desktop-only">
                        <?php
                        if (isset($_SESSION['email'])) {
                            $userLink = "src/view/pages/profile.php";
                            $userTitle = "Perfil";
                        } else {
                            $userLink = "src/view/pages/login-page.php";
                            $userTitle = "Login";
                        }
                        ?>
                        <a href="<?php echo $userLink; ?>" class="icon-button">
                            <img src="src/model/imgs/usuario.png" alt="usuario" title="<?php echo $userTitle; ?>">
                        </a>
                        <a href="src/view/pages/carrinho.php" class="icon-button">
                            <img src="src/model/imgs/carrinho.avif">
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- NavBar para mobile -->
        <nav id="sideNav" class="mobile-only">
            <ul>
                <li><a href="<?php echo $userLink; ?>">Perfil</a></li>
                <li><a href="src/view/pages/carrinho.php">Carrinho</a></li>
                <li><a href="https://wa.me/44999649804?text=Olá, gostaria de tirar uma dúvida. Poderia me ajudar por favor?" target="_blank" class="whatsapp-nav">Fale Conosco</a></li>
                <li><a href="#" onclick="showSearchInputMobile();return false;">Pesquisar</a></li>
            </ul>
            <div id="mobileSearchBox" style="display:none; padding:10px;">
                <input type="text" id="mobileSearchInput" name="search" placeholder="O que você está procurando?" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" onclick="searchProduct(document.getElementById('mobileSearchInput').value); return false;" style="border:none; background-color:blueviolet; color:white; width:50%; height:70%;">Buscar</button>
            </div>
        </nav>
    </div>



    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" style="background-color:bisque; padding:2px 20px; border-radius: 100px 100px;"></button>
        </div>
        <div class="carousel-inner" id="carousel-img">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="src/model/imgs/leostronda1.jpg" class="d-block w-100" alt="whey Monstro">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:20px; display:flex;">
                        <strong>OS MELHORES SUPLEMENTOS DA CIDADE </strong>
                    </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="src/model/imgs/creatina-bg.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color:antiquewhite; background-color:rgba(139, 31, 29, 0.45);  margin:30% 0; position:sticky; border-radius: 30px; padding:2%;">
                        <strong> SUPLEMENTOS PARA DESENVOLVIMENTO FÍSICO </strong>
                    </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
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


    <!-------------------- Ícones dos produtos ----------------->
    <div class="category-section">
        <a class="category" href="src/view/pages/creatina.php" style="text-decoration: none;">
            <img src="src/model/imgs/um-homem-musculoso-sem-camisa-usando-shorts-esportivos-e-pegando-proteina-em-po-de-um-fras.avif" alt="Creatina">
            <p>Creatina</p>
        </a>
        <a class="category" href="src/view/pages/whey.php" style="text-decoration: none;">
            <img src="src/model/imgs/whey-protein-com-carboidrato.avif" alt="Whey Protein">
            <p>Whey Protein</p>
        </a>
        <a class="category" href="src/view/pages/pre-treino.php" style="text-decoration: none;">
            <img src="src/model/imgs/homem_atletico_sem_camisa_fazendo_exercicios_de_biceps_com_um_haltere_em_fundo_cinza_vinhe.avif" alt="Pré Treino">
            <p>Pré Treino</p>
        </a>
        <a class="category" href="src/view/pages/emagrecedor.php" style="text-decoration: none;">
            <img src="src/model/imgs/treino-para-perder-peso-1_edited.avif" alt="Emagrecedor">
            <p>Emagrecedor</p>
        </a>
    </div>


    <div class="best-sellers">
        <!-------------------------------- Produtos vão aqui ------------------------------>

        <?php
        include 'src/view/produtos.php';

        if (isset($_GET['id']) && $_GET['id'] == 'produtos') {
            include 'src/view/produtos.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
                $produto_nome = $_POST['produto_nome'];
                foreach ($produtos as $produto) {
                    if ($produto['nome'] === $produto_nome) {
                        $_SESSION['carrinho'][] = $produto;
                        break;
                    }
                }
                // Redireciona para o carrinho se solicitado
                if (isset($_GET['redirect']) && $_GET['redirect'] === 'carrinho') {
                    header('Location: src/view/pages/carrinho.php');
                    exit();
                }
            }
        }

        $paginas_validas = ['home', 'creatina', 'whey', 'pre-treino', 'emagrecedor', 'carrinho', 'login', 'cadastro', 'sobre', 'contato', 'produtos'];
        $pagina = "src/view/{$param}.php";
        if (!in_array($param, $paginas_validas)) {
            $pagina = "src/view/home.php";
        }

        if (file_exists($pagina))
            include $pagina;
        ?>


    </div>


    <div class="container my-4"></div>
    <div class="row g-3 justify-content-center text-center" style="background-color: #be100d; width:auto; padding:10%; margin-top:60px; font-size:1.2rem; color:antiquewhite; border-radius: 10px;">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-item d-flex flex-column align-items-center h-100">
                <img src="src/model/imgs/truck-fast.png" alt="fast-truck" style="width:48px; height:auto;">
                <div class="info-text mt-2">
                    <strong>
                        <p class="mb-0" style=>
                            Paraná acima de R$ 399,99<br>
                            Santa Catarina acima de R$ 599,99<br>
                            São Paulo acima de R$ 599,99<br>
                            Demais Regiões será cobrado frete
                        </p>
                    </strong>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-item d-flex flex-column align-items-center h-100">
                <img src="src/model/imgs/card-payment.png" alt="credit-card" style="width:48px; height:auto;">
                <p class="mt-2 mb-0" style=>
                    <strong>
                        Parcelamos suas compras em 3x sem juros
                    </strong>
                </p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-item d-flex flex-column align-items-center h-100">
                <img src="src/model/imgs/locker.png" alt="locker" style="width:48px; height:auto;">
                <p class="mt-2 mb-0" style=>
                    <strong>
                        Site 100% seguro
                    </strong>
                </p>
            </div>
        </div>
    </div>
    </div>
    <footer>

        <?php

        include 'src/view/footer-form.php';

        ?>

    </footer>

    <script src="src/controller/scripts/index.js"></script>

</body>

</html>