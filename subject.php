<?php 
include'menu.php'; 
include'menuside_dash.php'; 
include 'vars/'.$usern.'subjvar.php';
$nnn  = null;


	//add major
	if (isset($_POST['addsubbut'])){
		
		$subjcode= $strip->strip($_POST['subj_code']);
		$subjtitle= $strip->strip($_POST['subj_title']);
		$creditunit= $strip->strip($_POST['credit_unit']);
		$lecunit= $strip->strip($_POST['lec_unit']);
		
		$labunit= $strip->strip($_POST['lab_unit']);

		
		

				$subjInsert = $func->insert('subjtbl',array(
				'subjCode' => $subjcode,
				'subjTitle' => $subjtitle,
				'subjUnit' => $creditunit,
				'subjLec' => $lecunit,
				'subjLab' => $labunit
				
				));
							
				if($subjInsert){
				//	echo '<script>alert("New Subject Added Successfully");</script>';
				}

				
			
				else {
					echo '<script>alert("Adding Failed");</script>';
	
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
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 50;

//Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0; 
//Pages 
		//check queries with search


	if ((isset($_POST['majorbut']))) {
												
		$corsname = $_POST['searchmajor'];
												
		$cours =   $func->select_like('subjtbl',array('subjCode','subjTitle',$corsname));
							
											
		$totalcountrow = count($cours);
		//echo '<script> alert('.$totalcountrow  .');</script>';
		$pages = ceil($totalcountrow/$perPage);

		$view =$func->select_likelimit('subjtbl','subjCode','ASC',$start,$perPage,array('subjCode','subjTitle',$corsname));	
												
			$majortext = $corsname;
			$var_str = var_export($majortext, true);
			$var = "<?php\n\n\$majortext = $var_str;\n\n?>";
			file_put_contents('vars/'.$usern.'subjvar.php', $var);
											
	}else if ($majortext != null  && (isset($_POST['sortAcroDesc'])) ) {
									
		$cours =  $func->select_like('subjtbl',array('subjCode','subjTitle',$majortext));
																				 
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->select_likelimit('subjtbl','subjCode','DESC',$start,$perPage,array('subjCode','subjTitle',$majortext));	
													
	} else if ($majortext != null && (isset($_POST['sortAcroAsc']))) {
		$cours = $func->select_like('subjtbl',array('subjCode','subjTitle',$majortext));
													 
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view = $func->select_likelimit('subjtbl','subjCode','ASC',$start,$perPage,array('subjCode','subjTitle',$majortext));	

	}else if ((isset($_POST['sortAcroDesc']))) {

		$cours = $func->selectallorderby('subjtbl','subjCode','DESC');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);

		$view =$func->selectallorderbylimit('subjtbl','subjCode','DESC',$start,$perPage);
	
	} else if ((isset($_POST['sortAcroAsc']))) {
		$cours = $func->selectallorderby('subjtbl','subjCode','ASC');
		$totalcountrow = count($cours);
		$pages = ceil($totalcountrow/$perPage);
		$view =  $func->selectallorderbylimit('subjtbl','subjCode','ASC',$start,$perPage);
	}   else {
									
		$majorunit = $func->selectallorderby('subjtbl','subjCode','ASC');
		$totalcountrow = count($majorunit);

		$pages = ceil($totalcountrow/$perPage);

							
		$view = $func->selectallorderbylimit('subjtbl','subjCode','ASC',$start,$perPage);

			$majortext = $majorname;
			$var_str = var_export($majortext, true);
			$var = "<?php\n\n\$majortext = $var_str;\n\n?>";
			file_put_contents('vars/'.$usern.'subjvar.php', $var);
											
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
    document.getElementById('subject').className = "active-link";
</script>

  <!-- /. NAV SIDE  -->
  
    <div id="page-wrapper">
    		<p id="pangs"> Subjects  </p>
        <div id="page-inner">
			
			<div class="row" >
				
				<div class="col-lg-12 form-group">
							
					
						
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addnewsubject">Add New Subject</button>
							<br>
							<form method="POST" name="add_subject">
							<div id="addnewsubject" class=" collapse">

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">Subject Code:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: ITP 06" class="form-control" name="subj_code" required>
									</div>
									<label class="col-md-2 control-label" style="text-align: right">Subject Title:</label>
									<div class="col-md-5">
										<input type="text" placeholder="Ex: Web Development" class="form-control" name="subj_title" required>
									</div>
									
							
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">UNIT:</label>
									<label class="col-md-1 control-label" style="text-align: right">Credit:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: 3" class="form-control" name="credit_unit" required>
									</div>
									<label class="col-md-1 control-label" style="text-align: right">Lec:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: 3" class="form-control" name="lec_unit" >
									</div>
									<label class="col-md-2 control-label" style="text-align: right">Lab:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: 3" class="form-control" name="lab_unit">
									</div>
									
									
							
								</div>
								
								
							<div class="col-md-11">
										<button type="submit" class="btn btn-md btn-info" name="addsubbut" style="float: right" >Submit</button>
									</div>
								
									
							</div>

							

							
								
					</div>

					
						
					</form>	


					<!-- list -->

					<div class="col-lg-12">
						<hr>
						<h3>Subject List:  </h3>
						
						<div class="row" >
						<form method="POST">
						<div class="col-md-12 form-group">
							
								<label class="col-md-3 control-label">Search Subject Code/Title:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" placeholder="Ex: ITP 06" name="searchmajor" >
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
									<table width:1000px class="table table-hover"  height:100px; overflow: scroll; >
										<form method="POST">
										<tr style=" color:#ffffff; background-color:#0080ff;"> 
											<td>No <br><span class="badge badge-success"><?php echo $totalcountrow; ?></span></td>
											<td>Subject Code
													<br>
													<input type="submit" name="sortAcroAsc" value="<?php echo chr(30)?>" class="btn btn-info">
													<input type="submit" name="sortAcroDesc" value="<?php echo chr(31)?>" class="btn btn-info">
												
												
											</td>			
											<td>Subject Title</td>
											<td>Credit</td>
											<td>Lec</td>
											<td>Lab</td>
											
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
												<?php echo escape($view[$x]['subjCode']); ?>
											</td>
											
											<td>
													<?php echo escape($view[$x]['subjTitle']); ?>
											</td>
											<td>	
											
											
												<?php if(escape($view[$x]['subjUnit']) == 0){
													echo "";
												} else if(escape($view[$x]['subjUnit']) <= 0) {
														$subl = escape($view[$x]['subjUnit']) * -1;
														echo '('.$subl.')';
												} else{
													echo escape($view[$x]['subjUnit']);
												}
												 ?>

											</td>
											<td>	
											
												<?php if(escape($view[$x]['subjLec']) == 0){
													echo "";
												} else if(escape($view[$x]['subjLec']) <= 0) {
														$subl = escape($view[$x]['subjLec']) * -1;
														echo '('.$subl.')';
												} else{
													echo escape($view[$x]['subjLec']);
												}
												 ?>
												
										

											</td>
											<td>	
											
												<?php if(escape($view[$x]['subjLab']) == 0){
													echo "";
												} else if(escape($view[$x]['subjLab']) <= 0) {
														$subla = escape($view[$x]['subjLab']) * -1;
														echo '('.$subla.')';
												} else{
													echo escape($view[$x]['subjLab']);
												}
												 ?>

											</td>
											
											
											<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['subjID']); ?>"> 
											<td>
												<a href="subjectedit.php?id=<?php echo  escape($view[$x]['subjID']); ?> " id=".<?php echo escape($x) +1; ?>."><button type="button" class="btn btn-success">Edit</button></a>
												
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
		
			
			 
		