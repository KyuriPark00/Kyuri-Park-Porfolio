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
    
    <!-- Hero Image -->
    <section class="project-hero">
        <img src="<?php echo $images[3]; ?>" alt="hero image of vybe">

        <?php if (!empty($project['github_link'])): ?>
            <a href="<?php echo $project['github_link']; ?>" target="_blank">
                <button class="project-github">Github Repo</button>
            </a>
        <?php endif; ?>
    </section>
    
    <div class="case-study-body">
        <!-- Project Details -->
        <section class="project-details-con grid-con">
            <div class="project-details col-span-full m-col-span-8 m-col-start-1">
                <h2 class="Heading"><?php echo $project['title']; ?></h2>
                <h3><?php echo $project['subtitle']; ?></h3>
                <p><?php echo $project['description']; ?></p>
            </div>

            <div class="project-team-year col-span-full m-col-span-4 m-col-start-10">
                <div class="project-team">
                    <h2>Team</h2>
                    <p><?php echo $project['team']; ?></p>
                </div>
                <div class="project-year">
                    <h2>Year</h2>
                    <p><?php echo $project['year']; ?></p>
                </div>
            </div>
        </section>

              <!-- What I Did -->
        <section id="what-I-did-con" class="grid-con">
            <h2 class="Heading col-span-full">What I did</h2>

            <div class="col-span-full m-col-span-full">
                <?php
                // Repeat the tasks dynamically
                $tasks = [
                    ['image' => 'images/2.png', 'title' => 'Front-End Development (HTML, CSS, JS)', 'description' => 'Built responsive web pages, styled layouts, and added interactivity.'],
                    ['image' => 'images/1.png', 'title' => 'Logo Design', 'description' => 'Designed a brand logo reflecting the target audience and identity.'],
                    ['image' => 'images/1.png', 'title' => 'Web Design', 'description' => 'Developed a cohesive design system and user-friendly interface.'],
                    ['image' => 'images/1.png', 'title' => 'Label Design', 'description' => 'Created product labels with branding elements and essential details.'],
                    ['image' => 'images/1.png', 'title' => '3D Modeling', 'description' => ' Created product labels with branding elements and essential details.'],
                    ['image' => 'images/3.png', 'title' => 'Promotional Video', 'description' => 'Produced and edited a video highlighting key features with motion graphics and music.']
                ];
                foreach ($tasks as $task) {
                    echo '<div class="what-I-did col-span-full">';
                    echo '<div id="front-end">';
                    echo '<img src="' . $task['image'] . '" alt="front-end-icon">';
                    echo '<div class="what-I-did-p"><b>' . $task['title'] . ':</b> ' . $task['description'] . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>

        <!-- Research Title -->
        <div class="heading-line">
            <h2 class="Heading">Research<img src="images/research.png" alt="" class="icon"></h2>
            <div class="line"></div>
        </div>

        <!-- Research -->
        <section class="research-con">
            <div class="needs-goals-con">
                <h3 class="sub-heading">Needs & Goals</h3>
                <p>The goal was to design the Vybe Pro Max, wireless earphones that combine a trendy, modern aesthetic with advanced functionality for young adults. Additionally, a promotional website was created to effectively showcase its features and enhance brand presence.</p>
            </div>


            <div class="target-audience-con">
                <h3 class="sub-heading">Target Audience</h3>

                <div class="emoji-des-con-desktop grid-con">
                    <div class="emoji-con-desktop m-col-start-1 m-col-end-4">
                        <div class="emoji-grid">
                            <img src="images/office-worker-rich.png" alt="Office worker man image">
                            <img src="images/asian-woman.png" alt="Asian woman image">
                            <img src="images/blonde-woman.png" alt="Blonde woman image">
                            <img src="images/office-worker.png" alt="Office worker man image 2">
                        </div>
                    </div>

                    <div class="des-con blue-box m-col-start-4 m-col-end-14">
                        <p><b>Age Range:</b> 18-30</p>
                        <p><b>Gender:</b> All</p>
                        <p><b>Location:</b> Urban areas, tech-savvy consumers</p>
                        <p><b>Occupation/Industry:</b> Students, young professionals, creatives</p>
                        <p><b>Education Level:</b> All</p>
                        <p><b>Psychographics:</b> Trend-conscious, values style & functionality</p>
                    </div>
                </div>

                <div class="emoji-des-con-mobile">
                    <div class="emoji-con-mobile">
                        <img src="images/office-worker-rich.png" alt="Office worker man image">
                        <img src="images/asian-woman.png" alt="Asian woman image">
                        <img src="images/blonde-woman.png" alt="Blonde woman image">
                        <img src="images/office-worker.png" alt="Office worker man image 2">
                    </div>

                    <div class="des-con col-span-full blue-box">
                        <p><b>Age Range:</b> 18-30</p>
                        <p><b>Gender:</b> All</p>
                        <p><b>Location:</b> Urban areas, tech-savvy consumers</p>
                        <p><b>Occupation/Industry:</b> Students, young professionals, creatives</p>
                        <p><b>Education Level:</b> All</p>
                        <p><b>Psychographics:</b> Trend-conscious, values style & functionality</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Branding Title -->
        <div class="heading-line">
                <h2 class="Heading">Branding<img src="images/design-heading.png" alt="" class="icon"></h2>
                <div class="line"></div>
        </div>

        <!-- Design Principle -->
        <section id="design-principal-con">
          <h2 class="sub-heading">Design Principal</h2>
          <div id="design-principal-box">
            <div class="design-principal blue-box">
              <h3 class="mini-heading">Ergonomics</h3>
              <p>The earbuds and website are designed for effortless comfort and intuitive usability, ensuring a seamless experience.</p>
            </div>
            
            <div class="design-principal blue-box">
              <h3 class="mini-heading">Minimalism</h3>
              <p>Both the earbuds and website embody simplicity, with clean lines and a focus on essential elements.</p>
            </div>

            <div class="design-principal blue-box">
              <h3 class="mini-heading">Functionality</h3>
              <p>From the earbuds' features to the website's navigation, every detail is crafted to enhance practicality and ease of use.</p>
            </div>
          </div>
        </section>

        <!-- Sketches -->
        <section id="wireframingSketches" class="grid-con">
            <h2 class="sub-heading col-span-full">Sketches</h2>
            <div class="col-span-full">
                <img src="<?php echo $images[1]; ?>" alt="wireframes of vybe">
            </div>
        </section>

        <!-- Website -->
        <div class="heading-line">
                <h2 class="Heading">Website<img src="images/design-heading.png" alt="" class="icon"></h2>
                <div class="line"></div>
        </div>

        <!-- Devices -->
        <section id="devices-con" class="grid-con">
            <div class="col-span-full">
                <h2 class="sub-heading">Devices</h2>
                <h3 class="device-top-h3">Creating designs optimized for various devices, including mobile <span>phones,</span> <span>tablets,</span> and <span>web platforms.</span></h3>
                <div id="devices-con-img-box">
                    <img src="<?php echo $images[0]; ?>" alt="images of vybe page by devices">
                </div>

                <h2 class="entry-point">Web - Entry Points</h2>
                <h3 class="entry-point-h3"><?php echo $project['entry_point_h3']; ?></h3>
                <p><?php echo $project['entry_point_p']; ?></p>
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

        <!-- Branding Video -->
        <section id="branding-video-con" class="grid-con">
            <div class="col-span-full">
                <h2 class="sub-heading">Branding Video</h2>
                <div id="player-container">
                    <video class="player" controls preload="metadata" poster="<?php echo $images[2]; ?>">
                        <source src="<?php echo $video[0]; ?>" type="video/mp4">
                        <p>Uh Oh, your browser does not support this Video!</p>
                    </video>
                </div>
            </div>
        </section>
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
