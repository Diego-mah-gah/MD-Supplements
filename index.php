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
    <header>
        <div class="left-header">
            <a href="#home">
                <img src="src/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
            </a>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="O que você está procurando?" oninput="searchProduct()">
        </div>
        <div class="cart-shop">
            <i class="fa-solid fa-cart-shopping" title="Carrinho">
                <a href="src/page/carrinho.php" class="icon-button">
                    <i class="fas fa-bars">
                        <img src="src/imgs/carrinho.avif">
                    </i>
                </a>
            </i>
        </div>
        <div class="right-header">
            <a href="https://wa.me/44999649804?text=Olá, eu gostaria de realizar um pedido" target="_blank" class="whatsapp-button">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
            </a>
        </div>
    </header>

    <div class="category-section">
        <a class="category" href="src/page/creatina.php">
            <img src="src/imgs/um-homem-musculoso-sem-camisa-usando-shorts-esportivos-e-pegando-proteina-em-po-de-um-fras.avif" alt="Creatina">
            <p>Creatina</p>
        </a>
        <a class="category" href="src/page/whey.php">
            <img src="src/imgs/whey-protein-com-carboidrato.avif" alt="Whey Protein">
            <p>Whey Protein</p>
        </a>
        <a class="category" href="src/page/pre-treino.php">
            <img src="src/imgs/homem_atletico_sem_camisa_fazendo_exercicios_de_biceps_com_um_haltere_em_fundo_cinza_vinhe.avif" alt="Pré Treino">
            <p>Pré Treino</p>
        </a>
        <a class="category" href="src/page/emagrecedor.php">
            <img src="src/imgs/treino-para-perder-peso-1_edited.avif" alt="Emagrecedor">
            <p>Emagrecedor</p>
        </a>
    </div>


    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="src/imgs/leostronda1.jpg" class="d-block w-100" alt="whey Monstro">
                <div class="carousel-caption d-none d-md-block">
                    <h5>OS MELHORES SUPLEMENTOS DA CIDADE</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="src/imgs/creatina-bg.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>SUPLEMENTOS PARA DESENVOLVIMENTO FÍSICO</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="src/imgs/leo-cozinha.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>SUPLEMENTOS PARA GANHO DE MASSA MAGRA</h5>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
                                <button type="button" class="btn btn-danger">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/creatina.php" style="text-decoration: none;">
                                <img src="src/imgs/creatine.avif" alt="Creatina" class="img-fluid" style="max-width: 80px;">
                                <p>Creatina</p>
                                <button type="button" class="btn btn-danger">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/pre-treino.php" style="text-decoration: none;">
                                <img src="src/imgs/pre-treino.avif" alt="Pré Treino" class="img-fluid" style="max-width: 80px;">
                                <p>Pré-treino</p>
                                <button type="button" class="btn btn-danger">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                        <div class="products col-sm-6 col-md-3">
                            <a href="src/page/emagrecedor.php" style="text-decoration: none;">
                                <img src="src/imgs/2-hot.avif" alt="Emagrecedor" class="img-fluid" style="max-width: 80px;">
                                <p>Emagrecedor</p>
                                <button type="button" class="btn btn-danger">Adicionar ao Carrinho</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div id="results">

    </div>
    <script> </script>
    <script src="src/scripts/index.js"></script>
</body>

</html>