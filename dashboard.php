<?php 
include'menu.php'; 
include'menuside_dash.php'; 
include 'vars/'.$usern.'coursevar.php';


	//add course
	if (isset($_POST['addcoursebut'])){
		
		$coursetitle= $strip->strip($_POST['course_title']);
		$courseacro= $strip->strip($_POST['course_acro']);
		$coursedept= $strip->strip($_POST['course_dept']);
		
		
		
		//checking if acronym is still available
		$selectCourseAcro = $func->select_one('coursetbl',array('courseAcro','=',$courseacro));
		
		if($selectCourseAcro){
				
				echo '<script>alert("ADDING COURSE FAILED: same acronym already exist!!");</script>';
			
		} else {
	
		
				
				$courseInsert = $func->insert('coursetbl',array(
				'courseTitle' => $coursetitle,
				'courseAcro' => $courseacro,
				'courseDept' => $coursedept	
				));
							
			
				echo '<script>alert("New Course Added Successfully");</script>';
		
	
	} 

}

// display table content
$y = 1;
$sttt = null;

if ((isset($_POST['delete']))) {
	$mid = $_POST['mid'];
	//echo '<script> alert('.$totalcountrow  .');</script>';
	$delcourse = $func->delete('coursetbl',array('courseID','=',$mid));

	if ($delcourse){
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





if ((isset($_POST['Coursebut']))) {
												
	$corsname = $_POST['searchcors'];
												
	$cours =   $func->select_like('coursetbl',array('courseAcro','courseTitle','courseDept',$corsname ));
																
	$totalcountrow = count($cours);
	//echo '<script> alert('.$totalcountrow  .');</script>';
	//$pages = ceil($totalcountrow/$perPage);

	$view = $cours;
												
												
	$studtext = $corsname;
	$var_str = var_export($studtext, true);
	$var = "<?php\n\n\$studtext = $var_str;\n\n?>";
	file_put_contents('vars/'.$usern.'coursevar.php', $var);

												
}else if ($studtext != null  && (isset($_POST['sortAcroDesc'])) ) {

											
	$cours = $func->select_like('coursetbl',array('courseAcro','courseTitle','courseDept',$studtext ));
												
											 
	$totalcountrow = count($cours);
	//$pages = ceil($totalcountrow/$perPage);

	$view = $cours;

												
} else if ($studtext != null && (isset($_POST['sortAcroAsc']))) {
											
	$cours = $func->select_like('coursetbl',array('courseAcro','courseTitle','courseDept',$studtext ));
							
	$totalcountrow = count($cours);
	//$pages = ceil($totalcountrow/$perPage);

	$view = $cours;


	}else if ((isset($_POST['sortAcroDesc']))) {

		$cours = $func->selectallorderby('coursetbl','courseAcro','DESC');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->selectallorderbylimit('coursetbl','courseAcro','DESC',$start,$perPage);
	
	} else if ((isset($_POST['sortAcroAsc']))) {
		$cours = $func->selectallorderby('coursetbl','courseAcro','ASC');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);
		$view =  $func->selectallorderbylimit('coursetbl','courseAcro','ASC',$start,$perPage);
	}   else {
		$cours = $func->selectallorderby('coursetbl','courseAcro','ASC');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view =  $func->selectallorderbylimit('coursetbl','courseAcro','ASC',$start,$perPage);
		$totalcountrow = count($cours);

		$studtext = $corsname;
		$var_str = var_export($studtext, true);
		$var = "<?php\n\n\$studtext = $var_str;\n\n?>";
		file_put_contents('vars/'.$usern.'coursevar.php', $var);

											
	}




			
	

?> 
<link href='https://fonts.googleapis.com/css?family=Sonsie One' rel='stylesheet'>
<style>




	div#test { background-color:#0080ff; border-color:black;}
	div#test > div> img { height: 200px; width: 200px;  cursor:pointer; }
	
	.profile-pic {
		position: relative;
		display: inline-block;
	}

	.profile-pic:hover .edit {
		display: block;
	}

	.edit {
		padding-top: 7px;	
		padding-right: 7px;
		position: absolute;
		right: 0;
		top: 0;
		display: none;
	}

	.edit a {
		color: #000;
	}

	#page-wrapper {
    padding: 15px 15px;
    min-height: 800px;
    background:#0080ff;
   
}
#page-inner {
    width:95%;
    margin:10px 20px 10px 20px;
    background-color:#fff!important;
    padding:10px;
    min-height:800px;
}

