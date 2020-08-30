<?php
	include 'menu.php';
	include 'vars/'.$usern.'studlistvar.php';
	
	
    setcookie("regfn", $fullname  , time() + 60);	
	$sttt = null;
	if ((isset($_POST['delete']))) {
		$mid = $_POST['mid'];
		$delstud = $func->delete('studtbl',array('studID','=',$mid));
		if ($delstud){
	  	    echo '<script> alert("Record Deleted");</script>';
		} else {
			echo '<script> alert("Delete failed");</script>';
		}
	}
						
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

	//Positioning
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0; 

	//Pages 
	//check queries with search
	if ((isset($_POST['searchnamebut']))) {
		$fullname = $_POST['searchname'];									

		$studs =   $func->select_like('studtbl',array('lName','fName','mName',$fullname ));
							
											
		$totalcountrow = count($studs);
		//$pages = ceil($totalcountrow/$perPage);

		$view = $studs;

		$studtext = $fullname;
		$var_str = var_export($studtext, true);
		$var = "<?php\n\n\$studtext = $var_str;\n\n?>";
		file_put_contents('vars/'.$usern.'studlistvar.php', $var);
									
	}
	//check queries with search
	else if ((isset($_POST['yrsearchnamebut']))) {
		$yr_select = $_POST['select_yr'];									

		//$studs =   $func->select_like('studtbl',array('lName','fName','mName',$fullname ));
			$studs = $func->select_one('studtbl',array('curYrlevel','=',$yr_select));

	

		$arr_section =  $func->select_distinctwhere('studtbl','curSection','ASC',array('curSection'),array('curYrlevel','=',$yr_select));

		//["3","5","8"];

		$yr_selected = $yr_select;
											
		$totalcountrow = count($studs);
		//$pages = ceil($totalcountrow/$perPage);

		$view = $studs;

		$studtext = $fullname;
		$var_str = var_export($studtext, true);
		$var = "<?php\n\n\$studtext = $var_str;\n\n?>";
		file_put_contents('vars/'.$usern.'studlistvar.php', $var);
									
	}

	else if ($studtext != null && (isset($_POST['sortNameDesc'])) ) {
											
		$studs =  $func->select_like('studtbl',array('lName','fName','mName',$studtext ));
																						
		$totalcountrow = count($studs);
		//$pages = ceil($totalcountrow/$perPage);

		$view = $studs;


												
	} else if ($studtext != null && (isset($_POST['sortNameAsc']))) {
											
		$studs =  $func->select_like('studtbl',array('lName','fName','mName',$studtext ));
																						
		$totalcountrow = count($studs);
		//$pages = ceil($totalcountrow/$perPage);

		$view = $studs;


	}else if ((isset($_POST['sortNameDesc']))) {

		$studs = $func->selectallorderby('studtbl','lName','DESC');
		$totalcountrow = count($studs);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->selectallorderbylimit('studtbl','lName','DESC',$start,$perPage);
	
	} else if ((isset($_POST['sortNameAsc']))) {
		$studs = $func->selectallorderby('studtbl','lName','ASC');
		$totalcountrow = count($studs);
		$pages = ceil($totalcountrow/$perPage);
		$view = $func->selectallorderbylimit('studtbl','lName','ASC',$start,$perPage);

	}else {
		$studs = $func->selectallorderby('studtbl','lName','ASC');
		$totalcountrow = count($studs);
		$pages = ceil($totalcountrow/$perPage);

		$view =  $func->selectallorderbylimit('studtbl','lName','ASC',$start,$perPage);

		$studtext = $fullname;
		$var_str = var_export($studtext, true);
		$var = "<?php\n\n\$studtext = $var_str;\n\n?>";
		file_put_contents('vars/'.$usern.'studlistvar.php', $var);									
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
	 font-family: 'Sonsie One';
	 font-size: 30px;
	 color: blue;

}

.col-lg-2 {
  
  background-color:#add8e6;
  height: 550px;
}

hr {
	border: 2px solid blue;
}
    </style>
	

 <script>
	
    document.getElementById('studlist').className = "active";
