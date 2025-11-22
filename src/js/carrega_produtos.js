document.addEventListener("DOMContentLoaded", function () {
  async function carregaProdutos() {
    const select = document.getElementById("id_produto");

    try {
      const resp = await fetch("../php/listar_produtos.php");
      const produtos = await resp.json();

      produtos.forEach((produto) => {
        const option = document.createElement("option");
        option.value = produto.id;
        option.textContent = produto.nome;
        select.appendChild(option);
      });
    } catch (err) {
      console.error("Erro ao carregar produtos:", err);
    }
  }

  carregaProdutos();
});
