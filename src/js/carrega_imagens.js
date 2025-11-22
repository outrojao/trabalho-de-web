document.addEventListener("DOMContentLoaded", function () {
  async function carregarImagens() {
    const select = document.getElementById("id_imagem");

    try {
      const resp = await fetch("../php/listar_imagens.php");
      const imagens = await resp.json();

      imagens.forEach((img) => {
        const option = document.createElement("option");
        option.value = img;
        option.textContent = img;
        select.appendChild(option);
      });
    } catch (err) {
      console.error("Erro ao carregar imagens:", err);
    }
  }

  carregarImagens();
});
