<?php
	include'mena.php';
	
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
		$userl = $func->select_logic('userstbl',array('username','=',$login_email),'AND',array('password','=',$login_password));
	
			if (count($userl)==1){
				
				$_SESSION['userid'] = $userl[0]['userID'];
				$_SESSION['permission'] = $userl[0]['permission'];
				
				$permit = $_SESSION['permission'];
				
				
				if ($permit == 1){
					header('location:studlist.php');
				} 
				else if ($permit == 2){
					header('location:studlist.php');
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
           $loginstatus =  "You've failed too many times, dude. Try again after 10 secs";
			$_SESSION['locked'] = 'locked';
			$_SESSION['timeup'] = time();
        }

	}
		
	
	
	

	if(isset($_SESSION['timeup'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['timeup'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds =  10;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
		
    }
    header("Refresh: 10;url='index.php'");
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

	<div class="col-lg-4">
	</div>
    
	<div class="col-lg-4">
	
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
						<input type="text" placeholder="Enter Username Here.." class="form-control" name="login_email">
					</div>	
						<div class="form-group">
						<input type="password" placeholder="Enter Password Here.." class="form-control" name="login_password">
					</div>		
					
	
						<button type="submit" class="btn btn-lg btn-info" name="login">Login</button>	
					</form>
				<?php	}  ?>
					
	</div>
					
	
	 
	</div>

	<div class="col-lg-4">
	</div>
	
	
</div>



</body>