.myDiv {
  border: 5px outset blue;
  

}

#pangs{
	 font-family: 'Sonsie One';
	 font-size: 25px;
	 color:#fff;
}

.panel-title{
	 font-family: 'Sonsie One';
	color:red;
	font-size: 20px;
}
.row{
	margin:10px 20px 10px 30px;
}


.form-control {
  color: black;
  }
}



</style>

 <script>
    document.getElementById('main').className = "active-link";
</script>

  <!-- /. NAV SIDE  -->
  
    <div id="page-wrapper">
    		<p id="pangs">Course </p>
        <div id="page-inner">
			
			<div class="row" >
				
				<div class="col-lg-12 form-group">
							
					
						
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addnewcourse">Add New Course</button>
							<br>
							<form method="POST" name="add_course">
							<div id="addnewcourse" class=" collapse">
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label"></label>
									<label class="col-md-2 control-label">Course Title</label>
									<div class="col-md-8">
										<input type="text" placeholder="Ex: B.S. Information Technology" class="form-control" name="course_title" required>
										<br>
									</div> 
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label"></label>
									<label class="col-md-2 control-label">Acronym:</label>
									<div class="col-md-3">
										<input type="text" placeholder="Ex: BSIT" class="form-control" name="course_acro" required>
									</div>
									<label class="col-md-2 control-label">Department:</label>
									<div class="col-md-3">
										<input type="text" placeholder="Ex: CICT" class="form-control" name="course_dept" required>
									</div>
							
								</div>
								
							<button type="submit" class="btn btn-md btn-info" name="addcoursebut"  style="float:right">Submit</button>
								</div>
								
								
									
							</div>

							

							
								
					</div>

					
						
						</form>	

					<div class="col-lg-12">
						<hr>
						<h3>Course List: </h3>

						<div class="row" >
						<form method="POST">
						<div class="col-md-12 form-group">
							
								<label class="col-md-2 control-label">Search Name:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="searchcors" >
								</div>
								<div class="col-md-2">
									<input type="submit" name="Coursebut" value="search" class="btn btn-primary">
								</div>
								

						</div>
					</form>
				</div>
			</div>
						<div class="col-lg-12">
						<div class="row" >
                

							<center>
								<div class="table-wrapper-scroll-y my-custom-scrollbar">
									<table width:800px class="table table-hover"  height:100px; overflow: scroll; >
										<form method="POST">
										<tr style=" color:#ffffff; background-color:#0080ff;"> 
											<td>No</td>
											<td>Course Acronym
											
													<input type="submit" name="sortAcroAsc" value="<?php echo chr(30)?>" class="btn btn-info">
													<input type="submit" name="sortAcroDesc" value="<?php echo chr(31)?>" class="btn btn-info">
												
												
											</td>			
											<td>Course Title</td>
											<td>Department</td>		
											<td >Action</td>
										
										</tr>
										</form>
									
									<?php  
										
										



										if (count($view) == 0) {
											echo "No Post Available";
										} else {
											//echo '<script> alert('.count($view) .');</script>';
											for($x=0;$x<count($view);$x++){ 
												$y = ($y + 1)*$page;
												//echo '<script> alert('.$x .');</script>';
									?>
										<tr >
											<td>
												<?php 
													if($page>1){
														$pagec = (($page *10)-10) + $x +1;
														echo $pagec;
													} else {
												
													echo $x +1; } ?>
											</td>
											<td>
												<?php echo escape($view[$x]['courseAcro']); ?>
											</td>
											
											<td>
													<?php echo escape($view[$x]['courseTitle']); ?>
											</td>
											<td>
													<?php echo escape($view[$x]['courseDept']); ?>
											</td>
											
											
											<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['courseID']); ?>"> 
											<td>
												<a href="dashboardedit.php?id=<?php echo  escape($view[$x]['courseID']); ?> " id=".<?php echo escape($x) +1; ?>."><button type="button" class="btn btn-success">Edit</button></a>
												
													<input type="submit" name="delete" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
												
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
		
			
			 
		