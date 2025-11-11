document.addEventListener("DOMContentLoaded", function () {
  const tabelaProdutos = document.getElementById("tabela_produtos");
  if (!tabelaProdutos) return;

  // usa o <tbody> se existir, senão usa a própria tabela
  const corpo = tabelaProdutos.querySelector("tbody") || tabelaProdutos;

  // limpa linhas estáticas (se houver)
  corpo.innerHTML = "";

  fetch("configs/dados.json")
    .then((response) => {
      if (!response.ok) throw new Error("Resposta do fetch não OK");
      return response.json();
    })
    .then((produtos) => {
      produtos.forEach((produto) => {
        const row = document.createElement("tr");

        // coluna da imagem
        const cellImage = document.createElement("td");
        const img = document.createElement("img");
        img.src = produto.imagem || "assets/placeholder.png";
        img.alt = produto.nome || "Produto";
        img.width = 100;
        img.height = 100;
        cellImage.appendChild(img);
        row.appendChild(cellImage);

        // coluna do nome
        const cellNome = document.createElement("td");
        cellNome.textContent = produto.nome || "";
        row.appendChild(cellNome);

        // coluna do preço (formatado para pt-BR)
        const cellPreco = document.createElement("td");
        const precoNumero = Number(produto.preco) || 0;
        cellPreco.textContent = precoNumero.toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        });
        row.appendChild(cellPreco);

        corpo.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Erro ao carregar os dados dos produtos:", error);
    });
});
