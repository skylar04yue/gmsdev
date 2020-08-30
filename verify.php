<?php
	include'menu.php';
	
		

				$regfname = $_COOKIE['regfname'];
				$reglname = $_COOKIE['reglname'];
				$regmname = $_COOKIE['regmname'];
				$regnname = $_COOKIE['regnname'];
				$regaddress = $_COOKIE['regaddress'];
				$regbday = $_COOKIE['regbday'];
				$regcpno = $_COOKIE['regcpno'];
				$reggender = $_COOKIE['reggender'];
				$regemail = $_COOKIE['regemail'];
				$reguser = $_COOKIE['reguser'];
				$regpassword = $_COOKIE['regpassword'];
				

				$warn1 = $_COOKIE['regfname'];
				$warn2 = $_COOKIE['reglname'];

							
				$personInsert = $func->insert('stafftbl',array(
				'firstName' => $regfname,
				'lastName' => $reglname,
				'nickName' => $regnname,
				'midName' => $regmname,
				'cpnum' => $regcpno,
				'address' => $regaddress,
				'bday' => $regbday,		
				'gender' => $reggender,
				'email' => $regemail
				));
				
			

				

				if($personInsert){
					
					$lastindex = mysqli_insert_id($con);
					
						$userInsert = $func->insert('userstbl',array(
						'username' => $reguser,
						'password' => $regpassword,
						'staffID' => $lastindex,
						'permission' => '1'
						));
						
						if($personInsert){

							setcookie("fullname","");
							setcookie("regfname","");
							setcookie("reglname","");
							setcookie("regmname","");
							setcookie("regnname","");
							setcookie("regaddress","");
							setcookie("regbday","");
							setcookie("regcpno","");
							setcookie("reggender", "");
							setcookie("regemail", "");
							setcookie("reguser", "");
							setcookie("regpassword","");
							setcookie("registerna",1,time() + 3600);
							

							
						}
				} else {
					setcookie("registerna",2,time() + 3600);
				}
					
					header('location:account.php');
			

?>


