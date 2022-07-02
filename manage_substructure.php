<?php session_start();
	  include 'db_connect.php';
 ?>
<form action="" method="post" name="manage-substructure"  id="manage-substructure">

<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Project Name</label>
					<input type="text" id="name" class="form-control form-control-sm" name= "name" value ="<?php echo $_SESSION['$name'] ?>">
				</div>
			</div>
				<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Contract No.</label>
					<input type="text" class="form-control form-control-sm" name="contract_code" id ="contract_code" value="<?php echo $_SESSION['$contract_code'] ?>" >
				</div>
			</div>
			</div>
<table>
				<colgroup>
					<col width="2%">
					<col width="20%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						
						<th class="text-center">S/N</th>
						<th>MATERIALS</th>
						<th>QUANTITY</th>
						<th>UNIT</th>
						<th>BASIC PRICE (N)</th>
						<th>AMOUNT (N)</th>
					</tr>
				</thead>
				<tbody>
				<tr>
				<?php
					$i = 1;
					?>
				<th class="text-center"><?php echo $i++ ?></th>
						<td><input id="materials" type="text" name="materials" value = "Excavation of Trenches" style = "border:none" readonly /></td>
						<td><input style = "width:150px" id="qty" type="number" name="qty" value ="<?php echo isset($qty) ? $qty: '' ?>" onkeyup="sum()"/></td>
						<td><input  style = "width:150px" id="unit" type="text" name="unit" value = "N/r" readonly /></td>
						<td><input style = "width:150px" id="unit_price" type="number" name="unit_price" value ="<?php echo isset($unit_price) ? $unit_price: '' ?>" onkeyup="sum()"/></td>
						<td><input id="total" name= "total" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Excavation of Column Bases</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials1" type="text" name="materials1" value = "1,20*1.20 block" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty1" name="qty1" type="number" value ="<?php echo isset($qty1) ? $qty1: '' ?>"onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit1" name="unit1" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price1" name="unit_price1" type="number" value ="<?php echo isset($unit_price1) ? $unit_price1: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total1" name="total1" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials2" type="text" name="materials2" value = "1.50*1.50 block" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty2" name="qty2" type="number" value ="<?php echo isset($qty2) ? $qty2: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit2" name="unit2" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price2" name ="unit_price2" type="number" value ="<?php echo isset($unit_price2) ? $unit_price2: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total2" name="total2" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials3" type="text" name="materials3" value = "1.80*1.80 block" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty3" name="qty3" type="number" value ="<?php echo isset($qty3) ? $qty3: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit3" name="unit3" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price3"  name="unit_price3" type="number" value ="<?php echo isset($unit_price3) ? $unit_price3: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total3" name="total3" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials4" type="text" name="materials4" value = "2.23*2.23 block" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty4" name="qty4" type="number" value ="<?php echo isset($qty4) ? $qty4: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit4" name="unit4" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price4" name="unit_price4" type="number" value ="<?php echo isset($unit_price4) ? $unit_price4: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total4" name="total4" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials5" type="text" name="materials5" value = "2.27*2.27 block" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty5" name="qty5" type="number" value ="<?php echo isset($qty5) ? $qty5: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit5" name="unit5" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price5" name="unit_price5" type="number" value ="<?php echo isset($unit_price5) ? $unit_price5: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total5" name="total5" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
				<td><input id="materials6" type="text" name="materials6" value = "Anti-termite" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty6" name="qty6" type="number" value ="<?php echo isset($qty6) ? $qty6: '' ?>"onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit6" name="unit6" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price6" name="unit_price6" type="number" value ="<?php echo isset($unit_price6) ? $unit_price6: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total6" name="total6" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials7" type="text" name="materials7" value = "Labour for application of Anti-termite" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty7" name="qty7" type="number" value ="<?php echo isset($qty7) ? $qty7: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit7" name="unit7" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price7" name="unit_price7" type="number" value ="<?php echo isset($unit_price7) ? $unit_price7: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total7" name="total7" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><td colspan="6"><label>Binding, Foundation Footing & Column Bases;</label></td>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials8" type="text" name="materials8" value = "Cement" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty8" name="qty8" type="number" value ="<?php echo isset($qty8) ? $qty8: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit8" name="unit8" type="text" value = "Bag" readonly /></td>
					<td><input style = "width:150px" id="unit_price8" name="unit_price8" type="number" value ="<?php echo isset($unit_price8) ? $unit_price8: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total8" name="total8" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials9" type="text" name="materials9" value = "Sharp Sand(10 tyres tipper)" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty9" name="qty9" type="number" value ="<?php echo isset($qty9) ? $qty9: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit9" name="unit9" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price9" name="unit_price9" type="number" value ="<?php echo isset($unit_price9) ? $unit_price9: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total9" name="total9" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials10" type="text" name="materials10" value = "Granite (20 tons tipper)" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty10" name="qty10" type="number" value ="<?php echo isset($qty10) ? $qty10: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit10" name="unit10" type="text" value = "Trips" readonly /></td>
					<td><input style = "width:150px" id="unit_price10" name="unit_price10" type="number" value ="<?php echo isset($unit_price10) ? $unit_price10: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total10" name="total10" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials11" type="text" name="materials11" value = "Labour for Casting" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty11" name="qty11" type="number" value ="<?php echo isset($qty11) ? $qty11: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit11" name="unit11" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price11" name="unit_price11" type="number" value ="<?php echo isset($unit_price11) ? $unit_price11: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total11" name="total11" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th><label for="plot_size">Blocks</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials12" type="text" name="materials12" value = "Cement" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px"  id="qty12" name="qty12" type="number" value ="<?php echo isset($qty12) ? $qty12: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit12" name="unit12" type="text" value = "Bags" readonly /></td>
					<td><input style = "width:150px" id="unit_price12" name="unit_price12" type="number" value ="<?php echo isset($unit_price12) ? $unit_price12: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total12" name="total12" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials13" type="text" name="materials13" value = "Sharp Sand (10 tyres tipper)" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty13" name="qty13" type="number" value ="<?php echo isset($qty13) ? $qty13: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit13" name="unit13" type="text" value = "Trips" readonly /></td>
					<td><input style = "width:150px" id="unit_price13" name="unit_price13" type="number" value ="<?php echo isset($unit_price13) ? $unit_price13: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total13" name="total13" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials14" type="text" name="materials14" value = "'9' Block" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty14" name="qty14" type="number" value ="<?php echo isset($qty14) ? $qty14: '' ?>" onkeyup="sum()"/></td>
					<td><input  style = "width:150px"id="unit14" name="unit14" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price14" name="unit_price14" type="number" value ="<?php echo isset($unit_price14) ? $unit_price14: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total14" name="total14" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials15" type="text" name="materials15" value = "Labour" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty15" name="qty15" type="number" value ="<?php echo isset($qty15) ? $qty15: '' ?>" onkeyup="sum()"/></td>
					<td><input  style = "width:150px" id="unit15" name="unit15" type="text" value = "N/r"  readonly /></td>
					<td><input style = "width:150px" id="unit_price15" name="unit_price15" type="number" value ="<?php echo isset($unit_price15) ? $unit_price15: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total15" name="total15" type="number" value ="0" readonly /></td>
				</tr>
					
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials16" type="text" name="materials16" value = "Labour for Casting of Concrete into the blocks in the Foundation" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty16" name="qty16" type="number" value ="<?php echo isset($qty16) ? $qty16: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit16" name="unit16" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price16" name="unit_price16" type="number" value ="<?php echo isset($unit_price16) ? $unit_price16: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total16" name="total16" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Columns and Ground Beam</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials17" type="text" name="materials17" value = "Cement" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty17" name="qty17" type="number" value ="<?php echo isset($qty17) ? $qty17: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit17" name="unit17" type="text" value = "Bags" readonly /></td>
					<td><input style = "width:150px" id="unit_price17" name="unit_price17" type="number" value ="<?php echo isset($unit_price17) ? $unit_price17: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total17" name="total17" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials18" type="text" name="materials18" value = "Sharp Sand (10 tryes tipper)" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty18" name="qty18" type="number" value ="<?php echo isset($qty18) ? $qty18: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit18" name="unit18" type="text" value = "Trip" readonly /></td>
					<td><input style = "width:150px" id="unit_price18" name="unit_price18" type="number" value ="<?php echo isset($unit_price18) ? $unit_price18: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total18" name="total18" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials19" type="text" name="materials19" value = "Labour For Casting" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty19" name="qty19" type="number" value ="<?php echo isset($qty19) ? $qty19: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit19" name="unit19" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price19" name="unit_price19" type="number" value ="<?php echo isset($unit_price19) ? $unit_price19: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total19" name="total19" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Laterite and Hardcore Filling</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials20" type="text" name="materials20" value = "Laterite fillings (10tryes)" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty20" name="qty20" type="number" value ="<?php echo isset($qty20) ? $qty20: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit20" name="unit20" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price20" name="unit_price20" type="number" value ="<?php echo isset($unit_price20) ? $unit_price20: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total20" name="total20" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials21" type="text" name="materials21" value = "Labour For Filling" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty21" name="qty21" type="number" value ="<?php echo isset($qty21) ? $qty21: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit21" name="unit21" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price21" name="unit_price21" type="number" value ="<?php echo isset($unit_price21) ? $unit_price21: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total21" name="total21" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials22" type="text" name="materials22" value = "Labour For Compaction" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty22" name="qty22" type="number" value ="<?php echo isset($qty22) ? $qty22: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit22" name="unit22" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price22" name="unit_price22" type="number" value ="<?php echo isset($unit_price22) ? $unit_price22: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total22" name="total22" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials23" type="text" name="materials23" value = "Hardcore fillings (10 tyres)" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty23" name="qty23" type="number" value ="<?php echo isset($qty23) ? $qty23: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit23" name="unit23" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price23" name="unit_price23" type="number" value ="<?php echo isset($unit_price23) ? $unit_price23: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total23" name="total23" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
					<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials24" type="text" name="materials24" value = "Labour For Laying" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty24" name="qty24" type="number" value ="<?php echo isset($qty24) ? $qty24: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit24" name="unit24" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price24" name="unit_price24" type="number" value ="<?php echo isset($unit_price24) ? $unit_price24: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total24" name="total24" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Floor Bed</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials25" type="text" name="materials25" value = "Cement" style = "border:none; background-color:#F6F2FF" readonly /></td>
					<td><input style = "width:150px" id="qty25" name="qty25" type="number" value ="<?php echo isset($qty25) ? $qty25: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit25" name="unit25" type="text" value = Bags" readonly /></td>
					<td><input style = "width:150px" id="unit_price25" name="unit_price25" type="number" value ="<?php echo isset($unit_price25) ? $unit_price25: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total25" name="total25" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials26" type="text" name="materials26" value = "Sharp Sand (10tyres tipper)" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty26" name="qty26" type="number" value ="<?php echo isset($qty26) ? $qty26: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit26" name="unit26" type="text" value = "Trips" readonly /></td>
					<td><input style = "width:150px" id="unit_price26" name="unit_price26" type="number" value ="<?php echo isset($unit_price26) ? $unit_price26: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total26" name="total26" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials27" type="text" name="materials27" value = "Granite(20tons tipper)" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty27" name="qty27" type="number" value ="<?php echo isset($qty27) ? $qty27: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit27" name="unit27" type="text" value = "Trips" readonly /></td>
					<td><input style = "width:150px" id="unit_price27" name="unit_price27" type="number" value ="<?php echo isset($unit_price27) ? $unit_price27: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total27" name="total27" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials28" type="text" name="materials28" value = "Labour For Casting" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty28" name="qty28" type="number" value ="<?php echo isset($qty28) ? $qty28: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit28" name="unit28" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price28" name="unit_price28" type="number" value ="<?php echo isset($unit_price28) ? $unit_price28: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total28" name="total28" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Reinforcement</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials29" type="text" name="materials29" value = "16mm diameter high yield bar" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty29" name="qty29" type="number" value ="<?php echo isset($qty29) ? $qty29: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit29" name="unit29" type="text" value = "M" readonly /></td>
					<td><input style = "width:150px" id="unit_price29" name="unit_price29" type="number" value ="<?php echo isset($unit_price29) ? $unit_price29: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total29" name="total29" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials30" type="text" name="materials30" value = "12mm Ditto" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty30" name="qty30" type="number" value ="<?php echo isset($qty30) ? $qty30: '' ?>" onkeyup="sum()"/></td>
					<td><input  style = "width:150px" id="unit30" name="unit30" type="text" value = "M" readonly /></td>
					<td><input style = "width:150px" id="unit_price30" name="unit_price30" type="number" value ="<?php echo isset($unit_price30) ? $unit_price30: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total30" name="total30" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials31" type="text" name="materials31" value = "10mm Ditto" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty31" name="qty31" type="number" value ="<?php echo isset($qty31) ? $qty31: '' ?>" onkeyup="sum()"/></td>
					<td><input  style = "width:150px" id="unit31" name="unit31" type="text" value = "M" readonly /></td>
					<td><input style = "width:150px" id="unit_price31" name="unit_price31" type="number" value ="<?php echo isset($unit_price31) ? $unit_price31: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total31" name="total31" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials32" type="text" name="materials32" value = "Binding Wire" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty32" name="qty32" type="number" value ="<?php echo isset($qty32) ? $qty32: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit32" name="unit32" type="text" value = "M" readonly /></td>
					<td><input style = "width:150px" id="unit_price32" name="unit_price32" type="number" value ="<?php echo isset($unit_price32) ? $unit_price32: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total32" name="total32" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials33" type="text" name="materials33" value = "Iron Benders" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty33" name="qty33" type="number" value ="<?php echo isset($qty33) ? $qty33: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit33" name="unit33" type="text" value = "M" readonly /></td>
					<td><input style = "width:150px" id="unit_price33" name="unit_price33" type="number" value ="<?php echo isset($unit_price33) ? $unit_price33: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total33" name="total33" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials34" type="text" name="materials34" value = "Damp Proof Membrane Sheets" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty34" name="qty34" type="number" value ="<?php echo isset($qty34) ? $qty34: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit34" name="unit34" type="text" value = "Length" readonly /></td>
					<td><input style = "width:150px" id="unit_price34" name="unit_price34" type="number" value ="<?php echo isset($unit_price34) ? $unit_price34: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total34" name="total34" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials35" type="text" name="materials35" value = "1.80*1.80" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty35" name="qty35" type="number" value ="<?php echo isset($qty35) ? $qty35: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px"  id="unit35" name="unit35" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price35" name="unit_price35" type="number" value ="<?php echo isset($unit_price35) ? $unit_price35: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total35" name="total35" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials36" type="text" name="materials36" value = "BRC Mesh" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty36" name="qty36" type="number" value ="<?php echo isset($qty36) ? $qty36: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit36" name="unit36" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price36" name="unit_price36" type="number" value ="<?php echo isset($unit_price36) ? $unit_price36: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total36" name="total36" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Formwork</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials37" type="text" name="materials37" value = "1'x12'x12' Planks" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty37" name="qty37" type="number" value ="<?php echo isset($qty37) ? $qty37: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit37" name="unit37" type="text" value = "Length" readonly /></td>
					<td><input style = "width:150px" id="unit_price37" name="unit_price37" type="number" value ="<?php echo isset($unit_price37) ? $unit_price37: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total37" name="total37" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials38" type="text" name="materials38" value = "2'x3'x12' Planks" style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty38" name="qty38" type="number" value ="<?php echo isset($qty38) ? $qty38: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit38" name="unit38" type="text" value = "Length" readonly /></td>
					<td><input style = "width:150px" id="unit_price38" name="unit_price38" type="number" value ="<?php echo isset($unit_price38) ? $unit_price38: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total38" name="total38" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr><th colspan="6"><label for="plot_size">Nails</label></th></tr>
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials39" type="text" name="materials39" value = "3' " style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty39" name="qty39" type="number" value ="<?php echo isset($qty39) ? $qty39: '' ?>" onkeyup="sum()"/></td>
					<td><input  style = "width:150px" id="unit39" name="unit39" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price39" name="unit_price39" type="number" value ="<?php echo isset($unit_price39) ? $unit_price39: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total39" name="total39" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials40" type="text" name="materials40" value = "4' " style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty40" name="qty40" type="number" value ="<?php echo isset($qty40) ? $qty40: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit40" name="unit40" type="text" value = "Inch" readonly /></td>
					<td><input style = "width:150px" id="unit_price40" name="unit_price40" type="number" value ="<?php echo isset($unit_price40) ? $unit_price40: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total40" name="total40" type="number" value ="0" readonly /></td>
				</tr>
				
				<tr>
				<th class="text-center"><?php echo $i++ ?></th>
					<td><input id="materials41" type="text" name="materials41" value = "Capenters " style = "border:none" readonly /></td>
					<td><input style = "width:150px" id="qty41" name="qty41" type="number" value ="<?php echo isset($qty41) ? $qty41: '' ?>" onkeyup="sum()"/></td>
					<td><input style = "width:150px" id="unit41" name="unit41" type="text" value = "N/r" readonly /></td>
					<td><input style = "width:150px" id="unit_price41" name="unit_price41" type="number" value ="<?php echo isset($unit_price41) ? $unit_price41: '' ?>" onkeyup="sum()"/></td>
					<td><input id="total41" name="total41" type="number" value ="0" readonly /></td>
				</tr>
			</tbody>
				
		</table>
    
    <div> Total Estimate <input id="substructureresult" name="substructureresult" type="number" readonly ></div>
