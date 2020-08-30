<?php 
include'menu.php'; 
include'menuside_dash.php'; 
//include 'vars/'.$usern.'majorvar.php';
include 'vars/'.$usern.'majorvar.php';
$nnn  = null;

	
	//add major
	if (isset($_POST['addmajorbut'])){
		
		$majortitle= $strip->strip($_POST['majortitle']);
		$selectcourse= $strip->strip($_POST['selectCourse']);
		
		//checking if acronym is still available
		$cmajor = $func->select_logic('majortbl',array('majorName','=',$majortitle),'AND',array('courseID','=',$selectcourse));
		//print_r($cmajor);
		
		if($cmajor){
				
				echo '<script>alert("Major in the same course already exist!!");</script>';
			
		} else {

				$majorInsert = $func->insert('majortbl',array(
				'majorName' => $majortitle,
				'courseID' => $selectcourse
				));
							
				if($majorInsert){
					echo '<script>alert("New Major Added Successfully");</script>';
				}

				
			
				else {
					echo '<script>alert("Adding Failed");</script>';
	
				}
		}

	} 



// display table content
$y = 1;
$sttt = null;

if ((isset($_POST['delete']))) {
	$mid = $_POST['mid'];
	//echo '<script> alert('.$totalcountrow  .');</script>';
	$delcourse = $func->delete('majortbl',array('majorID','=',$mid));

	if ($delcourse){
		echo '<script> alert("Record Deleted");</script>';
	} else {
		echo '<script> alert("Delete failed");</script>';
	}
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 20;

//Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0; 
//Pages 
		//check queries with search


	if ((isset($_POST['majorbut']))) {
												
		$majorname = $_POST['searchmajor'];
												
		$cours =   $func->selectjoin_like('majortbl','coursetbl','courseID','courseID','majortbl','majorName',$majorname,array('majortbl','majorName','coursetbl','courseTitle'));
							
											
		$totalcountrow = count($cours);
		//echo '<script> alert('.$totalcountrow  .');</script>';
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->selectjoin_likelimit('majortbl','coursetbl','courseID','courseID','majortbl','majorName',$majorname,'ASC',$start,$perPage,array('majortbl','majorName','coursetbl','courseTitle'));
												
												
			$majortext = $majorname;
			$var_str = var_export($majortext, true);
			$var = "<?php\n\n\$majortext = $var_str;\n\n?>";
			file_put_contents('vars/'.$usern.'majorvar.php', $var);
										
	}else if ($majortext != null  && (isset($_POST['sortAcroDesc'])) ) {
							
		$cours =  $func->selectjoin_like('majortbl','coursetbl','courseID','courseID','majortbl','majorName',$majortext,array('majortbl','majorName','coursetbl','courseTitle'));
																				 
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->selectjoin_likelimit('majortbl','coursetbl','courseID','courseID','majortbl','majorName',$majortext,'DESC',$start,$perPage,array('majortbl','majorName','coursetbl','courseTitle'));
													
	} else if ($majortext != null && (isset($_POST['sortAcroAsc']))) {
											
		$cours =  $func->selectjoin_like('majortbl','coursetbl','courseID','courseID','majortbl','majorName',$majortext,array('majortbl','majorName','coursetbl','courseTitle'));
													 
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->selectjoin_likelimit('majortbl','coursetbl','courseID','courseID','majortbl','majorName',$majortext,'ASC',$start,$perPage,array('majortbl','majorName','coursetbl','courseTitle'));
													
	}else if ((isset($_POST['sortAcroDesc']))) {

		$cours = $func->selectjoin('majortbl','coursetbl','courseID','courseID');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->selectjoinorderby('majortbl','coursetbl','courseID','courseID','majortbl','majorName','DESC',$start,$perPage);
	
	} else if ((isset($_POST['sortAcroAsc']))) {
		$cours = $func->selectjoin('majortbl','coursetbl','courseID','courseID');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);
		$view =  $func->selectjoinorderby('majortbl','coursetbl','courseID','courseID','majortbl','majorName','ASC',$start,$perPage);
	
	}   else {
									
		$majorunit = $func->selectjoin('majortbl','coursetbl','courseID','courseID');
		$totalcountrow = count($majorunit);

		$pages = ceil($totalcountrow/$perPage);
							
		$view = $func->selectjoinorderby('majortbl','coursetbl','courseID','courseID','majortbl','majorName','ASC',$start,$perPage);


		$majortext = $majorname;
			$var_str = var_export($majortext, true);
			$var = "<?php\n\n\$majortext = $var_str;\n\n?>";
			file_put_contents('vars/'.$usern.'majorvar.php', $var);
											
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
    document.getElementById('major').className = "active-link";
</script>

  <!-- /. NAV SIDE  -->
  
    <div id="page-wrapper">
    		<p id="pangs"> Major </p>
        <div id="page-inner">
			
			<div class="row" >
				
				<div class="col-lg-12 form-group">
							
					
						
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addnewmajor">Add New Major</button>
							<br>
							<form method="POST" name="add_course">
							<div id="addnewmajor" class=" collapse">
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label"></label>
									<label class="col-md-2 control-label">Major Title</label>
									<div class="col-md-5">
										<input type="text" placeholder="Ex: Programming" class="form-control" name="majortitle" required>
										<br>
									</div> 
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label"></label>
									<label class="col-md-2 control-label">Course:</label>
									<div class="col-md-3">

										<select class="form-control" name="selectCourse">
										<?php 
											$courselist = $func->selectallorderby('coursetbl','courseAcro','ASC');
											for($n=0;$n<count($courselist);$n++){ 
												
										?>

										
										    <option value="<?php echo escape($courselist[$n]['courseID']); ?>"> <?php echo escape($courselist[$n]['courseAcro']); ?></option>
										  <?php  }  ?>
										  </select>
									</div>
									
									<div class="col-md-3">
										<button type="submit" class="btn btn-md btn-info" name="addmajorbut"  >Submit</button>
									</div>
							
								</div>
								
							
								
									
							</div>

							

							
								
					</div>

					
						
						</form>	

					<div class="col-lg-12">
						<hr>
						<h3>Major List:  </h3>
						
						<div class="row" >
						<form method="POST">
						<div class="col-md-12 form-group">
							
								<label class="col-md-3 control-label" style="text-align: right">Search Major/Course:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" placeholder="Ex: Networking" name="searchmajor" >
								</div>
								<div class="col-md-2">
									<input type="submit" name="majorbut" value="search" class="btn btn-primary">
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
											<td>Major Name
											
													<input type="submit" name="sortAcroAsc" value="<?php echo chr(30)?>" class="btn btn-info">
													<input type="submit" name="sortAcroDesc" value="<?php echo chr(31)?>" class="btn btn-info">
												
												
											</td>			
											<td>Course:</td>
											
											<td >Action</td>
										
										</tr>
										</form>
									
									<?php  
										
										



										if (count($view) == 0) {
											echo "No Post to Show";
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
												<?php echo escape($view[$x]['majorName']); ?>
											</td>
											
											<td>
													<?php echo escape($view[$x]['courseTitle']); ?>
											</td>
											
											
											
											<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['majorID']); ?>"> 
											<td>
												<a href="majoredit.php?id=<?php echo  escape($view[$x]['majorID']); ?> " id=".<?php echo escape($x) +1; ?>."><button type="button" class="btn btn-success">Edit</button></a>
												
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
		
			
			 
		