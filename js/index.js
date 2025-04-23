// js/index.js

(() => {
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
})();
