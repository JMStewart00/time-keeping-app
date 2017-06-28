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
				<span class="input-group-addon">$</span>
				<input type="text" class="form-control" aria-label="Text input with checkbox">
			</div>
			<button class="btn  btn-outline-success" type="submit"><i class="fa fa-play" aria-hidden="true"></i></button>
		</div>
	</nav>
	</form>