
<?php
// Verifica se o usuário está definido e exibe o nome
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === null) {
echo ' ';
}
/* else {
// Exibe o nome do usuário armazenado na sessão
echo "Olá, " . htmlspecialchars(strtoupper($_SESSION['usuario'])) . "!";
}*/