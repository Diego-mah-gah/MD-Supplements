<?php
header('Content-Type: text/plain');

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Método não permitido';
    exit;
}

// Coleta os dados do formulário que é preenchido pelo usuário
// e sanitiza as entradas para evitar injeção de código
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validação dos dados
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'Todos os campos são obrigatórios';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Email inválido';
    exit;
}

// Aqui vai configurar o envio do email
$to = 'duskkazuki@gmail.com.com'; 
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Monta o corpo do email
$email_body = "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n";
$email_body .= "Nome: $name\n";
$email_body .= "Email: $email\n\n";
$email_body .= "Assunto: $subject\n\n";
$email_body .= "Mensagem:\n$message\n";

// Envia o email
$mail_sent = mail($to, $subject, $email_body, $headers);

if ($mail_sent) {
    echo 'success';
} else {
    echo 'Erro ao enviar o email. Por favor, tente novamente mais tarde.';
}
