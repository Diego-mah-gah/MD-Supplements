<?php
session_start();

// Centraliza a conexão com o banco de dados para reutilização
function conectarBanco() {
    $host = 'localhost';
    $usuario = 'root'; // Altere conforme seu usuário do MySQL
    $senha = '';     // Altere conforme sua senha do MySQL
    $banco = 'mdsupplements'; 

    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        // Encerra a execução e exibe o erro em caso de falha na conexão
        die("Falha na conexão: " . $conn->connect_error);
    }
    return $conn;
}

// Lógica de login e cadastro centralizada
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = isset($_POST['acao']) ? $_POST['acao'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; // Campo nome para cadastro
    
    $conn = conectarBanco();

    switch ($acao) {
        case 'cadastro':
            if (empty($email) || empty($senha) || empty($nome)) {
                $mensagem = "Por favor, preencha todos os campos.";
            } else {
                $sql = "SELECT id_usuario FROM usuario WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $mensagem = "Erro: Este email já está cadastrado.";
                } else {
                    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                    $sql_insert = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->bind_param("sss", $nome, $email, $senha_hash);
                    
                    if ($stmt_insert->execute()) {
                        $mensagem = "Sucesso: Cadastro realizado! Agora você pode fazer login.";
                    } else {
                        $mensagem = "Erro ao cadastrar: " . $conn->error;
                    }
                    $stmt_insert->close();
                }
                $stmt->close();
            }
            break;

        case 'login':
            if (empty($email) || empty($senha)) {
                $mensagem = "Por favor, preencha todos os campos.";
            } else {
                $sql = "SELECT id_usuario, nome, senha FROM usuario WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id_usuario, $nome, $senha_hash_bd);
                    $stmt->fetch();
                    
                    if (password_verify($senha, $senha_hash_bd)) {
                        $_SESSION['usuario_id'] = $id_usuario;
                        $_SESSION['usuario_nome'] = $nome;
                        $_SESSION['usuario_email'] = $email;
                        $mensagem = "Sucesso: Login realizado!";
                    } else {
                        $mensagem = "Erro: Senha incorreta.";
                    }
                } else {
                    $mensagem = "Erro: Email não cadastrado.";
                }
                $stmt->close();
            }
            break;
        
        case 'logout':
            session_unset();
            session_destroy();
            $mensagem = "Você saiu com sucesso.";
            break;
    }
    $conn->close();
}

// Verifica se o usuário está logado para exibir o perfil
$is_logged_in = isset($_SESSION['usuario_id']);
$nome_usuario = $is_logged_in ? ($_SESSION['usuario_nome'] ?? '') : '';
$email_usuario = $is_logged_in ? ($_SESSION['usuario_email'] ?? '') : '';
$endereco_usuario = 'Não informado';

if ($is_logged_in) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("SELECT nome, endereco FROM usuario WHERE id_usuario = ?");
    $stmt->bind_param("i", $_SESSION['usuario_id']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($nome_db, $endereco_db);
    if ($stmt->fetch()) {
        $nome_usuario = $nome_db ?? $nome_usuario;
        $endereco_usuario = $endereco_db ?? $endereco_usuario;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M&D Supplements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-container, .profile-container { max-width: 450px; margin-top: 50px; }
        .nav-tabs .nav-link.active { background-color: #007bff; color: white; }
        .nav-tabs .nav-link:not(.active) { color: #007bff; }
        .tab-content, .card { padding: 20px; border: 1px solid #dee2e6; border-top: none; }
        .mensagem { margin-top: 15px; text-align: center; }
        .sucesso { color: green; font-weight: bold; }
        .erro { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container <?php echo $is_logged_in ? 'profile-container' : 'form-container'; ?>">
        <?php if (!empty($mensagem)): ?>
            <p class="mensagem <?php echo strpos($mensagem, 'Sucesso') !== false ? 'sucesso' : 'erro'; ?>"><?php echo htmlspecialchars($mensagem); ?></p>
        <?php endif; ?>

        <?php if ($is_logged_in): ?>
            <!-- Conteúdo da página de perfil -->
            <div class="card p-4">
                <h2 class="mb-4 text-center">Perfil do Usuário</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nome:</strong> <?php echo htmlspecialchars($nome_usuario); ?></li>
                    <li class="list-group-item"><strong>E-mail:</strong> <?php echo htmlspecialchars($email_usuario); ?></li>
                    <li class="list-group-item"><strong>Endereço:</strong> <?php echo htmlspecialchars($endereco_usuario); ?></li>
                </ul>
                <div class="d-grid gap-2">
                    <form action="app.php" method="POST">
                        <input type="hidden" name="acao" value="logout">
                        <button type="submit" class="btn btn-danger w-100 mt-3">Sair</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <!-- Conteúdo da página de login e cadastro -->
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="cadastro-tab" data-bs-toggle="tab" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="false">Cadastro</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <h1 class="text-center">Acesse a sua conta</h1>
                    <form action="app.php" method="POST">
                        <input type="hidden" name="acao" value="login">
                        <div class="mb-3">
                            <label for="login-email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="login-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="login-senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="login-senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
                
                <div class="tab-pane fade" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <h1 class="text-center">Crie a sua conta</h1>
                    <form action="app.php" method="POST">
                        <input type="hidden" name="acao" value="cadastro">
                        <div class="mb-3">
                            <label for="cadastro-nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="cadastro-nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="cadastro-email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="cadastro-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="cadastro-senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="cadastro-senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
