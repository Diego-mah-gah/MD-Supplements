<?php
session_start();
if (isset($_SESSION['usuario_email'])) {
    // Aqui você pode registrar o pedido no banco, limpar o carrinho, etc.
    require_once __DIR__ . '.verify-login.php';
    $usuario = $_SESSION['usuario_email'];
    $conn->query("DELETE FROM carrinho WHERE usuario='$usuario'");
} else {
    $_SESSION['carrinho'] = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h2>Obrigado pela sua compra!</h2>
    <a href="../../index.php">Voltar para a loja</a>
</body>
</html>