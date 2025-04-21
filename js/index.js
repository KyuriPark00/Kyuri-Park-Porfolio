// js/index.js

// Plyr 비디오
if (typeof Plyr !== "undefined") {
    new Plyr(".player", {
      controls: ["play-large", "play", "progress", "current-time", "mute", "volume", "settings", "fullscreen"],
      settings: ["captions", "quality", "speed"],
      autoplay: false,
      volume: 0.8,
    });
  
    const video = document.getElementById("project-video");
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
  }
  
  // Scroll to projects
  const projectLink = document.querySelector('a[href="#projects-con"]');
  if (projectLink) {
    projectLink.addEventListener("click", function (event) {
      event.preventDefault();
      document.querySelector("#projects-con").scrollIntoView({
        behavior: "smooth"
      });
    });
  }
  
  // GSAP SplitText + Wave
  if (typeof gsap !== "undefined") {
    if (typeof SplitText !== "undefined") {
      gsap.registerPlugin(SplitText);
      const split = new SplitText(".introduce", { type: "words" });
      gsap.timeline().from(split.words, {
        duration: 0.5,
        autoAlpha: 0,
        stagger: { each: 0.2 }
      });
    }
  
    gsap.to("#wave-svg path", {
      attr: { d: "M0,50 Q360,10 720,50 T1440,50 V100 H0 Z" },
      duration: 2,
      repeat: -1,
      yoyo: true,
      ease: "sine.inOut"
    });
  
    document.addEventListener("mousemove", function (event) {
      const waveHeight = (event.clientY / window.innerHeight) * 50;
      gsap.to("#wave-svg path", {
        attr: { d: `M0,50 Q360,${waveHeight} 720,50 T1440,50 V100 H0 Z` },
        duration: 0.5,
        ease: "power1.out"
      });
    });
  }
  
  // Testimonials
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
  
  // Contact form (index 페이지에도 있을 경우)
  const form = document.querySelector("#contact-form-con form");
  if (form) {
    const submitBtn = form.querySelector("button[type='submit']");
  
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      const formData = new FormData(form);
      submitBtn.disabled = true;
  
      fetch("process_contact.php", {
        method: "POST",
        body: formData
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
        .catch(() => alert("An unexpected error occurred."))
        .finally(() => {
          submitBtn.disabled = false;
        });
    });
  }
  