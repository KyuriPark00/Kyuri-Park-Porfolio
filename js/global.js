// js/global.js

(() => {
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

  // Plyr video player initialization (즉시 실행)
  const player = new Plyr(".player", {
    controls: [
      "play-large",
      "play",
      "progress",
      "current-time",
      "mute",
      "volume",
      "settings",
      "fullscreen",
    ],
    settings: ["captions", "quality", "speed"],
    autoplay: false,
    volume: 0.8,
  });
  
    // Ajax for contact form
    const form = document.querySelector("#contact-form-con form");
    if (form) {
      const submitBtn = form.querySelector("button[type='submit']");
  
      form.addEventListener("submit", function (event) {
        event.preventDefault();
  
        const formData = new FormData(form);
        submitBtn.disabled = true;
  
        fetch("process_contact.php", {
          method: "POST",
          body: formData,
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Message sent successfully!");
            form.reset();
          } else {
            alert("Error: " + data.error);
          }
        })
        .catch(error => alert("An unexpected error occurred."))
        .finally(() => {
          submitBtn.disabled = false;
        });
      });
    }
})();