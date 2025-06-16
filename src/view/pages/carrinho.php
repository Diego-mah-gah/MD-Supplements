<?php
session_start();
require_once '../carrinho_db.php';

$usuario_id = $_SESSION['usuario_id'] ?? null;

if (!$usuario_id) {
    echo "Usuário não autenticado.";
    exit;
}

$itens = obterCarrinhoCompleto($usuario_id);

if (empty($itens)) {
    echo "Seu carrinho está vazio.";
    exit;
}

echo "<h2>Informações do Usuário</h2>";
echo "<p><strong>Nome:</strong> " . htmlspecialchars($itens[0]['usuario_nome']) . "</p>";
echo "<p><strong>Email:</strong> " . htmlspecialchars($itens[0]['usuario_email']) . "</p>";
echo "<p><strong>Endereço:</strong> " . htmlspecialchars($itens[0]['usuario_endereco']) . "</p>";
echo "<p><strong>Telefone:</strong> " . htmlspecialchars($itens[0]['usuario_telefone']) . "</p>";

echo "<h2>Produtos no Carrinho</h2>";
foreach ($itens as $item) {
    echo "<div style='border:1px solid #ccc; margin-bottom:10px; padding:10px;'>";
    echo "<strong>" . htmlspecialchars($item['produto_nome']) . "</strong><br>";
    echo "Descrição: " . htmlspecialchars($item['produto_descricao']) . "<br>";
    echo "Preço: R$ " . number_format($item['produto_preco'], 2, ',', '.') . "<br>";
    echo "Quantidade: " . intval($item['quantidade']) . "<br>";
    echo "</div>";
}
?>
