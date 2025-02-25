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

    <title>Contact</title>
  </head>
  <body>
    <h1 class="hidden">Contact</h1>
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

    <div class="case-study-body">
        <section id="contact-form-con" class="grid-con">
            <form action="sendmail.php" method="POST" class="col-span-full m-col-start-4 m-col-end-11">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" placeholder="Your First Name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" placeholder="Your Last Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>

            <label for="comments">Message:</label>
            <textarea id="comments" name="comments" placeholder="Your Message" rows="5" required></textarea>

            <div><button type="submit">Submit</button></div>
            </form>
        </section>
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
