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
						<h3>&nbsp;ADMIN DASHBOARD</h3>  				
						<li class="act" id="main">
							<a href="dashboard.php"><i class="fa fa-university " id="lintek"></i>Course</a>
						</li>
						
						<li class="act" id="major">
							<a href="major.php"><i class="fa fa-graduation-cap "></i>Major</a>
						</li >
						<li class="act" id="subject">
							<a href="#showsubs" data-toggle="collapse" ><i class="fa fa-book " ></i>Subjects</a>
							</li>
							<div id="showsubs" class="collapse">
								<ul class="nav" id="sidebar-collapse">
								<li class="act" id="major">
									<a href="subject.php"><i class="fa fa-list "></i>All Subjects</a>
								</li >
								<li class="act" id="major">
									<a href="prereq.php"><i class="fa fa-asterisk"></i>Pre Requisite Subjects</a>
								</li >
								</ul>
							</div>
						
						<li class="act" id="prospectus">
							<a href="#showsubspros"  data-toggle="collapse"><i class="fa fa-table " ></i>Prospectus</a>
						</li>
							<div id="showsubspros" class="collapse">
								<ul class="nav" id="sidebar-collapse">
								<li class="act" id="major">
									<a href="prospectus.php"><i class="fa fa-list "></i>Basic Info</a>
								</li >
								<li class="act" id="major">
									<a href="curriculum.php"><i class="fa fa-asterisk"></i>Format</a>
								</li >
								</ul>
							</div>
						<!--
						<li class="act" id="userlist">
							<a href="userlist.php"><i class="fa fa-users " ></i>Users</a>
						</li>
						-->
					</ul>
				</div>

			</nav>
		</div>
    </div>
</body>