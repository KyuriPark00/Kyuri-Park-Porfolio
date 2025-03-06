<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id,title FROM projects ORDER BY title ASC');
$stmt->execute();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
  <link href="../css/main.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <title>Kyuri Park</title>
</head>


<body>
  <?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<p class="project-list">'.
  $row['title'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['id'].'">delete</a></p>';
}

$stmt = null;

?>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="title">project title: </label>
    <input name="title" type="text" required><br><br>
    <label for="img">project image: </label>
    <input name="img" type="file" required><br><br>
    <label for="desc">project description: </label>
    <textarea name="desc" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>
<br><br><br>
<a href="logout.php">log out</a>
</body>
</html>
