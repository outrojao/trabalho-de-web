<?php
require_once __DIR__ . '/db.php';

$id     = $_POST['produto'] ?? 0;
$imagem = $_POST['imagem'] ?? '';
$nome   = $_POST['nome'] ?? '';
$preco  = $_POST['preco'] ?? 0;

// segurança: garante que o ID é válido
if (!$id) {
    die("ID inválido");
}

try {
    $sql = "UPDATE roupas SET imagem = ?, nome = ?, preco = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$imagem, $nome, $preco, $id]);
    session_start();
    $_SESSION['msg'] = "Produto atualizado!";
} catch (PDOException $e) {
    session_start();
    $_SESSION['erro'] = "Erro ao editar no banco: " . $e->getMessage();
} finally {
    header("Location: ../roupas.php");
    exit;
}