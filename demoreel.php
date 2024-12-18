<?php
include('includes/connect.php');  // 데이터베이스 연결 포함

// 프로젝트 데이터 가져오기
$projectQuery = "SELECT * FROM projects WHERE id = 4";
$projectResult = $conn->query($projectQuery);
$project = $projectResult->fetch_assoc();

// 미디어 데이터 가져오기
$mediaQuery = "SELECT * FROM media WHERE project_id = 4";
$mediaResult = $conn->query($mediaQuery);

// 미디어 데이터를 배열로 저장
$images = [];
$videos = [];
while ($media = $mediaResult->fetch_assoc()) {
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
    <link href="css/grid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?php echo $project['title']; ?> Details</title>
</head>
<body>
    <h1 class="hidden">Kyuri Park Portfolio</h1>

   <!-- Main Nav -->
   <div id="sticky-nav-con">
      <header class="grid-con" id="main-header">
        <div id="logo" class="col-start-3 col-end-4 m-col-start-7 m-col-end-8 l-col-start-7 l-col-end-8 xl-col-start-7 xl-col-end-8">
          <a href="index.php"><img src="images/logo.svg" alt="KP Logo" /></a>
        </div>

        <?php
        $current_page = basename($_SERVER['PHP_SELF']); // 현재 파일 이름 가져오기
        ?>
        <nav id="main-nav" class="col-start-5 col-end-6 m-col-start-6 m-col-end-9 l-col-start-6 l-col-end-9 xl-col-start-6 xl-col-end-9">
          <div id="burger-con">
            <h2 class="hidden">Main Nav</h2>
            <ul>
              <li><a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Projects</a></li>
              <li><a href="about.html" class="<?= $current_page == 'about.html' ? 'active' : '' ?>">About</a></li>
              <li><a href="contact.php" class="<?= $current_page == 'contact.php' ? 'active' : '' ?>">Contact</a></li>
            </ul>
          </div>
          <div class="toggle_button">
            <i class="fa-solid fa-bars"></i>
          </div>
        </nav>
        
        <div id="mobile_dropdown_menu">
          <ul>
            <li><a href="index.php">Projects</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </header>
    </div>

    <br><br><br>

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
    
    <br><br><br>
    <br><br><br>

    <div class="grid-con">
        <button class="col-span-full" id="top-button">
        <img src="images/top-button.png" alt="top button">
        </button>
    </div>
    
    <footer>
      <p>© 2024 Kyuri Park. All Rights Reserved.</p>
      <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/">
          <img src="images/linkedin_2.svg" alt="Linkedin icon">
      </a>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
