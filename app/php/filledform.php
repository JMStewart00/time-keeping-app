
			<form action="" method="get" class="form-control mx-auto">
				<input type="hidden" name="updating" value="<?php echo $rowData['id']; ?>">
				<div class="row w-100 mx-auto">
					<div class="form-group mx-auto col">
						<div class="form-group-addon">Project/Task Name:</div>
						<label for="task_name" class="sr-only"></label>
						<input type="text" class="form-control" name="task_name" id="task_name" value="<?php echo $rowData['task_name'];?>" >
					</div>
					<div class="form-group mx-auto col">
						<label for="task_date" class="sr-only"></label>
						<div class="form-group-addon">Date of Task:</div>
						<input type="date" class="form-control" name="task_date" id="task_date" value="<?php echo $rowData['task_date'];?>" >
					</div>
				</div>
				<div class="row w-100 mx-auto">
					
					<div class="form-group mx-auto col">
						<div class="form-group-addon">Start Time:</div>
						<label for="clock_in" class="sr-only"></label>
						<input type="time" class="form-control" name="clock_in" id="clock_in" value="<?php echo $rowData['clock_in'];?>">
					</div>
					<div class="form-group mx-auto col">
						<div class="form-group-addon">End Time:</div>
						<label for="clock_out" class="sr-only"></label>
						<input type="time" class="form-control" name="clock_out" id="clock_out" value="<?php echo $rowData['clock_out'];?>">
					</div>
				</div>
					<div class="row w-50 mx-auto">
						<button class="btn btn-outline-warning btn-block col w-50 mx-auto" type="submit">Submit Changes</button>
					</div>
			</form>
