// js/quatro.js

// Plyr 비디오 플레이어 초기화
if (typeof Plyr !== "undefined") {
    new Plyr(".player", {
      controls: ["play-large", "play", "progress", "current-time", "mute", "volume", "settings", "fullscreen"],
      settings: ["captions", "quality", "speed"],
      autoplay: false,
      volume: 0.8,
    });
  }
  
  // 프로젝트 섹션 자동 재생
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
  