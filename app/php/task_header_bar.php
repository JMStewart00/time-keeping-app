<nav class="text-center navbar fixed-top d-block bg-inverse">
	<form action="GET">
	<div class="container p-0">
		<div class="row" id="topNav">
			<div class="input-group col-6 inputTopNav">
				<span class="input-group-addon">Task</span>
				<input type="text" class="form-control" aria-label="Text input" name="task_name" id="task_name" placeholder="Enter task name here...">
			</div>
			<div class="button-group col inputTopNav" id="selectClient">
				<button class="btn btn-inline-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Client</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Action</a>
				</div>
			</div>
			<div class="input-group col inputTopNav">
			<label type="text" class="input-group-addon" aria-label="Text input with checkbox">Rate</label>
			<label type="text" class="input-group-addon" aria-label="Text input with checkbox">$</label>
			<label class="input-group-addon" for="fader"><output for="fader" id="volume">100</output></label>
			<input class="ml-2" type="range" min="5" max="200" value="150" id="fader" step="5" name="rate" oninput="outputUpdate(value)">
			</div>
			<button class="btn  btn-outline-success" value="add_task" name="submit" type="submit"><i class="fa fa-play" aria-hidden="true"></i></button>
		</div>
	</nav>
	</form>