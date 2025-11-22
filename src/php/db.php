<?php

$host = 'db';
$db   = 'meu_db';
$user = 'usuario';
$pass = 'senha';

// Configuração para XAMPP
// $host = 'localhost';
// $db   = 'meu_db';
// $user = 'root';     // Padrão do XAMPP
// $pass = '';         // Senha vazia no XAMPP

try {
    // Conectar ao banco
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Criar tabela se não existir
    $sql = "CREATE TABLE IF NOT EXISTS roupas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        imagem VARCHAR(255) NOT NULL,
        nome VARCHAR(255) NOT NULL,
        preco DECIMAL(10,2) NOT NULL
    )";
    
    $pdo->exec($sql);
    
} catch (PDOException $e) {
    die("Erro ao conectar ou criar tabela: " . $e->getMessage());
}