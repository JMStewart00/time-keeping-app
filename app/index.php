<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Taskr</title>
		<?php include 'html/cdn_links.html' ?>
	</head>
	<body>
		<?php include 'php/task_header_bar.php' ?>
		<div class="container w-85 mt-3">
			<label for="fader">Rate</label>
			<input type="range" min="5" max="200" value="150" id="fader" step="5" oninput="outputUpdate(value)">
			<output for="fader" id="volume">100</output>
			<h1 class="text-center">Taskr</h1>
			<?php include 'php/functions.php' ?>
			
			<?php include 'php/table.php' ?>
			<?php include 'html/footer.html' ?>
			<?php include 'html/cdn_scripts.html' ?>
		</body>
	</html>