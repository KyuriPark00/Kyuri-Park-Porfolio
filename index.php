<?php
//include('includes/connect.php');
// Fetch projects from the database 데이터베이스에서 프로젝트 테이블 페치!
// $query_projects = "SELECT * FROM projects ORDER BY year DESC";
// $projects_result = $conn->query($query_projects);
require_once('includes/connect.php');

// 프로젝트 데이터 가져오기
$stmt = $connection->prepare('SELECT * FROM projects ORDER BY year ASC');
$stmt->execute();
// fetchAll() 씀. 어차피 데이터양도 적어서
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
  <link href="css/main.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="images/favicon.svg" />
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="Hailie" />
<link rel="manifest" href="images/site.webmanifest" />

  <!-- GSAP & Plugins -->
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <!-- <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script> -->
  <script defer src="js/SplitText.js"></script>

  <!-- 기타 라이브러리 -->
  <script defer src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

  <!-- 사용자 스크립트 -->
  <script defer src="js/main.js"></script>

  <title>Kyuri Park</title>
</head>

<body>
  <h1 class="hidden">Kyuri Park Portfolio</h1>

 <!-- Main Nav -->
 <header>
      <div id="logo"><a href="index.php"><img src="images/logo_thicker_with_bg.png" alt="logo"></a></div>
      <button id="hamburger">&#9776;</button>

      <nav id="desktop-nav">
          <ul>
              <li><a href="#projects-con">Projects</a></li>
              <!-- <li><a href="articles.php">Articles</a></li> -->
              <li><a href="contact.php">Contact</a></li>
          </ul>
      </nav>
  </header>
  <div id="menu" class="overlay">
      <button id="close">&times;</button>
      <nav>
          <ul>
              <li><a href="index.php">Projects</a></li>
              <!-- <li><a href="articles.php">Articles</a></li> -->
              <li><a href="contact.php">Contact</a></li>
          </ul>
      </nav>
  </div>

  <!-- Profile Con -->
  <section id="profile-con" class="grid-con">
    <div class="col-start-1 col-end-6 m-col-start-3 m-col-end-12 l-col-start-3 l-col-end-12">
      <h2 class="introduce">It’s Kyuri,<br>Your Designer, Frontend Developer</h2>
      <!-- <h3>Designing with purpose, developing with precision.</h3> -->
       <br><br>

      <div id="professional-sns-box">
          <a href="https://github.com/KyuriPark00"><button>Github</button></a>
          <a href="assets/Park_Kyuri_Resume.pdf" download="Kyuri_Park_Resume.pdf" class="download-btn"><button>Resume</button></a>
          <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/"><button>LinkedIn</button></a>
          <a href="demoreel.php"><button>Demoreel</button></a>
          <!-- Demo reel section 인덱스 페이지에 만들기 -->
      </div>
    </div>
  </section>

  <!-- About Con -->
  <!-- SVG Wave -->
  <svg id="wave-svg" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg">
      <path fill="#008993" d="M0,50 Q360,100 720,50 T1440,50 V100 H0 Z"></path>
  </svg>

  <section id="about-con">
      <div id="profile-pic-box">
        <img src="images/profilepic.png" alt="Profile picture">
      </div>
  
      <div id="profile-text">
        <h2 id="full-name"><i>Kyuri Hailie Park</i></h2>
        <div>
          <p>I believe that a great developer should not only have strong technical skills but also a keen artistic sense to create visually appealing and user-friendly designs.</p>
          <br><p>If you're looking for someone with a creative edge who can bring innovation to every project, you are at the right place!</p>
        </div>
        
        <div class="social-media">
          <a href="https://github.com/KyuriPark00"><i class="fa-brands fa-github"></i></a>
          <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/"><i class="fa-brands fa-linkedin"></i></a>
          <a href="mailto:hailiepark1216@gmail.com?subject=Inquiry&body=Hello, I have a question.">
          <i class="fa-solid fa-square-envelope"></i>
          </a>
        </div>
  </section>

  <!-- Skill Con -->
  <section id="skill-con">
      <div id="skill-first-row">
        <img src="images/orange-1.png" alt="design-icon-orange">
        <h2 class="skill-heading">Designer</h2>
        <div id="designing">
          <p class="sub-heading-blue">I love designing:</p>
          <p>logo</p>
          <p>UX/UI</p>
          <p>Web/Apps</p>
        </div>

        <div id="designing-tools">
          <p class="sub-heading-blue">Design Tools:</p>
          <p>Photoshop</p>
          <p>Illustrator</p>
          <p>Indesign</p>
          <p>Figma</p>
          <p>Adobe XD</p>
        </div>
      </div>

      <div class="skill-divider-online"></div>

      <div id="skill-second-row">
        <img src="images/orange-2.png" alt="development-icon-orange">
        <h2 class="skill-heading">Frontend Developer</h2>
        <div id="front-language">
          <p class="sub-heading-blue">Languages I speak</p>
          <p>HTML</p>
          <p>CSS3 / SASS</p>
          <p>JavaScript</p>
        </div>
        <div id="front-dev-tools">
          <p class="sub-heading-blue">Dev Tools:</p>
          <p>Tailwind CSS</p>
          <p>Github</p>
          <p>VS Code</p>
        </div>
        <div id="front-libraries">
          <p class="sub-heading-blue">Libraries:</p>
          <p>Vue.js</p>
        </div>
      </div>

      <div class="skill-divider-online"></div>

      <div id="skill-third-row">
        <img src="images/orange-2.png" alt="development-icon-orange">
        <h2 class="skill-heading">Backend Developer</h2>
        <div id="back-language">
          <p class="sub-heading-blue">Languages I speak</p>
          <p>PHP</p>
          <p>MySQL</p>
          <p>Python</p>
        </div>
        <div id="back-dev-tools">
          <p class="sub-heading-blue">Dev Tools:</p>
          <p>Github</p>
          <p>VS Code</p>
        </div>
        <div id="back-libraries">
          <p class="sub-heading-blue">Libraries:</p>
          <p>Lumen</p>
        </div>
      </div>
  </section>
  

