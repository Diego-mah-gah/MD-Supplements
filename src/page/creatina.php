<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M&D Supplements</title>
    <link rel="stylesheet" href="src/style/style.css" />
    <link rel="shortcut icon" href="src/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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
        <a class="category" href="#whey">
            <img src="src/imgs/whey-protein-com-carboidrato.avif" alt="Whey Protein">
            <p>Whey Protein</p>
        </a>
        <a class="category" href="#pre-treino">
            <img src="src/imgs/homem_atletico_sem_camisa_fazendo_exercicios_de_biceps_com_um_haltere_em_fundo_cinza_vinhe.avif" alt="Pré Treino">
            <p>Pré Treino</p>
        </a>
        <a class="category" href="#emagrecedor">
            <img src="src/imgs/treino-para-perder-peso-1_edited.avif" alt="Emagrecedor">
            <p>Emagrecedor</p>
        </a>
    </div>

    <div class="best-sellers">
        <h2>Mais vendidos</h2>
        <!-------------------------------- Produtos vão aqui ------------------------------>

        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="src/imgs/whey.avif" class="card-img-top" alt="Whey Protein">
                                <div class="card-body">
                                    <h5 class="card-title">Whey Protein</h5>
                                    <a href="src/page/whey.php" class="btn btn-danger">Ver Produto</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <img src="src/imgs/creatine.avif" class="card-img-top" alt="Creatina">
                                <div class="card-body">
                                    <h5 class="card-title">Creatina</h5>
                                    <a href="src/page/creatina.php" class="btn btn-danger">Ver Produto</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="src/imgs/" class="card-img-top" alt="Pré Treino">
                                <div class="card-body">
                                    <h5 class="card-title">Pré-Treino</h5>
                                    <a href="src/page/pre-treino.php" class="btn btn-danger">Ver Produto</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="src/imgs/2-hot.avif" class="card-img-top" alt="Emagrecedor">
                            <div class="card-body">
                                <h5 class="card-title">Emagrecedor</h5>
                                <a href="src/page/emagrecedor.php" class="btn btn-danger">Ver Produto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="active">
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="FALSE"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="FALSE"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>

    <div id="results">

    </div>
    <script>
        const products = [{
                title: 'WHEY 100% 900G POTE - MAX TITNIUM',
                img: 'src/imgs/whey.avif',
                alt: 'Whey Protein',
                link: 'src/page/whey.php'
            },
            {
                title: 'CREATINA 300G MONOHIDRATADA - MAX TITANIUM',
                img: 'src/imgs/creatine.avif',
                alt: 'Creatina',
                link: 'src/page/creatina.php'
            },
            {
                title: 'V9 PUMP 300G - SHARK PRO',
                img: 'src/imgs/pre-treino.avif',
                alt: 'Pré Treino',
                link: 'src/page/pre-treino.php'
            },
            {
                title: '2 HOT 200G - MAX TITANUM',
                img: 'src/imgs/2-hot.avif',
                alt: 'Emagrecedor',
                link: 'src/page/emagrecedor.php'
            }
        ];

        function renderCarousel(filteredProducts) {
            const carouselInner = document.querySelector('.carousel-inner');
            let html = '';
            for (let i = 0; i < filteredProducts.length; i += 4) {
                html += `<div class="carousel-item${i === 0 ? ' active' : ''}">
                    <div class="row justify-content-center">`;
                for (let j = i; j < i + 4 && j < filteredProducts.length; j++) {
                    const p = filteredProducts[j];
                    html += `
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="${p.img}" class="card-img-top" alt="${p.alt}">
                                            <div class="card-body">
                                                <h5 class="card-title">${p.title}</h5>
                                                    <a href="${p.link}" class="btn btn-danger">Ver Produto</a>
                                            </div>
                                    </div>
                                </div>`;
                }
                '</div>';                      
                html += '</div>';

            };
            carouselInner.innerHTML = html;
        }

        function searchProduct() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const filtered = products.filter(p => p.title.toLowerCase().includes(input));
            renderCarousel(filtered.length ? filtered : products);

            // Reinicializa o carousel
            const myCarouselElement = document.querySelector('#productCarousel');
            if (window.carouselInstance) window.carouselInstance.dispose();
            window.carouselInstance = new bootstrap.Carousel(myCarouselElement, {
                interval: 2000,
                touch: false,
            });
        }

        // Inicializa o carousel com todos os produtos
        renderCarousel(products);
        window.carouselInstance = new bootstrap.Carousel(document.querySelector('#productCarousel'), {
            interval: 2000,
            touch: false,
        });
    </script>
    <script src="src/scripts/index.js">
    </script>
</body>

</html>