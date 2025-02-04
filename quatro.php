<?php
require_once('../includes/connect.php');

// Query to get project data
$projectQuery = "SELECT * FROM projects WHERE id = 1";
$projectResult = $conn->query($projectQuery);
$project = $projectResult->fetch_assoc();

// Query to get media data for the project
$mediaQuery = "SELECT * FROM media WHERE project_id = 1";
$mediaResult = $conn->query($mediaQuery);

// Store media data in arrays
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/grid.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title><?php echo $project['title']; ?> Details</title>
</head>
<body>
    <h1 class="hidden">Kyuri Park Portfolio</h1>
    <!-- Main Nav -->
    <header>
      <div id="logo"><a href="index.php"><img src="images/logo_thin.png" alt="logo"></a></div>
      <button id="hamburger">&#9776;</button>

      <nav id="desktop-nav">
          <ul>
              <li><a href="index.php">Projects</a></li>
              <li><a href="articles.php">Articles</a></li>
              <li><a href="contact.php">Contact</a></li>
          </ul>
      </nav>
    </header>
    <div id="menu" class="overlay">
      <button id="close">&times;</button>
      <nav>
          <ul>
              <li><a href="index.php">Projects</a></li>
              <li><a href="articles.php">Articles</a></li>
              <li><a href="contact.php">Contact</a></li>
          </ul>
      </nav>
    </div>

    
    <div class="case-study-body">
        <!-- Hero Image -->
        <section id="quatro-hero">
        <img src="<?php echo $images[1]; ?>" alt="hero image of quatro">
        <?php if (!empty($project['github_link'])): ?>
            <a href="<?php echo $project['github_link']; ?>" target="_blank">
                <button>Github Repo</button>
            </a>
        <?php endif; ?>
        </section>

        <!-- Project Details -->
        <section id="quatro-details-con">
            <div id="quatro-details">
                <h2 class="Heading"><?php echo $project['title']; ?></h2>
                <h3><?php echo $project['subtitle']; ?></h3>
                <p><?php echo $project['description']; ?></p>
            </div>
            <div id="quatro-team-year">
                <div id="quatro-team">
                    <h2>Team</h2>
                    <p><?php echo $project['team']; ?></p>
                </div>
                <div id="quatro-year">
                    <h2>Year</h2>
                    <p><?php echo $project['year']; ?></p>
                </div>
            </div>
        </section>

        <!-- What I Did Section -->
        <section id="what-I-did-con" class="grid-con">
            <h2 class="Heading col-span-full">What I did</h2>
            <?php
            // Repeat the tasks dynamically
            $tasks = [
                ['image' => 'images/2.png', 'title' => 'Front-End Development (HTML, CSS, JS)', 'description' => 'Built responsive web pages, styled layouts, and added interactivity.'],
                ['image' => 'images/1.png', 'title' => 'Logo Design', 'description' => 'Designed a brand logo reflecting the target audience and identity.'],
                ['image' => 'images/1.png', 'title' => 'Web Design', 'description' => 'Developed a cohesive design system and user-friendly interface.'],
                ['image' => 'images/1.png', 'title' => 'Label Design', 'description' => 'Created product labels with branding elements and essential details.'],
                ['image' => 'images/3.png', 'title' => 'Promotional Video', 'description' => 'Produced and edited a video highlighting key features with motion graphics and music.']
            ];
            foreach ($tasks as $task) {
                echo '<div class="what-I-did col-span-full">';
                echo '<div id="front-end">';
                echo '<img src="' . $task['image'] . '" alt="front-end-icon">';
                echo '<div><b>' . $task['title'] . ':</b> ' . $task['description'] . '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </section>

        <!-- Design Principle Section -->
        <section id="design-principal-con">
            <h2 class="Heading">Design Principal</h2>
            <div id="design-principal-box">
                <div class="design-principal">
                    <h3>Tropical</h3>
                    <p>Use vibrant, adaptable colors (e.g., #7ED957, #39B54A, #00338C) for a lively, flavor-specific vibe across the website and branding.</p>
                </div>
                <div class="design-principal">
                    <h3>Consistent</h3>
                    <p>Apply 'Bubbley Neue' font throughout the logo, website text, and branding for a unified, playful identity.</p>
                </div>
                <div class="design-principal">
                    <h3>Clear</h3>
                    <p>Ensure clean layouts, white space, simple language, and intuitive navigation for an engaging and trustworthy user experience.</p>
                </div>
            </div>
        </section>

        <!-- Logo Specs Section -->
        <section id="logo-specs-con">
            <h2 class="Heading">Logo Specs</h2>
            <div id="logo-specs-img-box">
                <img src="<?php echo $images[3]; ?>" alt="logo specs for quatro">
            </div>
            <div id="logo-specs-detail-box">
                <div class="logo-specs-detail">
                    <h3>Shape:</h3>
                    <p>Create the "Q" logo using the font 'Bubbley Neue' to maintain consistency with the rest of the text. Ensure that the "quatro" text within the logo is also in the same font.</p>
                </div>
                <div class="logo-specs-detail">
                    <h3>Colour</h3>
                    <p>#7ED957(light green), #39B54A(darker green), #00338C(navy) are the main color for the logo but they could be changed based on the flavours of the drink.</p>
                </div>
            </div>
        </section>

        <!-- Devices Section -->
        <section id="devices-con">
            <h2 class="Heading">Devices</h2>
            <h3>Creating designs optimized for various devices, including mobile <span>phones,</span> <span>tablets,</span> and <span>web platforms.</span></h3>
            <div id="devices-con-img-box">
                <img src="<?php echo $images[5]; ?>" alt="images of quatro page by devices">
            </div>

            <h2 class="entry-point">Web - Entry Points</h2>
            <h3 class="entry-point-h3"><?php echo $project['entry_point_h3']; ?></h3>
            <p><?php echo $project['entry_point_p']; ?></p>
        </section>

        <!-- Wireframes Section -->
        <section id="wireframingSketches">
            <h2 class="Heading">Wireframing</h2>
            <div>
                <img src="<?php echo $images[2]; ?>" alt="wireframes of quatro">
            </div>
        </section>

        <!-- Branding Video Section -->
        <section id="branding-video-con">
            <h2 class="Heading">Quatro - Branding Video</h2>
            <div id="player-container">
                <video class="player" controls preload="metadata" poster="<?php echo $images[4]; ?>">
                    <source src="<?php echo $video[0]; ?>" type="video/mp4">
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
