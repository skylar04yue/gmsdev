<?php 
include'menu.php'; 
include'menuside_dash.php'; 
//include 'vars/'.$usern.'subjvar.php';
$nnn  = null;


	//add major
	if (isset($_POST['addsubbut'])){
		
		$selectprospectname= $strip->strip($_POST['select_prospectname']);
		$selectyear= $strip->strip($_POST['select_year']);
		$selectsem= $strip->strip($_POST['select_sem']);
		$selecttosubj= $strip->strip($_POST['select_tosubj']);
		
echo '<script>alert('.selectprospectname.');</script>';
		
		

				$cursubInsert = $func->insert('curri_subjtbl',array(
				'currID' => $selectprospectname,
				'year' => $selectyear,
				'sem' => $selectsem,
				'subjID' => $selecttosubj
				
				));
							
				if(!$cursubInsert){
					echo '<script>alert("Adding Failed");</script>';
				}

				
			
				
		

	} 



// display table content
$y = 1;
$sttt = null;

if ((isset($_POST['delete']))) {
	$mid = $_POST['mid'];
	//echo '<script> alert('.$totalcountrow  .');</script>';
	$delcourse = $func->delete('prereqtbl',array('majorID','=',$mid));

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
									
		$majorunit = $func->select_distinct('curri_subjtbl',array('currID'));
		$totalcountrow = count($majorunit);

		$pages = ceil($totalcountrow/$perPage);

							
		$view = $func->select_distinctlimit('curri_subjtbl',$start,$perPage,array('currID'));

			
											
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
    document.getElementById('prospectus').className = "active-link";
</script>

  <!-- /. NAV SIDE  -->
  
    <div id="page-wrapper">
    		<p id="pangs"> Prospectus  </p>
        <div id="page-inner">
			
			<div class="row" >
				
				<div class="col-lg-12 form-group">
							
					
						
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addnewsubject">Add Subject to Prospectus</button>
							<br>
							<form method="POST" name="add_subject">
							<div id="addnewsubject" class=" collapse">

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-3 control-label" style="text-align: right">Subject :</label>
									<div class="col-md-7">

										<select class="form-control" name="select_tosubj">
										<?php 
											$subjlist2 = $func->selectallorderby('subjtbl','subjCode','ASC');
	
											for($n=0;$n<count($subjlist2);$n++){ 
												
										?>
											
										    <option value="<?php echo escape($subjlist2[$n]['subjID']); ?>"> <?php echo escape($subjlist2[$n]['subjCode']) . " -- " . escape($subjlist2[$n]['subjTitle']); ?></option>
										  <?php  }  ?>
										  </select>
									</div>	
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-3 control-label" style="text-align: right">Prospectus Name:</label>
									<div class="col-md-7">

										<select class="form-control" name="select_prospectname">

										<?php 


											$subjlist1 = $func->selectallorderby('curriculum','curriName','ASC');
											
											//echo '<script> alert(' .count($subjlist1). ');</script>';
											for($n=0;$n<count($subjlist1);$n++){ 
													
										?>
											
										    <option value="<?php echo escape($subjlist1[$n]['currID']); ?>"> <?php echo escape($subjlist1[$n]['curriName']) ." ver. ".escape($subjlist1[$n]['version']) ; ?></option>
										  <?php  }  ?>
										  </select>
									</div>	
								</div>
								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-3 control-label" style="text-align: right">Year Level:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_year">
											<option value = "1">1st Year</option>
											<option value = "2">2nd Year</option>
											<option value = "3">3rd Year</option>
											<option value = "4">4th Year</option>
											<option value = "5">5th Year</option>
										</select>
									</div>	
									<label class="col-md-3 control-label" style="text-align: right">Semester:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_sem">
											<option value = "1">1st sem</option>
											<option value = "2">2nd sem</option>
											<!-- <option value = "3">Summer</option> -->
											
										</select>
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
											<td>No <br><span class="badge badge-success"><?php echo $totalcountrow; ?></span>
											</td>	
											<td>Prospectus Name</td>
											
											
											
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

												<?php 


											$prosp = $func->selectallorderby('curriculum','curriName','ASC');
											
											//echo '<script> alert(' .count($subjlist1). ');</script>';
											for($n=0;$n<count($prosp);$n++){ 

												if($view[$x]['currID'] == $prosp[$n]['currID'] ){
											 	echo escape($prosp[$n]['curriName']) ." ver. ".escape($prosp[$n]['version']) ;

												}

											}		
										
										   ?>


											

											
												
										

											</td>
											
											
											
											
											<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['prereqID']); ?>"> 
											<td>
												<a href="curriculumview.php?id=<?php echo  escape($view[$x]['currID']); ?> " id=".<?php echo escape($x) +1; ?>.">View details</a>
												
												
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
		
			
			 
		