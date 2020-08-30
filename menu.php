<?php 
	$usern = null;


?>


<!DOCTYPE html>
<html style = "height: 100%; margin: 0;" lang="en">
<head>
	<link rel="icon" href="img/papayalogo.png" type="image/*" sizes="16x16">
	<title>NEUST OCP Grade Management System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<script src="lib/bootstrap/js/jquery-3.2.1.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="lib/assets/css/font-awesome.css" rel="stylesheet" />
    
	<!-- CUSTOM STYLES-->
    <link href="lib/assets/css/custom.css" rel="stylesheet" />
		
	<!--Leaflet basic-->
	<link rel="stylesheet" href="lib/leaflet/leaflet.css" />
	<script src="lib/leaflet/leaflet.js"/></script>
		
	<!--Ckeditor-->
	<script src="cdn/ckeditor_4.6.2_standard/ckeditor/ckeditor.js"/></script>
	
	<!--css style-->
	<style type="text/css">
		#mapid {
			height:100%;
			width:100%;
			background:#888888;
		}

		.navbar {
			    color: #FFFFFF;
			    background-color: #0080ff;
			}
		
	</style>
</head>

<?php 
	session_start();
	include 'core/init.php';
	
	error_reporting(0); //anti - Full Path Disclosure
?>
<center><div id="menu">
	<?php
		if(empty($_SESSION['userid'])){  
	?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<ul class="nav navbar-nav navbar-right">
						<li ><H1> NEUST PAPAYA OFF CAMPUS GRADE MANAGEMENT SYSTEM </H1> </li>
					</ul>
					<a class="navbar-brand" rel="home">
								<img style="max-width:135px; margin-top: -2px;"
								 src="img/headpay.png">
					</a>	
				</div>
				
			<div class="navbar-header " style="float:left;"></div>
		</nav>
		
	<?php

		header('location:index.php');

		} else {
			$useracc = $func->select_one('userstbl',array('userID','=',$_SESSION['userid']));
			
			if($useracc[0]['permission'] >= 1){
				$perid = $useracc[0]['staffID'];


				$_SESSION['peracc'] = $perid;
				
		
				$peracc = $func->select_one('stafftbl',array('staffID','=',$perid));

				
	?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" rel="home" href="index.php">
						<img style="max-width:120px; margin-top: -7px;"
						 src="img/headpay.png">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="act" id="studlist" ><a href="studlist.php" >Student List</a></li>
						<li class="act" id="account" ><a href="account.php" >Accounts</a></li>
						<li class="act" id="dash"><a href="dashboard.php" >Dashboard </a> </li>
			<?php 
					if($useracc[0]['permission'] >= 2){?>
						<li class="a" id="bor"><a href="neighbormap.php" >Community Map</a></li>
				
						<li class="act" id="gallery"><a href="multialbum_gallery.php" >Gallery</a></li>
				<?php 	}
					if($useracc[0]['permission'] == 3){				?>		
						<li class="act" id="contact"><a href="contactus.php" >Contact Us</a></li>
						<li class="act" id="faq"><a href="faq.php" >FAQ</a></li>
						
				<?php 	}?>		
					
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="act" id="signuplog"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>
						<?php echo $peracc[0]['firstName']; ?> Log out</a></li>

					</ul>
				</div>
			</div>
		</nav>
				

<?php				
		$usern	= $peracc[0]['firstName'] . $peracc[0]['cpnum'];	
		$staffid = $peracc[0]['staffID'];	
	 } 
	}
?>
</div></center>

		

