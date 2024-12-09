<?php
// Include the database connection
include('includes/connect.php');

// Fetch projects from the database
$query_projects = "SELECT * FROM projects ORDER BY year DESC";
$projects_result = $conn->query($query_projects);

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
  <title>Kyuri Park</title>
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

  <!-- Profile Section -->
  <section id="profile-box" class="grid-con">
    <div class="col-start-1 col-end-6 m-col-start-3 m-col-end-12 l-col-start-3 l-col-end-12">
      <h2>It’s Kyuri,<br>Your Favorite Front-end Developer!</h2>
    </div>
  </section>

  <section id="demo-reel-con" class="grid-con">
      <div id="player-container" class="col-span-full m-col-start1 m-col-end-7">
        <video class="player" controls preload="metadata" poster="images/demoreel-thumnail.jpg">
          <source src="video/2024-demoreel.mp4" type="video/mp4">
          <p>Uh Oh, your browser does not support this Video!</p>
        </video>
      </div> 

      <div id="demo-reel-description" class="col-span-full m-col-start-8 m-col-end-14">
        <h2>2024 Demo Reel</h2>
        <p>Based in London, ON. Looking for a captivating website? My goal is to create sites that are both visually appealing and easy to navigate. Let’s work together!</p>
        <div id="social-media-con">
          <a href="#"><button>Github</button></a>
          <a href="#"><button>Instagram</button></a>
          <a href="#"><button>LinkedIn</button></a>
        </div>
      </div>
    </section>

    <section id="projects-box" class="grid-con">
        <h2 id="project-heading" class="col-span-full">Case Study</h2>
        <?php
        $project_links = [
            1 => 'quatro.php',    // Quatro
            2 => 'vybe.php',      // Vybe
            3 => 'industry.php',  // Industry Night
            4 => 'demoreel.php'   // Demo Reel
        ];

        $column_counter = 1;

        while ($project = $projects_result->fetch_assoc()) {
            $media_query = "SELECT * FROM media WHERE project_id = " . $project['id'];
            $media_result = $conn->query($media_query);

            $thumbnail = 'images/default-thumbnail.jpg'; // Default thumbnail
            while ($media = $media_result->fetch_assoc()) {
                if ($media['type'] === 'image') {
                    $thumbnail = $media['file_path'];
                    break;
                }
            }

            // Get the project link based on project ID
            $project_link = $project_links[$project['id']] ?? '#';

            $grid_start = ($column_counter % 2 === 1) ? 1 : 8;
            $grid_end = ($column_counter % 2 === 1) ? 7 : 14;

            echo '<div class="col-span-full m-col-start-' . $grid_start . ' m-col-end-' . $grid_end . '">';
            echo '<a href="' . $project_link . '" class="project_link">';
            echo '<img class="thumbnail_image" src="' . $thumbnail . '" alt="Thumbnail of ' . $project['title'] . '">';
            echo '<div class="overlay">';
            echo '<h3 class="title">' . $project['title'] . '</h3>';
            echo '<p class="short_description">' . $project['short_description'] . '</p>';
            echo '</div></a></div>';

            $column_counter++;
        }
        ?>
    </section>

  <!-- Resume Section -->
  <section id="resume">
    <h2>Thank You</h2>
    <a href="files/resume.pdf" download="Kyuri_Park_Resume.pdf" class="download-btn">Download Resume</a>
  </section>

  <div class="grid-con">
    <button class="col-span-full" id="top-button">
      <img src="images/top-button.png" alt="top button">
    </button>
  </div>
  
  <footer>
    <p>© 2024 Kyuri Park. All Rights Reserved.</p>
    <a href="#">
      <img src="images/linkedin.svg" alt="LinkedIn icon">
    </a>
  </footer>

  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
