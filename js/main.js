(() => {
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

  // 🎥 프로젝트 섹션 자동 재생 비디오 추가
  const video = document.getElementById("project-video");

  if (video) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          video.style.visibility = "visible"; // 보이도록 설정
          video.play();
        }
      });
    }, { threshold: 0.5 });

    observer.observe(video);
  }

  // 🔽 기존 코드 (메뉴, 애니메이션 등)
  const hamburger = document.querySelector("#hamburger");
  const menu = document.querySelector("#menu");
  const closeButton = document.querySelector("#close");
  const menuLinks = document.querySelectorAll("#menu ul a");

  function toggleMenu() {
    menu.classList.toggle("open");
  }

  if (hamburger && closeButton) {
    hamburger.addEventListener("click", toggleMenu);
    closeButton.addEventListener("click", toggleMenu);
  }

  menuLinks.forEach(link => {
    link.addEventListener("click", toggleMenu);
  });

  // Projects menu - desktop
  const projectLink = document.querySelector('a[href="#projects-con"]');
  if (projectLink) {
    projectLink.addEventListener('click', function (event) {
      event.preventDefault();
      document.querySelector('#projects-con').scrollIntoView({
        behavior: 'smooth'
      });
    });
  }

  // GSAP - SplitText
  if (typeof gsap !== "undefined" && typeof SplitText !== "undefined") {
    gsap.registerPlugin(SplitText);
  
    const split = new SplitText('.introduce', {type: 'words'});
  
    gsap.timeline().from(split.words, {
      duration: .5,
      autoAlpha: 0,
      stagger: { each: .2 }
    });
  }

  // Wave animation
  gsap.to("#wave-svg path", {
    attr: { d: "M0,50 Q360,10 720,50 T1440,50 V100 H0 Z" },
    duration: 2,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut"
  });

  document.addEventListener("mousemove", function (event) {
    let waveHeight = event.clientY / window.innerHeight * 50;
    gsap.to("#wave-svg path", {
      attr: { d: `M0,50 Q360,${waveHeight} 720,50 T1440,50 V100 H0 Z` },
      duration: 0.5,
      ease: "power1.out"
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
  if (topButton) {
    topButton.addEventListener("click", function(){
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

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
