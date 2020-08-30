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

		echo '<script>alert('.$mid.');</script>';
		echo '<script>alert('.$inputratings.');</script>';

		$studUpdate = $func->update('gradetbl','gradeID',$mid, array(
				'rating' => $inputratings,
				'rexam' => $inputrexam,
				'remarks' => $remarks
				));


		if($studUpdate){	
					
					echo '<script>alert("panalo");</script>';
						
					

				} else {
					echo '<script>alert("EDITING STUDENT FAILED !!");</script>';
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
	<script src="FileSaver.js"></script>
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

@media print {
	@page {margin: 0;}
	body {margin: 1.6cm;}

	 img {
        max-height: 50px !important;
     
        max-width:50px !important;
    }
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


.table-bordered th, .table-bordered td {

	padding: 15px !important;
  text-align: center !important;
  border: 1px solid #000 !important;
}


    </style>
	

 
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
								
							</div>
							<div class="col-md-6">
									<H1>Student Record</H1>
									<H2>(Grade per Registration)</H2>

							</div>
							
						</div>
						<hr>

						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('registrationtbl',array('regID','=',$col));
							if ($cors){
								
						?>
						<a  href="reportstud.php?id=<?php echo escape($cors[0]['studID']); ?>">Back</a>



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
                
										<div id="printarea">
												<br><br><br>
												<?php	$pangalannya = $func->select_one('studtbl',array('studID','=',$cors[0]['studID']));   ?>	


												<?php $angang = $func->select_one('curriculum',array('currID','=',$cors[0]['currID'])); ?>
												<?php	


												$angcoursemajor = $func->selectjoin_where('coursetbl','majortbl','courseID','courseID','majortbl',array('majorID','=',$angang[0]['majorID']));  

														//echo '<script> alert('.count($angcoursemajor).');</script>';

												 ?>	

											
											<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certifies that according to the records in this university,<strong> <?php  if($pangalannya[0]['gender'] == 1){echo "MR. ";}else{echo "MS. ";} echo strtoupper(escape($pangalannya[0]['fName']))." "; echo strtoupper(escape($pangalannya[0]['mName']))." "; echo strtoupper(escape($pangalannya[0]['lName']))." ";?> </strong> was officically enrolled under the program <strong><?php echo escape($angcoursemajor[0]['courseTitle'])." (". escape($angcoursemajor[0]['majorName']) .") ";?> </strong> and has obtained the following grades for: </p>	
										<center>
											<p><strong><?php if ($cors[0]['regYrlevel'] == 1){ echo "1st Year ";} else if ($cors[0]['regYrlevel'] == 2){ echo "2nd Year ";} else if ($cors[0]['regYrlevel'] == 3){ echo "3rd Year ";} else if ($cors[0]['regYrlevel'] == 4){ echo "4th Year ";} else if ($cors[0]['regYrlevel'] == 5){ echo "5th Year ";}  


												if ($cors[0]['regSem'] == 1){ echo "1st Semester ";} else if ($cors[0]['regSem'] == 2){ echo "2nd Semester ";} else if ($cors[0]['regSem'] == 3){ echo "Summer ";} else if ($cors[0]['regSem'] == 4){ echo "Midyear ";}  ?> A.Y. <?php echo " ". escape($cors[0]['regAcadYr']);?> </strong></p>
										<div class="table-wrapper-scroll-y my-custom-scrollbar">


											<?php	$selectenrollsub = $func->select_one('gradetbl',array('regID','=',$cors[0]['regID']));   ?>		


											<table width:800px class="table table-bordered"  height:100px; overflow: scroll; id="myTable">
												<tr style=" color:#ffffff; background-color:#0080ff;"> 
													
													<td>Subj. Code</td>
													<td>Descriptive Title</td>
													<td>Units</td>
													<td>Grades</td>
													<td>Remarks</td>
													
													
													
												</tr>

												<?php  	if (count($selectenrollsub) == 0) {echo "No Post Available";
												} else {
												//echo '<script> alert('.$col .');</script>';

													$totalnun = 0;
													$totalgrade = 0;
													$unitgrade = 0;
												for($t=0;$t<count($selectenrollsub);$t++){ 
													

												 ?>

												<tr>
												
												
												 <?php

														$subjlist41 = $func->select_one('subjtbl',array('subjID','=',$selectenrollsub[$t]['subjID']));


												   ?> 

												 <td><?php  echo escape($subjlist41[0]['subjCode']); ?> </td>
												 <td><?php  echo escape($subjlist41[0]['subjTitle']);?> </td>
												  <td>

												  		<?php if(escape($subjlist41[0]['subjUnit']) == 0){
													echo "";
												} else if(escape($subjlist41[0]['subjUnit']) <= 0) {
														$subl = escape($subjlist41[0]['subjUnit']) * -1;
														echo '('.$subl.')';
												} else{
													echo escape($subjlist41[0]['subjUnit']);
												}
												 ?>

												  </td>
												 <td><?php if ($selectenrollsub[$t]['rating'] == 0){ echo null;} else {echo escape($selectenrollsub[$t]['rating']); }  ?> </td>
												<?php 

												 	if($subjlist41[0]['subjUnit'] < 0){
												 		$nun = 0;
												 	} else {
												 		$nun = $subjlist41[0]['subjUnit'];
												 	}

												  $totalnun = $totalnun + $nun; 
												  $unitgrade = $selectenrollsub[$t]['rating'] * $nun;
												  $totalgrade = $totalgrade + $unitgrade;


												   ?>
												

												 <td><?php if($selectenrollsub[$t]['remarks'] == 1){ echo "Passed"; }else if($selectenrollsub[$t]['remarks'] == 0){ echo "Failed"; }?></td>

				
												</tr>

												

												<?php } ?>
												<tr>
													<td></td>
													<td> <center>X----------------------------------------------X</center></td>
													<td> <?php echo  $totalnun; ?></td>
													<td> </td>
													<td></td>
												</tr>
												<tr>
													<td></td>
													<td style="text-align: right;"><strong> GENERAL AVERAGE<strong></td>
													<td> </td>
													<td > <p style="font-weight: bolder; font-size: 25px"><?php $avegrade = $totalgrade / $totalnun;  echo  round($avegrade,2); ?> </p></td>
													<td></td>
												</tr>


													

														<input type="hidden" class="form-control" name="blgna" value="<?php echo count($selectenrollsub); ?>">
														<input type="hidden" class="form-control" name="idreg" value="<?php echo escape($cors[0]['regID']); ?>">
												<?php
													}
												 ?>



											</table>
										</div>
										</center>

										<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is certification is issued this <?php $currentDay = date('d'); if($currentDay == 1){echo "1st ";} else if($currentDay == 2){echo "2nd ";} else if($currentDay == 3){echo "3rd ";} else{ echo $currentDay ."th "; } ?>day of <?php echo " ".date('F Y')?> upon the request of the above-named person for references purposes.</p>

										<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prepared by:</p>

											<?php $staffko = $func->select_one('stafftbl',array('staffID','=',$staffid)); ?>

										<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo strtoupper(escape($staffko[0]['firstName'])." ". substr(escape($staffko[0]['midName']),0,1) .". ".escape($staffko[0]['lastName'])) ; ?></strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clerk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Checked and Verified by:</p>
										<p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JOCELYN A. IBARRA</strong></p>
										<p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Campus Registrar</p>

										

									</div>
								</div>
										<a href="cor_print.php?id=<?php echo  $col; ?>&stf=<?php echo $staffid; ?>"><button type="button" class="btn btn-success">Print COG</button></a>
										<!--
										<button type="submit" class="btn btn-success" name="printdata" onclick="printDiv('printarea')">Print Form</button>
									-->
								</div>
								
								
									
							</div>

							</form> 	

							
								
					</div>
					
							
							<hr> <!-- registration list -->

							<div>

<a class="word-export" href="javascript:void(0)" onclick="ExportToDoc()">Export to Doc</a>
</div>



								
								
								
									


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
				document.getElementById('ownerlist').className = "active-link";
				 $("link[rel*='icon']").attr("href", "img/logo.png");
				 
				 function printDiv(divName) {
					var printContents = document.getElementById(divName).innerHTML;
					var originalContents = document.body.innerHTML;
					
					document.body.innerHTML = printContents;
					window.print();
					document.body.innerHTML = originalContents;
				}	  
			</script>



<script type="text/javascript">
	function ExportToDoc(filename = ''){
    var HtmlHead = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' ><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
  
    var EndHtml = "</body></html>";
  
    //complete html
    var html = HtmlHead +document.getElementById("printarea").innerHTML+EndHtml;

    //specify the types
    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    
    // Specify file name
    filename = filename?filename+'.doc':'document.doc';
    
    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
        
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    
    document.body.removeChild(downloadLink);
}


</script>


	
</body>
