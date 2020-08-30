<?php
	include 'menu.php';
	//include'menuside_stud.php'; 


//delete enrolled course
		if ((isset($_POST['delete']))) {
		$mid = $_POST['mid'];
		$delregs = $func->delete('registrationtbl',array('regID','=',$mid));
		if ($delregs){
	  	    echo '<script> alert("Record Deleted");</script>';
		} else {
			echo '<script> alert("Delete failed");</script>';
		}
	}


	
		
//add major
	if (isset($_POST['regibut'])){




		$sidnya = $strip->strip($_POST['idnya']);
		$select_maj = $strip->strip($_POST['select_maj']);
		$select_year = $strip->strip($_POST['select_year']);
		$select_sem = $strip->strip($_POST['select_sem']);
		$acad_year = $strip->strip($_POST['acad_year']);
		$cursection = $strip->strip($_POST['cursection']);
		$selectresidency = $strip->strip($_POST['select_residency']);
		


		$regInsert = $func->insert('registrationtbl',array(
				'studID' => $sidnya,
				'currID' => $select_maj,
				'regYrlevel' => $select_year,
				'regSem' => $select_sem,
				'regAcadYr' => $acad_year,
				'regSection' => $cursection,
				'regResidency' => $selectresidency
				
				));


				if($regInsert){
					$regiId = mysqli_insert_id($con);

					
					$bagong= $strip->strip($_POST['tago']);

					for($nsan=1;$nsan<=$bagong;$nsan++){
						$bagin = "bago". $nsan;
						$bags= $strip->strip($_POST[$bagin]);
					
						$gradeInsert = $func->insert('gradetbl',array(
								'regID' => $regiId,
								'subjID' => $bags,
								'studID' => $sidnya
								
								));

					}


				}



		$studyUpdate = $func->update('studtbl','studID',$sidnya, array(
				'curMajor' => $select_maj,
				'curYrlevel' => $select_year,
				'curSem' => $select_sem,
				'curSection' => $cursection
				));
				
				if($studyUpdate){	
					
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


    $(document).ready(function(){
			var comCount = 0 ;
			$("#kuhanan").change(function(){
				comCount = document.getElementById("kuhanan").value;
				$("#comments").load("load-jdyn.php", {
					comNewCount: comCount
				});
			});
		});




</script>
</head>
<body>
	
						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('studtbl',array('studID','=',$col));
							if ($cors){
								
						?>


	
	
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
								<a href="reportstud.php?id=<?php echo escape($cors[0]['studID']); ?>" ><img src ="img/reporticon.png" class="img-responsive" id="propix" name="addpropix"></img></a>
							</div>
							<div class="col-md-6">
									<H1>Student Record</H1>
							</div>
							
						</div>
						<hr>

<form method="POST" name="add_student">
				<div class="paper">
					
						

						<p id="warn"><?php echo $warn; ?></p>

						<div class="col-md-12 form-group">
							<label class="col-md-2 control-label" style="text-align: right">Student No: </label>
							<label class="col-md-2 control-label"><u> <?php echo escape($cors[0]['studNum']) ?></u> </label>
							
							<label class="col-md-3 control-label" style="text-align: right">Student Name:</label>
							<label class="col-md-5 control-label"><u><?php echo escape($cors[0]['lName']).", ". escape($cors[0]['fName']) ." ". escape($cors[0]['mName']); ?></u> </label>
							<br>
							<label class="col-md-2 control-label" style="text-align: right">Address: </label>
							
							<label class="col-md-9 control-label"><u><?php echo  escape($cors[0]['brgy']) .", ". escape($cors[0]['city']) .", ". escape($cors[0]['prov']); ?></u> </label>

							<br>

							<label class="col-md-2 control-label" style="text-align: right">Birthday: </label>
							<label class="col-md-2 control-label"><u> <?php echo  escape($cors[0]['DOB']);  ?></u> </label>
							
							<label class="col-md-3 control-label" style="text-align: right">Gender:</label>
							<label class="col-md-5 control-label"><u><?php if($cors[0]['gender'] == 1){ echo "male";} else {echo "female";} ?></u> </label>
							<br>

							<label class="col-md-2 control-label" style="text-align: right">Email: </label>
							<label class="col-md-2 control-label"><u> <?php echo  escape($cors[0]['email']);  ?></u> </label>
							
							<label class="col-md-3 control-label" style="text-align: right">Cellphone #:</label>
							<label class="col-md-5 control-label"><u> <?php echo  escape($cors[0]['cpnum']);  ?></u> </label>
									
						</div>
							
			
								<input type="hidden" name = "idnya" value="<?php echo $cors[0]['studID'] ?>">.
								
					
					
			

							
						
					
							
							
					</div>
					 <div class="row" >
					 	<div class="col-lg-12" >
							<div class="paper">
					 	<h3>Academic Status</h3><a data-toggle="collapse" href="#addnewcourse">Register</a>


					 	<div class="col-lg-12 form-group">
							
					
					
							<div id="addnewcourse" class=" collapse">
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Course & Major:</label>
									<div class="col-md-5">

										<select class="form-control" name="select_maj" id="kuhanan">

										<?php 


											$majorcourse = $func->selectallorderby('curriculum','curriName','ASC');
											
											//echo '<script> alert(' .count($subjlist1). ');</script>';
											for($n=-1;$n<count($majorcourse);$n++){ 

											if($n<0){
												echo"<option>";
												echo"</option>";
											} else{
													
										?>


											
										    <option value="<?php echo escape($majorcourse[$n]['currID']); ?>"> <?php echo escape($majorcourse[$n]['curriName']) . " ver. " . escape($majorcourse[$n]['version']);  ?> </option>
										  <?php } }  ?>
										  </select>
									</div>
									<label class="col-md-2 control-label" style="text-align: right">Acad Year:</label>	
									<div class="col-md-3">
										<input type="text" placeholder="Ex: 2020-2021" class="form-control" name="acad_year"  required>
										<br>
									</div> 
								</div>

									
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Year Level:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_year">
											<option value = "1">1st Year</option>
											<option value = "2">2nd Year</option>
											<option value = "3">3rd Year</option>
											<option value = "4">4th Year</option>
											<option value = "5">5th Year</option>
										</select>
									</div>	
									<label class="col-md-1 control-label" style="text-align: right">Sem:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_sem">
											<option value = "1">1st sem</option>
											<option value = "2">2nd sem</option>
											<option value = "3">Summer</option>
											<option value = "4">Midyear</option>
											
										</select>
									</div>

									<label class="col-md-2 control-label" style="text-align: right">Section:</label>	
									<div class="col-md-3">
										<input type="text" placeholder="1-A" class="form-control" name="cursection"  required>
										<br>
									</div> 
							
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Residency :</label>
									<div class="col-md-2">

										<select class="form-control" name="select_residency">
											<option value = "0">In-house</option>
											<option value = "1">Transferee</option>
											
										</select>
									</div>
								</div>	


								<div class="col-lg-12 form-group">

									<label class="col-md-2 control-label" style="text-align: right">Subject:</label>
									<div class="col-md-7" id="comments">

										<select class="form-control" name="select_subject" id="mycross">

										<?php 


											$subjlist1 = $func->selectallorderby('subjtbl','subjCode','ASC');
											
											//echo '<script> alert(' .count($subjlist1). ');</script>';
											for($n=0;$n<count($subjlist1);$n++){ 
													
										?>
											
										    <option value="<?php echo escape($subjlist1[$n]['subjID']); ?>"> <?php echo escape($subjlist1[$n]['subjCode']) . " -- " . escape($subjlist1[$n]['subjTitle']); ?></option>
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
											<table width:800px class="table table-hover"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													<td>No.</td>
													<td colspan=3>Subject</td>
													
												</tr>
											</table>
										</div>
										</center>

								</div>

								
									<button type="submit" class="btn btn-md btn-info" name="regibut"  style="float:right">Submit</button>
								</div>
								
								
									
							</div>

							</form> 	

							
								
					</div>
					
							
							<hr> <!-- registration list -->

								<?php	$selectrgstry = $func->select_one('registrationtbl',array('studID','=',$col));   ?>		


										<center>
											<h4>Enrollment History:</h4>
										<div class="table-wrapper-scroll-y my-custom-scrollbar">
											<table width:800px class="table table-hover"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													<td>No.</td>
													<td>Course & Major</td>
													<td> Academic Year </td>
													<td> Year Level </td>
													<td> Sem </td>
													<td> Section </td>
													<td> Residency </td>
													<td> Action </td>
	
												</tr>

										<?php  
										
										



										if (count($selectrgstry) == 0) {echo "No Post Available";
											} else {
											//echo '<script> alert('.$col .');</script>';
											for($t=0;$t<count($selectrgstry);$t++){  ?>

											 <tr onclick="getElementById('.<?php echo escape($t) +1; ?>.').click()" style="cursor: pointer">
											 	<td>
											 		<?php echo $t + 1; ?>
											 	</td>
											 	<td>
											 		<?php  $currinem = $func->select_one('curriculum',array('currID','=',$selectrgstry[$t]['currID']));


											 		echo escape($currinem[0]['curriName']); ?>
											 	</td>
											 	<td>
											 		<?php echo escape($selectrgstry[$t]['regAcadYr']); ?>
											 	</td>
											 	<td>
											 		<?php
											 			if(escape($selectrgstry[$t]['regYrlevel'])== 1){
											 				echo "1st year";
											 			} else if(escape($selectrgstry[$t]['regYrlevel'])== 2){
											 				echo "2nd year";
											 			}else if(escape($selectrgstry[$t]['regYrlevel'])== 3){
											 				echo "3rd year";
											 			}else if(escape($selectrgstry[$t]['regYrlevel'])== 4){
											 				echo "4th year";
											 			}else if(escape($selectrgstry[$t]['regYrlevel'])== 5){
											 				echo "5th year";
											 			}

											 		  ?>
											 	</td>
											 	<td>
											 		<?php 

											 		if(escape($selectrgstry[$t]['regSem'])== 1){
											 				echo "1st sem";
											 			} else if(escape($selectrgstry[$t]['regSem'])== 2){
											 				echo "2nd sem";
											 			}else if(escape($selectrgstry[$t]['regSem'])== 3){
											 				echo "Summer";
											 			}else if(escape($selectrgstry[$t]['regSem'])== 4){
											 				echo "Midyear";
											 			}

											 		?>

											 	</td>
											 	<td>
											 		<?php echo escape($selectrgstry[$t]['regSection']); ?>
											 	</td>
											 	<td>
											 		<?php 

											 		if(escape($selectrgstry[$t]['regResidency'])== 0){
											 				echo "In-house";
											 			} else if(escape($selectrgstry[$t]['regResidency'])== 1){
											 				echo "Transferee";
											 			}

											 		?>

											 	</td>

											 	<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($selectrgstry[$t]['regID']); ?>"> 
											<td>
												<a href="updategrade.php?id=<?php echo  escape($selectrgstry[$t]['regID']); ?> " id=".<?php echo escape($t) +1; ?>."></a>

												
												<a href="enrolledit.php?id=<?php echo  escape($selectrgstry[$t]['regID']); ?> " id=".<?php echo escape($selectrgstry[$t]['regID']); ?>."><button type="button" class="btn btn-success">Edit</button></a>
												
												
													<input type="submit" name="delete" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
												
											</td>
											</form>

											 </tr>
											 <?php 
											}
										} 
									?>

											</table>
										</div>
										</center>

								
								
								
									


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
