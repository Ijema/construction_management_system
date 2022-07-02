<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<?php if($_SESSION['login_type'] == "Admin"): ?>
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_project"><i class="fa fa-plus"></i> Add New project</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="20%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Project</th>
						<th>Task</th>
						<th>Team Member</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Amount Used</th>
						<th>Project Status</th>
						<th>Task Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					
					<?php
					$i = 1;
					$member = $_SESSION['login_name'] . " ( " . $_SESSION['login_type'] . " )";
					$stat = array("Pending","Started","On-Progress","On-Hold","Over Due","Done");
					$qry = $conn->query("SELECT * from task_list WHERE team_member = '$member' ");
					while($row= $qry->fetch_assoc() ):
						$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
						unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
						$desc = strtr(html_entity_decode($row['description']),$trans);
						$desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
						$tprog = $conn->query("SELECT * FROM task_list where id = {$row['id']}")->num_rows;
		                $cprog = $conn->query("SELECT * FROM task_list where id = {$row['id']} and status = 3")->num_rows;
						$prog = $tprog > 0 ? ($cprog/$tprog) * 100 : 0;
		                $prog = $prog > 0 ?  number_format($prog,2) : $prog;
		                $prod = $conn->query("SELECT * FROM user_productivity where id = {$row['id']}")->num_rows;
		                if($row['status'] == 0 && strtotime(date('Y-m-d')) >= strtotime($row['start_date'])):
		                if($prod  > 0  || $cprog > 0)
		                  $row['status'] = 2;
		                else
		                  $row['status'] = 1;
		                elseif($row['status'] == 0 && strtotime(date('Y-m-d')) > strtotime($row['end_date'])):
		                $row['status'] = 4;
		                endif;
			

					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td>
							<p><b><?php echo ucwords($row['name']) ?></b></p>
						</td>
						<td>
							<p><b><?php echo ucwords($row['task']) ?></b></p>
							<p class="truncate"><?php echo strip_tags($desc) ?></p>
						</td>
						<td><p><b><?php echo ucwords($row['team_member']) ?></b></p></td>
						<td>
									<span class="description">
		                        	<span class="fa fa-calendar-day"></span>
		                        	<span><b><?php echo date('M d, Y',strtotime($row['start_date'])) ?></b></span>
		               				</td>
									<td>
									<span class="description">
		                        	<span class="fa fa-calendar-day"></span>
		                        	<span><b><?php echo date('M d, Y',strtotime($row['end_date'])) ?></b></span>
		                  			 </td>
 						<td class=""><b><?php echo ucwords($row['amt_used']) ?></b></td>
						<td class="text-center">
							<?php
							  if($stat[$row['status']] =='Pending'){
							  	echo "<span class='badge badge-secondary'>{$stat[$row['status']]}</span>";
							  }elseif($stat[$row['status']] =='Started'){
							  	echo "<span class='badge badge-primary'>{$stat[$row['status']]}</span>";
							  }elseif($stat[$row['status']] =='On-Progress'){
							  	echo "<span class='badge badge-info'>{$stat[$row['status']]}</span>";
							  }elseif($stat[$row['status']] =='On-Hold'){
							  	echo "<span class='badge badge-warning'>{$stat[$row['status']]}</span>";
							  }elseif($stat[$row['status']] =='Over Due'){
							  	echo "<span class='badge badge-danger'>{$stat[$row['status']]}</span>";
							  }elseif($stat[$row['status']] =='Done'){
							  	echo "<span class='badge badge-success'>{$stat[$row['status']]}</span>";
							  }
							?>
						</td>
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
			                      <a class="dropdown-item new_productivity" data-pid = '<?php echo $row['pid'] ?>' data-tid = '<?php echo $row['id'] ?>'  data-task = '<?php echo ucwords($row['task']) ?>'  href="javascript:void(0)">Add Productivity</a>
								</div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table p{
		margin: unset !important;
	}
	table td{
		vertical-align: middle !important
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.new_productivity').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Progress for: "+$(this).attr('data-task'),"manage_progress.php?pid="+$(this).attr('data-pid')+"&tid="+$(this).attr('data-tid'),'large')
	})
	})
	function delete_project($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_project',
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
</script>