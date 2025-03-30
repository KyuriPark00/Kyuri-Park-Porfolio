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


    <div class="grid-con">
        <section id="contact-form-con" class="col-span-full">
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
  
    
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
