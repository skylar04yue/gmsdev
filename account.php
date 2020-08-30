<?php
	include 'menu.php';
	


	if($_COOKIE['registerna'] == 1){
		echo '<script> 
		  alert("New Registration was Successful");</script>';
		  setcookie("registerna","");
	} else if($_COOKIE['registerna'] == 2){
		echo '<script> 
		  alert("Registration failed");</script>';
		  setcookie("registerna","");
	} 


//signup for staff
	if (isset($_POST['signup'])){
			
		$reg_fname= $strip->strip($_POST['reg_fname']);
		$reg_lname= $strip->strip($_POST['reg_lname']);
		$reg_mname= $strip->strip($_POST['reg_midname']);
		$reg_nname= $strip->strip($_POST['reg_nickname']);
		$reg_address= $strip->strip($_POST['reg_address']);
		$reg_bday= $strip->strip($_POST['reg_bday']);
		$reg_cpno= $strip->strip($_POST['reg_cpno']);
		$reg_gender= $strip->strip($_POST['reg_gender']);
		$reg_email= $strip->strip($_POST['reg_email']);
		$reg_user1= $strip->strip($_POST['reg_user1']);
		$reg_user2= $strip->strip($_POST['reg_user2']);
		$reg_password1= $strip->strip($_POST['reg_password1']);
		$reg_password2= $strip->strip($_POST['reg_password2']);
		
		
		//checking if username is still available
		$selectUser = $func->select_one('userstbl',array('username','=',$reg_user1));
		
		if($selectUser){
				$warn ="Username already Taken";
			
		} else {
	
		
	
				
			
			
					
				//set registration info into cookies
				setcookie("regfname", $reg_fname, time() + 3600);
				setcookie("reglname", $reg_lname, time() + 3600);
				setcookie("regmname", $reg_mname, time() + 3600);
				setcookie("regnname", $reg_nname, time() + 3600);
				setcookie("regaddress", $reg_address, time() + 3600);
				setcookie("regbday", $reg_bday, time() + 3600);
				setcookie("regcpno", $reg_cpno, time() + 3600);
				setcookie("reggender", $reg_gender, time() + 3600);
				setcookie("regemail", $reg_email, time() + 3600);
				setcookie("reguser", $reg_user1, time() + 3600);
				setcookie("regpassword", md5($reg_password1), time() + 3600);
				
				$warn = $_COOKIE['regfname'];

					//echo '<script>alert("bakit");</script>';
				
				
				header('location:verify.php');
							
			
	
		
	
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


.profile-pic {
	position: relative;
	display: inline-block;
}

.profile-pic:hover .edit {
	display: block;
}

img#propix {
	max-width:150px;
}

H1,H2, H5#pangs {
	 font-family: 'Sonsie One';font-size: 22px;
}

.col-lg-2 {
  
  background-color:#add8e6;
  height: 550px;
}

