(() => {
  // Plyr video player initialization (즉시 실행)
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

  // DOMContentLoaded 이벤트 한 번만 사용
  document.addEventListener("DOMContentLoaded", function () {
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
    });

    // Projects menu - desktop
    document.querySelector('a[href="#projects-con"]').addEventListener('click', function (event) {
      event.preventDefault();
      document.querySelector('#projects-con').scrollIntoView({
        behavior: 'smooth'
      });
    });

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
    });

    // Wave animation
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

    // Testimonials slide
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

    // Top Button(Scroll button)
    const topButton = document.getElementById("top-button");
    topButton.addEventListener("click", function(){
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });

    // Ajax for contact form
    const form = document.querySelector("#contact-form-con form");
    const submitBtn = form.querySelector("button[type='submit']");
    
    form.addEventListener("submit", function (event) {
      event.preventDefault();
    
      // 폼 데이터 수집
      const formData = new FormData(form);
      submitBtn.disabled = true; // 중복 제출 방지
    
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

  }); // DOMContentLoaded 끝

})();