<!-- Project Con -->
<section id="projects-con" class="case-study-body">
    <div class="header">
        <h2 id="project-heading">Case Study</h2>
        <h3 id="project-sub-heading">My current projects</h3>
    </div>
    <div class="projects-wrapper"> <!-- 프로젝트 전체 컨테이너 -->
    <?php
    require_once 'includes/connect.php'; // DB 연결 파일 포함

    $project_links = [
        6 => 'biam.php',  
        7 => 'quatro.php',    
        8 => 'vybe.php',
        9 => 'industry.php',
        10 => 'elin.php'
    ];

    foreach ($projects as $project) {
        // 미디어 데이터 가져오기
        $media_stmt = $connection->prepare("SELECT * FROM media WHERE project_id = :project_id");
        $media_stmt->execute(['project_id' => $project['id']]);
        $media_items = $media_stmt->fetchAll(PDO::FETCH_ASSOC);

        $thumbnail = 'images/default-thumbnail.jpg'; // 기본 썸네일 설정
        foreach ($media_items as $media) {
            if ($media['type'] === 'image') {
                $thumbnail = $media['file_path'];
                break;
            }
        }

        $project_link = $project_links[$project['id']] ?? '#';

        echo '<div class="project-card">'; // 개별 프로젝트 카드
        echo '<a href="' . $project_link . '" class="project_link">';
        echo '<img class="thumbnail_image" src="' . $thumbnail . '" alt="Thumbnail of ' . htmlspecialchars($project['title']) . '">';
        echo '</a>'; // 🔥 a 태그 닫음

        echo '<div class="description">'; // 설명 컨테이너
        echo '<h3 class="title">' . htmlspecialchars($project['title']) . '</h3>';
        echo '<div class="info">'; // info div 추가
        echo '<h3 class="year">' . htmlspecialchars($project['year']) . '</h3>';
        echo '<p class="short_description">' . htmlspecialchars($project['short_description']) . '</p>';
        echo '</div>';
        echo '</div>'; // 설명 div 닫기

        echo '</div>'; // 프로젝트 카드 닫기
    }
    ?>
    </div>
</section>

  <!-- Testimonial Con -->
  <section id="testimonial-con" class="grid-con">
    <div class="col-span-full m-col-start-4 m-col-end-11">
      <h2>Testimonials</h2>
        <h3 id="testimonial-subtitle">Stories from my Happy Clients</h3>

        <div id="testimonial-container">
          <div class="testimonial-card active">
            <i class="fa-solid fa-quote-left big-quote-mark"></i>
            <div class="testimonial-author">
              <img src="images/Luke.png" alt="Muhammad Lastname">
              <div class="author-info">
                <h3>Muhammad Roshan</h3>
                <p>CEO</p>
              </div>
            </div>

            <div id="divider"></div>

            <blockquote>
              <p><span class="quote-mark">❝</span>Hailie has been an outstanding UX/UI Design Intern, bringing creativity, precision, and a user-focused mindset to every project. Their ability to craft intuitive designs and collaborate effectively made a significant impact on our team. A talented designer with a bright future ahead!</span></p>
            </blockquote>
          </div>

          <div class="testimonial-card">
            <i class="fa-solid fa-quote-left big-quote-mark"></i>
            <div class="testimonial-author">
              <img src="images/Leia-Organa.png" alt="Muhammad Lastname">
              <div class="author-info">
                <h3>Tina Yam</h3>
                <p>Backend Developer</p>
              </div>
            </div>

            <div id="divider"></div>

            <blockquote>
              <p><span class="quote-mark">❝</span> crafted content that perfectly aligned with our design goals and user needs. Their creativity and strategic thinking added immense value to the project. A true asset to the team!"</span></p>
            </blockquote>
          </div>
        </div>

        <div class="dots">
              <span class="dot active"></span>
              <span class="dot"></span>
        </div>
    </div>
  </section>

  <!-- Top Button --> 
  <div class="grid-con">
    <button class="col-span-full" id="top-button">
      <img src="images/top-button.png" alt="top button">
    </button>
  </div>

  <!-- Collaborate --> 
  <div id="collaborate-con" class="grid-con">
    <div class="collaborate col-span-full">
      <h2>Let’s Collaborate</h2>
      <h3>I’m excited to bring my energy and expertise to your next project. Let’s talk!</h3>
      <button><a href="contact.php"><i class="fa-regular fa-comments talk-icon"></i>Let’s Talk</a></button>
    </div>
  </div>

  <footer>
    <div class="footer-container">
      <div class="logo"><a href="index.php"><img src="images/kp_logo_thicker_white.png" alt="logo"></a></div>
      <p>&copy; 2025 Kyuri Hailie Park</p>
      <div class="social-media">
          <a href="https://github.com/KyuriPark00"><i class="fa-brands fa-github"></i></a>
          <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/"><i class="fa-brands fa-linkedin"></i></a>
          <a href="mailto:hailiepark1216@gmail.com?subject=Inquiry&body=Hello, I have a question.">
          <i class="fa-solid fa-square-envelope"></i>
          </a>
      </div>
    </div>
  </footer>
</body>
</html>
