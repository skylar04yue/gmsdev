<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

if ((isset($_POST['delete']))) {
	$mid = $_POST['mid'];
	//echo '<script> alert('.$totalcountrow  .');</script>';
	$delcourse = $func->delete('curri_subjtbl',array('cursubjID','=',$mid));

	if ($delcourse){
		echo '<script> alert("Record Deleted");</script>';
	} else {
		echo '<script> alert("Delete failed");</script>';
	}
}


if (isset($_POST['savemajorbut'])){


	$curiversion= $strip->strip($_POST['curiversion']);
		$selectprereq= $strip->strip($_POST['select_prereq']);
		$etopadin = $selectprereq;

			
		 $strending = (explode(" ",$selectprereq));
		
		 $bagongmajornum = end($strending);

		 $bagongmajortext =  str_replace($bagongmajornum, " ", $etopadin);

		$majortitle= $strip->strip($_POST['majortitle']);
		$selectcourse= $strip->strip($_POST['selectCourse']);
		$pid=$_POST['idnya'];
		

	$courseUpdate = $func->update('curriculum','currID',$pid, array(
				'curriName' => $bagongmajortext,
				'majorID' => $bagongmajornum,
				'version' => $curiversion
				));
				
				if($courseUpdate){	
					
					echo '<script>alert("Succeed");</script>';
						
					

				} else {
					echo '<script>alert("EDITING  FAILED !!");</script>';
				}
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
	 color:#000;
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
    		<p id="pangs">Prospectus</p>
        <div id="page-inner">
		
			<div class="row" >
				
				<div class="col-lg-11 form-group paper">
							
						<br>
						

						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('curriculum',array('currID','=',$col));
							if ($cors){


								//function select_distinctwhere($table,$byfield,$sortorder,$col_arr = array(),$saan = array()){

							$angyear  =$func->select_distinctwhere('curri_subjtbl','year','ASC',array('year'),array('currID','=',$col));

							$angsem =$func->select_distinctwhere('curri_subjtbl','year','ASC',array('sem'),array('currID','=',$col));

							//echo '<script> alert(' .count($angsem). ');</script>';
								
						?>

							<p id="pangs" ><?php echo escape($cors[0]['curriName']);?></p>
							<strong><a href="curriculum.php">Back to List</a></strong>

							<center>
								<?php for($sx=1;$sx<=count($angyear);$sx++){ 

										for($ssx=1;$ssx<=count($angsem);$ssx++){
								 ?>
								<div class="table-wrapper-scroll-y my-custom-scrollbar">
									<table width:1000px class="table table-hover"  height:100px; overflow: scroll; >
										<tr style=" color:#ffffff; background-color:#0080ff;  font-weight: bolder;"> 
											<td><?php  $yrarr = array('1st', '2nd', '3rd', '4th', '5'); 
											echo $yrarr[$sx-1];

											?> Year </td>	
											<td colspan="6"><?php  $semarr = array('1st Semester', '2nd Semester', 'summer'); 
											echo $semarr[$ssx-1];?></td>

											
											
											
											
										
										</tr>
										<tr style=" color:#ffffff; background-color:#4863A0;"> 
											<td>Code </td>	
											<td>Description</td>
											<td >Credit</td>
											<td >Lec</td>
											<td >Lab</td>
											<td >Pre-req</td>
											<td >Action</td>
										</tr>

										<?php 

									//	echo '<script> alert(' .$col. ');</script>';
											$view = $func->select_logics2('curri_subjtbl',array('year','=',$sx),'AND',array('sem','=',$ssx),'AND',array('currID','=',$col));

											//echo '<script> alert(' .count($view). ');</script>';

											for($m=0;$m<count($view);$m++){ 
												$selcsubj = $func->select_one('subjtbl',array('subjID','=',$view[$m]['subjID']));
										?>

										<tr> 
											<td><?php echo escape($selcsubj[0]['subjCode']);

											?> </td>
											<td ><?php echo escape($selcsubj[0]['subjTitle']); ?></td>	
											<td>
												
												<?php if(escape($selcsubj[0]['subjUnit']) == 0){
													echo "";
												} else if(escape($selcsubj[0]['subjUnit']) <= 0) {
														$subl = escape($selcsubj[0]['subjUnit']) * -1;
														echo '('.$subl.')';
												} else{
													echo escape($selcsubj[0]['subjUnit']);
												}
												 ?>

											</td>
											<td >
												
												<?php if(escape($selcsubj[0]['subjLec']) == 0){
													echo "";
												} else if(escape($selcsubj[0]['subjLec']) <= 0) {
														$subl = escape($selcsubj[0]['subjLec']) * -1;
														echo '('.$subl.')';
												} else{
													echo escape($selcsubj[0]['subjLec']);
												}
												 ?>

											</td>
											<td >
												
												<?php if(escape($selcsubj[0]['subjLab']) == 0){
													echo "";
												} else if(escape($selcsubj[0]['subjLab']) <= 0) {
														$subl = escape($selcsubj[0]['subjLab']) * -1;
														echo '('.$subl.')';
												} else{
													echo escape($selcsubj[0]['subjLab']);
												}
												 ?>

											</td>
											
											<td >

											<?php 
											
											$subjl4 = $func->selectall_where('prereqtbl',array('subjID','=',$selcsubj[0]['subjID']));
	
												//$ar=array();
											for($nw=0;$nw<count($subjl4);$nw++){ 
												
													//echo escape($subjlist4[$n]['prereqSub']); 


													$subjl5 = $func->selectall_where('subjtbl',array('subjID','=',$subjl4[$nw]['prereqSub']));

													echo escape($subjl5[0]['subjCode']) . ", "; 

													//array_push($ar,$subjlist4[$n]['prereqSub']);


												}
												//print_r($ar);
											
											?>
											</td>
											<form method="POST">
												<input type="hidden" name="mid" value="<?php echo escape($view[$m]['cursubjID']); ?>"> 
											<td>
												

													<a href="curriculumedit.php?id=<?php echo  escape($view[$m]['cursubjID']); ?> " id=".<?php echo  escape($view[$m]['cursubjID']); ?>.">Edit</a>
												
													<input type="submit"  name="delete" value="Del" class="btn  btn-link" onclick="return confirm('Are you sure you want to delete?')">
												
											</td>
											</form>
										</tr>
										<?php } ?>

									</table>
								</div>

								<?php 	
							}
							} ?>
							</center>



				<?php 	} ?>	
							<button type="submit" class="btn btn-md btn-info" name="savemajorbut"  style="float:right">Save</button>
									</div>
							</div>

							

							
								
					</div>

					
					
			</div>


		
			
		</div>
	</div>
		
			
			 
		