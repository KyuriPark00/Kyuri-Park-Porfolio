<?php
require_once('includes/connect.php');

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 7";
$projectStmt = $connection->prepare($projectQuery);
$projectStmt->execute();
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 7";
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
        <img src="<?php echo $images[1]; ?>" alt="hero image of quatro">

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
                    ['image' => 'images/3.png', 'title' => 'Branding Video', 'description' => 'Produced and edited a video highlighting key features with motion graphics and music.']
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
                <p>The goal was to establish a strong brand identity for Quatro, a carbonated tropical drink. While designed for all age groups, the primary focus was on athletes and physical workers. The branding utilized vibrant colors and real fruit imagery to enhance its energetic and refreshing appeal.</p>
            </div>

            <div class="target-audience-con">
            <h3 class="sub-heading">Target Audience</h3>

            <div class="emoji-des-con-desktop grid-con">
                <div class="emoji-con-desktop m-col-start-1 m-col-end-4">
                    <div class="emoji-grid">
                        <img src="images/athlete-man.png" alt="Athlete man image">
                        <img src="images/sport-girl.png" alt="Athlete woman image">
                        <img src="images/student-boy.png" alt="Student boy image">
                        <img src="images/blue-collar.png" alt="Blue collar worker image">
                    </div>
                </div>

                <div class="des-con blue-box m-col-start-4 m-col-end-14">
                    <p><b>Age Range:</b> 13-40</p>
                    <p><b>Gender:</b> All</p>
                    <p><b>Location:</b> North America</p>
                    <p><b>Occupation/Industry:</b> Sports, leisure, construction</p>
                    <p><b>Education Level:</b> All</p>
                    <p><b>Psychographics:</b> Active and health-conscious individuals who enjoy refreshing, energizing beverages. They seek convenience, bold flavors, and products that complement their active lifestyle.</p>
                </div>
            </div>

            <div class="emoji-des-con-mobile">
                <div class="emoji-con-mobile">
                    <img src="images/athlete-man.png" alt="Athlete man image">
                    <img src="images/sport-girl.png" alt="Athlete woman image">
                    <img src="images/student-boy.png" alt="Student boy image">
                    <img src="images/blue-collar.png" alt="Blue collar worker image">
                </div>

                <div class="des-con col-span-full blue-box">
                    <p><b>Age Range:</b> 13-40</p>
                    <p><b>Gender:</b> All</p>
                    <p><b>Location:</b> North America</p>
                    <p><b>Occupation/Industry:</b> Sports, leisure, construction</p>
                    <p><b>Education Level:</b> All</p>
                    <p><b>Psychographics:</b> Active and health-conscious individuals who enjoy refreshing, energizing beverages. They seek convenience, bold flavors, and products that complement their active lifestyle.</p>
                </div>
            </div>
        </section>

        <!-- Branding Title -->
        <div class="heading-line">
                <h2 class="Heading">Branding<img src="images/design-heading.png" alt="" class="icon"></h2>
                <div class="line"></div>
        </div>

        <!-- Design Principle -->
        <section id="design-principal-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Design Principal</h2>
            <div class="col-span-full">
                <div id="design-principal-box">
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Tropical</h3>
                        <p>Use vibrant, adaptable colors (e.g., #7ED957, #39B54A, #00338C) for a lively, flavor-specific vibe across the website and branding.</p>
                    </div>
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Consistent</h3>
                        <p>Apply 'Bubbley Neue' font throughout the logo, website text, and branding for a unified, playful identity.</p>
                    </div>

                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Clear</h3>
                        <p>Ensure clean layouts, white space, simple language, and intuitive navigation for an engaging and trustworthy user experience.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Logo Specs -->
        <section id="logo-specs-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Logo Specs</h2>
            <div class="col-span-full col-span-full m-col-span-6 m-col-start-1">
                <div id="logo-specs-img-box">
                    <img src="<?php echo $images[3]; ?>" alt="logo specs for quatro">
                </div>
             </div>

            <div id="logo-specs-detail-box" class="col-span-full col-span-full m-col-span-6 m-col-start-8">
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Shape</h3>
                    <p>Create the "Q" logo using the font 'Bubbley Neue' to maintain consistency with the rest of the text. Ensure that the "quatro" text within the logo is also in the same font.</p>
                </div>

                <br>

                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Colour</h3>
                    <p>#7ED957(light green), #39B54A(darker green), #00338C(navy) are the main color for the logo but they could be changed based on the flavours of the drink.</p>
                </div>
            </div>
        </section>

        <!-- Label Design -->
        <section id="label-design-con" class="grid-con">
        <h2 class="sub-heading col-span-full">Label Design</h2>
            <img class="col-span-full m-col-span-6 m-col-start-1" src="images/label-1.jpg" alt="Quatro label 1">
            <img class="col-span-full m-col-span-6 m-col-start-8" src="images/label-2.jpg" alt="Quatro label 1">
            <img class="col-span-full m-col-span-6 m-col-start-1" src="images/label-3.jpg" alt="Quatro label 1">
            <img class="col-span-full m-col-span-6 m-col-start-8" src="images/label-4.jpg" alt="Quatro label 1">
        </section>

        <!-- Posters & Can -->
        <section id="poster-can-con" class="grid-con">
            <div id="quatro-posters-con" class="col-span-full m-col-span-6 m-col-start-1">
                <h2 class="sub-heading">Posters</h2>
                <img src="images/limeposter.png" alt="Quatro Poster 1">
            </div>

            <div id="quatro-can-con" class="col-span-full m-col-span-6 m-col-start-8">
                <h2 class="sub-heading">Can Design</h2>
                <img src="images/can-image.png" alt="Quatro Can Pineapple">
            </div>
        </section>

        <!-- Website  -->
        <div class="heading-line">
                <h2 class="Heading">Website<img src="images/design-heading.png" alt="" class="icon"></h2>
                <div class="line"></div>
        </div>

        <!-- UX UI --> 
        <section id="ux-ui-con" class="grid-con">
            <h2 class="sub-heading col-span-full">UX UI - Key Features</h2>

            <div class="project-section col-span-full m-col-span-7 m-col-start-1">
                <video id="project-video" class="hidden-video" autoplay loop muted playsinline>>
                    <source src="<?php echo $video[1]; ?>" type="video/mp4">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
            </div>
                        
            <div id="ux-ui-des" class="col-span-full m-col-span-5 m-col-start-9">
                <h3 class="ux-ui-des-h3">Home</h3>
                <ul>
                    <li><b>Hero Animation:</b> Smooth CSS animations bring elements to life.</li>
                    <li><b>Gallery Slider:</b> Interactive JavaScript-powered poster showcase.</li>
                    <li><b>Lazy Loading:</b> Improves performance with optimized images.</li>
                </ul>

                <h3 class="ux-ui-des-h3">Flavour</h3>
                <ul>
                    <li><b>Image Toggle:</b> 'Back' button allows toggling between front and back images of the flavours.</li>
                    <li><b>Nutrition Display:</b> 'View Nutrition' button triggers a pop-up or modal with the flavour's nutrition information.</li>
                    <li><b>Promotion Interaction:</b> 'Promo' button triggers an overlay that displays current promotions.</li>
                </ul>

                <!-- <h3 class="ux-ui-des-h3">Products</h3>
                <ul>
                    <li><b>Hero:</b>Using css animation to </li>
                    <li><b>Dropdown box</b>Poster Gallery using javascript</li>
                </ul>

                <h3 class="ux-ui-des-h3">Contact</h3>
                <ul>
                    <li><b></b>Using css animation to </li>
                    <li><b>Gallery Slider</b>Poster Gallery using javascript</li>
                </ul>   -->
            </div>
        </section>      

        <!-- Devices -->
        <section id="devices-con" class="grid-con">
            <div class="col-span-full">
                <h2 class="sub-heading">Devices</h2>
                <h3 class="device-top-h3">Creating designs optimized for various devices, including mobile <span>phones,</span> <span>tablets,</span> and <span>web platforms.</span></h3>
                <div id="devices-con-img-box">
                    <img src="<?php echo $images[4]; ?>" alt="images of quatro page by devices">
                </div>

                <h2 class="entry-point">Web - Entry Points</h2>
                <h3 class="entry-point-h3"><?php echo $project['entry_point_h3']; ?></h3>
                <p><?php echo $project['entry_point_p']; ?></p>
            </div>
        </section>

        <!-- Wireframes -->
        <section id="wireframingSketches" class="grid-con">
            <h2 class="sub-heading col-span-full">Wireframing</h2>
            <div class="col-span-full">
                <img src="<?php echo $images[2]; ?>" alt="wireframes of quatro">
            </div>
        </section>

        <!-- Branding Video -->
        <!-- <section id="branding-video-con" class="grid-con">
            <div class="col-span-full">
                <h2 class="sub-heading">Branding Video</h2>
                <div id="player-container">
                    <video class="player" controls preload="metadata" poster="<?php echo $images[5]; ?>">
                        <source src="<?php echo $video[0]; ?>" type="video/mp4">
                        <p>Uh Oh, your browser does not support this Video!</p>
                    </video>
                </div>
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
