<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Taskr</title>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/app/html/cdn_links.html' ?>
	</head>
	<body>
      <?php 

      include $_SERVER['DOCUMENT_ROOT'].'/app/php/functions.php'; 
      include $_SERVER['DOCUMENT_ROOT'].'/app/php/task_header_bar.php'; 

      ?>
		<div class="container w-85 mt-3">

			<h1 class="text-center">Taskr</h1>
			
			<?php include 'app/php/table.php' ?>
     <?php 
      include $_SERVER['DOCUMENT_ROOT'].'/app/html/footer.html';
      include $_SERVER['DOCUMENT_ROOT'].'/app/html/cdn_scripts.html'; 
      ?>
		</body>
	</html>