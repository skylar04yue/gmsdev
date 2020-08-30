<?php 
include'menu.php'; 
include'menuside_dash.php'; 
include 'vars/'.$usern.'subjvar.php';
$nnn  = null;


	//add major
	if (isset($_POST['addsubbut'])){
		

		$curiversion= $strip->strip($_POST['curiversion']);
		$selectprereq= $strip->strip($_POST['select_prereq']);
		$etopadin = $selectprereq;

			
		 $strending = (explode(" ",$selectprereq));
		
		 $bagongmajornum = end($strending);

		 $bagongmajortext =  str_replace($bagongmajornum, " ", $etopadin);

	

		$curiInsert = $func->insert('curriculum',array(
				'curriName' => $bagongmajortext,
				'majorID' => $bagongmajornum,
				'version' => $curiversion
		));
							
			if($curiInsert){
					echo '<script>alert("New Prospectus Added Successfully");</script>';
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
	$delcourse = $func->delete('prereqtbl',array('prereqID','=',$mid));

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


									
		$majorunit = $func->selectall('curriculum');
		$totalcountrow = count($majorunit);

		$pages = ceil($totalcountrow/$perPage);

							
		$view = $func->selectallorderbylimit('curriculum','curriName','ASC',$start,$perPage);

			



			
	


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
    		<p id="pangs">Prospectus </p>
        <div id="page-inner">
			
			<div class="row" >
				
				<div class="col-lg-12 form-group">
							
					
						
							<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addnewsubject">Add Prospectus</button>
							<br>
							<form method="POST" name="add_subject">
							<div id="addnewsubject" class=" collapse">

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">Prospectus for:</label>
									<div class="col-md-8">

										<select class="form-control" name="select_prereq">

										<?php 


											$majorcourse = $func->selectjoin('coursetbl','majortbl','courseID','courseID');
											
											//echo '<script> alert(' .count($subjlist1). ');</script>';
											for($n=0;$n<count($majorcourse);$n++){ 
													
										?>
											
										    <option value="<?php echo escape($majorcourse[$n]['courseAcro']) . " -- " . escape($majorcourse[$n]['majorName']) . " " . escape($majorcourse[$n]['majorID']) ; ?>"> <?php echo escape($majorcourse[$n]['courseAcro']) . " -- " . escape($majorcourse[$n]['majorName']);  ?> </option>
										  <?php  }  ?>
										  </select>
									</div>	
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">version :</label>
									<div class="col-md-3">
									<input type="text" class="form-control" placeholder="Ex: old" name="curiversion" >
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
						<h3>Prospectus Name List:  </h3>
						
						
			</div>
						<div class="col-lg-12">
						<div class="row" >
                

							<center>
								<div class="table-wrapper-scroll-y my-custom-scrollbar">
									<table width:1000px class="table table-hover"  height:100px; overflow: scroll; >
										<form method="POST">
										<tr style=" color:#ffffff; background-color:#0080ff;"> 
											<td>No <br><span class="badge badge-success"><?php echo $totalcountrow; ?></span></td>
													
											<td>Prospectus Name</td>
											<td>Version</td>
											
											
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
												echo escape($view[$x]['curriName'])
												?>
													
											</td>
											
											<td>
											<?php 
												echo escape($view[$x]['version'])
												?>

											

											</td>
																					
											
					
											<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['currID']); ?>"> 
											<td>
												
												<a href="prospectusedit.php?id=<?php echo  escape($view[$x]['currID']); ?> " id=".<?php echo escape($x) +1; ?>."><button type="button" class="btn btn-success"> &nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp; </button></a>
												
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
		
			
			 
		