<?php	

	date_default_timezone_set('Asia/Manila');
	$con = new mysqli("localhost","root","","gmsdb"); 
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	// error_reporting(0);
?>
