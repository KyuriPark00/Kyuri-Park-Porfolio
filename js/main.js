(function() {
  document.addEventListener("DOMContentLoaded", () => {
    // Menu
    const toggleButton = document.querySelector(".toggle_button");
    const toggleButtonIcon = document.querySelector(".toggle_button i");
    const mobileMenu = document.querySelector("#mobile_dropdown_menu");

    toggleButton.addEventListener("click", () => {
      console.log("fired");

      if (mobileMenu.classList.contains("show")) {
        // Hide the menu
        mobileMenu.classList.remove("show");
        mobileMenu.classList.add("hide");

        // wait for animation to finish before hiding the menu
        setTimeout(() => {
          mobileMenu.classList.remove("hide");
          mobileMenu.style.display = "none";
        }, 500); // 500ms matches the animation duration

        toggleButtonIcon.classList.remove("fa-regular", "fa-circle-xmark");
        toggleButtonIcon.classList.add("fa-solid", "fa-bars");
      } else {
        // Show the hidden menu
        mobileMenu.style.display = "block";
        mobileMenu.classList.add("show");

        toggleButtonIcon.classList.remove("fa-solid", "fa-bars");
        toggleButtonIcon.classList.add("fa-regular", "fa-circle-xmark");
      }
    });

    // Plyr video player initialization
    const player = new Plyr(".player", {
      controls: [
        "play-large", // 중앙의 큰 재생 버튼
        "play",       // 재생/일시정지 버튼
        "progress",   // 진행 바
        "current-time", // 현재 재생 시간
        "mute",       // 음소거 버튼
        "volume",     // 볼륨 조절
        "settings",   // 설정 옵션
        "fullscreen", // 전체 화면 버튼
      ],
      settings: ["captions", "quality", "speed"], // 설정 옵션
      autoplay: false, // 자동 재생 비활성화
      volume: 0.8, // 초기 볼륨 설정
    });

    // Vybe poster sliders
    // Initialize variables
    const posterSlider = document.querySelector("#image-slider");
    const prevPosterBtn = document.querySelector("#prev-btn");
    const nextPosterBtn = document.querySelector("#next-btn");
    let posterIndex = 0;
    let posterWidth;

    // Function to update the width dynamically
    function updatePosterWidth() {
      posterWidth = posterSlider.clientWidth;
      showPoster(posterIndex);
    }

    // Function to show a specific poster
    function showPoster(index) {
      const newTransformValue = -index * posterWidth + "px";
      posterSlider.style.transform = "translateX(" + newTransformValue + ")";
    }

    // Navigate to the next poster
    function nextPoster() {
      posterIndex++;
      if (posterIndex >= posterSlider.children.length) {
        posterIndex = 0; // Loop back to the first poster
      }
      showPoster(posterIndex);
    }

    // Navigate to the previous poster
    function prevPoster() {
      posterIndex--;
      if (posterIndex < 0) {
        posterIndex = posterSlider.children.length - 1; // Loop to the last poster
      }
      showPoster(posterIndex);
    }

    // Set up event listeners for buttons
    if (prevPosterBtn && nextPosterBtn) {
      prevPosterBtn.addEventListener("click", prevPoster);
      nextPosterBtn.addEventListener("click", nextPoster);
    }

    // Auto-slide functionality
    setInterval(nextPoster, 4000); // Change slides every 4 seconds

    // Handle window resizing
    window.addEventListener("resize", updatePosterWidth);
    updatePosterWidth();
  });

  
})();
