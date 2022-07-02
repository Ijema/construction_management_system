<?php 
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM project_list where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
$manager = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where id = $manager_id");
$manager = $manager->num_rows > 0 ? $manager->fetch_array() : array();
?>
<form action="" method="POST">
<div class="col-lg-12">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-outline card-primary">
				<div class="card">
					<div class="card-header">
					<span><b>Project Report List:</b></span>
				</div>
				<div class="card-header">
					<span><b>Substructure Report:</b></span>
					<div class="card-tools">
						<button class="btn btn-primary bg-gradient-primary btn-sm" type="button" id="new_substructure_report"><i class="fa fa-plus"></i> New Report</button>
					</div>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
					<table class="table table-condensed m-0 table-hover">
						<colgroup>
							<col width="5%">
							<col width="15%">
							<col width="5%">
							<col width="5%">
							<col width="10%">
							<col width="15%">
							<col width="10%">
							<col width="25%">
							<col width="15%">
						</colgroup>
						<thead>
							<th style="text-align:center">#</th>
							<th style="text-align:center">Materials</th>
							<th style="text-align:center">Qty</th>
							<th style="text-align:center">Unit</th>
							<th style="text-align:center">Unit Price(₦)</th>
							<th style="text-align:center">Total(₦)</th>
							<th style="text-align:center">Team Member</th>
							<th>Report</th>
							<th style="text-align:center">Action</th>
							
						</thead>
						<tbody>
							<?php 
							$i = 1;
							$tasks = $conn->query("SELECT * FROM task_list where id = {$id} order by task asc");
							while($row=$tasks->fetch_assoc()):
								$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
								unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
								$desc = strtr(html_entity_decode($row['description']),$trans);
								$desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
							?>
								<tr>
			                        <td class="text-center"><?php echo $i++ ?></td>
			                        <td class=""><b><?php echo ucwords($row['task']) ?></b></td>
									<td class=""><?php echo ucwords($row['team_member']) ?></b>
									</td>
			                        <td class=""><p class="truncate"><?php echo strip_tags($desc) ?></p></td>
			                        <td>
			                        	<?php 
			                        	if($row['status'] == 1){
									  		echo "<span class='badge badge-secondary'>Pending</span>";
			                        	}elseif($row['status'] == 2){
									  		echo "<span class='badge badge-primary'>On-Progress</span>";
			                        	}elseif($row['status'] == 3){
									  		echo "<span class='badge badge-success'>Done</span>";
			                        	}
			                        	?>
			                        </td>
			                        <td class="text-center">
										<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					                     Action
					                    </button>
					                    <div class="dropdown-menu" style="">
					                      <a class="dropdown-item view_task" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"  data-task="<?php echo $row['task'] ?>">View</a>
					                      <div class="dropdown-divider"></div>
					                      <?php if($_SESSION['login_type'] != 3): ?>
					                      <a class="dropdown-item edit_task" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"  data-task="<?php echo $row['task'] ?>">Edit</a>
					                      <div class="dropdown-divider"></div>
					                      <a class="dropdown-item delete_task" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
											<?php endif; ?>
										</div>
									</td>
		                    	</tr>
									<?php 
									endwhile;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
</form>
<script>
	$('#new_substructure_report').click(function(){
		uni_modal("New Substructure Report For <?php echo ucwords($name) ?>","manage_substructure.php?pid=<?php echo $id ?>", "mid-large")
	})
	$('.edit_task').click(function(){
		uni_modal("Edit Task: "+$(this).attr('data-task'),"manage_task.php?pid=<?php echo $id ?>&id="+$(this).attr('data-id'),"mid-large")
	})
	$('.view_task').click(function(){
		uni_modal("Task Details","view_task.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$('#new_productivity').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Progress","manage_progress.php?pid=<?php echo $id ?>",'large')
	})
	$('.manage_progress').click(function(){
		uni_modal("<i class='fa fa-edit'></i> Edit Progress","manage_progress.php?pid=<?php echo $id ?>&id="+$(this).attr('data-id'),'large')
	})
	$('.delete_progress').click(function(){
	_conf("Are you sure to delete this progress?","delete_progress",[$(this).attr('data-id')])
	})
	function delete_progress($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_progress',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
$(document).ready(function(){
	load_images();
	function load_images(){
		$.ajax({
			url:"fetch_images.php",
			success:function(data){
				$('#images_list').html(data);
			}
		});
	
	}
	})
</script>