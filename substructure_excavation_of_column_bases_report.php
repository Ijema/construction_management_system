<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM excavation_of_trenches where id = ".$_GET['id'])->fetch_array();
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
<form action="" method="post" name="manage_substructure"  id="manage-substructure">
<div class="form-group">
			<label>Contract</label>
			<input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php if (isset($_SESSION['$name'])){ echo $_SESSION['$name'];}else{ echo "No Name";} ?>">
</div>
<div class="form-group">
			<label>Contract Code</label>
			<input type="text" class="form-control form-control-sm" id="contract_code" name="contract_code" value="<?php if (isset($_SESSION['$contract_code'])){ echo $_SESSION['$contract_code'];}else{ echo "No Contract Code";} ?>">
</div>
<div class="form-group">
              <label>Project Team Member</label>
	   		  <input type="text" class="form-control form-control-sm" id= "team_member" name="team_member" value="<?php 
			  if(isset($_SESSION['login_id'])){
				  echo $_SESSION['login_name']; echo " ( "; echo $_SESSION['login_type']; echo " )";
			  }else{
				  echo "Not Logged";
			  }
			  ?>" readonly />
		</div>
<div class="form-group">
			<label for="">Report</label>
			<textarea name="report" id="report" cols="30" rows="10" class="summernote form-control">
				<?php echo isset($report) ? $report : '' ?>
			</textarea>
		</div>
    <div>
	<div class="form-group">
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="1%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						
						<th class="text-center">S/N</th>
						<th>MATERIALS</th>
						<th>QUANTITY</th>
						<th>UNIT</th>
						<th>UNIT PRICE (N)</th>
						<th>AMOUNT (N)</th>
					</tr>
				</thead>
				<tbody>
				<tr>
				<?php
					$i = 1;
					?>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials" type="text" name="materials" value = "1,20*1.20 block" style = "border:none" readonly /></td>
					<td><input id="qty" name="qty" type="number" value ="<?php echo isset($qty) ? $qty: '' ?>"onkeyup="sum()"/></td>
					<td><input id="unit" name="unit" type="text" value = "Inch" style = "border:none" readonly /></td>
					<td><input id="unit_price" name="unit_price" type="number" value ="<?php echo isset($unit_price) ? $unit_price: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total" name="total" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials2" type="text" name="materials2" value = "1.50*1.50 block" style = "border:none" readonly /></td>
					<td><input id="qty2" name="qty2" type="number" value ="<?php echo isset($qty2) ? $qty2: '' ?>" onkeyup="sum()"/></td>
					<td><input id="unit2" name="unit2" type="text" value = "Inch" style = "border:none" readonly /></td>
					<td><input id="unit_price2" name ="unit_price2" type="number" value ="<?php echo isset($unit_price2) ? $unit_price2: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total2" name="total2" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials3" type="text" name="materials3" value = "1.80*1.80 block" style = "border:none" readonly /></td>
					<td><input id="qty3" name="qty3" type="number" value ="<?php echo isset($qty3) ? $qty3: '' ?>" onkeyup="sum()"/></td>
					<td><input id="unit3" name="unit3" type="text" value = "Inch" style = "border:none" readonly /></td>
					<td><input id="unit_price3"  name="unit_price3" type="number" value ="<?php echo isset($unit_price3) ? $unit_price3: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total3" name="total3" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials4" type="text" name="materials4" value = "2.23*2.23 block" style = "border:none" readonly /></td>
					<td><input id="qty4" name="qty4" type="number" value ="<?php echo isset($qty4) ? $qty4: '' ?>" onkeyup="sum()"/></td>
					<td><input id="unit4" name="unit4" type="text" value = "Inch" style = "border:none" readonly /></td>
					<td><input id="unit_price4" name="unit_price4" type="number" value ="<?php echo isset($unit_price4) ? $unit_price4: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total4" name="total4" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials5" type="text" name="materials5" value = "2.27*2.27 block" style = "border:none" readonly /></td>
					<td><input id="qty5" name="qty5" type="number" value ="<?php echo isset($qty5) ? $qty5: '' ?>" onkeyup="sum()"/></td>
					<td><input id="unit5" name="unit5" type="text" value = "Inch" style = "border:none" readonly /></td>
					<td><input id="unit_price5" name="unit_price5" type="number" value ="<?php echo isset($unit_price5) ? $unit_price5: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total5" name="total5" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials6" type="text" name="materials6" value = "Anti-termite" style = "border:none" readonly /></td>
					<td><input id="qty6" name="qty6" type="number" value ="<?php echo isset($qty6) ? $qty6: '' ?>"onkeyup="sum()"/></td>
					<td><input id="unit6" name="unit6" type="text" value = "N/r" style = "border:none" readonly /></td>
					<td><input id="unit_price6" name="unit_price6" type="number" value ="<?php echo isset($unit_price6) ? $unit_price6: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total6" name="total6" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials7" type="text" name="materials7" value = "Labour for application of Anti-termite" style = "border:none" readonly /></td>
					<td><input id="qty7" name="qty7" type="number" value ="<?php echo isset($qty7) ? $qty7: '' ?>" onkeyup="sum()"/></td>
					<td><input id="unit7" name="unit7" type="text" value = "N/r" style = "border:none" readonly /></td>
					<td><input id="unit_price7" name="unit_price7" type="number" value ="<?php echo isset($unit_price7) ? $unit_price7: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total7" name="total7" type="number" value ="0" readonly /></td>
				</tr>
				</tbody>
				</table>
    
    <div><td> Total Estimate <input id="substructureresult" name="substructureresult" type="number" readonly /></td></div>
	</div>
