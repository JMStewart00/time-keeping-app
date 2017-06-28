		<?php
		date_default_timezone_set('America/Kentucky/Louisville');
		$status_message = '';
		$task_name = '';
		$task_date = date("m/d/y");
		$clock_in = date("H:i:s");
		$clock_out = NULL;




		if (empty($_GET['task_name'])) {
			$status_message = "Please enter a task name.";
			echo $status_message;

		} else {
			$task_name = htmlentities($_GET['task_name']);
			$task_date = !empty($_GET['task_date']) ? htmlentities($_GET['task_date']) : $task_date;
			$clock_in = !empty($_GET['clock_in']) ? htmlentities($_GET['clock_in']) : $clock_in;
			$clock_out = !empty($_GET['clock_out']) ? htmlentities($_GET['clock_out']) : $clock_out;
			if (isset($_GET['updating'])) {
				$id = htmlentities($_GET['updating']);
				updateEntry(getDB(), $id, $task_name, $task_date, $clock_in, $clock_out); 
			} else addTask(getDB(), $task_name, $task_date, $clock_in, $clock_out);
		}

		if (isset($_GET['deleteEntry'])) {
			$entry_id = htmlentities($_GET['deleteEntry']);
			deleteEntry(getDB(), $entry_id);
		}

		if (isset($_GET['stopClock'])) {
			$id = htmlentities($_GET['stopClock']);
			stopClock(getDb(), $id);
		}

		if (isset($_GET['editEntry'])) {
			$id = htmlentities($_GET['editEntry']);
			$rowData = appendEntry(getDb(), $id);

		}


		function stopClock($db, $id) {
			$time = date('H:i:s');
			$stmt = "UPDATE tasks SET clock_out = '$time' WHERE id = '$id';";
			$result = pg_query($stmt);
		}

		function updateEntry($db, $id, $task, $date, $clockin, $clockout) {
			$stmt = "UPDATE tasks SET (task_name, task_date, clock_in, clock_out) = ('$task', '$date', '$clockin', '$clockout') WHERE id = '$id' ;";
			$result = pg_query($stmt);
		}
		
		function getDB() {
			return $db = pg_connect('
				host=localhost
				port=5432
				dbname=timesheet
				user=josh
				password=newpassword
				');
		};


		function getTasks($db){
			$request = pg_query($db, 'SELECT * FROM tasks;');
			return pg_fetch_all($request);
		};

		function appendEntry($db, $id) {
			$stmt = "SELECT * FROM tasks WHERE id = '$id';";
			$result = pg_query($stmt);
			return pg_fetch_all($result)[0];

		}

			


		function addTask($db, $task, $date, $clockin, $clockout) {
			if ($clockout) { 
				$stmt = "INSERT INTO tasks (task_name, task_date, clock_in, clock_out) VALUES ('$task', '$date', '$clockin', '$clockout');";
			} else {
				$stmt = "INSERT INTO tasks (task_name, task_date, clock_in, clock_out) VALUES ('$task', '$date', '$clockin', NULL );";
			}
				$result = pg_query($stmt);
		}

		function deleteEntry($db, $entry_id) {
			$stmt = "DELETE FROM tasks WHERE id ='$entry_id';";
			$result = pg_query($stmt);

		}

		?>