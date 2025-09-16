<?php
$host = 'localhost'; 
$db   = 'mdsupplements'; 
$user = 'root'; // Altere para o seu usuário do banco de dados
$pass = '';     // Altere para a sua senha do banco de dados

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $opcoes);
} catch (\PDOException $e) {
     die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

