<?php
require_once __DIR__ . '/db.php';

$id     = $_POST['produto'] ?? 0;

// segurança: garante que o ID é válido
if (!$id) {
    die("ID inválido");
}

try {
    $sql = "DELETE from roupas WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    session_start();
    $_SESSION['msg'] = "Produto excluido!";
} catch (PDOException $e) {
    session_start();
    $_SESSION['erro'] = "Erro ao excluir no banco: " . $e->getMessage();
} finally {
    header("Location: ../roupas.php");
    exit;
}