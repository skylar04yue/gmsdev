<?php
	include 'menu.php';

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

.table-fit {
    width: auto !important;;
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
							<div class="col-md-8">
									<H1>Student's Permanent Record</H1>
									

							</div>
							
						</div>
						<hr>

						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$studinfo = $func->select_one('studtbl',array('studID','=',$col));
							if ($studinfo){
								
						?>
						<a  href="reportstud.php?id=<?php echo $col; ?>">Back</a>



<form method="POST" name="add_student">
				<div class="paper">
					

							

					
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
				
								
								<div id="printarea">
	
								<div class="col-lg-12 form-group">

									<div class="row" >
											
											<?php for($j=1;$j<=5;$j++){

												$reginfo = $func->select_logic('registrationtbl',array('studID','=',$col),'AND',array('regYrlevel','=',$j));

												
												
												echo'<div class="col-md-12 form-group">';
												echo"<p>";
													

													if ($reginfo[0]['regYrlevel'] == 1){ echo "1st Year ";} else if ($reginfo[0]['regYrlevel'] == 2){ echo "2nd Year ";} else if ($reginfo[0]['regYrlevel'] == 3){ echo "3rd Year ";} else if ($reginfo[0]['regYrlevel'] == 4){ echo "4th Year ";} else if ($reginfo[0]['regYrlevel'] == 5){ echo "5th Year ";} 
												echo"</p>";

												for($k=1;$k<=4;$k++){


													$reginfo = $func->select_logics2('registrationtbl',array('studID','=',$col),'AND',array('regYrlevel','=',$j),'AND',array('regSem','=',$k));

													echo '<div class="col-md-5">';
													echo"<p>";
													
													if ($reginfo[0]['regSem'] == 1){ echo "1st Semester ";} else if ($reginfo[0]['regSem'] == 2){ echo "2nd Semester ";} else if ($reginfo[0]['regSem'] == 3){ echo "Summer ";} else if ($reginfo[0]['regSem'] == 4){ echo "Midyear ";} 
													echo"</p>";
												
													
													$gradenya = $func->select_one('gradetbl',array('regID','=',$reginfo[0]['regID']));

													if(count($gradenya) != 0){ //start if

													?>
														
														<div class="table-responsive">

														<table border=1 class="table table-fit" style="text-align: center">
														   <tr>
														   		<th>Subject</th>
														   		<th>Rating</th>
														   		<th>Re Exam</th>
														   		<th>Credit</th>
														   </tr>

													<?php	   for($f=0; $f<count($gradenya);$f++):  ?>

														   <tr>
														   		<td><?php 

														   			$pangsubj = $func->select_one('subjtbl',array('subjID','=',$gradenya[$f]['subjID']));

														   		echo escape($pangsubj[0]['subjCode']);

														   		 ?></td>
														   		<td><?php 

														   		if($reginfo[0]['regResidency'] == 1){
														   			echo "X";
														   		}
														   			
														   		else{
														   			if($gradenya[$f]['rating']> 0){
														   			echo escape($gradenya[$f]['rating']); 
														   			} else {
														   				echo " ";
														   			}

														   		}




														   		


														   		?></td>
														   		<td><?php 


														   		if($reginfo[0]['regResidency'] == 1){
														   			echo "X";
														   		} else{

														   			if($gradenya[$f]['rexam']> 0){
														   			echo escape($gradenya[$f]['rexam']); 
															   		} else {
															   			echo " ";
															   		}
														   		}



														   		


														   		?></td>
														   		<td><?php 

														   				if($reginfo[0]['regResidency'] == 1){
														   			echo " ";
														   		} else{
														   			if($pangsubj[0]['subjUnit'] < 0){
														   			echo "(" .$pangsubj[0]['subjUnit'] * -1 .")" ;
														   		} else {
														   			echo escape($pangsubj[0]['subjUnit']);
														   		}
														   			
														   		}



														   		
														   		?></td>
														   </tr>

													<?php   endfor; ?>
														</table>
													</div>
												
												
												<?php
													} //end if
														echo'</div>';
												}
											echo'</div>';
											}?>

															

									</div> <!--end of print area -->
								</div>

								
										<button type="submit" class="btn btn-success" name="printdata" onclick="printDiv('printarea')">Print Form</button>
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
