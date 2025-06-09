<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD-Supplements</title>
    <link rel="stylesheet" href="../../model/style/style.css">
    <link rel="shortcut icon" href="../../model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</head>

<body>

    <header class="header">
        <div class="left-header">
            <a href="../../../index.php?home" class="logo">
                <img src="../../model/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
            </a>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="O que você está procurando?" oninput="searchProduct(document.getElementById(onclick='searchInput'.value({ $_GET})));">
        </div>
        <div class="cart-shop">

            <!----------------- Ícone do usuário com botão para abrir o modal ----------------->
            <a href="profile.php?profile" class="icon-button">
                <img src="../../model/imgs/usuario.png" alt="usuario" title="profile">
            </a>

            <!----------------- Ícone do carrinho ----------------->
            <a href="?param=carrinho" class="icon-button">
                <img src="../../model/imgs/carrinho.avif">
            </a>
        </div>

    </header>

    <!------------------ Modal de Login/Cadastro ----------------->
    <div class="modal fade text-center">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Cadastrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form action="login-page.html" method="POST">
                        <input type="name" name="nome" required placeholder="Nome Completo" class="form-control mb-2">
                        <input type="text" name="endereco" required placeholder="Endereço" class="form-control mb-2">
                        <input type="text" name="telefone" required placeholder="Telefone" class="form-control mb-2">
                        <input type="date" name="data_nascimento" required placeholder="Data de Nascimento" class="form-control mb-2">
                        <input type="email" name="email" required placeholder="Email" class="form-control mb-2">
                        <input type="password" name="senha" required placeholder="Senha" class="form-control mb-2">
                        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>