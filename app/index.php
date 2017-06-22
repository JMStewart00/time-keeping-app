<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		<title>Taskr</title>
	<?php include 'cdn_links.html' ?>
	</head>
	<body>
		<div class="container w-85 mt-3">
			<h1 class="text-center">Taskr</h1>
		<?php include 'functions.php' ?>

		<?php 
		if (isset($_GET['editEntry'])){
			include 'filledform.php';
			} else {include 'blankform.php';}
		?>


		<?php include 'table.php' ?>
		<?php include 'cdn_scripts.html' ?>
	</body>
</html>