<?php
			if(isset($_POST['submit'])){
			$substructureresult = isset($_POST['substructureresult']) ? $_POST['substructureresult'] : "";
			$_SESSION['substructureresult'] = $substructureresult;
			}
?>	
</form>


 <script type="text/javascript">
        function sum() {
			var qty = document.getElementById('qty').value;
            var unit_price = document.getElementById('unit_price').value;
            var result = parseInt(qty) * parseInt(unit_price);
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
            var qty1 = document.getElementById('qty1').value;
            var unit_price1 = document.getElementById('unit_price1').value;
            var result = parseInt(qty1) * parseInt(unit_price1);
            if (!isNaN(result)) {
                document.getElementById('total1').value = result;
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
			
			var qty8 = document.getElementById('qty8').value;
            var unit_price8 = document.getElementById('unit_price8').value;
            var result = parseInt(qty8) * parseInt(unit_price8);
            if (!isNaN(result)) {
                document.getElementById('total8').value = result;
            }
			
			var qty9 = document.getElementById('qty9').value;
            var unit_price9 = document.getElementById('unit_price9').value;
            var result = parseInt(qty9) * parseInt(unit_price9);
            if (!isNaN(result)) {
                document.getElementById('total9').value = result;
            }
			
			var qty10 = document.getElementById('qty10').value;
            var unit_price10 = document.getElementById('unit_price10').value;
            var result = parseInt(qty10) * parseInt(unit_price10);
            if (!isNaN(result)) {
                document.getElementById('total10').value = result;
            }
			
			var qty11 = document.getElementById('qty11').value;
            var unit_price11 = document.getElementById('unit_price11').value;
            var result = parseInt(qty11) * parseInt(unit_price11);
            if (!isNaN(result)) {
                document.getElementById('total11').value = result;
            }
			
			var qty12 = document.getElementById('qty12').value;
            var unit_price12 = document.getElementById('unit_price12').value;
            var result = parseInt(qty12) * parseInt(unit_price12);
            if (!isNaN(result)) {
                document.getElementById('total12').value = result;
            }
			
			var qty13 = document.getElementById('qty13').value;
            var unit_price13 = document.getElementById('unit_price13').value;
            var result = parseInt(qty13) * parseInt(unit_price13);
            if (!isNaN(result)) {
                document.getElementById('total13').value = result;
            }
			var qty14 = document.getElementById('qty14').value;
            var unit_price14 = document.getElementById('unit_price14').value;
            var result = parseInt(qty14) * parseInt(unit_price14);
            if (!isNaN(result)) {
                document.getElementById('total14').value = result;
            }
			var qty15 = document.getElementById('qty15').value;
            var unit_price15 = document.getElementById('unit_price15').value;
            var result = parseInt(qty15) * parseInt(unit_price15);
            if (!isNaN(result)) {
                document.getElementById('total15').value = result;
            }
			var qty16 = document.getElementById('qty16').value;
            var unit_price16 = document.getElementById('unit_price16').value;
            var result = parseInt(qty16) * parseInt(unit_price16);
            if (!isNaN(result)) {
                document.getElementById('total16').value = result;
            }
			var qty17 = document.getElementById('qty17').value;
            var unit_price17 = document.getElementById('unit_price17').value;
            var result = parseInt(qty17) * parseInt(unit_price17);
            if (!isNaN(result)) {
                document.getElementById('total17').value = result;
            }
			var qty18 = document.getElementById('qty18').value;
            var unit_price18 = document.getElementById('unit_price18').value;
            var result = parseInt(qty18) * parseInt(unit_price18);
            if (!isNaN(result)) {
                document.getElementById('total18').value = result;
            }
			var qty19 = document.getElementById('qty19').value;
            var unit_price19 = document.getElementById('unit_price19').value;
            var result = parseInt(qty19) * parseInt(unit_price19);
            if (!isNaN(result)) {
                document.getElementById('total19').value = result;
            }
			var qty20 = document.getElementById('qty20').value;
            var unit_price20 = document.getElementById('unit_price20').value;
            var result = parseInt(qty20) * parseInt(unit_price20);
            if (!isNaN(result)) {
                document.getElementById('total20').value = result;
            }
			var qty21 = document.getElementById('qty21').value;
            var unit_price21 = document.getElementById('unit_price21').value;
            var result = parseInt(qty21) * parseInt(unit_price21);
            if (!isNaN(result)) {
                document.getElementById('total21').value = result;
            }
			var qty22 = document.getElementById('qty22').value;
            var unit_price22 = document.getElementById('unit_price22').value;
            var result = parseInt(qty22) * parseInt(unit_price22);
            if (!isNaN(result)) {
                document.getElementById('total22').value = result;
            }
			var qty23 = document.getElementById('qty23').value;
            var unit_price23 = document.getElementById('unit_price23').value;
            var result = parseInt(qty23) * parseInt(unit_price23);
            if (!isNaN(result)) {
                document.getElementById('total23').value = result;
            }
			var qty24 = document.getElementById('qty24').value;
            var unit_price24 = document.getElementById('unit_price24').value;
            var result = parseInt(qty24) * parseInt(unit_price24);
            if (!isNaN(result)) {
                document.getElementById('total24').value = result;
            }
			var qty25 = document.getElementById('qty25').value;
            var unit_price25 = document.getElementById('unit_price25').value;
            var result = parseInt(qty25) * parseInt(unit_price25);
            if (!isNaN(result)) {
                document.getElementById('total25').value = result;
            }
			var qty26 = document.getElementById('qty26').value;
            var unit_price26 = document.getElementById('unit_price26').value;
            var result = parseInt(qty26) * parseInt(unit_price26);
            if (!isNaN(result)) {
                document.getElementById('total26').value = result;
            }
			var qty27 = document.getElementById('qty27').value;
            var unit_price27 = document.getElementById('unit_price27').value;
            var result = parseInt(qty27) * parseInt(unit_price27);
            if (!isNaN(result)) {
                document.getElementById('total27').value = result;
            }
			var qty28 = document.getElementById('qty28').value;
            var unit_price28 = document.getElementById('unit_price28').value;
            var result = parseInt(qty28) * parseInt(unit_price28);
            if (!isNaN(result)) {
                document.getElementById('total28').value = result;
            }
			var qty29 = document.getElementById('qty29').value;
            var unit_price29 = document.getElementById('unit_price29').value;
            var result = parseInt(qty29) * parseInt(unit_price29);
            if (!isNaN(result)) {
                document.getElementById('total29').value = result;
            }
			var qty30 = document.getElementById('qty30').value;
            var unit_price30 = document.getElementById('unit_price30').value;
            var result = parseInt(qty30) * parseInt(unit_price30);
            if (!isNaN(result)) {
                document.getElementById('total30').value = result;
            }
			var qty31 = document.getElementById('qty31').value;
            var unit_price31 = document.getElementById('unit_price31').value;
            var result = parseInt(qty31) * parseInt(unit_price31);
            if (!isNaN(result)) {
                document.getElementById('total31').value = result;
            }
			var qty32 = document.getElementById('qty32').value;
            var unit_price32 = document.getElementById('unit_price32').value;
            var result = parseInt(qty32) * parseInt(unit_price32);
            if (!isNaN(result)) {
                document.getElementById('total32').value = result;
            }
			var qty33 = document.getElementById('qty33').value;
            var unit_price33 = document.getElementById('unit_price33').value;
            var result = parseInt(qty33) * parseInt(unit_price33);
            if (!isNaN(result)) {
                document.getElementById('total33').value = result;
            }
			var qty34 = document.getElementById('qty34').value;
            var unit_price34 = document.getElementById('unit_price34').value;
            var result = parseInt(qty34) * parseInt(unit_price34);
            if (!isNaN(result)) {
                document.getElementById('total34').value = result;
            }
			var qty35 = document.getElementById('qty35').value;
            var unit_price35 = document.getElementById('unit_price35').value;
            var result = parseInt(qty35) * parseInt(unit_price35);
            if (!isNaN(result)) {
                document.getElementById('total35').value = result;
            }
			var qty36 = document.getElementById('qty36').value;
            var unit_price36 = document.getElementById('unit_price36').value;
            var result = parseInt(qty36) * parseInt(unit_price36);
            if (!isNaN(result)) {
                document.getElementById('total36').value = result;
            }
			var qty37 = document.getElementById('qty37').value;
            var unit_price37 = document.getElementById('unit_price37').value;
            var result = parseInt(qty37) * parseInt(unit_price37);
            if (!isNaN(result)) {
                document.getElementById('total37').value = result;
            }
			var qty38 = document.getElementById('qty38').value;
            var unit_price38 = document.getElementById('unit_price38').value;
            var result = parseInt(qty38) * parseInt(unit_price38);
            if (!isNaN(result)) {
                document.getElementById('total38').value = result;
            }
			var qty39 = document.getElementById('qty39').value;
            var unit_price39 = document.getElementById('unit_price39').value;
            var result = parseInt(qty39) * parseInt(unit_price39);
            if (!isNaN(result)) {
                document.getElementById('total39').value = result;
            }
			var qty40 = document.getElementById('qty40').value;
            var unit_price40 = document.getElementById('unit_price40').value;
            var result = parseInt(qty40) * parseInt(unit_price40);
            if (!isNaN(result)) {
                document.getElementById('total40').value = result;
            }
			var qty41 = document.getElementById('qty41').value;
            var unit_price41 = document.getElementById('unit_price41').value;
            var result = parseInt(qty41) * parseInt(unit_price41);
            if (!isNaN(result)) {
                document.getElementById('total41').value = result;
            }
						
			var total = document.getElementById('total').value;
			var total1 = document.getElementById('total1').value;
            var total2 = document.getElementById('total2').value;
            var total3 = document.getElementById('total3').value;
            var total4 = document.getElementById('total4').value;
            var total5 = document.getElementById('total5').value;
            var total6 = document.getElementById('total6').value;
            var total7 = document.getElementById('total7').value;
            var total8 = document.getElementById('total8').value;
            var total9 = document.getElementById('total9').value;
            var total10 = document.getElementById('total10').value;
            var total11 = document.getElementById('total11').value;
            var total12 = document.getElementById('total12').value;
            var total13 = document.getElementById('total13').value;
            var total14 = document.getElementById('total14').value;
            var total15 = document.getElementById('total15').value;
            var total16 = document.getElementById('total16').value;
            var total17 = document.getElementById('total17').value;
            var total18 = document.getElementById('total18').value;
            var total19 = document.getElementById('total19').value;
            var total20 = document.getElementById('total20').value;
            var total21 = document.getElementById('total21').value;
            var total22 = document.getElementById('total22').value;
			var total23 = document.getElementById('total23').value;
            var total24 = document.getElementById('total24').value;
            var total25 = document.getElementById('total25').value;
            var total26 = document.getElementById('total26').value;
            var total27 = document.getElementById('total27').value;
            var total28 = document.getElementById('total28').value;
            var total29 = document.getElementById('total29').value;
            var total30 = document.getElementById('total30').value;
            var total31 = document.getElementById('total31').value;
            var total32 = document.getElementById('total32').value;
            var total33 = document.getElementById('total33').value;
			var total34 = document.getElementById('total34').value;
            var total35 = document.getElementById('total35').value;
            var total36 = document.getElementById('total36').value;
            var total37 = document.getElementById('total37').value;
            var total38 = document.getElementById('total38').value;
            var total39 = document.getElementById('total39').value;
            var total40 = document.getElementById('total40').value;
            var total41 = document.getElementById('total41').value;
          		
			var result = parseInt(total) + parseInt(total1) + parseInt(total2)+ parseInt(total3)+ parseInt(total4)+ parseInt(total5)+ parseInt(total6) + parseInt(total7)+ parseInt(total8)+ parseInt(total9)+ parseInt(total10)+ parseInt(total11)+ parseInt(total12)+ parseInt(total13) + parseInt(total14)+ parseInt(total15)+ parseInt(total16)+ parseInt(total17)+ parseInt(total18)+ parseInt(total19) + parseInt(total20)+ parseInt(total21)+ parseInt(total22) + parseInt(total23) + parseInt(total24)+ parseInt(total25)+ parseInt(total26)+ parseInt(total27)+ parseInt(total28) + parseInt(total29)+ parseInt(total30)+ parseInt(total31)+ parseInt(total32)+ parseInt(total33)+ parseInt(total34)+ parseInt(total35) + parseInt(total36)+ parseInt(total37)+ parseInt(total38)+ parseInt(total39)+ parseInt(total40)+ parseInt(total41);
            
			if (!isNaN(result)) {
				document.getElementById("substructureresult").value = result ;
			
			}
		}


 $('#manage-substructure').submit(function(e){
    	e.preventDefault()
    	start_load()
    	$.ajax({
    		url:'ajax.php?action=save_substructure',
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
				}else{
					alert_toast('Data Not successfully saved',"success");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
    	})
    })     
</script>