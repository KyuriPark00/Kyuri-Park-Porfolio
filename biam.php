<?php
require_once('includes/connect.php');

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 1";
$projectStmt = $connection->prepare($projectQuery);
$projectStmt->execute();
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 1";
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
        <img src="<?php echo $images[6]; ?>" alt="hero image of quatro">

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
                    ['image' => 'images/4.png', 'title' => 'Project Management', 'description' => 'Lead the Brothers in Arms project by managing timelines, delegating tasks, and ensuring smooth communication to drive our team toward success.'],
                    ['image' => 'images/2.png', 'title' => 'Front-End Development (HTML, CSS, JS)', 'description' => 'Built responsive web pages, styled layouts, and added interactivity.']
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
                <p>The Brothers in Arms Memorial is about honoring the deep connection between Indian and Canadian soldiers who fought side by side during World War I. Our goal is to bring their stories to life through a powerful brand identity and a compelling marketing campaign that raises awareness, drives donations, and ensures their sacrifices are never forgotten.</p>
                <br>
                <h3>To achieve this, we:</h3>
                <ul>
                    <li>Created a strong and meaningful brand that connected with people on an emotional level.</li>
                    <li>Built an engaging website and social media presence to share their history in an accessible and impactful way.</li>
                    <li>Developed promotional materials—videos, infographics, and print media—that inspired action and support.</li>
                    <li>Used strategic marketing to encourage public engagement and fundraising efforts for the memorial’s construction.</li>
                    <li>Passed on the values of courage, unity, and freedom to future generations through storytelling and education.</li>
                </ul>
            </div>

            <div class="target-audience-con">
            <h3 class="sub-heading">Target Audience</h3>

            <div class="emoji-des-con-desktop grid-con">
                <div class="emoji-con-desktop m-col-start-1 m-col-end-4">
                    <div class="emoji-grid">
                        <img src="images/canadian-soldier.png" alt="Soldier image">
                        <img src="images/lady.png" alt="Lady image">
                        <img src="images/turban-guy.png" alt="Indian man image">
                        <img src="images/old-man.png" alt="Old man image">
                    </div>
                </div>

                <div class="des-con blue-box m-col-start-4 m-col-end-14">
                    <p><b>Age Range:</b> 20-65</p>
                    <p><b>Gender:</b> All</p>
                    <p><b>Location:</b> Canada, India</p>
                    <p><b>Occupation/Industry:</b> History enthusiasts, military personnel, educators, and nonprofit supporters</p>
                    <p><b>Education Level:</b> All</p>
                    <p><b>Psychographics:</b> People who value history, remembrance, and supporting meaningful causes.</p>
                </div>
            </div>

            <div class="emoji-des-con-mobile">
                <div class="emoji-con-mobile">
                    <img src="images/canadian-soldier.png" alt="Soldier image">
                    <img src="images/lady.png" alt="Lady image">
                    <img src="images/turban-guy.png" alt="Indian man image">
                    <img src="images/old-man.png" alt="Old man image">
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
                        <h3 class="mini-heading">Historical Authenticity</h3>
                        <p>Use a neutral and sepia-toned palette reminiscent of aged documents and wartime photography to create an immersive historical experience.</p>
                    </div>
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Timeless Elegance</h3>
                        <p>Incorporate classic serif typography and balanced layouts to evoke a sense of reverence and remembrance.</p>
                    </div>
                    <div class="design-principal blue-box">
                        <h3 class="mini-heading">Emotional Connection</h3>
                        <p>Blend archival imagery, textured backgrounds, and subtle animations to foster a deep emotional connection with the audience.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Logo Specs -->
        <section id="logo-specs-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Logo Specs</h2>
            <div class="col-span-full col-span-full m-col-span-6 m-col-start-1">
                <div id="logo-specs-img-box">
                    <img src="<?php echo $images[1]; ?>" alt="logo specs for quatro">
                </div>
             </div>

             <div id="logo-specs-detail-box" class="col-span-full col-span-full m-col-span-6 m-col-start-8">
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Logo Structure</h3>
                    <p>The logo consists of a symmetrical emblem combined with a serif typeface. The emblem features a circular floral-inspired design with a central maple leaf, reinforcing the brand’s heritage and elegance.</p>
                </div>
                <br>
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Typography</h3>
                    <p>A classic serif font is used for "BROTHERS IN ARMS MEMORIAL" to maintain a timeless and formal appearance. Font scaling ensures readability at various sizes.</p>
                </div>
                <br>
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Sizing & Proportions</h3>
                    <p>The logo is optimized for various display sizes, with the ideal web usage being <strong>220px x 87px</strong>. It maintains clarity even at a minimum size of <strong>154px x 61px</strong>. Proper whitespace around the logo enhances visibility and balance.</p>
                </div>
                <br>
                <div class="logo-specs-detail">
                    <h3 class="mini-heading">Color Scheme</h3>
                    <p>The logo is designed in a monochromatic black-and-white scheme, ensuring high contrast and versatility across different backgrounds and materials.</p>
                </div>
            </div>
        </section>

        <!-- Campaign & Merch -->
        <section id="label-design-con" class="grid-con">
        <h2 class="sub-heading col-span-full">Campaign & Merchandise</h2>
            <img class="col-span-full m-col-span-6 m-col-start-1" src="images/biam-goods-1.png" alt="Goods or biam 1">
            <img class="col-span-full m-col-span-6 m-col-start-8" src="images/biam-goods-2.png" alt="Goods or biam 2">
            <img class="col-span-full m-col-span-6 m-col-start-1" src="images/biam-goods-3.png" alt="Goods or biam 3">
            <img class="col-span-full m-col-span-6 m-col-start-8" src="images/biam-goods-4.png" alt="Goods or biam 4">
        </section>

        <!-- Posters & Parallax -->
        <section id="biam-poster-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Print Ads</h2>
            <div class="col-span-full m-col-span-full">
                <img src="images/biam-posters.png" alt="Posters of BIAM">
            </div>
        </section>

        <!-- Social media -->
        <section id="social-media-con" class="grid-con">
            <h2 class="sub-heading col-span-full">Social Media Presents</h2>
            <div id="biam-ig" class="col-span-full">
                <h3>Instagram</h3>
                <img src="images/biam-ig.png" alt="Biam ig image">
            </div>

            <div id="biam-fb" class="col-span-full">
                <h3>Facebook</h3>
                <img src="images/biam-facebook.png" alt="Biam facebook image">
            </div>
        </section>

        <!-- Website -->
        <div class="heading-line">
                <h2 class="Heading">Website<img src="images/design-heading.png" alt="" class="icon"></h2>
                <div class="line"></div>
        </div>

        <!-- Wireframes -->
        <section id="wireframingSketches" class="grid-con">
                <h2 class="sub-heading col-span-full">Wireframing</h2>
                <div class="col-span-full" id="biam-wireframe-img">
                    <img src="<?php echo $images[7]; ?>" alt="wireframes of quatro">
                </div>
        </section>

        <!-- UX UI --> 
        <section id="ux-ui-con" class="grid-con">
            <h2 class="sub-heading col-span-full">UX UI - Key Features</h2>

            <div class="project-section col-span-full m-col-span-7 m-col-start-1">
                <video class="project-video" class="hidden-video" autoplay loop muted playsinline>>
                    <source src="<?php echo $video[0]; ?>" type="video/mp4">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
            </div>
                        
            <div id="ux-ui-des" class="col-span-full m-col-span-5 m-col-start-9">
                <h3 class="ux-ui-des-h3">Home</h3>
                <ul>
                    <li><b>Parallax Animation:</b> The hero image uses layered elements to create depth and smooth animation</li>
                    <li><b>Readability:</b> Adjustable font size for easier reading</li>
                    <li><b>Accessibility:</b> Selected text can be read aloud for better accessibility</li>
                    <li><b>Contact Form:</b> Can select subject based on divers inqueries</li>
                    <li><b>Contact Form:</b> Lets users choose a subject based on different inquiries</li>
                </ul>
            </div>

            <!-- Second ux ui section -->
            <div class="project-section col-span-full m-col-span-7 m-col-start-1">
                <video class="project-video" class="hidden-video" autoplay loop muted playsinline>>
                    <source src="<?php echo $video[1]; ?>" type="video/mp4">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
            </div>
                        
            <div id="ux-ui-des" class="col-span-full m-col-span-5 m-col-start-9">
                <h3 class="ux-ui-des-h3">History</h3>
                <ul>
                    <li><b>Interactive Yellow Line:</b> As you scroll, the yellow line in the middle extends, enhancing the visual flow of the page.</li>
                    <li><b>Battle Image and Description:</b> On either side of the yellow line, each battle image and its description transition from black and white to full color. They grow larger and become sharper as they appear on the screen.</li>
                    <li><b>Chronological Order:</b> As you continue scrolling, more battles and their details are revealed in order, arranged chronologically from top to bottom.</li>
                </ul>
            </div>
        </section> 

        <!-- Devices -->
        <section id="devices-con" class="grid-con">
            <div class="col-span-full">
                <h2 class="sub-heading">Devices</h2>
                <h3 class="device-top-h3">Creating designs optimized for various devices, including mobile <span>phones,</span> <span>tablets,</span> and <span>web platforms.</span></h3>
                <div id="devices-con-img-box">
                    <img src="<?php echo $images[8]; ?>" alt="images of vybe page by devices">
                </div>

                <h2 class="entry-point">Web - Entry Points</h2>
                <h3 class="entry-point-h3"><?php echo $project['entry_point_h3']; ?></h3>
                <p><?php echo $project['entry_point_p']; ?></p>
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

  <script type="module" src="js/biam.js"></script>
</body>
</html>
