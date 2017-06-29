<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Taskr</title>
		<?php include 'app/html/cdn_links.html' ?>
	</head>
	<body>
		<?php include 'app/php/task_header_bar.php' ?>
		<div class="container w-85 mt-3">
			<label for="fader">Rate</label>
			<input type="range" min="5" max="200" value="150" id="fader" step="5" oninput="outputUpdate(value)">
			<output for="fader" id="volume">100</output>
			<h1 class="text-center">Taskr</h1>
			<?php include 'app/php/functions.php' ?>
			
			<?php include 'app/php/table.php' ?>
			<?php include 'app/html/footer.html' ?>
			<?php include 'app/html/cdn_scripts.html' ?>
		</body>
	</html>