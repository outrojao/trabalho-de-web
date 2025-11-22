document.addEventListener("DOMContentLoaded", function () {
  const STORAGE_KEY = "tema";
  const DARK_CLASS = "dark";
  const html = document.documentElement;
  const BTN_ID = "btn_tema";

  function createToggleButton() {
    const btn = document.createElement("button");
    btn.id = BTN_ID;
    btn.type = "button";
    btn.title = "Alternar tema claro/escuro";
    btn.setAttribute("aria-pressed", "false");
    btn.textContent = "🌙";
    const header =
      document.getElementById("barra_de_navegacao") != null
        ? document.getElementById("barra_de_navegacao")
        : document.getElementById("cabecalho_forms");
    header.appendChild(btn);
    return btn;
  }

  const btn = document.getElementById(BTN_ID) || createToggleButton();

  function applyTheme(isDark) {
    if (isDark) html.classList.add(DARK_CLASS);
    else html.classList.remove(DARK_CLASS);
    btn.setAttribute("aria-pressed", String(isDark));
    btn.textContent = isDark ? "☀️" : "🌙";
  }

  // inicializa a partir do localStorage ou preferência do sistema
  const stored = localStorage.getItem(STORAGE_KEY);
  const prefersDark =
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches;
  const initialIsDark = stored ? stored === "dark" : prefersDark;
  applyTheme(initialIsDark);

  btn.addEventListener("click", function () {
    const nowDark = !html.classList.contains(DARK_CLASS);
    applyTheme(nowDark);
    localStorage.setItem(STORAGE_KEY, nowDark ? "dark" : "light");
  });
});