hr {
	border: 3px dashed black;
}
    </style>
	

 <script>
	
    document.getElementById('account').className = "active";
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
					<H1>Sign Up</H1>


					


	
	<div class="row">

				<form method="POST" name="register" onSubmit="return formValidation();">
				<div class="paper">
					


						<p id="warn"><?php echo $warn; ?></p>

						<div class="col-md-12 form-group">
							
								<H4>PERSONAL INFO</H4>

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">First Name</label>
								<div class="col-md-4">
									<input type="text" placeholder="Enter First Name Here.." class="form-control" name="reg_fname" required>
								</div>
								<label class="col-md-2 control-label">Middle Name</label>
								<div class="col-lg-4">
									<input type="text" placeholder="Enter Middle Name Here.." class="form-control" name="reg_midname" required>
								</div>

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Last Name</label>
								<div class="col-md-4">
									<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="reg_lname" required>
								</div>
								<label class="col-md-2 control-label">Nickname</label>
								<div class="col-lg-4">
									<input type="text" placeholder="Enter Nickname Here.." class="form-control" name="reg_nickname">
								</div>

						</div>


						<div class="col-md-12 form-group">
							
								
								<label class="col-md-2 control-label">Address</label>
								<div class="col-lg-10">
									<input type="text" placeholder="Enter Address Here.." rows="3" class="form-control" name="reg_address" required>
								</div>



						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Birthday</label>
								<div class="col-md-4">
									<input type="date"  class="form-control" name="reg_bday" required>
								</div>
								
								<label class="col-md-2 control-label">Gender</label>
								<div class="col-lg-4">
									<input type="radio" name="reg_gender" value="Male" checked="checked">Male 
								
								<label class="radio-inline">
								  <input type="radio" name="reg_gender" value="Female"> Female
								</label>
								</div>

						</div>

						<div class="col-md-12 form-group">
							
								

								<label class="col-md-2 control-label">Email</label>
								<div class="col-lg-4">
									<input type="email"  class="form-control" name="reg_email">
								</div>
								
								<label class="col-md-2 control-label">Cellphone No.</label>
								<div class="col-lg-4">
									<input   type="number"  placeholder="09XXXXXXXXX" class="form-control" max="99999999999" name="reg_cpno" required>
								</div>

						</div>

						
						<div class="col-md-12 form-group">
							
								<H4>LOG IN INFO</H4>

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Username</label>
								<div class="col-md-4">
									<input type="text" placeholder="Enter Username.." class="form-control" name="reg_user1" required>
								</div>
								<label class="col-md-2 control-label">Verify Username</label>
								<div class="col-lg-4">
									<input type="text" placeholder="Verify Username.." class="form-control" name="reg_user2" required>
								</div>

						</div>


						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Password</label>
								<div class="col-md-4">
									<input type="password" placeholder="Minimum of 8 characters, First character must be letter" class="form-control" name="reg_password1" required>
								</div>
								<label class="col-md-2 control-label">Verify Password</label>
								<div class="col-lg-4">
									<input type="password" placeholder="Verify Password Here.." class="form-control" name="reg_password2" required>
								</div>

						</div>
					

			

										
						
							<hr>
							<div class="g-recaptcha" data-sitekey="6Lc0ZTIUAAAAABEccxQTgp1bNz3XexLxb3e5Ximp"></div>
				<center><button type="submit" class="btn btn-lg btn-info" name="signup"  >Sign Up</button>
						<button type="reset" class="btn btn-lg btn-danger" name="clearfrm"  onclick="location.reload();" >Clear form</button> 
						 </center>		
							
					</div>
					
					
							
					
				</form> 
				
	</div>
				
				</div>

			
			
					
			</div>
			
			
		</div>
	</div>
	
	
	<script>
	function formValidation()
	{

		var user1 = document.register.reg_user1.value;
		var user2 = document.register.reg_user2.value;
		var pass1 = document.register.reg_password1;
		var pass2  = document.register.reg_password2;
		var passlen = pass1.value.length;
		var passval = pass1.value;
		var passval2 = pass2.value;
		
		

		
		if (user1 == user2){
			if (samelike(passval,passval2,'PASSWORD')){
				if(passlength(passlen)){
					if(alphanumeric(passval)){	
					return true;
					}
				}
			}
		}
		return false;		
	}
		
	function samelike(formelem1,formelem2,textvalue){
		if(formelem1 == formelem2){	
			return true;
		} else {
			alert(textvalue + " did not match");
			return false;
		}
	}
	
	function passlength(pass){
		if(pass < 8){
			alert("Password must be minimum of 8 characters");
			return false;
		} else {
			return true;
		}
	}
	
	
	function alphanumeric(uadd)
		{ 
					
		var letters = new RegExp('^[a-zA-Z]{1}[0-9a-zA-Z]+$');
		if(uadd.match(letters))
		{
			
		return true;
		}
		else
		{
		alert('Password must start with a letter');
		uadd.focus();
		return false;
		}
		}
	
</script>
	
	
	
</body>
