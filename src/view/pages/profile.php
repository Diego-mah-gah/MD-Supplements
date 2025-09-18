<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'mdsupplements';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M&D Supplements</title>
    <link rel="stylesheet" href="../../model/style/style.css" />
    <link rel="shortcut icon" href="../..//model/imgs/MD-LOGO.avif">
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
    <header class="header" id="navbar">
           <div id="mainBar">
        <button onclick="switchMainBarVisibility()" class="mainBarButton mobile-only">
            <img src="../../model/imgs/menu.svg" alt="Menu" class="menu-icon">
        </button>
        <header class="header header-container" id="navbar">
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
        </header>

    <!------------------ Entrar em conversa whatsapp----------------->

    <div class="right-header" id="wa-btn">
        <a href="https://wa.me/44999649804?text=Olá, eu gostaria de realizar um pedido" target="_blank" class="whatsapp-button">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
        </a>
    </div>

    <?php
    if (!isset($_SESSION['usuario_email'])) {
        echo "<div class='container mt-5'><div class='alert alert-warning'>Você precisa estar logado para ver seu perfil.</div></div>";
        exit();
    }

    $email = $_SESSION['usuario_email'];

    $stmt = $conn->prepare("SELECT nome, email, endereco FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($nome, $email, $endereco);
        $stmt->fetch();
    ?>
        <div class="container mt-5">
            <h2>Perfil do Usuário</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                <li class="list-group-item"><strong>Endereço:</strong> <?php echo htmlspecialchars($endereco); ?></li>
                <li class="list-group-item"><strong>Senha:</strong> ********</li>
            </ul>
<div>
    <form action="logout.php">
        <button type="submit" class="btn btn-danger">Sair</button>
    </form>
</div>
        </div>
    <?php
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Usuário não encontrado.</div></div>";
    }
    $stmt->close();
    $conn->close();
    ?>

    <?php

    class Welcome
    {
        private string $name;
        private string $greeting;

        public function __construct(string $name)
        {
            $this->name = $name;
            $this->greeting = "Olá, " . $this->name . "!";
        }

        public function saudar(): string
        {
            return $this->greeting;
        }
    }

    $welcome = new Welcome($nome);
    echo "<div class='container mt-3'>";
    echo "<div class='container-fluid text-center' style:='font-size: 30px; font-weight: Arial;'>";
    echo $welcome->saudar();
    echo "</div>";  
    echo "</div>"; 
    
    ?>
    <script src="../../model/js/script.js"></script>