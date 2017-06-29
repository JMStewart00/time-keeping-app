		<?php

		function getDB() {
			$ENV = parse_ini_file('env.ini');
			return $db = pg_connect("
				host=$ENV[HOST]
				port=$ENV[PORT]
				dbname=$ENV[DBNAME]
				user=$ENV[UN]
				password=$ENV[PW]
				");
		};

		date_default_timezone_set('America/Kentucky/Louisville');
		$status_message = '';
		$task_name = '';
		$task_date = date("m/d/y");
		$clock_in = date("H:i:s");
		$clock_out = NULL;
		$nextTaskId = intval(pg_fetch_all(pg_query(getDB(),"SELECT id FROM tasks ORDER BY id DESC LIMIT 1;"))[0]["id"]);

		#### brayn7 additions#####		
		if (isset($_GET['submit'])){
	        $cleanGet = $_GET;
		        foreach ($cleanGet as $key => $value) {
		          $key = htmlentities($value);
		        }
		        switch ($cleanGet['submit']) {
		        case 'add_client': 
		          $cleanName = $cleanGet['client_name'];
		          addRowTo(getDB(), "clients" , array("name") , array($cleanName));
		          break;
		        case 'delete_client': 
		          $cleanId = $cleanGet['id'];
		          removeRow(getDB(), "clients", $cleanId);
		          break; 
		        case 'delete_task': 
		          $cleanTaskId = $cleanGet['id'];
		          removeRow(getDB(), "tasks", $cleanTaskId);
		          break; 
		        case 'edit_client': 
		          $cleanId = $cleanGet['id'];
		          $cleanName = $cleanGet['client_name'];
		          editRow(getDB(), "clients", array("name"), array($cleanName), $cleanId);
		          break; 
		        case 'edit_task': 
		          $cleanId = $cleanGet['id'];
		          $cleanName = $cleanGet['task_name'];
		          editRow(getDB(), "clients", array("name"), array($cleanName), $cleanId);
		          break;  
		        case 'add_task': 
		        	if (empty($_GET['task_name'])) {
			  			$status_message = "Please enter a task name.";
			  			echo $status_message;
	          		} else { 
						$cleanRate = $cleanGet['rate'];
		      		$cleanTaskName = $cleanGet['task_name'];
		      		$cleanClientId = $cleanGet['client_id'];
		      		addRowTo(getDB(), "tasks", array("task_name","rate", "client_id"), array($cleanTaskName. '\'','\''. $cleanRate . '\'','\''. $cleanClientId));
		      	} // end else
			      break;   
		        }
	} // submit $GET

      function addRowTo($db, $table, $cols , $vals ) {
       $cols = implode(",",$cols);
       $vals = implode(",", $vals);
       $stmt = "insert into $table ($cols) values ('$vals');";
       $result = pg_query($stmt);
     }

     function removeRow ($db, $table, $id){
        $stmt = "DELETE FROM $table WHERE id = '$id';";
        $result = pg_query($stmt);
      }

      function editRow ($db, $table, $cols, $vals, $id){
        $cols = implode(",",$cols);
        $vals = implode(",", $vals);
        $stmt = "UPDATE $table SET ($cols) = ('$vals') WHERE id = '$id' ;";
        $result = pg_query($stmt);
      }
		#### brayn7 end-additions#####


		function stopClock($db, $id) {
			$time = date('H:i:s');
			$stmt = "UPDATE tasks SET clock_out = '$time' WHERE id = '$id';";
			$result = pg_query($stmt);
		}

		function updateEntry($db, $id, $task, $date, $clockin, $clockout) {
			$stmt = "UPDATE tasks SET (task_name, task_date, clock_in, clock_out) = ('$task', '$date', '$clockin', '$clockout') WHERE id = '$id' ;";
			$result = pg_query($stmt);
		}
		
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

		function getClients($db){
			$rq = pg_query($db, "SELECT * FROM clients");
			return pg_fetch_all($rq);
		}

		?>