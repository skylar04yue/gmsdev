<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

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
    document.getElementById('main').className = "active-link";
</script>

  <!-- /. NAV SIDE  -->
  
    <div id="page-wrapper">
    		<p id="pangs">Prospectus</p>
        <div id="page-inner">
		
			<div class="row" >
				
				<div class="col-lg-11 form-group paper">
							
						<br>
						<p id="pangs" >Edit Prospectus Name</p>

						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('curriculum',array('currID','=',$col));
							if ($cors){
								
						?>


							<strong><a href="prospectus.php">Back to List</a></strong>


							<form method="POST" name="add_subject">
							<div id="addnewsubject">

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
											
										    <option value="<?php echo escape($majorcourse[$n]['courseAcro']) . " -- " . escape($majorcourse[$n]['majorName']) . " " . escape($majorcourse[$n]['majorID']) ; ?>" 
										    	<?php if ($cors[0]['majorID'] == $majorcourse[$n]['majorID'] ){?> selected="selected" <?php } ?>

										    	> <?php echo escape($majorcourse[$n]['courseAcro']) . " -- " . escape($majorcourse[$n]['majorName']);  ?> </option>
										  <?php  }  ?>
										  </select>
									</div>	
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">version :</label>
									<div class="col-md-3">
									<input type="text" class="form-control" placeholder="Ex: old" name="curiversion" value="<?php echo escape($cors[0]['version'])?>">
									</div>

								
								
							
								
									<div class="col-md-11">
										<input type="hidden" name = "idnya" value="<?php echo $cors[0]['currID'] ?>">
							<?php 	} ?>	
							<button type="submit" class="btn btn-md btn-info" name="savemajorbut"  style="float:right">Save</button>
									</div>
							</div>

							

							
								
					</div>

					
					
			</div>


		
			
		</div>
	</div>
		
			
			 
		