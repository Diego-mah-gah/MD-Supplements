<?php
session_start();
require_once 'carrinho_db.php';

$itens_carrinho = [];
$total_carrinho = 0;

if (isset($_SESSION['usuario_id'])) {
    // Se o usuário estiver logado, obtém o carrinho do banco de dados
    $itens_carrinho = obterItensCarrinho($_SESSION['usuario_id']);
} else {
    // Se não estiver logado, usa a sessão temporária
    $itens_carrinho = $_SESSION['carrinho'] ?? [];
}

foreach ($itens_carrinho as $item) {
    $total_carrinho += $item['preco'] * $item['quantidade'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrinho - M&D Supplements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../model/style/style.css" />
    <link rel="shortcut icon" href="../../model/imgs/MD-LOGO.avif">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 900px; margin-top: 50px; }
        .cart-item { margin-bottom: 20px; border-bottom: 1px solid #dee2e6; padding-bottom: 15px; }
        .cart-item img { max-width: 100px; border-radius: 5px; }
        .total-box { background-color: #e9ecef; padding: 20px; border-radius: 5px; }
        .btn-checkout { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Meu Carrinho</h2>
        <?php if (empty($itens_carrinho)): ?>
            <div class="alert alert-info text-center" role="alert">
                Seu carrinho está vazio.
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-8">
                    <?php foreach ($itens_carrinho as $item): ?>
                        <div class="cart-item d-flex align-items-center">
                            <img src="<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>" class="me-3">
                            <div class="flex-grow-1">
                                <h5><?php echo htmlspecialchars($item['nome']); ?></h5>
                                <p class="mb-0">Preço: R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></p>
                                <p class="mb-0">Quantidade: <?php echo htmlspecialchars($item['quantidade']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-4">
                    <div class="total-box">
                        <h5>Total do Carrinho</h5>
                        <p class="fs-4">R$ <?php echo number_format($total_carrinho, 2, ',', '.'); ?></p>
                        <a href="checkout.php" class="btn btn-success w-100 btn-checkout">Finalizar Compra</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>