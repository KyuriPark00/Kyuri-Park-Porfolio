// js/global.js

function initMenu() {
    const hamburger = document.querySelector("#hamburger");
    const menu = document.querySelector("#menu");
    const close = document.querySelector("#close");
    const links = document.querySelectorAll("#menu ul a");
  
    function toggleMenu() {
      menu.classList.toggle("open");
    }
  
    if (hamburger && close) {
      hamburger.addEventListener("click", toggleMenu);
      close.addEventListener("click", toggleMenu);
    }
  
    links.forEach(link => {
      link.addEventListener("click", toggleMenu);
    });
  }
  
  function initTopButton() {
    const topButton = document.getElementById("top-button");
    if (topButton) {
      topButton.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
    }
  }
  
  initMenu();
  initTopButton();
  