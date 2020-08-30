<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

if (isset($_POST['savesubbut'])){


		$selyear= $strip->strip($_POST['select_year']);
		$selsem= $strip->strip($_POST['select_sem']);
		

		$pid=$_POST['idnya'];
		

	$courseUpdate = $func->update('curri_subjtbl','cursubjID',$pid, array(
				'year' => $selyear,
				'sem' => $selsem
				));
				
				if($courseUpdate){	
					
					echo '<script>alert("Succeed");</script>';
						
					

				} else {
					echo '<script>alert("EDITING FAILED !!");</script>';
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
    document.getElementById('main').className = "active-link";
</script>

  <!-- /. NAV SIDE  -->
  
    <div id="page-wrapper">
    		<p id="pangs">Course </p>
        <div id="page-inner">
		
			<div class="row" >
				
				<div class="col-lg-12 form-group paper">
							
						<br>
						<p id="pangs" >Edit Subject of Prospect</p>



						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
							//	echo '<script> alert(' .$col. ');</script>';
							}
								
						

							$cors = $func->select_one('curri_subjtbl',array('cursubjID','=',$col));
							if ($cors){
								
						?>


							<strong><a href="curriculumview.php?id=<?php echo  escape($cors[0]['currID']); ?> " id=".<?php echo  escape($cors[0]['currID']); ?>.">Back to List</a></strong>

								<form method="POST" name="add_subject">

								<div id="addnewsubject">

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-3 control-label" style="text-align: right">Subject :</label>
									<div class="col-md-7">

										<?php $selsub = $func->select_one('subjtbl',array('subjID','=',$cors[0]['subjID']));?>

										<input type="text" placeholder="Ex: 3" class="form-control" name="subj" value="<?php echo $selsub[0]['subjCode'] . " -- " . escape($selsub[0]['subjTitle']) ?>"  readonly>

										
									</div>	
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-3 control-label" style="text-align: right">Prospectus Name:</label>
									<div class="col-md-7">


										<?php $selcuriname = $func->select_one('curriculum',array('currID','=',$cors[0]['currID']));?>



										<input type="text" placeholder="Ex: 3" class="form-control" name="subj" value="<?php echo escape($selcuriname[0]['curriName']) ." ver. ".escape($selcuriname[0]['version']) ; ?>"  readonly>

										
									</div>	
								</div>
								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-3 control-label" style="text-align: right">Year Level:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_year">
											<option value = "1" <?php if($cors[0]['year'] == '1'){ ?> selected="selected" <?php } ?> >1st </option>
											<option value = "2" <?php if($cors[0]['year'] == '2'){ ?> selected="selected" <?php } ?>>2nd </option>
											<option value = "3" <?php if($cors[0]['year'] == '3'){ ?> selected="selected" <?php } ?>>3rd </option>
											<option value = "4" <?php if($cors[0]['year'] == '4'){ ?> selected="selected" <?php } ?>>4th </option>
											<option value = "5" <?php if($cors[0]['year'] == '5'){ ?> selected="selected" <?php } ?>>5th </option>
										</select>
									</div>	
									<label class="col-md-3 control-label" style="text-align: right">Semester:</label>
									<div class="col-md-2">

										<select class="form-control" name="select_sem">
											<option value = "1" <?php if($cors[0]['sem'] == '1'){ ?> selected="selected" <?php } ?>>1st </option>
											<option value = "2" <?php if($cors[0]['sem'] == '2'){ ?> selected="selected" <?php } ?>>2nd </option>
											<!-- <option value = "3">Summer</option> -->
											
										</select>
									</div>	
								</div>
								
								

								
								
							<div class="col-md-11">
										<input type="hidden" name = "idnya" value="<?php echo $cors[0]['cursubjID'] ?>">
								<?php 	} ?>
										<button type="submit" class="btn btn-md btn-info" name="savesubbut" style="float: right" >Submit</button>
									</div>
								
									
							</div>

					
								
					</div>

					
						
					</form>	


							
						

					
					
							
			</div>


		
			
		</div>
	</div>
		
			
			 
