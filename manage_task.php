<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM task_list where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<?php session_start() ?>
<?php 
	if(!isset($_SESSION['login_id']))
	    header('location:login.php');
    include 'db_connect.php';
    ob_start();
 
  
  ob_end_flush();

?>
<div class="container-fluid">
	<form action="" method="post" id="manage-task">
	<div class="form-group">
			<input type="text" class="form-control form-control-sm" name="name" value="<?php if (isset($_SESSION['$name'])){ echo $_SESSION['$name'];}else{ echo "No Name";} ?>">
		</div>
		<div class="form-group">
			<label for="">Task</label>
			<input type="text" class="form-control form-control-sm" name="task" value="<?php echo isset($task) ? $task : '' ?>" required>
		</div>
		<div class="form-group">
              <label for="">Project Team Member</label>
	   		  <input type="text"class="form-control form-control-sm" name="team_member" value="<?php 
			  if(isset($_SESSION['login_id'])){
				  echo $_SESSION['login_name']; echo " ( "; echo $_SESSION['login_type']; echo " )";
			  }else{
				  echo "Not Logged";
			  }
			  ?>" readonly />
		</div>
		<div class="form-group">
			<label for="">Report</label>
			<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
				<?php echo isset($description) ? $description : '' ?>
			</textarea>
		</div>
		<div class="form-group">
		   <label for="" class="control-label">Date</label>
			<input type="date" class="form-control form-control-sm" autocomplete="off" name="start_Ydate" value="<?php echo isset($date) ? date("Y-m-d",strtotime($date)) : '' ?>">
		</div>
		<div class="form-group">
			<label for="">Amount Spent</label>
			<input type="number" class="form-control form-control-sm" name="amt_used" value="<?php echo isset($amt_used) ? $amt_used: '' ?>" required>
		</div>
		<div class="form-group">
			<label>Pictures</label>
			<br />
			<form method="post" id="upload_multiple_images enctype="multipart/form-data">
				<input type="file" name="image[]" id ="image" multiple accept=".jpg, .png, .gif" />
				<br />
				<input type="submit" name="insert" id ="insert"  value ="Insert" class = "btn btn-info" />	
		</div>
	</form>
	<br />
	</form>
</div>

<script>
	$(document).ready(function(){

	$('.summernote').summernote({
        height: 200,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    })
     })
    
    $('#manage-task').submit(function(e){
    	e.preventDefault()
    	start_load()
    	$.ajax({
    		url:'ajax.php?action=save_task',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
    	})
    })
	
	$(document).ready(function(){
		$('#upload_multiple_images').on('submit', function(event){
			event.preventDefault();
			var image_name =$('#image').val();
			if(image_name == ''){
				alert("Please Select Pictures");
				return false;
			} else{
				$.ajax({
					url:"insert.php",
					method:"POST",
					data: new FormData(this),
					contenetType:false,
					processData:false,
					success:function(data)
					{
						$('#image').val('');
						load_images();
					}
				});
			}
		});
	});
			
</script>