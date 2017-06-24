<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		<title>Taskr</title>
	<?php include 'html/cdn_links.html' ?>
	</head>
	<body>
		<div class="container w-85 mt-3">
			<h1 class="text-center">Taskr</h1>
		<?php include 'php/functions.php' ?>

		<?php 
		if (isset($_GET['editEntry'])){
			include 'php/filledform.php';
			} else {include 'php/blankform.php';}
		?>
		

		<?php include 'php/table.php' ?>
		<?php include 'html/cdn_scripts.html' ?>
	</body>
</html>
