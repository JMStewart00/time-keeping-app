
<nav class="text-center navbar fixed-top d-block bg-inverse">
	<form action="GET">
		<input type="hidden" name="clock_in" id="clock_in" value="">
		<div class="container p-0">
			<div class="row" id="topNav">
				<div class="input-group col-4 inputTopNav">
					<span class="input-group-addon">Task</span>
					<input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name" placeholder="Enter task name here...">
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
					<label class="input-group-addon" for="fader"><output for="fader" id="volume">100</output></label>
					<input class="ml-2" type="range" min="5" max="200" value="100" id="fader" step="5" name="rate" oninput="outputUpdate(value)">
				</div>
				<div id="startBtn" class="btn  btn-outline-success" value="add_task" name="submit"><i class="fa fa-play" aria-hidden="true"></i></div>
			</div>
			</div>
		</form>
	</nav>

