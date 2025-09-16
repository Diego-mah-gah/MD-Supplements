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
?>

<link rel="stylesheet" href="src/model/style/style.css">

<div class="best-sellers">
    <h2 class="mt-0">Mais vendidos</h2>
    <div class="produtos-grid d-flex flex-wrap justify-content-center" style="width: auto;">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto-card">
                <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                <p class="price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                <form method="post" action="index.php?param=produtos">
                    <input type="hidden" class="btn btn-primary" name="adicionar_ao_carrinho" value="1"<?php if (isset($_SESSION['carrinho'][$produto['id']])) echo ' checked'; ?>>
                    <input type="hidden" name="produto_id" value="<?php echo htmlspecialchars($produto['id']); ?>">
                    <button type="submit">Adicionar ao Carrinho</button>
                </form>
            </div>
        <?php endforeach; ?>
        <?php if (empty($produtos_destaque)): ?>
            <?php echo '<p>Nenhum produto em destaque encontrado.</p>'; ?>
        <?php endif; ?>
    </div>
</div>
