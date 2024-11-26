
<!-- SELECT id, title, name, book_image FROM books,authors WHERE author_id = authors.id ORDER BY title ASC -->
<html>
<?php
//connect to the running database server and the specific database
require_once('includes/connect.php');

//create a query to run in SQL
$query = 'SELECT * FROM projects, media WHERE projects.project_id = media.media_id';

//run the query to get back the content
$results = mysqli_query($connect,$query);
?>

<head>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    section{
        margin: 75px 0 55px 0;
    }
.myform {
    margin:20px;
}
</style>

</head>

<body>
<header></header>

<?php

while($row = mysqli_fetch_array($results)) {

echo '<section>
<div class="max-w-md mb-4 mx-auto bg-white rounded-md shadow-md overflow-hidden md:max-w-2xl">
<div class="md:flex"><div class="md:shrink-0">
<a href="detail.php?id='.$row['project_name'].'"><img class="h-48 w-full object-cover md:h-full md:w-48" src="images/'.$row['files'].'" alt="Book Cover Art"></a></div>
<div class="p-8"><div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">'.$row['project_brief'].'</div>
<a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">'.$row['project_name'].'</a></div></div></div></section>';
}
?>



<footer>

<?php
echo date('l jS \of F Y h:i:s A');
?>

</footer>
</body>
</html>