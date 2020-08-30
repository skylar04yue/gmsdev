<?php
	include 'menu.php';
	//include'menuside_stud.php'; 
	

	//delete enrolled course
		if ((isset($_POST['deletesubreg']))) {
		$mid = $_POST['mid'];
		$delstud = $func->delete('gradetbl',array('gradeID','=',$mid));
		if ($delstud){
	  	    echo '<script> alert("Record Deleted");</script>';
		} else {
			echo '<script> alert("Delete failed");</script>';
		}
	}


//test
	

	if (isset($_POST['regibutton'])){


		
		$select_year = $strip->strip($_POST['select_year']);
		$select_sem = $strip->strip($_POST['select_sem']);
		$acad_year = $strip->strip($_POST['acad_year']);
		$cursection = $strip->strip($_POST['cursection']);
		$selectresidency = $strip->strip($_POST['select_residency']);
		$idreg= $strip->strip($_POST['idreg']);
		$bagong= $strip->strip($_POST['tago']);
		$blgna= $strip->strip($_POST['blgna']);
		$blgna= $blgna + 1;

		$regstrUpdate = $func->update('registrationtbl','regID',$idreg, array(
				
				'regYrlevel' => $select_year,
				'regSem' => $select_sem,
				'regAcadYr' => $acad_year,
				'regSection' => $cursection,
				'regResidency' => $selectresidency
				));


		if($regstrUpdate){


				for($nsan= $blgna ;$nsan<=$bagong;$nsan++){
					$bagin = "bago". $nsan;
					$bags= $strip->strip($_POST[$bagin]);

					
					
					$gradeInsert = $func->insert('gradetbl',array(
								'regID' => $idreg,
								'subjID' => $bags
								));

					}

		}

			
		if($regstrUpdate){	
					
					echo '<script>alert("Succeed");</script>';
						
					

				} else {
					echo '<script>alert("EDITING COURSE FAILED !!");</script>';
				}
			
			

	}
		


	
?>
<!DOCTYPE html>
<head>
<link href='https://fonts.googleapis.com/css?family=Sonsie One' rel='stylesheet'>
	  <style>
      .container .well{
	background-color: #13D8F3;
	/*border-bottom	: 2px groove black;
	height: 100px;*/
}
	  .container .row .well{
	background-color: #F5F9F9;
	/*border-bottom	: 2px groove black;
	height: 100px;*/
}



.paper {
  background: #fff;
  padding: 30px;
  position: relative;
}

.paper,
.paper::before,
.paper::after {
  /* Styles to distinguish sheets from one another */
  box-shadow: 1px 1px 1px rgba(0,0,0,0.25);
  border: 1px solid #bbb;
}

.paper::before,
.paper::after {
  content: "";
  position: absolute;
  height: 95%;
  width: 99%;
  background-color: #eee;
}

.paper::before {
  right: 15px;
  top: 0;
  transform: rotate(-1deg);
  z-index: -1;
}

.paper::after {
  top: 5px;
  right: -5px;
  transform: rotate(1deg);
  z-index: -2;
}


.wrapper {
  height: 550px; 
 border	: 10px double green;
  border-radius: 5px;
  overflow-y: auto; 
  background-color:white;
}


.papel {
  background: #fff;
  box-shadow:
    /* The top layer shadow */
    0 -1px 1px rgba(0,0,0,0.15),
    /* The second layer */
    0 -10px 0 -5px #eee,
    /* The second layer shadow */
    0 -10px 1px -4px rgba(0,0,0,0.15),
     /* The third layer */
    0 -20px 0 -10px #eee,
    /* The third layer shadow */
    0 -20px 1px -9px rgba(0,0,0,0.15);
    /* Padding for demo purposes */
    padding: 30px;
    
}

a:hover { 
  background-color: yellow;
}

.profile-pic {
	position: relative;
	display: inline-block;
}

.profile-pic:hover .edit {
	display: block;
}

img#propix {
	max-width:100px;
}

H1,H2, H5#pangs {
	 font-family: 'Sonsie One';font-size: 25px;
}

.col-lg-2 {
  
  background-color:#add8e6;
  height: 550px;
}

hr {
	border: 2px solid black;
}
    </style>
	

 <script>
	
    document.getElementById('studlist').className = "active";
