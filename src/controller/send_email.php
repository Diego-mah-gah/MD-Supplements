<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Dados do formulário
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$name = $_POST['name'] ?? '';

// Validação
if (!$email || !$message || !$name) {
    echo "Dados inválidos.";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail inválido.";
    exit;
}

$mail = new PHPMailer(true);

try {
    // Configurações do Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kawadiego.soares@gmail.com'; // Seu Gmail
    $mail->Password = 'pvqn pbbq korz brpu'; // Senha de app do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Remetente e destinatário
    $mail->setFrom('kawadiego.soares@gmail.com', 'Site M&D Supplements');
    $mail->addReplyTo($email, $name);
    $mail->addAddress('kawadiego.soares@gmail.com', 'Kawã Diego');

    // Conteúdo
    $mail->isHTML(false);
    $mail->Subject = 'Contato do Site';
    $mail->Body    = "Nome: $name\nE-mail: $email\nMensagem:\n$message";

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
