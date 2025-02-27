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

  <!-- GSAP & Plugins -->
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  <script defer src="https://assets.codepen.io/16327/SplitText3.min.js"></script> 
  <!-- SplitText 최신 버전 (CodePen CDN) -->

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
      <h2 class="introduce">It’s Kyuri,<br>Your Designer, Software Engineer</h2>
      <h3>Designing with purpose, developing with precision.</h3>

      <div id="professional-sns-box">
          <a href="https://github.com/KyuriPark00?tab=repositories"><button>Github</button></a>
          <a href="files/resume.pdf" download="Kyuri_Park_Resume.pdf" class="download-btn"><button>Resume</button></a>
          <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/"><button>LinkedIn</button></a>
          <a href="demoreel.php"><button>Demoreel</button></a>
      </div>
    </div>
  </section>

  <!-- About Con -->
  <section id="about-con">
      <div id="profile-pic-box">
        <img src="images/profilepic.png" alt="Profile picture">
      </div>
  
      <div id="profile-text">
        <h2 id="full-name"><i>Kyuri Hailie Park</i></h2>
        <div>
          <p>I believe that a great developer should also have a strong artistic sense,</p>
          <br><p>so you’re looking for someone with a creative edge, you’re in the right place!</p>
        </div>
        
        <div class="social-media">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
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
  <section id="projects-con" class="grid-con case-study-body">
      <h2 id="project-heading" class="col-span-full">Case Study</h2>
      <h3 id="project-sub-heading" class="col-span-full">My current projects</h3>
      <?php
      require_once 'includes/connect.php'; // DB 연결 파일 포함

      $project_links = [
          1 => 'quatro.php',  
          2 => 'vybe.php',    
          3 => 'industry.php',  
          4 => 'demoreel.php'   
      ];

      $column_counter = 1;

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
          $grid_start = ($column_counter % 2 === 1) ? 1 : 8;
          $grid_end = ($column_counter % 2 === 1) ? 7 : 14;

          echo '<div class="col-span-full m-col-start-' . $grid_start . ' m-col-end-' . $grid_end . '">';
          echo '<a href="' . $project_link . '" class="project_link">';
          echo '<img class="thumbnail_image" src="' . $thumbnail . '" alt="Thumbnail of ' . htmlspecialchars($project['title']) . '">';
          // echo '<div class="overlay">';
          echo '<div id="overlay">';
          echo '<h3 class="title">' . htmlspecialchars($project['title']) . '</h3>';
          echo '<p class="short_description">' . htmlspecialchars($project['short_description']) . '</p>';
          echo '</div></a></div>';

          $column_counter++;
      }
      ?>
  </section>

  <!-- Testimonial Con -->
  <section id="testimonial-con">
      <h2>Testimonials</h2>
      <p id="testimonial-subtitle">Stories from my Happy Clients</p>

      <div id="testimonial-container">
        <div class="testimonial-card active">
          <blockquote>
            <span class="quote-mark">❝</span>
            <p class="testimonial-text">"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"</p>
            <span class="quote-mark">❞</span>
          </blockquote>
          <div class="testimonial-author">
            <img src="images/Luke.png" alt="Muhammad Lastname">
            <div class="author-info">
              <h3>Muhammad Lastname</h3>
              <p>CEO</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <blockquote>
            <span class="quote-mark">❝</span>
            <p class="testimonial-text">"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"</p>
            <span class="quote-mark">❞</span>
            <span class="quote-mark">❞</span>
          </blockquote>
          <div class="testimonial-author">
            <img src="iamges/" alt="Henry Giesbrecht">
            <div class="author-info">
              <h3>Henry Giesbrecht</h3>
              <p>Pastor</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <blockquote>
            <span class="quote-mark">❝</span>
            <p class="testimonial-text">"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy"</p>
            <span class="quote-mark">❞</span>
            <span class="quote-mark">❞</span>
          </blockquote>
          <div class="testimonial-author">
            <img src="iamges/" alt="Henry Giesbrecht">
            <div class="author-info">
              <h3>Henry Giesbrecht</h3>
              <p>Pastor</p>
            </div>
          </div>
        </div>
      </div>

      <div class="dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
      </div>
  </section>



  <!-- Top Button -->
  <div class="grid-con">
    <button class="col-span-full" id="top-button">
      <img src="images/top-button.png" alt="top button">
    </button>
  </div>

  
  <footer>
    <p>© 2024 Kyuri Park. All Rights Reserved.</p>
    <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/">
      <img src="images/linkedin_2.svg" alt="LinkedIn icon">
    </a>
  </footer>

</body>
</html>
