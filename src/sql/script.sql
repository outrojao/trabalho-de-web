-- Cria o banco de dados
CREATE DATABASE IF NOT EXISTS loja;
USE loja;

-- Cria a tabela de roupas
CREATE TABLE IF NOT EXISTS roupas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);
