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

// 프로젝트 섹션 자동 재생 (Biam, Quatro, Vybe, Industry)
const video = document.getElementsByClassName("project-video");
  
if (video) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          video.style.visibility = "visible";
          video.play();
        }
      });
    }, { threshold: 0.5 });
  
    observer.observe(video);
}
  
  