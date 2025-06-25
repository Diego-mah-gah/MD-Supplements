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

$showRegister = false;
$loginError = '';
$registerSuccess = '';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id_usuario, nome, email, senha FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Se usar password_hash, troque para password_verify($senha, $user['senha'])
        if ($senha === $user['senha']) {
            $_SESSION['usuario_id'] = $user['id_usuario'];
            $_SESSION['usuario_nome'] = $user['nome'];
            $_SESSION['usuario_email'] = $user['email'];
            header("Location: profile.php");
            exit;
        } else {
            $loginError = "Senha incorreta.";
        }
    } else {
        $loginError = "Usuário não encontrado.";
    }
    $stmt->close();
} elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    // Verifica se o email já existe
    $sql = "SELECT id_usuario FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $registerError = "Este email já está cadastrado!";
    } else {
        $sql_insert = "INSERT INTO usuario (nome, email, senha, endereco, telefone) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sssss", $nome, $email, $senha, $endereco, $telefone);
        if ($stmt_insert->execute()) {
            $registerSuccess = "Cadastro realizado com sucesso! Faça login.";
        } else {
            $registerError = "Erro ao cadastrar: " . $conn->error;
        }
        $stmt_insert->close();
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD-Supplements</title>
    <link rel="stylesheet" href="../../model/style/style.css">
    <link rel="shortcut icon" href="../../model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="header">
        <div class="left-header">
            <a href="../../../index.php?home" class="logo">
                <img src="../../model/imgs/MD-LOGO.avif" alt="M&D Logo" class="text-center">
            </a>
        </div>
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="O que você está procurando?">
        </div>
        <div class="cart-shop">
            <?php
            if (isset($_SESSION['email'])) {
                $usuario_email = $_SESSION['usuario_email'];
                $stmt = $conn->prepare("SELECT email, nome FROM usuario WHERE email = ?");
                $stmt->bind_param("s", $usuario_email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $userLink = "profile.php";
                    $userTitle = "Perfil";
                } else {
                    $userLink = "login-page.php";
                    $userTitle = "Login";
                }
                $stmt->close();
            } else {
                $userLink = "src/view/pages/login-page.php";
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
    </header>
    <div class="text-center" style="display:flex; margin-top: 7%;" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php if (!$showRegister): ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="modal-body">
                        <?php if ($loginError): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($loginError) ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST">
                            <div>
                                <input type="email" name="email" required placeholder="Email" class="form-control mb-2">
                                <input type="password" name="senha" required placeholder="Senha" class="form-control mb-2">
                                <button type="submit" name="login" class="btn btn-primary w-100">Entrar</button>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro</h5>
                    </div>
                    <div class="modal-body">
                        <?php if (isset($registerError) && $registerError): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($registerError) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($registerSuccess) && $registerSuccess): ?>
                            <div class="alert alert-success">
                                <?= htmlspecialchars($registerSuccess) ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST">
                            <input type="text" name="nome" required placeholder="Nome Completo" class="form-control mb-2">
                            <input type="text" name="endereco" required placeholder="Endereço" class="form-control mb-2">
                            <input type="text" name="telefone" required placeholder="Telefone" class="form-control mb-2">
                            <input type="email" name="email" required placeholder="Email" class="form-control mb-2" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                            <input type="password" name="senha" id="input-senha" required placeholder="Senha" class="form-control mb-2">
                            <button type="submit" name="register" id="btn-senha" class="btn btn-success w-100" style="border-radius:20px;">Cadastrar</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<style>
    body {
        background: rgba(165, 16, 16, 0.77);
    }
</style>

</html>