<?php

// Verifica se o usuário está definido e exibe o nome
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
echo ' ';
}

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'mdsupplements'; // ajuste conforme seu banco

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário (certifique-se de validar e sanitizar em produção)
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

// Verifica se o email já existe
if ($email !== null && $senha !== null) {
    $sql = "SELECT id_usuario FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este email já está cadastrado! Tente outro email.";
    } else {
        $sql_insert = "INSERT INTO usuario (email, senha) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ss", $email, $senha);
        if ($stmt_insert->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
        $stmt_insert->close();
    }
    $stmt->close();
}

$conn->close();


if (isset($_SESSION['usuario']) && $_SESSION['usuario']) {
    echo htmlspecialchars($_SESSION['usuario']);
}
?>

