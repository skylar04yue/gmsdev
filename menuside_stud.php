<head>
	<title>Simple Responsive Admin</title>
	
	<!-- BOOTSTRAP STYLES-->
    <link href="lib/assets/css/bootstrap.css" rel="stylesheet" />
    
	<!-- FONTAWESOME STYLES-->
    <link href="lib/assets/css/font-awesome.css" rel="stylesheet" />
    
	<!-- CUSTOM STYLES-->
    <link href="lib/assets/css/custom.css" rel="stylesheet" />
	
	<!-- JQUERY-->
	<script src="lib/bootstrap/js/jquery-3.2.1.js"></script>
	
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<?php 
		$x =2;
	?>
 
</head>
<body>
	<div id="mydiv">	
		<script>
			document.getElementById('dash').className = "active";
			var but = document.createElement('button');
			var spn1 = document.createElement('span');
			var spn2 = document.createElement('span');
			var spn3 = document.createElement('span');
			
			//creates set elements attribute
			but.setAttribute('class','navbar-toggle');
			but.setAttribute('data-toggle','collapse');
			but.setAttribute('data-target','.sidebar-collapse');
			spn1.setAttribute('class','icon-bar');
			spn2.setAttribute('class','icon-bar');
			spn3.setAttribute('class','icon-bar');
			
			but.appendChild(spn1);
			but.appendChild(spn2);
			but.appendChild(spn3);
			document.getElementById('bub').appendChild(but);
		</script>  
		<div id="wrapper">
        
			<!-- /. NAV TOP  -->
			<nav class="navbar-default navbar-side" role="navigation">		 
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
						<h3>&nbsp;OPERATIONS</h3>  				
						<li class="act" id="main">
							<a href="studlist.php" ><i class="fa fa-address-book "></i>Show List<span class="badge" id="include"></span></a>
						</li >
						<li class="act" id="msglist">
							<a href="addstud.php"><i class="fa fa-user-plus"></i>Add Student<span class="badge" id="show" style="background-color:red"></span></a>
						
						</li>
						
					</ul>
				</div>

			</nav>
		</div>
    </div>
</body>