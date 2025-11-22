<?php require_once __DIR__ . '/php/db.php'; ?>
<?php
session_start();
if (!empty($_SESSION['msg'])) {
    echo "<script>alert('{$_SESSION['msg']}');</script>";
    unset($_SESSION['msg']);
}
if (!empty($_SESSION['erro'])) {
    echo "<script>alert('{$_SESSION['erro']}');</script>";
    unset($_SESSION['erro']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./styles/style.css" />
    <link rel="stylesheet" href="./styles/dark.css" />
    <script src="./js/muda_tema.js"></script>
    <title>Roupas - Loja de Roupas</title>
    <meta
      name="description"
      content="Confira nossa seleção de roupas casuais, formais e de festa com os melhores preços"
    />
  </head>
  <body>
    <header id="cabecalho">
      <h1>Urban & Co</h1>
    </header>
    <nav id="barra_de_navegacao">
      <a href="index.html">Home</a> |
      <strong id="marcador_da_pagina">Roupas</strong> |
      <a href="sac.html">SAC</a> |
      <a href="equipe.html">Equipe</a>
    </nav>
    <main>
      <section class="secao">
        <h2 class="titulo">Nosso Catálogo de Roupas</h2>
        <table id="tabela_produtos">
          <caption>
            Lista de produtos disponíveis
          </caption>
          <thead>
            <tr>
              <th scope="col">Imagem</th>
              <th scope="col">Nome</th>
              <th scope="col">Preço</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $stmt = $pdo->query("SELECT imagem, nome, preco FROM roupas");
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>";
                  echo "<td><img src='./assets/{$row['imagem']}' alt='{$row['nome']}'></td>";
                  echo "<td>{$row['nome']}</td>";
                  echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
                  echo "</tr>";
              }
            ?>
          </tbody>
        </table>
        <div id="operacoes_produtos">
          <a href="./forms_db/adicionar.html">Adicionar</a> |
          <a href="./forms_db/editar.html">Editar</a> |
          <a href="./forms_db/excluir.html">Excluir</a>
        </div>
      </section>
    </main>
    <footer id="rodape">
      <p>&copy; 2025 Loja de Roupas. Todos os direitos reservados.</p>
    </footer>
  </body>
</html>
