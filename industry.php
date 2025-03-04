<?php
require_once('includes/connect.php');  // Database connection

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 3";
$projectStmt = $connection->prepare($projectQuery);
$projectStmt->execute();
$project = $projectStmt->fetch(PDO::FETCH_ASSOC);

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 3";
$mediaStmt = $connection->prepare($mediaQuery);
$mediaStmt->execute();

// Store media dat in arrays
$images = [];
$videos = [];
while ($media = $mediaStmt->fetch(PDO::FETCH_ASSOC)) {
    if ($media['type'] == 'image') {
        $images[] = $media['file_path'];
    } elseif ($media['type'] == 'video') {
        $videos[] = $media['file_path'];
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
    <h1 class="hidden">Industry Night Details</h1>

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
        <!-- Hero Section -->
         <!-- Hero Image -->
         <section id="quatro-hero">
        <img src="<?php echo $images[0]; ?>" alt="hero image of quatro">
        <?php if (!empty($project['github_link'])): ?>
            <a href="<?php echo $project['github_link']; ?>" target="_blank">
                <button>Github Repo</button>
            </a>
        <?php endif; ?>
        </section>

        <!-- Project Details -->
        <section id="industry-details-con">
            <div id="industry-details">
                <h2 class="Heading"><?php echo $project['title']; ?></h2>
                <h3><?php echo $project['subtitle']; ?></h3>
                <p><?php echo $project['description']; ?></p>
            </div>
            <div id="industry-team-year">
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

        <!-- What I Did Section -->
        <section id="what-I-did-con" class="grid-con">
            <h2 class="Heading col-span-full">What I did</h2>
            <div class="what-I-did col-span-full">
                <div id="front-end">
                    <img src="images/2.png" alt="front-end-icon">
                    <div><b>Front-End Development (HTML, CSS, JS):</b> Built responsive web pages, styled layouts, and added interactivity.</div>
                </div>
            </div>
        </section>

        <!-- Devices Section -->
        <section id="devices-con">
            <h2 class="Heading">Devices</h2>
            <h3>Creating designs optimized for various devices, including mobile <span>phones,</span> <span>tablets,</span> and <span>web platforms.</span></h3>
            <div id="devices-con-img-box">
                <img src="<?php echo $images[1]; ?>" alt="images of industry night on devices">
            </div>

            <h2 class="entry-point">Web - Entry Points</h2>
            <h3 class="entry-point-h3"><?php echo $project['entry_point_h3']; ?></h3>
            <p><?php echo $project['entry_point_p']; ?></p>
        </section>

        <!-- Wireframes Section -->
        <section id="wireframingSketches">
            <h2 class="Heading">Wireframing</h2>
            <div>
                <img src="<?php echo $images[2]; ?>" alt="wireframes of industry night">
            </div>
        </section>

        <!-- Promotional Video Section -->
        <section id="branding-video-con">
            <h2 class="Heading">Industry Night - Promotional Video</h2>
            <div id="player-container" class="col-span-full m-col-start1 m-col-end-7">
                <video class="player" controls preload="metadata" poster="images/industry-night-thumbnail.jpg">
                    <source src="video/Hackathon-Video-Draft.webm" type="video/mp4">
                    <source src="video/Hackathon-Video-Draft.mp4" type="video/webm">
                    <p>Uh Oh, your browser does not support this Video!</p>
                </video>
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

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
