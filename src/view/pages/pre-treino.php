<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pré-Treino</title>
    <link rel="stylesheet" href="../../model/style/style.css">
    <link rel="shortcut icon" href="../../model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <?php

    $param = isset($_GET["param"]) ? $_GET["param"] : "home";

    if (isset($_GET["param"])) {
        $pagina = "{$_GET["param"]}.php";
        if (!file_exists($pagina)) {
            header("Location: 404.php");
            exit();
        }
    }
    ?>

</head>

<body>

    <div id="mainBar">
        <button onclick="switchMainBarVisibility()" class="mainBarButton mobile-only">
            <img src="../../model/imgs/menu.svg" alt="Menu" class="menu-icon">
        </button>
        <header class="header" id="navbar">
            <div id="mainContainer">
                <div id="globalContainer">
                    <div class="left-header desktop-only">
                        <a href="../../../index.php" id="home">
                            <img src="../../model/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
                        </a>
                    </div>
                    <div class="search-box desktop-only">
                        <input type="text" id="searchInput" name="search" placeholder="O que você está procurando?" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button type="submit" onclick="searchProduct(document.getElementById('searchInput').value); return false;"><img src="../../model/imgs/icon-search.gif" alt="search icon"></button>
                        <div id="resultSearch"></div>
                    </div>
                    <div class="cart-shop desktop-only">
                        <?php
                        if (isset($_SESSION['usuario_email'])) {
                            $userLink = "profile.php";
                            $userTitle = "Perfil";
                        } else {
                            $userLink = "app.php";
                            $userTitle = "Login";
                        }
                        ?>
                        <a href="<?php echo $userLink; ?>" class="icon-button">
                            <img src="../../model/imgs/usuario.png" alt="usuario" title="<?php echo $userTitle; ?>">
                        </a>
                        <a href="carrinho.php" class="icon-button">
                            <img src="../../model/imgs/carrinho.avif">
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- NavBar para mobile -->
        <nav id="sideNav" class="mobile-only">
            <ul>
                <li><a href="../../../index.php">Início</a></li>
                <li><a href="<?php echo $userLink; ?>">Perfil</a></li>
                <li><a href="carrinho.php">Carrinho</a></li>
                <li><a href="https://wa.me/44999649804?text=Olá, gostaria de tirar uma dúvida. Poderia me ajudar por favor?" target="_blank" class="whatsapp-nav">Fale Conosco</a></li>
                <li><a href="#" onclick="showSearchInputMobile();return false;">Pesquisar</a></li>
            </ul>
            <div id="mobileSearchBox" style="display:none; padding:10px;">
                <input type="text" id="mobileSearchInput" name="search" placeholder="O que você está procurando?" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" onclick="searchProduct(document.getElementById('mobileSearchInput').value); return false;" style="border:none; background-color:blueviolet; color:white; width:50%; height:70%;">Buscar</button>
            </div>
        </nav>
    </div>

    <div class="right-header" id="wa-btn">
        <a href="https://wa.me/44999649804?text=Olá, eu gostaria de realizar um pedido" target="_blank" class="whatsapp-button">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
        </a>
    </div>


    <!-------------------- Ícones dos produtos ----------------->
    <div class="category-section">
        <a class="category" href="creatina.php" style="text-decoration: none;">
            <img src="../../model/imgs/um-homem-musculoso-sem-camisa-usando-shorts-esportivos-e-pegando-proteina-em-po-de-um-fras.avif" alt="Creatina">
            <p>Creatina</p>
        </a>
        <a class="category" href="whey.php" style="text-decoration: none;">
            <img src="../../model/imgs/whey-protein-com-carboidrato.avif" alt="Whey Protein">
            <p>Whey Protein</p>
        </a>
        <a class="category" href="pre-treino.php" style="text-decoration: none;">
            <img src="../../model/imgs/homem_atletico_sem_camisa_fazendo_exercicios_de_biceps_com_um_haltere_em_fundo_cinza_vinhe.avif" alt="Pré Treino">
            <p>Pré Treino</p>
        </a>
        <a class="category" href="emagrecedor.php" style="text-decoration: none;">
            <img src="../../model/imgs/treino-para-perder-peso-1_edited.avif" alt="Emagrecedor">
            <p>Emagrecedor</p>
        </a>
    </div>

    <div class="container">
        <h1 class="text-center my-4">Pré-Treino</h1>
        <div class="row">
            <div class='col-12 col-md-4 mb-4'>
                <div class='card h-100'>
                    <img src="../../model/imgs/pre-treino.avif" class="card-img-top" alt="Pré Treino">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 mb-4">
                            <div class="d-flex align-items-center justify-content-center" style="margin-top: 10px;">
                                <span style="font-size: 1.5rem; font-weight: bold; color: #be100d;">R$ 109,90</span>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-8 d-flex align-items-center">
                <div class="explanatory-text-container w-100">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nobis natus id veniam expedita nostrum.
                    </p>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
                        <li> Totam quisquam odit dicta autem quas modi culpa porro?</li>
                        <li>Aut minus blanditiis, officiis delectus animi, eaque possimus ducimus assumenda eveniet facere libero?</li>
                    </ul>
                </div>
            </div>
        </div>
        <style>
            .explanatory-text-container {
                border-radius: 8px;
                margin-left: 32px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.04);
                background: #fff;
            }
            @media (max-width: 768px) {
                .explanatory-text-container {
                    margin: 24px 0 0 0;
                    max-width: 100%;
                }
            }
        </style>
    </div>

    <div class="container my-4"></div>
    <div class="row g-3 justify-content-center text-center" style="background-color: #be100d; width:auto; padding:10%; margin-top:60px; font-size:1.2rem; color:antiquewhite; border-radius: 10px;">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-item d-flex flex-column align-items-center h-100">
                <img src="../../model/imgs/truck-fast.png" alt="fast-truck" style="width:48px; height:auto;">
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
                <img src="../../model/imgs/card-payment.png" alt="credit-card" style="width:48px; height:auto;">
                <p class="mt-2 mb-0" style=>
                    <strong>
                        Parcelamos suas compras em 3x sem juros
                    </strong>
                </p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-item d-flex flex-column align-items-center h-100">
                <img src="../..//model/imgs/locker.png" alt="locker" style="width:48px; height:auto;">
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

        include '../footer-form.php';

        ?>

    </footer>

    <script src="../../scripts/index.js"></script>
</body>

</html>