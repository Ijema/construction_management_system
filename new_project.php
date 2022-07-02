
<?php if(!isset($conn)){ include 'db_connect.php'; } ?>
<style>
 .progress {
    width: 100%;
    height: 20px;
    margin: 0 0 5px 0;
    background: blue;

  }
  </style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
<form action="" id="manage-project" method ="post">

        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Contract/Project</label>
					<input type="text" id="name" class="form-control form-control-sm" name= "name"onkeyup="GetDetail(this.value)" value="">								
				</div>
			</div>
				<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Contract No.</label>
					<input type="text" class="form-control form-control-sm" name="contract_code" id ="contract_code" value="" readonly>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Contract Location</label>
					<input type="text" class="form-control form-control-sm" name="location" value="<?php echo isset($location) ? $location : '' ?>">
				</div>
			</div>
          	<div class="col-md-6">
				<div class="form-group">
					<label for="">Category</label>
					<select name="type" id="type" class="custom-select custom-select-sm">
						<option value="Bungalow" <?php echo isset($type) && $type== 0 ? 'selected' : '' ?>>Bungalow</option>
						<option value="Duplex" <?php echo isset($type) && $type == 1 ? 'selected' : '' ?>>Duplex</option>
						<option value="3-Storey" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>3-Storey</option>
						<option value="4-Storey" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>4-Storey</option>
						<option value="5-Storey" <?php echo isset($type) && $type == 4 ? 'selected' : '' ?>>5-Storey</option>
						<option value="Boys Quarter" <?php echo isset($type) && $type == 5 ? 'selected' : '' ?>>Boys Quarter</option>
						<option value="Gateman House" <?php echo isset($type) && $type == 6 ? 'selected' : '' ?>>Gateman House</option>

					</select>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Source of Fund</label>
					<input type="text" class="form-control form-control-sm" name="source_of_fund" value="<?php echo isset($source_of_fund) ? $source_of_fund : '' ?>">
				</div>
			</div>
			<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Date of Commencement</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo isset($start_date) ? date("Y-m-d",strtotime($start_date)) : '' ?>">
            </div>
          </div>
		  </div>
		  <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Date of Completion</label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?php echo isset($end_date) ? date("Y-m-d",strtotime($end_date)) : '' ?>">
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Contract/Project Manager</label>
              <select class="form-control form-control-sm select2" name="manager_id">
              	<option></option>
              	<?php 
              	$managers = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where (type='Project Manager') order by concat(firstname,' ',lastname) asc ");
              	while($row= $managers->fetch_assoc()):
              	?>
              	<option value="<?php echo $row['id'] ?>" <?php echo isset($manager_id) && $manager_id == $row['id'] ? "selected" : '' ?>><?php echo ucwords($row['name']) ?></option>
              	<?php endwhile; ?>
              </select>
            </div>
		  </div>
   	  </div>
	  <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Project Members</label>
              <select class="form-control form-control-sm select2" multiple="multiple" name="user_ids[]">
              	<option></option>
              	<?php 
              	$employees = $conn->query("SELECT *,concat(firstname,' ',lastname,' ','(',type,')') as name FROM users where type IN ('Architecture', 'Quantity Surveyor','Mechanical Engineer','Electrical Engineer','Mason','Interior Designer') order by concat(firstname,' ',lastname) desc ");
              	while($row= $employees->fetch_assoc()):
              	?>
              	<option value="<?php echo $row['id'] ?>" <?php echo isset($user_ids) && in_array($row['id'],explode(',',$user_ids)) ? "selected" : '' ?>><?php echo ucwords($row['name']) ?></option>
              	<?php endwhile; ?>
              </select>
            </div>
          </div>	  
		  <div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Contract Estimate</label>
					<input type="number" class="form-control form-control-sm" name="estimates" id="estimates" value="" readonly >
					</div>
			</div>
			</div>
			 <div class="row">
			<div class="col-md-10">
				<div class="form-group">
					<label for="" class="control-label">Description</label>
					<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
						<?php echo isset($description) ? $description : '' ?>
					</textarea>
				</div>
			</div>
		</div>
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-project">Save</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("contract_code").value = "";
				document.getElementById("estimates").value = "";
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("contract_code").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"estimates").value = myObj[1];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "search.php?name=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
		
$('#manage-project').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_project',
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
						location.href = 'index.php?page=project_list'
					},2000)
				}
			}
		})
	})
	</script>

 