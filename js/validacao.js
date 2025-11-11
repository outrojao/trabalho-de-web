const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;

document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById("id_email");
  const cpfInput = document.getElementById("id_cpf");

  cpfInput.addEventListener("blur", function () {
    validateCPF(cpfInput);
  });

  emailInput.addEventListener("blur", function () {
    validateEmail(emailInput);
  });

  const form = document.querySelector("form");

  form.addEventListener("submit", function (event) {
    if (!validateEmail(emailInput) || !validateCPF(cpfInput)) {
      event.preventDefault();
      alert(
        "Por favor, corrija o e-mail ou o CPF antes de enviar o formulário."
      );
    }

    alert("Formulário válido");
    form.reset();
  });
});

/**
 * @param {HTMLElement} input - O campo de input do e-mail.
 * @returns {boolean} - Retorna true se o e-mail for válido, false caso contrário.
 */

function validateEmail(input) {
  const email = input.value;

  if (emailRegex.test(email)) {
    input.style.border = "1px solid green";
    input.setCustomValidity("");
    return true;
  } else {
    input.style.border = "2px solid red";
    input.setCustomValidity("Por favor, insira um endereço de e-mail válido.");
    input.reportValidity();
    return false;
  }
}

function validateCPF(input) {
  const cpf = input.value;
  if (cpfRegex.test(cpf)) {
    input.style.border = "1px solid green";
    input.setCustomValidity("");
    return true;
  } else {
    input.style.border = "2px solid red";
    input.setCustomValidity(
      "Por favor, insira um CPF válido no formato XXX.XXX.XXX-XX."
    );
    input.reportValidity();
    return false;
  }
}