</script>
</head>
<body>
	
	
	
	<div class="container-fluid">
		<br>
	<br>
		 <div class="row" >
			<div class="col-lg-1" >
			</div>
				
				
			<div class="col-lg-10" >
				<br>
				<div class="papel">
						<div class="col-md-12 form-group">
							<div class="col-md-1">
							<a href="studlist.php" > <img src ="img/showicon.png" class="img-responsive" id="propix" name="showpropix"></img>			</a>
							</div>
							<div class="col-md-3">
								<a href="addstud.php" ><img src ="img/addnewicon.png" class="img-responsive" id="propix" name="addpropix"></img></a>
							</div>
							<div class="col-md-6">
									<H1>Student Record</H1>
							</div>
							
						</div>
						<hr>

<form method="POST" name="add_student">
				<div class="paper">
					
						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('registrationtbl',array('regID','=',$col));
							if ($cors){
								
						?>

									
							
					</div>
					 <div class="row" >
					 	<div class="col-lg-12" >
							<div class="paper">
					 	<h3>Academic Status</h3><a  href="viewstud.php?id=<?php echo escape($cors[0]['studID']); ?>">Back</a>


					 	<div class="col-lg-12 form-group">
							
					
					
							<div id="addnewcourse" >
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Course & Major:</label>
									<div class="col-md-5">

										

										<?php 


											$majorcourse = $func->select_one('curriculum',array('currID','=',$cors[0]['currID']));

											
											//echo '<script> alert(' .count($majorcourse). ');</script>';
											
											
										    echo escape($majorcourse[0]['curriName']) . " ver. " . escape($majorcourse[0]['version']);  ?>
									</div>
									<label class="col-md-2 control-label" style="text-align: right">Acad Year:</label>	
									<div class="col-md-3">
										<input type="text" placeholder="Ex: 2020-2021" class="form-control" name="acad_year" value="<?php echo escape($cors[0]['regAcadYr']);?>" required>
										<br>
									</div> 
								</div>

									
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Year Level:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_year">
											<option value = "1" <?php if($cors[0]['regYrlevel'] == '1'){ ?> selected="selected" <?php } ?> >1st Year</option>
											<option value = "2" <?php if($cors[0]['regYrlevel'] == '2'){ ?> selected="selected" <?php } ?>>2nd Year</option>
											<option value = "3" <?php if($cors[0]['regYrlevel'] == '3'){ ?> selected="selected" <?php } ?>>3rd Year</option>
											<option value = "4" <?php if($cors[0]['regYrlevel'] == '4'){ ?> selected="selected" <?php } ?>>4th Year</option>
											<option value = "5" <?php if($cors[0]['regYrlevel'] == '5'){ ?> selected="selected" <?php } ?>>5th Year</option>
										</select>
									</div>	
									<label class="col-md-1 control-label" style="text-align: right">Sem:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_sem">
											<option value = "1" <?php if($cors[0]['regSem'] == '1'){ ?> selected="selected" <?php } ?> >1st sem</option>
											<option value = "2" <?php if($cors[0]['regSem'] == '2'){ ?> selected="selected" <?php } ?>>2nd sem</option>
											<option value = "3" <?php if($cors[0]['regSem'] == '3'){ ?> selected="selected" <?php } ?>>Summer</option>
											<option value = "4" <?php if($cors[0]['regSem'] == '4'){ ?> selected="selected" <?php } ?>>Midyear</option>
											<!-- <option value = "3">Summer</option> -->
											
										</select>
									</div>

									<label class="col-md-2 control-label" style="text-align: right">Section:</label>	
									<div class="col-md-3">
										<input type="text" placeholder="1-A" class="form-control" name="cursection" value="<?php echo escape($cors[0]['regSection']);?>" required>
										<br>
									</div> 
							
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Residency :</label>
									<div class="col-md-2">

										<select class="form-control" name="select_residency">
											<option value = "0" <?php if($cors[0]['regResidency'] == '0'){ ?> selected="selected" <?php } ?>>In-house</option>
											<option value = "1" <?php if($cors[0]['regResidency'] == '1'){ ?> selected="selected" <?php } ?>>Transferee</option>
											
										</select>
									</div>
								</div>


								<div class="col-lg-12 form-group">

									<label class="col-md-2 control-label" style="text-align: right">Subject:</label>
									<div class="col-md-7">

										<select class="form-control" name="select_subject" id="mycross">

										<?php 

											$subjlist1 = $func->select_one('curri_subjtbl',array('currID','=',$cors[0]['currID'])); 

											
											
											//echo '<script> alert(' .count($subjlist1). ');</script>';
											for($n=0;$n<count($subjlist1);$n++){ 
													
										?>
											
										    <option value="<?php echo escape($subjlist1[$n]['subjID']); ?>"> <?php

										    $subjtp = $func->select_one_orderby('subjtbl',array('subjID','=',$subjlist1[$n]['subjID']),'subjCode','ASC');

										     echo escape($subjtp[0]['subjCode']) ." - " . escape($subjtp[0]['subjTitle']);

										     ?></option>
										  <?php  }  ?>
										  </select>
									</div>
									<div class="col-md-2">
											<button type="button" name="subjbut"  class="btn btn-primary" onclick="myFunction()">Add Subject</button>
									</div>

								</div>


								<div class="col-lg-12 form-group">

									<div class="row" >
                

										<center>
										<div class="table-wrapper-scroll-y my-custom-scrollbar">


											<?php	$selectenrollsub = $func->select_one('gradetbl',array('regID','=',$cors[0]['regID']));   ?>		


											<table width:800px class="table table-hover"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													<td>No.</td>
													<td colspan=3>Subject</td>
													
												</tr>

												<?php  	if (count($selectenrollsub) == 0) {echo "No Post Available";
												} else {
												//echo '<script> alert('.$col .');</script>';
												for($t=0;$t<count($selectenrollsub);$t++){  ?>

												<tr>
												<td> <?php echo $t + 1; ?>	</td>
												<td> <?php

														$subjlist41 = $func->select_one('subjtbl',array('subjID','=',$selectenrollsub[$t]['subjID']));


												 echo escape($subjlist41[0]['subjCode']) ."--". escape($subjlist41[0]['subjTitle']);   ?> 

												 <input type="hidden" class="form-control" name=<?php echo "subj".$t ?> value="<?php echo escape($selectenrollsub[$t]['subjID']); ?>" ></td>

												 <form method="POST">
												
											<td>
												<input type="hidden" name="mid" value="<?php echo escape($selectenrollsub[$t]['gradeID']); ?>"> 
												
													<input type="submit" name="deletesubreg" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
												
											</td>
											</form>



												</tr>

												<?php } ?>
														<input type="hidden" class="form-control" name="blgna" value="<?php echo count($selectenrollsub); ?>">
														<input type="hidden" class="form-control" name="idreg" value="<?php echo escape($cors[0]['regID']); ?>">
												<?php
													}
												 ?>


											</table>
										</div>
										</center>

								</div>

								
									<button type="submit" class="btn btn-md btn-info" name="regibutton"  style="float:right">pass</button>
								</div>
								
								
									
							</div>

							</form> 	

							
								
					</div>
					
							
							<hr> <!-- registration list -->

							



								
								
								
									


							<?php } ?>
							
							</div>
						</div>
						

					</div>
					
							
					
				
						
						
				
				</div>
			
			
					
			</div>
			
		</div>
	</div>
	
	
	<br>
	<br>
	<br>
	
	
	<script>
function myFunction() {
	//totalRowBlgin += 1;

  var table = document.getElementById("myTable");
  var cross = document.getElementById("mycross");

  var xcross = cross.options[cross.selectedIndex].text;
  var unglaman = cross.value;

  var pang = "bago";
  var pang2 = "tago";
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  //var cell4 = row.insertCell(3);
 // var cell5 = row.insertCell(4);
 var   totalRowBlg = table.rows.length;  totalRowBlg = table.rows.length;
 //   
 totalRowBlg = totalRowBlg -1;
 pang = pang +totalRowBlg;
 cell1.innerHTML = totalRowBlg;
  cell2.innerHTML = xcross ;
  //cell2.innerHTML = "NEW CELL2";
  //cell3.innerHTML = "NEW CELL3";
   cell3.innerHTML = "<input type='hidden' value='"+ unglaman +"' name='"+ pang +  "'> <input type='hidden' value='"+ totalRowBlg +"' name='"+ pang2 + "'>";
 //  cell4.innerHTML = unglaman;
  // cell5.innerHTML = "NEW CELL3";

  
 //  alert("totalRowBlg");


}
</script>


	
</body>
