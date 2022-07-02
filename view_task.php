<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM task_list where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<dl>
		<dt><b class="border-bottom border-primary">Task</b></dt>
		<dd><?php echo ucwords($task) ?></dd>
	</dl>
	<dl>
		<dt><b class="border-bottom border-primary">Team Member</b></dt>
		<dd><?php echo ucwords($team_member) ?></dd>
	</dl>
	<dl>
		<dt><b class="border-bottom border-primary">Report</b></dt>
		<dd><?php echo html_entity_decode($description) ?></dd>
	</dl>
	<dl>
		<dt><b class="border-bottom border-primary">Date</b></dt>
		<dd><?php echo date('M d, Y',strtotime($date)) ?></dd>
	</dl>
	<dl>
		<dt><b class="border-bottom border-primary">Amount Spent</b></dt>
		<dd><?php echo ucwords($amt_used) ?></dd>
	</dl>
	
	
</div>