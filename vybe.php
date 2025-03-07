<?php
require_once('includes/connect.php');  // 데이터베이스 연결 포함

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 2";
$projectStmt = $connection->prepare($projectQuery);
$projectStmt->execute();
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 2";
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
    
    <!-- GSAP & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script defer src="https://assets.codepen.io/16327/SplitText3.min.js"></script> 
    <!-- SplitText 최신 버전 (CodePen CDN) -->

    <!-- 기타 라이브러리 -->
    <script defer src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
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
        <section class="vybe-hero">
            <?php if (!empty($video[0])): ?>
              <div id="player-container">
                <video class="player" controls preload="metadata" poster="<?php echo $images[2]; ?>">
                    <source src="<?php echo $video[0]; ?>" type="video/mp4">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
              </div>
            <?php endif; ?>
            <?php if (!empty($project['github_link'])): ?>
                <a href="<?php echo $project['github_link']; ?>" target="_blank">
                    <button id="vybe-github">Github Repo</button>
                </a>
            <?php endif; ?>
        </section>

        <!-- 프로젝트 세부사항 -->
        <section id="vybe-details-con">
            <div id="vybe-details">
                <h2 class="Heading"><?php echo $project['title']; ?></h2>
                <h3><?php echo $project['subtitle']; ?></h3>
                <p><?php echo $project['description']; ?></p>
            </div>
            <div id="vybe-team-year">
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
      <section id="what-I-did-con" class="grid-con">
        <h2 class="Heading col-span-full">What I did</h2>
        
        <div class="what-I-did col-span-full">
          <div id="front-end">
            <img src="images/2.png" alt="front-end-icon">
            <div><b>Front-End Development (HTML, CSS, JS):</b> Built responsive web pages, styled layouts, and added interactivity.</div>
          </div>
        </div>

        <div class="what-I-did col-span-full">
          <div id="logo-design">
            <img src="images/1.png" alt="front-end-icon">
            <div><b>Logo Design:</b> Designed a brand logo reflecting the target audience and identity.</div>
          </div>
        </div>

        <div class="what-I-did col-span-full">
          <div id="web-design">
            <img src="images/1.png" alt="front-end-icon">
            <div><b>Web Design:</b> Developed a cohesive design system and user-friendly interface.</div>
          </div>
        </div>

        <div class="what-I-did col-span-full">
          <div id="label-design">
            <img src="images/1.png" alt="front-end-icon">
            <div><b>3D Modeling</b> Created product labels with branding elements and essential details.</div>
          </div>
        </div>

        <div class="what-I-did col-span-full">
          <div id="promotional-video">
            <img src="images/3.png" alt="front-end-icon">
            <div><b>Promotional Video:</b> Produced and edited a video highlighting key features with motion graphics and music.</div>
          </div>
        </div>
      </section>

      <section id="design-principal-con">
        <h2 class="Heading">Design Principal</h2>

        <div id="design-principal-box">
          <div class="design-principal">
            <h3>Ergonomics</h3>
            <p>The earbuds and website are designed for effortless comfort and intuitive usability, ensuring a seamless experience.</p>
          </div>
          
          <div class="design-principal">
            <h3>Minimalism</h3>
            <p>Both the earbuds and website embody simplicity, with clean lines and a focus on essential elements.</p>
          </div>

          <div class="design-principal">
            <h3>Functionality</h3>
            <p>From the earbuds' features to the website's navigation, every detail is crafted to enhance practicality and ease of use.</p>
          </div>
        </div>
      </section>

      <!-- Devices Section -->
      <section id="devices-con">
            <h2 class="Heading">Devices</h2>
            <h3>Creating designs optimized for various devices, including mobile <span>phones,</span> <span>tablets,</span> and <span>web platforms.</span></h3>
            <div id="devices-con-img-box">
                <img src="<?php echo $images[0]; ?>" alt="images of vybe page by devices">
            </div>

            <h2 class="entry-point">Web - Entry Points</h2>
            <h3 class="entry-point-h3"><?php echo $project['entry_point_h3']; ?></h3>
            <p><?php echo $project['entry_point_p']; ?></p>
        </section>

        <!-- Wireframes Section -->
        <section id="wireframingSketches">
            <h2 class="Heading">Sketches</h2>
            <div>
                <img src="<?php echo $images[1]; ?>" alt="wireframes of quatro">
            </div>
        </section>

        <!-- <section class="grid-con" id="slider-wrap">
        <h2 id="slider-heading" class="col-span-full Heading">Promitional Posters</h2>
        <div class="col-span-full m-col-start-1 m-col-end-8" id="poster-slider">
          <div id="image-slider">
            <img src="images/vybe-poster-1.png" alt="vybe poster 1">
            <img src="images/vybe-poster-2.png" alt="vybe poster 2">
            <img src="images/vybe-poster-3.png" alt="vybe poster 3">
            <img src="images/vybe-poster-4.png" alt="vybe poster 4">
          </div>
          <button id="prev-btn">◀</button>
          <button id="next-btn">▶</button>
        </div>

        <div id="poster-details" class="col-span-full m-col-start-9 m-col-end-14">
          <h2>Poster - Entry Points</h2>
          <h3>Seamlessly Connecting Vybe Pro Max to Digital</h3>
          <p>In this project, the focus was on establishing a seamless connection between the Vybe Pro Max earbuds and their digital presence. Guided by the principles of ergonomics, minimalism, and modern design, we created a product that blends comfort with functionality. The digital platform features intuitive navigation, interactive elements like a 3D model viewer, and dynamic animations, ensuring an engaging and immersive user experience that highlights the earbuds' innovative features.</p>
        </div>
      </section> -->
    </div>

    
    <div class="collaborate">
        <h2>Let’s Collaborate</h2>
        <h3>I’m excited to bring my energy and expertise to your next project. Let’s talk!</h3>
        <button><a href="contact.php"><i class="fa-regular fa-comments talk-icon"></i>Let’s Talk</a></button>
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
