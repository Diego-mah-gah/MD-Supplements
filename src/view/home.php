<?php
require_once 'carrinho_db.php';

$produtos = [];
$conn = conectarBanco();

$sql = "SELECT id, nome, preco, imagem, destaque FROM produtos WHERE destaque = 'sim'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$conn->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_ao_carrinho'])) {
    if (isset($_SESSION['usuario_id'])) {
        adicionarProdutoAoCarrinho($_SESSION['usuario_id'], $_POST['produto_id']);
        echo "<script>alert('Produto adicionado ao carrinho com sucesso!');</script>";
    } else {
        echo "<script>alert('Você precisa estar logado para adicionar produtos ao carrinho.');</script>";
    }
}
?>

<link rel="stylesheet" href="src/model/style/style.css">

<div class="best-sellers">
    <h2 class="mt-0">Mais vendidos</h2>
    <div class="produtos-grid d-flex flex-wrap justify-content-center">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto-card">
                <a href="index.php?param=produtos&id=<?php echo htmlspecialchars($produto['id']); ?>">
                    <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                    <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                    <p class="price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                </a>
                <form method="post" action="index.php?param=home">
                    <input type="hidden" name="adicionar_ao_carrinho" value="1">
                    <input type="hidden" name="produto_id" value="<?php echo htmlspecialchars($produto['id']); ?>">
                    <button type="submit" class="btn-carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
        <?php endforeach; ?>
        <?php if (empty($produtos)): ?>
            <p>Nenhum produto em destaque encontrado.</p>
        <?php endif; ?>
    </div>
</div>
