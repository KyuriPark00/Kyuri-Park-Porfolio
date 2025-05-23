<?php
require_once('includes/connect.php');  // 데이터베이스 연결 포함

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 5";
$projectStmt = $connection->prepare($projectQuery);
$projectStmt->execute();
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 5";
$mediaStmt = $connection->prepare($mediaQuery);
$mediaStmt->execute();

// Store media data in arrays
$images = [];
$videos = [];
while ($media = $mediaStmt->fetch(PDO::FETCH_ASSOC)) {
    if ($media['type'] == 'image') {
        $images[] = $media['file_path'];
    } elseif ($media['type'] == 'video') {
        $video[] = $media['file_path'];
    }
}
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
  <!-- <script defer src="js/main.js"></script> -->
  <script type="module" src="js/global.js"></script>
  
  <title><?php echo $project['title']; ?> Details</title>
</head>
<body>
    <h1 class="hidden">Kyuri Park Portfolio</h1>

    <!-- Main Nav -->
    <header>
        <div id="logo"><a href="index.php"><img src="images/logo_thicker_with_bg.png" alt="logo"></a></div>
        <button id="hamburger">&#9776;</button>

        <nav id="desktop-nav">
            <ul>
                <li><a href="index.php">Projects</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div id="menu" class="overlay">
        <button id="close">&times;</button>
        <nav>
            <ul>
                <li><a href="index.php">Projects</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>

    <div class="case-study-body">
        <!-- Hero 섹션 -->
        <section class="demo-hero" id="branding-video-con">
            <?php if (!empty($video[0])): ?>
                <video class="player" controls preload="metadata" poster="<?php echo $images[5]; ?>">
                    <source src="<?php echo $video[0]; ?>" type="video/mp4">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
            <?php endif; ?>
        </section>

        <!-- 프로젝트 세부사항 -->
        <section id="demo-details-con">
            <div id="demo-details">
                <h2 class="Heading"><?php echo $project['title']; ?></h2>
                <h3><?php echo $project['subtitle']; ?></h3>
                <p><?php echo $project['description']; ?></p>
            </div>
            <div id="demo-team-year">
                <div>
                    <h2>Team</h2>
                    <p><?php echo $project['team']; ?></p>
                </div>
                <div>
                    <h2>Year</h2>
                    <p><?php echo $project['year']; ?></p>
                </div>
            </div>
        </section>

      <!-- 추가 섹션들 -->
      <section id="design-principal-con">
        <h2 class="Heading">Key Points</h2>

        <div id="design-principal-box">
          <div class="design-principal">
            <h3>Web Development</h3>
            <p>Frontend and Backend development showcasing the coding process using HTML, CSS, JavaScript, PHP, and MySQL.</p>
          </div>
          
          <div class="design-principal">
            <h3>UX / UI Design</h3>
            <p>Highlighting best practices in Figma and Adobe XD, including wireframing, responsive web design, and prototyping techniques.</p>
          </div>

          <div class="design-principal">
            <h3>3D Design</h3>
            <p>Featuring the Sportnex animation and Vybe Pro Max promotional video, demonstrating advanced skills in Cinema 4D.</p>
          </div>
        </div>
      </section>

      <section id="wireframingSketches">
        <h2 class="Heading">Story Board</h2>
        <div class="storyboard-img">
          <?php foreach ($images as $image): ?>
            <img src="<?php echo $image; ?>" alt="Storyboard image">
          <?php endforeach; ?>
        </div>
      </section>
    </div>
    
    <!-- Top Button --> 
    <div class="grid-con">
      <button class="col-span-full" id="top-button">
        <img src="images/top-button.png" alt="top button">
      </button>
    </div>

    <!-- Collaborate --> 
    <section id="collaborate-con" class="grid-con">
        <div class="col-span-full l-col-span-full">
        <div class="collaborate">
            <h2>Let’s Collaborate</h2>
            <p>I’m excited to bring my energy and expertise to your next project. Let’s talk!</p>
            <a href="contact.php" class="talk-btn">
            <i class="fa-regular fa-comments talk-icon"></i>
            Let’s Talk
            </a>
        </div>
        </div>
    </section>

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

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
