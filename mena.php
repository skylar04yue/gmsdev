<!DOCTYPE html>
<html style = "height: 100%; margin: 0;" lang="en">
<head>
	<link rel="icon" href="img/papayalogo.png" type="image/*" sizes="16x16">
	<title>NEUST OCP Grading Management System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<script src="lib/bootstrap/js/jquery-3.2.1.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link href="lib/assets/css/font-awesome.css" rel="stylesheet" />
    
	<!-- CUSTOM STYLES-->
    <link href="lib/assets/css/custom.css" rel="stylesheet" />
		
	
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
<center><div id="mena">
	
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
		
	
</div></center>

		

