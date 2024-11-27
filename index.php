<?php
include __DIR__ . '/includes/connect.php'; // 데이터베이스 연결 포함

// Projects 테이블에서 데이터 가져오기
$sql = "SELECT id, title FROM Projects LIMIT 4"; // 최대 4개의 프로젝트 제목 가져오기
$result = $conn->query($sql);
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <title>Kyuri Park</title>
  </head>
  <body>
    <h1 class="hidden">Kyuri Park Portfolio</h1>
    <!-- Main Nav -->
    <div id="sticky-nav-con">
      <header class="grid-con" id="main-header">
        <div
          id="logo"
          class="col-start-3 col-end-4 m-col-start-7 m-col-end-8 l-col-start-7 l-col-end-8 xl-col-start-7 xl-col-end-8"
        >
          <img src="images/logo.svg" alt="KP Logo" />
        </div>
        <nav
          id="main-nav"
          class="col-start-5 col-end-6 m-col-start-6 m-col-end-9 l-col-start-6 l-col-end-9 xl-col-start-6 xl-col-end-9"
        >
          <div id="burger-con">
            <h2 class="hidden">Main Nav</h2>
            <ul>
              <li><a href="index.php">Projects</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div>
          <div class="toggle_button">
            <i class="fa-solid fa-bars"></i>
          </div>
        </nav>
        <div id="mobile_dropdown_menu">
          <ul>
            <li><a href="index.php">Projects</a></li>
            <li><a href="#winning-projects-con">About</a></li>
            <li><a href="#portfolio-con">Contact</a></li>
          </ul>
        </div>
      </header>
    </div>

    <!-- Profile Section -->
    <section id="profile-box" class="grid-con">
        <div class="col-start-1 col-end-6 m-col-start-3 m-col-end-12 l-col-start-3 l-col-end-12">
            <h2>It’s Kyuri,<br> Your Favorite Front-end Developer!</h2>
            <p>Based in London, ON. Looking for a captivating website? My goal is to create sites that are both visually appealing and easy to navigate. Let’s work together!</p>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects-box" class="grid-con">
        <div class="col-start-3 col-end-4 m-col-start-3 m-col-end-12 l-col-start-3 l-col-end-12">
            <h2>Projects</h2>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <?php $count = 1; ?>
            <?php while ($project = $result->fetch_assoc()): ?>
                <div class="project col-start-1 col-end-6 m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-7 <?php echo ($count == 4) ? 'col-span-full' : ''; ?>">
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <div id="projects-<?php echo $project['id']; ?>">image</div>
                    <a href="project_detail.php?id=<?php echo $project['id']; ?>">View Details</a>
                </div>
                <?php $count++; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No projects to display.</p>
        <?php endif; ?>
    </section>
    
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

<?php
$conn->close(); // 데이터베이스 연결 종료
?>
