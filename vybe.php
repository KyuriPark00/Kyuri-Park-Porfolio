<?php
include('includes/connect.php');  // 데이터베이스 연결 포함

// 프로젝트 데이터 가져오기
$projectQuery = "SELECT * FROM projects WHERE id = 2";
$projectResult = $conn->query($projectQuery);
$project = $projectResult->fetch_assoc();

// 미디어 데이터 가져오기
$mediaQuery = "SELECT * FROM media WHERE project_id = 2";
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
          <img src="images/logo.svg" alt="KP Logo" />
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
            <li><a href="anout.html">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </header>
    </div>

    <br><br><br>

    <div class="case-study-body">
        <!-- Hero 섹션 -->
        <section class="vybe-hero">
            <?php if (!empty($video[0])): ?>
                <video class="player" controls preload="metadata" poster="<?php echo $images[2]; ?>">
                    <source src="<?php echo $video[0]; ?>" type="video/mp4">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
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

        <section class="grid-con" id="slider-wrap">
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
      </section>
    </div>

    <footer>
        <p>© 2024 Kyuri Park. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
</body>
</html>