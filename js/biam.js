// js/biam.js

const images = document.querySelectorAll("#image-slider img");
const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");

if (images.length && prevBtn && nextBtn) {
  let current = 0;

  function showImage(index) {
    images.forEach((img, i) => {
      img.classList.remove("active");
      if (i === index) img.classList.add("active");
    });
  }

  prevBtn.addEventListener("click", () => {
    current = (current - 1 + images.length) % images.length;
    showImage(current);
  });

  nextBtn.addEventListener("click", () => {
    current = (current + 1) % images.length;
    showImage(current);
  });

  showImage(current);
}
