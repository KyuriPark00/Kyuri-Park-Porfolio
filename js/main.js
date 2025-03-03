(() => {

    // Hamburger menu
    const hamburger = document.querySelector("#hamburger");
    const menu = document.querySelector("#menu");
    const closeButton = document.querySelector("#close");
    const menuLinks = document.querySelectorAll("#menu ul a");
 
    function toggleMenu() {
     menu.classList.toggle("open");
    }
 
    hamburger.addEventListener("click", toggleMenu);
    closeButton.addEventListener("click", toggleMenu);
 
    menuLinks.forEach(link => {
     link.addEventListener("click", toggleMenu);
    })

    // Projects menu - desktop
    document.querySelector('a[href="#projects-con"]').addEventListener('click', function (event) {
      event.preventDefault();
      document.querySelector('#projects-con').scrollIntoView({
          behavior: 'smooth'
      });
    });


    // // GSAP - header
    // document.addEventListener("DOMContentLoaded", () => {
    //   gsap.registerPlugin(ScrollTrigger);
    
    //   // [1] 페이지 로드 시 헤더 등장 애니메이션 (유지)
    //   gsap.from("header", {
    //       opacity: 0,
    //       duration: 0.8,
    //       ease: "power2.out"
    //   });
    
    //   // [2] 스크롤 시 스타일 변경 (헤더 이동 효과 제거!)
    //   const navItems = document.querySelectorAll("#desktop-nav ul li");
    //   const hamburger = document.querySelector("#hamburger");
    
    //   window.addEventListener("scroll", function () {
    //       let currentScroll = window.scrollY;
    //       console.log(currentScroll);  // 확인용 로그
    
    //       // [3] 스크롤 일정 이상 시 li 요소와 햄버거 버튼에 클래스 토글
    //       if (currentScroll > 50) {
    //           navItems.forEach(item => item.classList.add("scrolled"));
    //           hamburger.classList.add("scrolled");
    //       } else {
    //           navItems.forEach(item => item.classList.remove("scrolled"));
    //           hamburger.classList.remove("scrolled");
    //       }
    //     });
    // });
        
    // GSAP - SplitText
    gsap.registerPlugin(SplitText);

    const split = new SplitText('.introduce', {type: 'words'});

    const typingText = gsap.timeline()
    .from(split.words, {
        duration: .5,
        autoAlpha: 0,
        stagger: {
            each: .2
        }
    })

    // Wave animation
    document.addEventListener("DOMContentLoaded", function () {
      // 기본 파도 애니메이션
      gsap.to("#wave-svg path", {
          attr: { d: "M0,50 Q360,10 720,50 T1440,50 V100 H0 Z" }, // 부드러운 파도 형태
          duration: 2, // 애니메이션 지속 시간
          repeat: -1, // 무한 반복
          yoyo: true, // 앞뒤로 반복
          ease: "sine.inOut" // 자연스러운 움직임
      });

      // 마우스 움직임에 따라 파도 형태 변경
      document.addEventListener("mousemove", function (event) {
          let waveHeight = event.clientY / window.innerHeight * 50; // 마우스 Y값에 따라 파도 높이 변경
          gsap.to("#wave-svg path", {
              attr: { d: `M0,50 Q360,${waveHeight} 720,50 T1440,50 V100 H0 Z` },
              duration: 0.5, // 파도 형태 변경 속도
              ease: "power1.out" // 빠르게 변하는 느낌
            });
        });
    });
    
    // Testimonials slide
    document.addEventListener("DOMContentLoaded", function () {
      let currentIndex = 0;
      const testimonials = document.querySelectorAll(".testimonial-card");
      const dots = document.querySelectorAll(".dot");
  
      function showTestimonial(index) {
          testimonials.forEach((testimonial, i) => {
              testimonial.classList.toggle("active", i === index);
              dots[i].classList.toggle("active", i === index);
          });
      }
  
      dots.forEach((dot, index) => {
          dot.addEventListener("click", () => {
              currentIndex = index;
              showTestimonial(currentIndex);
          });
      });
  
      showTestimonial(currentIndex);
  });

    // Top Button(Scroll button)
    document.addEventListener("DOMContentLoaded", function() {
    const topButton = document.getElementById("top-button");

    topButton.addEventListener("click", function(){
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  });

})();
 


// (function() {
//   document.addEventListener("DOMContentLoaded", () => {
//     // Menu
//     const toggleButton = document.querySelector(".toggle_button");
//     const toggleButtonIcon = document.querySelector(".toggle_button i");
//     const mobileMenu = document.querySelector("#mobile_dropdown_menu");

//     toggleButton.addEventListener("click", () => {
//       console.log("fired");

//       if (mobileMenu.classList.contains("show")) {
//         // Hide the menu
//         mobileMenu.classList.remove("show");
//         mobileMenu.classList.add("hide");

//         // wait for animation to finish before hiding the menu
//         setTimeout(() => {
//           mobileMenu.classList.remove("hide");
//           mobileMenu.style.display = "none";
//         }, 500); // 500ms matches the animation duration

//         toggleButtonIcon.classList.remove("fa-regular", "fa-circle-xmark");
//         toggleButtonIcon.classList.add("fa-solid", "fa-bars");
//       } else {
//         // Show the hidden menu
//         mobileMenu.style.display = "block";
//         mobileMenu.classList.add("show");

//         toggleButtonIcon.classList.remove("fa-solid", "fa-bars");
//         toggleButtonIcon.classList.add("fa-regular", "fa-circle-xmark");
//       }
//     });

//     // Plyr video player initialization
//     const player = new Plyr(".player", {
//       controls: [
//         "play-large", // 중앙의 큰 재생 버튼
//         "play",       // 재생/일시정지 버튼
//         "progress",   // 진행 바
//         "current-time", // 현재 재생 시간
//         "mute",       // 음소거 버튼
//         "volume",     // 볼륨 조절
//         "settings",   // 설정 옵션
//         "fullscreen", // 전체 화면 버튼
//       ],
//       settings: ["captions", "quality", "speed"], // 설정 옵션
//       autoplay: false, // 자동 재생 비활성화
//       volume: 0.8, // 초기 볼륨 설정
//     });

//     // Vybe poster sliders
//     // Initialize variables
//     const posterSlider = document.querySelector("#image-slider");
//     const prevPosterBtn = document.querySelector("#prev-btn");
//     const nextPosterBtn = document.querySelector("#next-btn");
//     let posterIndex = 0;
//     let posterWidth;

//     // Function to update the width dynamically
//     function updatePosterWidth() {
//       posterWidth = posterSlider.clientWidth;
//       showPoster(posterIndex);
//     }

//     // Function to show a specific poster
//     function showPoster(index) {
//       const newTransformValue = -index * posterWidth + "px";
//       posterSlider.style.transform = "translateX(" + newTransformValue + ")";
//     }

//     // Navigate to the next poster
//     function nextPoster() {
//       posterIndex++;
//       if (posterIndex >= posterSlider.children.length) {
//         posterIndex = 0; // Loop back to the first poster
//       }
//       showPoster(posterIndex);
//     }

//     // Navigate to the previous poster
//     function prevPoster() {
//       posterIndex--;
//       if (posterIndex < 0) {
//         posterIndex = posterSlider.children.length - 1; // Loop to the last poster
//       }
//       showPoster(posterIndex);
//     }

//     // Set up event listeners for buttons
//     if (prevPosterBtn && nextPosterBtn) {
//       prevPosterBtn.addEventListener("click", prevPoster);
//       nextPosterBtn.addEventListener("click", nextPoster);
//     }

//     // Auto-slide functionality
//     setInterval(nextPoster, 4000); // Change slides every 4 seconds

//     // Handle window resizing
//     window.addEventListener("resize", updatePosterWidth);
//     updatePosterWidth();
//   });

//   document.addEventListener("DOMContentLoaded", function () {
//     const currentPage = window.location.pathname.split("/").pop();
//     const navLinks = document.querySelectorAll("#burger-con a"); // burger-con 내부의 a 태그만 선택
  
//     navLinks.forEach(link => {
//       if (link.getAttribute("href") === currentPage) {
//         link.classList.add("active");
//       }
//     });
//   });

  
// })();
