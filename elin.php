<?php
require_once('includes/connect.php');

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 6";
$projectStmt = $connection->prepare($projectQuery);
$projectStmt->execute();
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 6";
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

    <!-- Hero Image -->
    <section class="project-hero">
        <img src="<?php echo $images[1]; ?>" alt="hero image of quatro">

        <?php if (!empty($project['github_link'])): ?>
            <a href="<?php echo $project['github_link']; ?>" target="_blank">
                <!--<button class="project-github">Github Repo</button>-->
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
                    ['image' => 'images/1.png', 'title' => 'Logo Design', 'description' => 'Designed a brand logo reflecting the target audience and identity.'],
                    ['image' => 'images/1.png', 'title' => 'Package Design', 'description' => 'Developed a cohesive design system and user-friendly interface.'],
                    ['image' => 'images/1.png', 'title' => 'Banner Design', 'description' => 'Created product labels with branding elements and essential details.']
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
                <p>MOISTURE BARRIER aims to provide young women with high-quality, gentle skincare solutions that enhance their natural beauty while promoting a sophisticated, youthful glow. The brand focuses on hydration, skin protection, and long-term skin health, ensuring that users feel confident and radiant every day. Our goal is to establish a skincare line that is both effective and luxurious, resonating with the aspirations of our target audience.</p>
            </div>

            <div class="target-audience-con">
            <h3 class="sub-heading">Target Audience</h3>

            <div class="emoji-des-con-desktop grid-con">
                <div class="emoji-con-desktop m-col-start-1 m-col-end-4">
                    <div class="emoji-grid">
                        <img src="images/indian-girl.png" alt="Indian girl image">
                        <img src="images/white-girl-makeup.png" alt="White girl image">
                        <img src="images/muslim-woman.png" alt="Muslim woman image">
                        <img src="images/black-girl-makeup.png" alt="Black girl image">
                    </div>
                </div>

                <div class="des-con blue-box m-col-start-4 m-col-end-14">
                    <p><b>Age Range:</b> 16 - 25</p>
                    <p><b>Gender:</b> Primarily female</p>
                    <p><b>Location:</b> North America</p>
                    <p><b>Occupation/Industry:</b> Students, young professionals, beauty enthusiasts</p>
                    <p><b>Education Level:</b> High school, college, or early career stage</p>
                    <p><b>Psychographics:</b> Trend-conscious, socially active individuals who value skincare as part of their self-care routine. They seek high-quality, gentle, and aesthetically pleasing products that reflect their youthful and sophisticated lifestyle.</p>
                </div>
            </div>

            <div class="emoji-des-con-mobile">
                <div class="emoji-con-mobile">
                    <img src="images/indian-girl.png" alt="Indian girl image">
                    <img src="images/white-girl-makeup.png" alt="White girl image">
                    <img src="images/muslim-woman.png" alt="Muslim woman image">
                    <img src="images/black-girl-makeup.png" alt="Black girl image">
                </div>

                <div class="des-con col-span-full blue-box">
                    <p><b>Age Range:</b> 16 - 25</p>
                    <p><b>Gender:</b> Primarily female</p>
                    <p><b>Location:</b> North America</p>
                    <p><b>Occupation/Industry:</b> Students, young professionals, beauty enthusiasts</p>
                    <p><b>Education Level:</b> High school, college, or early career stage</p>
                    <p><b>Psychographics:</b> Trend-conscious, socially active individuals who value skincare as part of their self-care routine. They seek high-quality, gentle, and aesthetically pleasing products that reflect their youthful and sophisticated lifestyle.</p>
                </div>
            </div>
        </section>

        <!-- Branding Title -->
        <div class="heading-line">
                <h2 class="Heading">Branding<img src="images/design-heading.png" alt="" class="icon"></h2>
                <div class="line"></div>
        </div>

        <!-- Rewrite it -->
        <!-- Design Principle -->
        <section id="design-principal-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Design Principal</h2>
            <div class="col-span-full">
                <div id="design-principal-box">
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Feminine</h3>
                        <p>Utilize soft, feminine tones (#FF8888, #FFC7C7, #201D26) to create a vibrant and feminine brand identity.</p>
                    </div>
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Harmonious</h3>
                        <p>Ensure typography and visuals align with the brand’s delicate and modern aesthetic, using a refined cursive font for the logo.</p>
                    </div>
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Natural</h3>
                        <p>Maintain clean layouts, subtle design elements, and an intuitive user experience to enhance brand clarity and appeal.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Logo Specs -->
        <section id="logo-specs-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Logo Specs</h2>
            <div class="col-span-full col-span-full m-col-span-6 m-col-start-1">
                <div id="logo-specs-img-box">
                    <img src="<?php echo $images[2]; ?>" alt="logo specs for quatro">
                </div>
             </div>

            <div id="logo-specs-detail-box" class="col-span-full col-span-full m-col-span-6 m-col-start-8">
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Typography</h3>
                    <p>The "elin" logo is styled in an elegant cursive script font with a floral accent, enhancing its delicate and premium aesthetic.</p>
                </div>
                <br>
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Colour</h3>
                    <p>The primary colors include #FF8888 (soft coral), #FFC7C7 (blush pink), and #201D26 (deep charcoal) to evoke warmth, femininity, and luxury.</p>
                </div>
                <br>
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Scalability</h3>
                    <p>The "elin" logo maintains clarity and visual balance across various sizes, from 0.25 inches to 2 inches, ensuring consistent branding across digital and print media.</p>
                </div>
            </div>
        </section>

        <!-- Package Design -->
        <section id="label-design-con" class="grid-con">
        <h2 class="sub-heading col-span-full">Package Design</h2>
            <img class="col-span-full m-col-span-6 m-col-start-1" src="images/package-1.png" alt="Elin package 1">
            <img class="col-span-full m-col-span-6 m-col-start-8" src="images/package-2.png" alt="Elin package 2">
            <img class="col-span-full m-col-span-6 m-col-start-1" src="images/package-3.png" alt="Elin package 3">
            <img class="col-span-full m-col-span-6 m-col-start-8" src="images/package-4.png" alt="Elin package 4">
        </section>

        <!-- Print Ads -->
        <section id="poster-can-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Prind Ads</h2>
            <div id="quatro-posters-con" class="col-span-full m-col-span-6 m-col-start-1">
                <img src="images/elin-print-1.png" alt="Quatro Poster 1">
            </div>

            <div id="quatro-can-con" class="col-span-full m-col-span-6 m-col-start-8">
                <img src="images/elin-print-2.png" alt="Quatro Can Pineapple">
            </div>
        </section>

        <!-- Instagram -->
        <!--<section id="poster-can-con" class="grid-con">-->
        <!--    <h2 class="sub-heading col-span-full">Instagram Banners</h2>-->
        <!--    <div id="quatro-posters-con" class="col-span-full m-col-span-6 m-col-start-1">-->
        <!--        <img src="images/elin-print-1.png" alt="Quatro Poster 1">-->
        <!--    </div>-->

        <!--    <div id="quatro-can-con" class="col-span-full m-col-span-6 m-col-start-8">-->
        <!--        <img src="images/elin-print-2.png" alt="Quatro Can Pineapple">-->
        <!--    </div>-->
        <!--</section>-->

        <!-- Facebook -->
        <!--<section id="poster-can-con" class="grid-con">-->
        <!--    <h2 class="sub-heading col-span-full">Facebook Banners</h2>-->
        <!--    <div id="quatro-posters-con" class="col-span-full m-col-span-6 m-col-start-1">-->
        <!--        <img src="images/elin-print-1.png" alt="Quatro Poster 1">-->
        <!--    </div>-->

        <!--    <div id="quatro-can-con" class="col-span-full m-col-span-6 m-col-start-8">-->
        <!--        <img src="images/elin-print-2.png" alt="Quatro Can Pineapple">-->
        <!--    </div>-->
        <!--</section>-->

        <!-- Wireframes -->
        <!-- <section id="wireframingSketches" class="grid-con">
            <h2 class="sub-heading col-span-full">Wireframing</h2>
            <div class="col-span-full">
                <img src="<?php echo $images[2]; ?>" alt="wireframes of quatro">
            </div>
        </section> -->
    </div>

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
