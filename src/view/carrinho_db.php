<?php

function conectarBanco() {
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'mdsupplements';

    $conn = new mysqli($host, $usuario, $senha, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    return $conn;
}

function criarTabelaCarrinho() {
    $conn = conectarBanco();
    $sql = "CREATE TABLE IF NOT EXISTS carrinho (
        usuario_id INT NOT NULL,
        produto_id INT NOT NULL,
        quantidade INT NOT NULL DEFAULT 1,
        data_adicionado DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario) ON DELETE CASCADE, /*chaves estrangeiras */
        FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE CASCADE
    )";
    $conn->query($sql);
    $conn->close();
}

function adicionarProdutoAoCarrinho($usuario_id, $produto_id) {
    $conn = conectarBanco();

    $sql = "SELECT quantidade FROM carrinho WHERE usuario_id = ? AND produto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sql_update = "UPDATE carrinho SET quantidade = quantidade + 1 WHERE usuario_id = ? AND produto_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ii", $usuario_id, $produto_id);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        $sql_insert = "INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, 1)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ii", $usuario_id, $produto_id);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    $stmt->close();
    $conn->close();
}

function obterCarrinhoCompleto($id_usuario) {
    $conn = conectarBanco();

    $sql = "SELECT 
                u.id_usuario, u.nome AS usuario_nome, u.email AS usuario_email, u.endereco AS usuario_endereco, u.telefone AS usuario_telefone,
                p.id, p.nome AS produto_nome, p.preco AS produto_preco, p.descricao AS produto_descricao, p.imagem AS produto_imagem,
                c.quantidade
            FROM carrinho c
            JOIN usuario u ON c.usuario_id = u.id_usuario
            JOIN produtos p ON c.produto_id = p.id
            WHERE u.id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $dados;
}

function obterItensCarrinho($id_usuario) {
    $conn = conectarBanco();

    $sql = "SELECT p.* FROM carrinho c
            JOIN produtos p ON c.produto_id = p.id
            WHERE c.usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
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

function carrinhoVazio($id_usuario) {
    $conn = conectarBanco();

    $sql = "SELECT count(*) AS total FROM carrinho WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total = $row['total'];

    $stmt->close();
    $conn->close();

    return $total == 0;
}

function removerProdutoDoCarrinho($id_usuario, $produto_id) {
    $conn = conectarBanco();
    $sql = "DELETE FROM carrinho WHERE id_usuario = ? AND produto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_usuario, $produto_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
