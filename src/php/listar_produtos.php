<?php require_once __DIR__ . '/db.php';

header("Content-Type: application/json");

$stmt = $pdo->query("SELECT id, nome FROM roupas ORDER BY nome ASC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($produtos);
