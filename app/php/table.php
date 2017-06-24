			<div class="row mx-auto w-100 mt-4">
				<table id="taskTable" class="table table-responsive table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="1%"></th>
							<th width="1%"></th>
							<th>Date</th>
							<th>Task Name</th>
							<th>Start</th>
							<th>End</th>
							<th width="1%"></th>
						</tr>
					</thead>					

					<?php foreach(getTasks(getDB()) as $task) { ?>
					<tbody>
						<tr>
							<td width="1%">
							<form action="GET">
								<input type="hidden" name="editEntry" value="<?=$task["id"];?>">
								<button type="submit" class="btn-warning btn btn-block btn-sm" aria-label="Remove">
									<span aria-hidden="true">&#9998</span>
							</form>
							</td>
							<td width="1%">
								<form action="GET">
									
								</button>
								<input type="hidden" name="deleteEntry" value="<?=$task["id"];?>">
								<button type="submit" class="btn-danger btn btn-block btn-sm" aria-label="Remove">
									<span aria-hidden="true">X</span>
								</button>
								</form>
							</td>
							<td>
								<?=$task['task_date'];?>
							</td>
							<td>
								<?=$task['task_name'];?>
							</td>
							<td>
								<?=date('h:i a', strtotime($task['clock_in']));?>
							</td>
							<td>
							<?php
                                
                                if ($task['clock_out'] === null){
                                    echo '<form class="form-inline mx-auto" action="GET" action="">
                                    <input name="stopClock" type="hidden" value=' . $task["id"] .'>
                                    <button class="btn btn-sm btn-outline-danger" type="submit" >
                                    <span>STOP <i class="fa fa-stop-circle" aria-hidden="true"></i></span>
                                    </button>
                                  </form>';
                                } else {
                                   echo date('h:i a', strtotime($task['clock_out']));;
                                }
                        
                                ?>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
			
		</div>