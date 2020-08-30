<?php
	include 'menu.php';
	//include'menuside_stud.php'; 
	
		

	//add students
	if (isset($_POST['addstudent'])){
		
		$studnum= $strip->strip($_POST['studnum']);
		$stud_fname= $strip->strip($_POST['stud_fname']);
		$stud_midname= $strip->strip($_POST['stud_midname']);
		$stud_lname= $strip->strip($_POST['stud_lname']);
		$stud_bday= $strip->strip($_POST['stud_bday']);
		$stud_cpno= $strip->strip($_POST['stud_cpno']);
		$stud_gender= $strip->strip($_POST['stud_gender']);
		$stud_email= $strip->strip($_POST['stud_email']);
		$stud_prk= $strip->strip($_POST['stud_prk']);
		$stud_brgy= $strip->strip($_POST['stud_brgy']);
		$stud_city= $strip->strip($_POST['stud_city']);
		$stud_prov= $strip->strip($_POST['stud_prov']);
		$stud_elem= $strip->strip($_POST['stud_elem']);
		$stud_hs= $strip->strip($_POST['stud_hs']);
		
		
		//checking if username is still available
		$selectUser = $func->select_one('studtbl',array('studnum','=',$studnum));

					
		
		if($selectUser){
				
				echo '<script>alert("REGISTRATION FAILED: student number already exist!!");</script>';
			
		} else {
	
		
				
				$studentInsert = $func->insert('studtbl',array(
				'studnum' => $studnum,
				'fName' => $stud_fname,
				'mName' => $stud_midname,
				'lname' => $stud_lname,
				'gender' => $stud_gender,
				'DOB' => $stud_bday,	
				'email' => $stud_email,	
				'cpnum' => $stud_cpno,
				'prk' => $stud_prk,
				'brgy' => $stud_brgy,
				'city' => $stud_city,
				'prov' => $stud_prov,
				'elem' => $stud_elem,
				'highSchool' => $stud_hs	
				
				));
							
			
				echo '<script>alert("Added Successfully");</script>';
		
	
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
									<H1>Add New Student</H1>
							</div>
							
						</div>
						<hr>

<form method="POST" name="add_student">
				<div class="paper">
					


						<p id="warn"><?php echo $warn; ?></p>

						<div class="col-md-12 form-group">
							<label class="col-md-2 control-label">Student No: </label>
								<div class="col-md-4">
									<input type="text" placeholder="Enter Student Number" class="form-control" name="studnum" required>
								</div>
								

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-3 control-label">Name (First, Middle, Last)</label>
								<div class="col-md-3">
									<input type="text" placeholder="Enter First Name Here.." class="form-control" name="stud_fname" required>
								</div>
								
								<div class="col-md-3">
									<input type="text" placeholder="Enter Middle Name Here.." class="form-control" name="stud_midname" required>
								</div>


								
								<div class="col-md-3">
									<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="stud_lname" required>
								</div>

						</div>

						

						

						<div class="col-md-12 form-group">

								<label class="col-md-2 control-label">Birthday</label>
								<div class="col-md-4">
									<input type="date"  class="form-control" name="stud_bday" required>
								</div>
							
								
								<label class="col-md-2 control-label">Gender</label>
								<div class="col-lg-4">
									<input type="radio" name="stud_gender" value="1" checked="checked">Male 
								
								<label class="radio-inline">
								  <input type="radio" name="stud_gender" value="0"> Female
								</label>
								</div>

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Email</label>
								<div class="col-lg-4">
									<input type="email" placeholder="Enter Email" class="form-control" name="stud_email">
								</div>
								
								<label class="col-md-2 control-label">Cellphone No.</label>
								<div class="col-lg-4">
									<input   type="number"  placeholder="09XXXXXXXXX" class="form-control" max="99999999999" name="stud_cpno" required>
								</div>

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Elementary</label>
								<div class="col-lg-4">
									<input type="text" placeholder="Ex: Rio Chico Elem. School" class="form-control" name="stud_elem">
								</div>
								
								<label class="col-md-2 control-label">High School</label>
								<div class="col-lg-4">
									<input   type="text"  placeholder="Ex: Rio Chico National High School" class="form-control"  name="stud_hs" >
								</div>

						</div>


						<div class="col-md-12 form-group">
							
								
								<label class="col-md-12 control-label">Address ( Prk or Street, Brgy, City or Municipality, Province)</label>
								<div class="col-lg-3">
									<input type="text" placeholder="House No / Prk / Street" class="form-control" name="stud_prk">
								</div>
								<div class="col-lg-3">
									<input type="text" placeholder="Barangay" class="form-control" name="stud_brgy">
								</div>
								<div class="col-lg-3">
									<input type="text" placeholder="City / Municipality" class="form-control" name="stud_city">
								</div>
								<div class="col-lg-3">
									<input type="text" placeholder="Province" class="form-control" name="stud_prov">
								</div>

						</div>
						

						
						
					

			

										
						
							<div class="g-recaptcha" data-sitekey="6Lc0ZTIUAAAAABEccxQTgp1bNz3XexLxb3e5Ximp"></div>
				<center><button type="submit" class="btn btn-lg btn-info" name="addstudent"  >Add New</button>
						<button type="reset" class="btn btn-lg btn-danger" name="clearfrm">Clear form</button> 
						 </center>		
							
					</div>
					
					
							
					
				</form> 
						
						
				
				</div>
			
			
					
			</div>
			
			
		</div>
	</div>
	
	
	<br>
	<br>
	<br>
	
	
	
</body>
