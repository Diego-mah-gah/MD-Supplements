<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD-Supplements</title>
    <link rel="stylesheet" href="../../model/style/style.css">
    <link rel="shortcut icon" href="../../model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</head>

<body>
    <style>
        body {

            background: rgba(165, 16, 16, 0.77);

        }
    </style>
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
            <a href="<?php echo isset($_SESSION['usuario']) && $_SESSION['usuario'] ? '../profile.php' : '#user'; ?>" class="icon-button">
                <img src="../../model/imgs/usuario.png" alt="usuario" title="profile">

                <?php

                include '../verify-login.php';

                ?>
            </a>

            <!----------------- Ícone do carrinho ----------------->
            <a href="?=carrinho" class="icon-button">
                <img src="../../model/imgs/carrinho.avif">
            </a>
        </div>

    </header>

    <!------------------ Modal de Login/Cadastro ----------------->
    <?php
    // Conexão com o banco de dados (ajuste os dados conforme necessário)
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['login'])) {

            // registro do login
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $_POST['senha'];
            $sql = "SELECT * FROM usuario WHERE email='$email'";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($senha, $user['senha'])) {
                    session_start();
                    $_SESSION['usuario'] = $user['nome'];
                    header("Location: login-page.php");
                    exit;
                } else {
                    $loginError = "Senha incorreta.";
                }
            } else {

                // se o mail não foi cadastrado, mostrar formulário de registro
                $showRegister = true;
            }
        } elseif (isset($_POST['register'])) {

            // Registro
            $nome = $conn->real_escape_string($_POST['nome']);
            $endereco = $conn->real_escape_string($_POST['endereço']);
            $telefone = $conn->real_escape_string($_POST['telefone']);

            $dt_nascimento_raw = $_POST['dt_nascimento'];
            $dt_nascimento_obj = DateTime::createFromFormat('Y-m-d', $dt_nascimento_raw);
            $dt_nascimento = $dt_nascimento_obj ? $dt_nascimento_obj->format('d/m/y') : '';

            $email = $conn->real_escape_string($_POST['email']);
            // Hash da senha informada no registro
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            // Deixe o campo 'id' para o banco de dados gerar automaticamente (auto_increment)
            $sql = "INSERT INTO usuario (nome, endereço, telefone, dt_nascimento, email, senha) VALUES ('$nome', '$endereco', '$telefone', '$dt_nascimento', '$email', '$senha')";
            if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['usuario'] = $nome;
                $registerSuccess = "Cadastro realizado com sucesso!";
                header("Location: login-page.php");
                exit;
            } else {
                $loginError = "Erro ao cadastrar: " . $conn->error;
                $showRegister = true;
            }
        }
    }
    ?>

    <div class="text-center" style="display:flex; margin-top: 7%; " tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <?php
                if (!$showRegister):
                ?>

                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="modal-body">

                        <?php
                        if ($loginError):
                        ?>

                            <div class="alert alert-danger">
                                <?= htmlspecialchars($loginError) ?>
                            </div>

                        <?php
                        endif;
                        ?>

                        <form method="POST">
                            <div>
                                <input type="email" name="email" required placeholder="Email" class="form-control mb-2">
                                <input type="password" name="senha" required placeholder="Senha" class="form-control mb-2">
                                <i class="bi bi-eye-fill" id="btn-senha" onclick="showPassword()">
                                </i>
                                <button type="submit" name="login" class="btn btn-primary w-100">Entrar</button>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro</h5>
                    </div>
                    <div class="modal-body">

                        <?php
                        if ($loginError):
                        ?>

                            <div class="alert alert-danger"><?= htmlspecialchars($loginError) ?></div>

                        <?php
                        endif;
                        ?>

                        <form method="POST">
                            <input type="text" name="nome" required placeholder="Nome Completo" class="form-control mb-2">

                            <input type="text" name="endereço" required placeholder="Endereço" class="form-control mb-2">

                            <input type="text" name="telefone" required placeholder="Telefone" class="form-control mb-2">

                            <input type="date" name="dt_nascimento" required placeholder="Data de Nascimento" class="form-control mb-2">

                            <input type="email" name="email" required placeholder="Email" class="form-control mb-2" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">

                            <input type="password" name="senha" required placeholder="Senha" class="form-control mb-2">

                            <button type="submit" name="register" class="btn btn-success w-100" style="border-radius:20px;">Cadastrar</button>
                        </form>

                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>

    <style>
        form {
        
            display: grid;            
            & input {
                width: 100%;
                line-height: 40px;
                font-size: 20px;
                padding: 0 50px 0 20px;
            }
            & div i {
                font-size: 30px;
                cursor: pointer;
                position: absolute;
                right: 5%;
                bottom:44px;
            }
        }
    </style>

</body>

</html>