</div>
</form>



<script>	 
function sum() {
           var qty = document.getElementById('qty').value;
            var unit_price = document.getElementById('unit_price').value;
            var result = parseInt(qty) * parseInt(unit_price);
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
			
			var qty2 = document.getElementById('qty2').value;
            var unit_price2 = document.getElementById('unit_price2').value;
            var result = parseInt(qty2) * parseInt(unit_price2);
            if (!isNaN(result)) {
                document.getElementById('total2').value = result;
            }
			
			var qty3 = document.getElementById('qty3').value;
            var unit_price3 = document.getElementById('unit_price3').value;
            var result = parseInt(qty3) * parseInt(unit_price3);
            if (!isNaN(result)) {
                document.getElementById('total3').value = result;
            }
			
			var qty4 = document.getElementById('qty4').value;
            var unit_price4 = document.getElementById('unit_price4').value;
            var result = parseInt(qty4) * parseInt(unit_price4);
            if (!isNaN(result)) {
                document.getElementById('total4').value = result;
            }
			
			var qty5 = document.getElementById('qty5').value;
            var unit_price5 = document.getElementById('unit_price5').value;
            var result = parseInt(qty5) * parseInt(unit_price5);
            if (!isNaN(result)) {
                document.getElementById('total5').value = result;
            }
			
			var qty6 = document.getElementById('qty6').value;
            var unit_price6 = document.getElementById('unit_price6').value;
            var result = parseInt(qty6) * parseInt(unit_price6);
            if (!isNaN(result)) {
                document.getElementById('total6').value = result;
            }
			
			var qty7 = document.getElementById('qty7').value;
            var unit_price7 = document.getElementById('unit_price7').value;
            var result = parseInt(qty7) * parseInt(unit_price7);
            if (!isNaN(result)) {
                document.getElementById('total7').value = result;
            }
			var total = document.getElementById('total').value;
            var total2 = document.getElementById('total2').value;
            var total3 = document.getElementById('total3').value;
            var total4 = document.getElementById('total4').value;
            var total5 = document.getElementById('total5').value;
            var total6 = document.getElementById('total6').value;
            var total7 = document.getElementById('total7').value;
          		
			var result = parseInt(total)+ parseInt(total2)+ parseInt(total3)+ parseInt(total4)+ parseInt(total5)
			+ parseInt(total6)+ parseInt(total7) ;
            
			if (!isNaN(result)) {
				document.manage_substructure.substructureresult.value = result;
			}
		}

$('#manage-substructure').submit(function(e){
    	e.preventDefault()
    	start_load()
    	$.ajax({
    		url:'ajax.php?action=save_substructure2',
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
		
		        
    </script>