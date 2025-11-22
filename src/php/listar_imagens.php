<?php
header("Content-Type: application/json");

// caminho da pasta de imagens
$path = __DIR__ . "/../assets";

$arquivos = array();
$extensoes_validas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

foreach (scandir($path) as $file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($ext, $extensoes_validas)) {
        $arquivos[] = $file;
    }
}

echo json_encode($arquivos);
