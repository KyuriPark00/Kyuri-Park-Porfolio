<?php
include('includes/connect.php');

// Fetch projects from the database 데이터베이스에서 프로젝트 테이블 페치!
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
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <title>Kyuri Park</title>
</head>
<body>
  <h1 class="hidden">Kyuri Park Portfolio</h1>

 <!-- Main Nav -->
 <header>
      <div id="logo"><a href="#"><img src="images/logo_thin.png" alt="logo"></a></div>
      <button id="hamburger">&#9776;</button>

      <nav id="desktop-nav">
          <ul>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Articles</a></li>
              <li><a href="#">Contact</a></li>
          </ul>
      </nav>
  </header>
  <d iv id="menu" class="overlay">
      <button id="close">&times;</button>
      <nav>
          <ul>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Articles</a></li>
              <li><a href="#">Contact</a></li>
          </ul>
      </nav>
  </d>

  <!-- Profile Con -->
  <section id="profile-con" class="grid-con">
    <div class="col-start-1 col-end-6 m-col-start-3 m-col-end-12 l-col-start-3 l-col-end-12">
      <h2>It’s Kyuri,<br>Your Designer, Software Engineer</h2>
      <h3>Designing with purpose, developing with precision.</h3>

      <div id="professional-sns-box">
          <a href="https://github.com/KyuriPark00?tab=repositories"><button>Github</button></a>
          <a href="files/resume.pdf" download="Kyuri_Park_Resume.pdf" class="download-btn"><button>Resume</button></a>
          <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/"><button>LinkedIn</button></a>
          <a href="demoreel.php"><button>Demoreel</button></a>
      </div>
    </div>
  </section>

  <!-- About Con -->
  <section id="about-con">
    <div id="full-name-box"><i>Kyuri Hailie Park</i></div>

    <div id="profile-pic-box">
      <img src="images/profilePicTransparentBG2.png" alt="Profile picture">
      <div id="profile-text-mobile">
        <div id="social-media">
          <span>fa</span>
          <span>ig</span>
          <span>in</span>
        </div>
        <p>I believe that a great developer should also have a strong artistic sense,</p>
        <p>so you’re looking for someone with a creative edge, you’re in the right place!</p>
      </div>
    </div>

    <div id="profile-text-desktop">
        <div id="social-media">
            
        </div>
        <p>I believe that a great developer should also have a strong artistic sense,</p>
        <p>so you’re looking for someone with a creative edge, you’re in the right place!</p>
      </div>
  </section>

  

    <!-- Project Con -->
    <section id="projects-con" class="grid-con">
        <h2 id="project-heading" class="col-span-full">Case Study</h2>
        <?php
        $project_links = [
            1 => 'quatro.php',  
            2 => 'vybe.php',    
            3 => 'industry.php',  
            4 => 'demoreel.php'   
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

            // Bring the project link based on project ID
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
    <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/">
      <img src="images/linkedin_2.svg" alt="LinkedIn icon">
    </a>
  </footer>

  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>

<?php
$conn->close();
?>
