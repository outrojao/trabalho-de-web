<?php require_once __DIR__ . '/db.php';

$imagem = $_POST['imagem'] ?? '';
$nome   = $_POST['nome'] ?? '';
$preco  = $_POST['preco'] ?? 0;

try {
    $sql = "INSERT INTO roupas (imagem, nome, preco) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$imagem, $nome, $preco]);
    session_start();
    $_SESSION['msg'] = "Produto adicionado!";
} catch (PDOException $e) {
    session_start();
    $_SESSION['erro'] = "Erro ao salvar no banco: " . $e->getMessage();
} finally {
    header("Location: ../roupas.php");
    exit;
}
