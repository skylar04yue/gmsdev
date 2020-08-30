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
				'regMajor' => $select_maj,
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
								'subjID' => $bags
								
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
							<div class="col-md-4">
							<a href="studlist.php" > <img src ="img/showicon.png" class="img-responsive" id="propix" name="showpropix"></img>			</a>
							</div>
							
							<div class="col-md-6">
									<H1>Collection of Records</H1>
							</div>
							
						</div>
						<hr>


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
					 	<h3>Academic Status</h3>
					 
					
							
							<hr> <!-- registration list -->

								<?php	$selectrgstry = $func->select_logic('registrationtbl',array('studID','=',$col),'AND',array('regResidency','=',0));   ?>		

										<h4>Certificate of Grades:</h4>
										<center>
											
										<div class="table-wrapper-scroll-y my-custom-scrollbar">
											<table width:800px class="table table-hover"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													<td>No.</td>
													<td>Course & Major</td>
													<td> Academic Year </td>
													<td> Year Level </td>
													<td> Sem </td>
													<td> Section </td>
													
	
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
											 	

											 	<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($selectrgstry[$t]['regID']); ?>"> 
												<a href="certofgrade.php?id=<?php echo  escape($selectrgstry[$t]['regID']); ?> " id=".<?php echo escape($t) +1; ?>."></a>

											
											</form>

											 </tr>
											 <?php 
											}
										} 
									?>

											</table>
										</div>
										</center>

								
									<hr> <!-- registration list -->

									<?php	$selectpros = $func->select_distinctwhere('registrationtbl','regID','ASC',array('currID'),array('studID','=',$col));      
									         ?>	


										
								
									<h4>Evaluation Forms:</h4>
										<center>
											


										<div class="table-wrapper-scroll-y my-custom-scrollbar">
											<table width:800px class="table table-hover"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													<td>No.</td>
													<td>Course & Major</td>
												</tr>

												<?php  
										
										



										if (count($selectpros) == 0) {echo "No Post Available";
											} else {
											//echo '<script> alert('.$col .');</script>';
												
											for($i=0;$i<count($selectpros);$i++){  ?>

											 <tr onclick="getElementById('.<?php echo $rom . escape($i) +200; ?>.').click()" style="cursor: pointer">
													<td><?php echo $i + 1; ?></td>
													<td>
											 		<?php  $currinem = $func->select_one('curriculum',array('currID','=',$selectpros[$i]['currID']));

											 			//echo '<script> alert('.$col .');</script>';
											 		echo escape($currinem[0]['curriName']) ." ver. ". escape($currinem[0]['version']); ?>
											 	</td>

											 		<form method="POST">
												<input type="hidden" name="pid" value="<?php echo escape($selectpros[$i]['currID']); ?>"> 
												<a href="evaluation.php?id=<?php echo $selectpros[$i]['currID'];?>&studid=<?php echo $col;?>" id=".<?php echo $rom .  escape($i) +200; ?>."></a>

											
											</form>

												</tr>
												 <?php 
												}
											} 
										?>

											</table>


										</div>
									</center>

									<hr>
									<a href="spr.php?id=<?php echo $col;?>" id=".<?php echo $rom .  escape($i) +300; ?>."><h4>Student's Permanent Record</h4></a>

									

							<?php } ?><!-- end of col -->
							
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
