<?php
	include'menu.php';
	
	$warn = null;
	$validity = 2;
	$status = null;
	$loginstatus = null;
	//Login
	
	if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
	// var_dump($_POST);
	 $secret = "6Lc0ZTIUAAAAAB1lLNGAWq5Osd7-3gD6L0nn8mlu";
	 $captcha = $_POST['g-recaptcha-response'];
	 $ip = $_SERVER['REMOTE_ADDR'];
	 $rsp =file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remotepip$ip");
	 var_dump($rsp);
	
	$arr = json_decode($rsp,TRUE);
	if($arr['success']){
		$validity = 1;
		echo 'DOne';
	} else {
		$validity = 2;
		echo 'spam';
	}
	 
  }

  if (!isset($_SESSION["attempts"]))
            $_SESSION["attempts"] = 0;

  
	if(isset($_POST['login'])  ){
		$login_email =  $strip->strip($_POST['login_email']);
		$login_password =  md5($strip->strip($_POST['login_password']));
		
		$loginstatus = $_SESSION["attempts"];
	
		if ($_SESSION["attempts"] < 2)
        {
		$userl = $func->select_logic('users',array('username','=',$login_email),'AND',array('password','=',$login_password));
	
			if (count($userl)==1){
				
				$_SESSION['userid'] = $userl[0]['user_id'];
				$_SESSION['permission'] = $userl[0]['permission'];
				
				$permit = $_SESSION['permission'];
				
				
				if ($permit == 1){
					header('location:myaccount.php');
				} 
				else if ($permit == 2){
					header('location:dashboard.php');
				}
				
				else {
			
					header('location:index.php');
				}
			}  else

            {
                 
                $_SESSION["attempts"] = $_SESSION["attempts"] + 1;
				$loginstatus =   $_SESSION["attempts"] . " try(ies)";
				
            }

		 }
        else
        {
           $loginstatus =  "You've failed too many times, dude. Try again after 30 mins";
			$_SESSION['locked'] = 'locked';
			$_SESSION['timeup'] = time();
        }

	}
		
	//signup for members
	if (isset($_POST['signup'])){
			
		$reg_fname= $strip->strip($_POST['reg_fname']);
		$reg_lname= $strip->strip($_POST['reg_lname']);
		$reg_midname= $strip->strip($_POST['reg_midname']);
		$reg_address= $strip->strip($_POST['reg_address']);
		$reg_bday= $strip->strip($_POST['reg_bday']);
		$reg_cpno= $strip->strip($_POST['reg_cpno']);
		$reg_gender= $strip->strip($_POST['reg_gender']);
		$reg_email1= $strip->strip($_POST['reg_email1']);
		$reg_email2= $strip->strip($_POST['reg_email2']);
		$reg_password1= $strip->strip($_POST['reg_password1']);
		$reg_password2= $strip->strip($_POST['reg_password2']);
		$ref_fname= $strip->strip($_POST['ref_fname']);
		$ref_lname= $strip->strip($_POST['ref_lname']);
		
		//checking if reference person is in the person table
		$selectUser = $func->select_one('users',array('username','=',$reg_email1));
		
		if($selectUser){
				$warn ="Username already Taken";
			
		} else {
	
		//checking if reference person is in the person table
		$selectperson = $func->select_logic('person',array('firstname','=',$ref_fname),'AND',array('lastname','=',$ref_lname));
	
		if($selectperson && $validity == 1){
			$refemail = $selectperson[0]['email']; 
			$pid = $selectperson[0]['person_id']; 
			
			//checking if the id is in mngt list
			$member = $func->select_one('mngt_memberslist',array('pid','=',$pid));
			
			if ($member ) {
					
				
				//creates code
				$magicword = chr(mt_rand(97, 122)). substr(md5(str_shuffle(time() . rand(0, 999999))), 1);
				$magicword = substr($magicword,10,8);
				
				//mail credentials
				$subject = 'VERIFICATION CODE';
				$message = "Your verification Code is ".$magicword ." Verify " ."<a href='http://ireneaestate.x10host.com/verify.php'>Here</a>";
							
				//send codes to email
				mail($refemail, $subject, $message);
				
				//set registration info into cookies
				setcookie("regfname", $reg_fname, time() + 3600);
				setcookie("reglname", $reg_lname, time() + 3600);
				setcookie("regaddress", $reg_address, time() + 3600);
				setcookie("regbday", $reg_bday, time() + 3600);
				setcookie("regcpno", $reg_cpno, time() + 3600);
				setcookie("reggender", $reg_gender, time() + 3600);
				setcookie("regemail", $reg_email1, time() + 3600);
				setcookie("regpassword", md5($reg_password1), time() + 3600);
				setcookie("refid", $pid, time() + 3600);
				setcookie("magicword", $magicword, time() + 3600);
				
				header('location:verify.php');
							
			} else {
				echo '<script>alert("Sorry! Your Reference Person is not in our list");</script>';
			}
					
		} else{
			echo '<script>alert("Sorry! Your Reference Person is not in our list");</script>';
		}
	
		}
	
	}
	
	$expireAfter =2;

	if(isset($_SESSION['timeup'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['timeup'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
		
    }
    header("Refresh: 120;url='register.php'");
}

?>
<!DOCTYPE html>
<head>

<title>Registration</title>
  
   <style>
      .container .well{
	background-color: #0080ff;
	/*border-bottom	: 2px groove black;
	height: 100px;*/
}
	  .container .row .well{
	background-color: #F5F9F9;
	/*border-bottom	: 2px groove black;
	height: 100px;*/
}

h1{
	color:white;
}

p#warn{
	color:red;
	font-weight:600;
}

    </style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<script>
	
    document.getElementById('signuplog').className = "active";
</script>
		
		<br>
		<br>
		<br>

	
		
<div class="container">
    
	<div class="col-lg-5">
	
	<div class="well well-lg">
	
			<?php 
					if(isset($_SESSION['locked']) ) { ?>
						<H1><?php echo $loginstatus; ?></H1>
				<?php	}
					else
					{  ?>
	
					<form method="POST" action="">
					<div class="form-group">
						<p><?php echo $loginstatus; ?> </p>
						<H1>Log In</H1>
					
						</div>	
							<div class="form-group">
						<input type="email" placeholder="Enter Email Address Here.." class="form-control" name="login_email">
					</div>	
						<div class="form-group">
						<input type="password" placeholder="Enter Password Here.." class="form-control" name="login_password">
					</div>		
					
	
						<button type="submit" class="btn btn-lg btn-info" name="login">Login</button>	
					</form>
				<?php	}  ?>
					
	</div>
					
	
	 <div class="jumbotron">
   <H2>Enjoy Your Priviledges!!</H2>
    <blockquote>
	<p>If you are a bonafide resident of Irenea Subdivision. This is for you! With your account you can enjoy
	 more feautures of the website has to offer such as know your neighbors and more.</p>
	  </blockquote>
  </div>
	</div>
	<div class="col-lg-1">
	
	</div>
	<div class="col-lg-6 well">
	
	<H1>Sign Up</H1>
	
	<div class="row">
				<form method="POST" name="register" onSubmit="return formValidation();">
				<div class="paper">
					
						<p id="warn"><?php echo $warn; ?></p>
							<div class="form-group">
								<label>First Name</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control" name="reg_fname" required>
							</div>
							<div class="form-group">
								<label>Middle Name</label>
								<input type="text" placeholder="Enter Middle Name Here.." class="form-control" name="reg_midname" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="reg_lname" required>
							</div>
										
						<div class="form-group">
							<label>Address</label>
							<input type="text" placeholder="Enter Address Here.." rows="3" class="form-control" name="reg_address" required>
						</div>	
						<div class="form-group">
							<label>Gender   :</label>
						
							<label class="radio-inline">
								  <input type="radio" name="reg_gender" value="Male" checked="checked">Male
								</label>
								<label class="radio-inline">
								  <input type="radio" name="reg_gender" value="Female">Female
								</label>
								
						</div>	
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Birthday</label>
								<input type="date" placeholder="Enter City Name Here.." class="form-control" name="reg_bday" required>
							</div>	
							<div class="col-sm-6 form-group">
								<label>Cellphone No.</label>
								<input   type="number"  placeholder="09XXXXXXXXX" class="form-control" max="99999999999" name="reg_cpno" required>
							</div>		
						</div>
						<div class="form-group">
						<label>Email Address</label>
						<input type="email" placeholder="Enter Email Address Here.." class="form-control" name="reg_email1" required>
					</div>	
						<div class="form-group">
						<label>Verify Email Address</label>
						<input type="email" placeholder="Verify Email Address Here.." class="form-control" name="reg_email2" required>
					</div>	
						
							<div class="form-group">
								<label>Password</label>
								<input type="password" placeholder="Minimum of 8 characters, First character must be letter" class="form-control" name="reg_password1" required>
							</div>		
							<div class="form-group">
								<label>Verify Password</label>
								<input type="password" placeholder="Verify Password Here.." class="form-control" name="reg_password2" required>
							</div>	
							
					</div>
					
					<div class="paper2">
					<hr>
					<div class="form-group">
					
						<label>REFERENCE PERSON INFO:</label>
						 <p class="bg-info">Enters the info about the unit owner to verify your legitimacy. We will send verification code to your reference's email address.</p>
					</div>	
					<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control" name="ref_fname" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="ref_lname" required>
							</div>
						</div>		
				<div class="g-recaptcha" data-sitekey="6Lc0ZTIUAAAAABEccxQTgp1bNz3XexLxb3e5Ximp"></div>
				<button type="submit" class="btn btn-lg btn-info"name="signup"  >Sign Up</button>			
					</div>
							
					
				</form> 
				
	</div>
		
	</div>
</div>

<script>
	function formValidation()
	{
		var email1 = document.register.reg_email1.value;
		var email2 = document.register.reg_email2.value;
		var pass1 = document.register.reg_password1;
		var pass2  = document.register.reg_password2;
		var passlen = pass1.value.length;
		var passval = pass1.value;
		var passval2 = pass2.value;
		
		
		
		if (samelike(email1,email2,'EMAILS')){
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