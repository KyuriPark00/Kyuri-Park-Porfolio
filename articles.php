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

    <br><br><br><br><br>

    <div class="grid-con">
        <div class="col-span-full m-col-span-9 m-col-start-3">
            <h3>
                I recently deleted the old page (about.php) and created a new one, (articles.php), since I added an "About" section to my landing page (index.php). I am still in the wireframing stage, so this page is empty at the moment.
                <br>
                Thank you!
            </h3>
        </div>
    </div>

    <footer>
        <p>© 2024 Kyuri Park. All Rights Reserved.</p>
        <a href="https://www.linkedin.com/in/hailie-park-93a6a2328/">
        <img src="images/linkedin_2.svg" alt="LinkedIn icon">
        </a>
    </footer>

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
