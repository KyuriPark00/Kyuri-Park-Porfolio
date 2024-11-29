/*Menu*/
const toggleButton = document.querySelector(".toggle_button");
const toggleButtonIcon = document.querySelector(".toggle_button i");
const mobileMenu = document.querySelector("#mobile_dropdown_menu");

toggleButton.addEventListener("click", () => {
    console.log("fired");
  
    if (mobileMenu.classList.contains("show")) {
      // Hide the menu
      mobileMenu.classList.remove("show");
      mobileMenu.classList.add("hide");
  
      // wait for animation to finish before hide the menu
      setTimeout(() => {
        mobileMenu.classList.remove("hide");
        mobileMenu.style.display = "none";
      }, 500); // 500ms matches the animation duration
  
      toggleButtonIcon.classList.remove("fa-regular", "fa-circle-xmark");
      toggleButtonIcon.classList.add("fa-solid", "fa-bars");
    } else {
      // showing the hidden menu
      mobileMenu.style.display = "block";
      mobileMenu.classList.add("show");
  
      toggleButtonIcon.classList.remove("fa-solid", "fa-bars");
      toggleButtonIcon.classList.add("fa-regular", "fa-circle-xmark");
    }
    
  });

  document.addEventListener("DOMContentLoaded", () => {
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
  });

  