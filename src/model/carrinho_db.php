<?php
// carrinho_db.php - Funções para manipulação do carrinho no banco de dados

function conectarBanco() {
    // Ajuste os dados conforme seu ambiente
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'md_supplements';

    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    return $conn;
}

function obterItensCarrinho($usuario_id) {
    $conn = conectarBanco();

    $sql = "SELECT p.* FROM carrinho c
            JOIN produtos p ON c.produto_id = p.id
            WHERE c.usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $itens = [];
    while ($row = $result->fetch_assoc()) {
        $itens[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $itens;
}

function carrinhoVazio($usuario_id) {
    $conn = conectarBanco();

    $sql = "SELECT COUNT(*) as total FROM carrinho WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $total == 0;
}
?>