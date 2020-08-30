<?php
	include 'menu.php';
	//include'menuside_stud.php'; 
	

	//delete enrolled course
		if ((isset($_POST['updategrades']))) {
		$mid = $_POST['mid'];

		$inputratings= $strip->strip($_POST['inputratings']);
		$inputrexam= $strip->strip($_POST['inputrexam']);
		


		$remarks = 0;

		if($inputratings <= $inputrexam){

			if($inputratings >= 6){
				$remarks = 2;
			} else{
				$remarks = 0;
			}

		} else {

			if($inputrexam <= 3){
				$remarks = 1;
			} else{
				$remarks = 0;
			}
		}

		//echo '<script>alert('.$mid.');</script>';
		//echo '<script>alert('.$inputratings.');</script>';

		$studUpdate = $func->update('gradetbl','gradeID',$mid, array(
				'rating' => $inputratings,
				'rexam' => $inputrexam,
				'remarks' => $remarks
				));


		if(!$studUpdate){	
					
				echo '<script>alert("EDITING GRADE FAILED !!");</script>';
						
	

				}


		
	}






//test
	

	if (isset($_POST['regibutton'])){


		$select_maj = $strip->strip($_POST['select_maj']);
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
				'regMajor' => $select_maj,
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

H1, H5#pangs {
	 font-family: 'Sonsie One';font-size: 25px;
}

H2 {
	 font-family: 'Sonsie One';font-size: 17px;
}

#desss{
	 font-family: 'Sonsie One';font-size: 15px;
}

.col-lg-2 {
  
  background-color:#add8e6;
  height: 550px;
}

hr {
	border: 2px solid black;
}
    </style>
	

 
</head>
<body>
							<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('registrationtbl',array('regID','=',$col));
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
									<H2>(Grade per Registration)</H2>

							</div>
							
						</div>
						<hr>

						
						<a  href="viewstud.php?id=<?php echo escape($cors[0]['studID']); ?>">Back</a>



<form method="POST" name="add_student">
				<div class="paper">
					

							<?php $studinfo = $func->select_one('studtbl',array('studID','=',$cors[0]['studID'])); ?>

					
						<div class="col-md-12 form-group">
							<label class="col-md-2 control-label" style="text-align: right">Student No: </label>
							<label class="col-md-2 control-label"><u id="desss"> <?php echo escape($studinfo[0]['studNum']) ?></u> </label>
							
							<label class="col-md-3 control-label" style="text-align: right">Student Name:</label>
							<label class="col-md-5 control-label"><u id="desss"><?php echo escape($studinfo[0]['lName']).", ". escape($studinfo[0]['fName']) ." ". escape($studinfo[0]['mName']); ?></u> </label>
						
							
									
						</div>
												
					</div>
					 <div class="row" >
					 	<div class="col-lg-12" >
						
					 	<h3>Academic Status</h3>


					 	<div class="col-lg-12 form-group">
							
					
					
							<div id="addnewcourse" >
								<div class="col-lg-12 form-group">

									<!-- function selectjoin_where($table,$table2,$ref,$ref2,$table3,$where = array()){ -->

									<?php $majorc1 = $func->select_one('curriculum',array('currID','=',$cors[0]['currID'])); ?>

									
									<label class="col-md-2 control-label" style="text-align: right">Course & Major:</label>
									<label class="col-md-5 control-label" ><?php echo escape($majorc1[0]['curriName']); ?></label>
									
									<label class="col-md-2 control-label" style="text-align: right">Acad Year:</label>	
									<label class="col-md-3 control-label" ><?php echo escape($cors[0]['regAcadYr']);?></label>	
									
								</div>

									
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Year Level:</label>
									<label class="col-md-5 control-label"> <?php if($cors[0]['regYrlevel'] == '1'){ echo "1st Year"; } else if($cors[0]['regYrlevel'] == '2'){ echo "2nd Year";  } else if($cors[0]['regYrlevel'] == '3'){ echo "3rd Year"; } else if($cors[0]['regYrlevel'] == '4'){ echo "4th Year";  } else if($cors[0]['regYrlevel'] == '5'){ echo "5th Year"; } ?></label>
									
									<label class="col-md-2 control-label" style="text-align: right">Semester:</label>
									<label class="col-md-2 control-label">
											 <?php if($cors[0]['regSem'] == '1'){ echo "1st sem"; } else if($cors[0]['regSem'] == '2'){ echo "2nd sem";  } else if($cors[0]['regSem'] == '3'){echo "Summer";   } else if($cors[0]['regSem'] == '4'){ echo "Midyear";  } ?>
								
										</label>

									
							
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">Section:</label>	
									<label class="col-md-5 control-label">
										<?php echo escape($cors[0]['regSection']);?>
										
									</label> 
									<label class="col-md-2 control-label" style="text-align: right">Residency :</label>
									

										<label class="col-md-3 control-label">
											<?php if($cors[0]['regResidency'] == '0'){ echo "In-house"; } else if($cors[0]['regResidency'] == '1'){ echo "Transferee"; } ?>
											
										</label>
									
								</div>


								


								<div class="col-lg-12 form-group">

									<div class="row" >
                

										<center>
										<div class="table-wrapper-scroll-y my-custom-scrollbar">


											<?php	$selectenrollsub = $func->select_one('gradetbl',array('regID','=',$cors[0]['regID']));   ?>		


											<table width:800px class="table table-hover"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													<td>No.</td>
													<td>Subject</td>
													<td>Ratings</td>
													<td>Re-Exam</td>
													<td>Action</td>
													
												</tr>

												<?php  	if (count($selectenrollsub) == 0) {echo "No Post Available";
												} else {
												//echo '<script> alert('.$col .');</script>';
												for($t=0;$t<count($selectenrollsub);$t++){  ?>

												<tr>
												<td> <?php echo $t + 1; ?>	</td>
												 <form method="POST">
												<td> <?php

														$subjlist41 = $func->select_one('subjtbl',array('subjID','=',$selectenrollsub[$t]['subjID']));


												 echo escape($subjlist41[0]['subjCode']) ."--". escape($subjlist41[0]['subjTitle']);   ?> 

												 <input type="hidden" class="form-control" name=<?php echo "subj".$t ?> value="<?php echo escape($selectenrollsub[$t]['subjID']); ?>" ></td>
												 <td><input type="text" class="form-control" name="inputratings" value="<?php if ($selectenrollsub[$t]['rating'] == 0){ echo null;} else {echo escape($selectenrollsub[$t]['rating']); }  ?>" ></td>
												 <td><input type="text" class="form-control" name="inputrexam" value="<?php if ($selectenrollsub[$t]['rexam'] == 0){ echo null;} else {echo escape($selectenrollsub[$t]['rexam']); }  ?>" ></td>

												
												
											<td>
												<input type="hidden" name="mid" value="<?php echo escape($selectenrollsub[$t]['gradeID']); ?>"> 
												
													<input type="submit" name="updategrades" value="Update" class="btn btn-success" >
												
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
	
	



	
</body>
