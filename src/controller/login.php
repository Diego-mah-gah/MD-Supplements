<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "mdsupplements");

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = $session_name(session_name($_POST['nome']));
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $endereço = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $id = $_SESSION['id'] ?? null;


    // Verifica se o email já existe
    $sql = "SELECT id FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este email já está cadastrado!";
        echo "Tente outro email.";
    } else {
        $sql = "INSERT INTO usuario (email, senha) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senha, $nome, $endereço, $telefone, $data_nascimento);
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    $stmt->close();
}


$nomeAntigo = new $session_name(session_name('usuario'));
$conn->close();
session_start();
