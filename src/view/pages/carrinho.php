<?php
session_start();
require_once  '../carrinho_db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'remover') {
    if (!isset($_SESSION['usuario_email'])) {
        $_SESSION['mensagem_carrinho'] = "Erro: Usuário não está logado.";
    }
    else if (!isset($_POST['produto_id'])) {
        $_SESSION['mensagem_carrinho'] = "Erro: ID do produto não foi enviado.";
    } else {
        $id_usuario = null;
        $conn = conectarBanco();
        $email = $_SESSION['usuario_email'];
        $sql = "SELECT id_usuario FROM usuario WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $id_usuario = $row['id_usuario'];
        }
        $stmt->close();
        $conn->close();

        if ($id_usuario) {
            if (removerProdutoDoCarrinho($id_usuario, $_POST['produto_id'])) {
                $_SESSION['mensagem_carrinho'] = "Produto removido com sucesso.";
                $item = $item - 1;
            } else {
                $_SESSION['mensagem_carrinho'] = "Erro: Produto não encontrado ou não foi possível remover.";
            }
        } else {
            $_SESSION['mensagem_carrinho'] = "Erro: Não foi possível identificar o usuário.";
        }
    }
    header("Location: carrinho.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="../../model/style/style.css">
    <link rel="shortcut icon" href="../../model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header" id="navbar">
        <div id="mainBar">
            <button onclick="switchMainBarVisibility()" class="mainBarButton mobile-only" style="border:none; background:none; padding:10px; margin-right:-180px;">
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
    </header>

    <main class="container mt-5">
        <h2>Seu Carrinho</h2>
        <?php
        if (isset($_SESSION['mensagem_carrinho'])) {
            echo "<div class='alert alert-info'>{$_SESSION['mensagem_carrinho']}</div>";
            unset($_SESSION['mensagem_carrinho']);
        }

        $id_usuario = null;
        if (isset($_SESSION['usuario_email'])) {
            $conn = conectarBanco();
            $email = $_SESSION['usuario_email'];
            $sql = "SELECT id_usuario FROM usuario WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $id_usuario = $row['id_usuario'];
            }
            $stmt->close();
            $conn->close();
        }

        if ($id_usuario) {
            $carrinho = obterCarrinhoCompleto($id_usuario);
            if (!empty($carrinho)) {
                $total = 0;
        ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrinho as $item) :
                            $subtotal = $item['produto_preco'] * $item['quantidade'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['produto_nome']); ?></td>
                                <td>R$ <?php echo number_format($item['produto_preco'], 2, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($item['quantidade']); ?></td>
                                <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                                <td>
                                    <form method="POST" action="carrinho.php">
                                        <input type="hidden" name="acao" value="remover">
                                        <input type="hidden" name="produto_id" value="<?php echo htmlspecialchars((string)($item['produto_id'] ?? '')); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Remover
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-end">
                    <h4>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h4>
                    <a href="checkout.php" class="btn btn-success">Finalizar Compra</a>
                </div>
        <?php
            } else {
                echo "<p>Seu carrinho está vazio.</p>";
            }
        } else {
            echo "<p>Você precisa estar logado para ver o carrinho. <a href='app.php'>Faça o login</a></p>";
        }
        ?>
    </main>
</body>
<script src="../../scripts/index.js"></script>

</html>