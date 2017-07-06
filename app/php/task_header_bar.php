<?php 
	$currTask = pg_fetch_all(pg_query(getDB(), "SELECT id, task_name, rate FROM tasks WHERE clock_out IS NULL;"));
	
	$taskNameVal = (count($currTask[0]) === 0) ? "" : $currTask[0]['task_name'];
	$taskRateVal = (count($currTask[0]) === 0) ? 100 : $currTask[0]['rate'];
	$submitName = (count($currTask[0]) === 0) ? "add_task" : "stop_time";
	$btnClass = (count($currTask[0]) === 0) ? "btn-outline-success" : "btn-outline-danger";
 ?>
<nav class="text-center navbar fixed-top d-block bg-inverse">
	<form action="GET">
	<?php if (count($currTask[0]) !== 0) { ?>
		<input type="hidden" name="task_id" value="<?= $currTask[0]['id']; ?>">
	<?php } ?>
		<div class="container p-0">
			<div class="row" id="topNav">
				<div class="input-group col-4 inputTopNav">
					<span class="input-group-addon">Task</span>
					<input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name" placeholder="Enter task name here..." value="<?= $taskNameVal; ?>">
				</div>	
				<div class="col select-style">
					<select name="client_id" id="clientDrop">
						<option selected>Client</option>
						<?php foreach (getClients(getDB()) as $client) { ?>
							<option value="<?=$client['id'] ?>"><?=$client['name'];?></option>
						<?php } ?>
					</select>
				</div>

				<div class="input-group col inputTopNav">
					<label type="text" class="input-group-addon" aria-label="Text input with checkbox">Rate</label>
					<label type="text" class="input-group-addon" aria-label="Text input with checkbox">$</label>
					<label class="input-group-addon" for="fader"><output for="fader" id="volume"><?= $taskRateVal; ?></output></label>
					<input class="ml-2" type="range" min="5" max="200" value="<?= $taskRateVal; ?>" id="fader" step="5" name="rate" oninput="outputUpdate(value)">
				</div>
				<button class="btn <?= $btnClass; ?>" value="<?= $submitName; ?>" name="submit" type="submit">
				<?php if (count($currTask[0]) !== 0) {?>
					<i class="fa fa-stop-circle-o" aria-hidden="true"></i>
				<?php } else { ?>
					<i class="fa fa-play" aria-hidden="true"></i>
				<?php } ?>
				
				</button>
			</div>
			</div>
		</form>
	</nav>