</script>
</head>
<body>
	
	
	
	<div class="container-fluid">
		<br><br>
		<div class="row" >	
			<div class="col-lg-1" >
			</div>
			<div class="col-lg-10" >
				<br>
				<div class="papel">
					<div class="col-md-12 form-group">
						<div class="col-md-1">
							<a href="studlist.php" > <img src ="img/showicon.png" class="img-responsive" id="propix" name="showpropix"></img></a>
						</div>
						<div class="col-md-3">
							<a href="addstud.php" ><img src ="img/addnewicon.png" class="img-responsive" id="propix" name="addpropix"></img></a>
						</div>
						<div class="col-md-6">
							<H1>Student List</H1>
						</div>
							
					</div>
					<hr>
					<form method="post">
						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Search Name:</label>
								<div class="col-md-4">
									<input type="text" placeholder="Enter  Name Here.." class="form-control" name="searchname" >
								</div>
								<div class="col-md-2">
									<input type="submit" name="searchnamebut" value="search" class="btn btn-primary">
								</div>
								

						</div>
					
						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Select by Year</label>
								<div class="col-md-4">
									<select class="form-control" name="select_yr">
										<option value="1" <?php if($yr_selected == 1) echo "selected"?>>1st year</option>
										<option value="2" <?php if($yr_selected == 2) echo "selected"?>>2nd year</option>
										<option value="3" <?php if($yr_selected == 3) echo "selected"?>>3rd year</option>
										<option value="4" <?php if($yr_selected == 4) echo "selected"?>>4th year</option>
										<option value="5" <?php if($yr_selected == 5) echo "selected"?>>5th year</option>
									</select>
								</div>
								<div class="col-md-2">
									<input type="submit" name="yrsearchnamebut" value="search" class="btn btn-primary">
								</div>
								

						</div>

						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Select by Section</label>
								<div class="col-md-4">
									<select class="form-control" name="select_yr">
										<?php 
										for($n=0;$n<count($arr_section);$n++){ 
													
										?>
											
										    <option value="<?php echo escape($arr_section[$n]['curSection']); ?>"> <?php echo escape($arr_section[$n]['curSection']);  ?> </option>
										  <?php  }  ?>
									</select>
								</div>
								<div class="col-md-2">
									<input type="submit" name="secsearchbut" value="search" class="btn btn-primary">
								</div>
								

						</div>

					</form>


					<!--table -->

							<!-- /. NAV SIDE  --> 
   
        
            <div class="row" >
                <div class="col-lg-12">
                    
					<div class="container-fluid"><br>
						<div class="row">	

							<center>
								<div class="table-responsive">
									<table width:800px class="table table-hover"  height:100px; overflow: scroll; >
										<form method="post">
										<tr style=" color:#ffffff; background-color:#0080ff;"> 
											<td>No</td>
											<td>Name
											
													<input type="submit" name="sortNameAsc" value="<?php echo chr(30)?>" class="btn btn-info">
													<input type="submit" name="sortNameDesc" value="<?php echo chr(31)?>" class="btn btn-info">
												
												
											</td>			
											<td>Local Address	</td>									
											
											<td>Cellphone #</td>
											<td>Email</td>
											<td >Action</td>
											</strong>
										</tr>
										</form>
									<?php $y = 1;?>
									<?php  
										
										



										if (count($view) == 0) {
											echo "No Post Available";
										} else {
											for($x=0;$x<count($view);$x++){ 
												$y = ($y + 1)*$page;
									?>
										<tr onclick="getElementById('.<?php echo escape($x) +1; ?>.').click()" style="cursor: pointer">
											<td>
												<?php 
													if($page>1){
														$pagec = (($page *10)-10) + $x +1;
														echo $pagec;
													} else {
												
													echo $x +1; } ?>
											</td>
											<td>
												<?php echo escape($view[$x]['lName']).", ". escape($view[$x]['fName']) ." ". escape($view[$x]['mName']); ?>
											</td>
											
											<td>
													<?php echo  escape($view[$x]['brgy']) .", ". escape($view[$x]['city']) .", ". escape($view[$x]['prov']); ?>
											</td>
											<td>
												<?php echo escape($view[$x]['cpnum']); ?>
											</td>
											<td>
													<?php echo  escape($view[$x]['email']); ?>
											</td>
											
											<form method="post">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['studID']); ?>"> 
												<input type="hidden" name="pid" value="<?php echo escape($view[$x]['pid']); ?>"> 
											<td>
												<a href="viewstud.php?id=<?php echo  escape($view[$x]['studID']); ?> " id=".<?php echo escape($x) +1; ?>."></a>

												<a href="editstud.php?id=<?php echo  escape($view[$x]['studID']); ?> " id=".<?php echo escape($x) +1; ?>."><button type="button" class="btn btn-success">Edit</button></a>

												<a href="studlist.php?mid=<?php echo escape($view[$x]['studID']); ?>">
													<input type="submit" name="delete" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
												</a>
											</td>
											</form>
										</tr>
									<?php 
											}
										} 
									?>
									</table>
			
							</center> 
									<ul class="actions pagination">
										<?php for($x = 1; $x <= $pages; $x++): ?>
											<li><a href="?page=<?php echo $x; ?>"<?php if($page === $x) {echo ' class="button selected"';} ?>><?php echo $x; ?></a></li>
										<?php endfor; ?>
									</ul>        
							
								</div>
						</div>
                    </div>
                </div>                
			</div>

             <!-- /. PAGE INNER  -->
     


						<!--end table-->


			
			




			
			</div>
			
			
		</div>
	</div>
	
	
	<br>
	<br>
	<br>
	
	
	
</body>
