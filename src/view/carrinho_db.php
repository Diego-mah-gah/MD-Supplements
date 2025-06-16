<?php

// carrinho_db.php - Funções para manipulação do carrinho no banco de dados

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

// Cria a tabela carrinho 
function criarTabelaCarrinho() {
    $conn = conectarBanco();
    $sql = "CREATE TABLE IF NOT EXISTS carrinho (
        id INT AUTO_INCREMENT PRIMARY KEY, /*chave primária */
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

// Busca todos os itens do carrinho junto com os dados do usuário e do produto
function obterCarrinhoCompleto($id_usuario) {
    $conn = conectarBanco();

    $sql = "SELECT 
                u.id_usuario, u.nome AS usuario_nome, u.email AS usuario_email, u.endereco AS usuario_endereco, u.telefone AS usuario_telefone,
                c.id AS carrinho_id, c.quantidade, c.data_adicionado,
                p.id AS produto_id, p.nome AS produto_nome, p.preco AS produto_preco, p.descricao AS produto_descricao, p.imagem AS produto_imagem
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

    $sql = "SELECT COUNT(*) as total FROM carrinho WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();

    $stmt->close();
    $conn->close();

    return $total == 0;
}

// Chame esta função uma vez para garantir que a tabela existe
criarTabelaCarrinho();

?>
