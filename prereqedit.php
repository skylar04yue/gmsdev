<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

if (isset($_POST['savesubbut'])){


		$selectprereq= $strip->strip($_POST['select_prereq']);
		$selecttosubj= $strip->strip($_POST['select_tosubj']);
		
		//echo '<script>alert('.$selectprereq.');</script>';
		//echo '<script>alert('.$selecttosubj.');</script>';

		$pid=$_POST['idnya'];
		

	$courseUpdate = $func->update('prereqtbl','prereqID',$pid, array(
				'prereqSub' => $selectprereq,
				'subjID' => $selecttosubj
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
						<p id="pangs" >Edit Pre-requisite Subjects:</p>



						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('prereqtbl',array('prereqID','=',$col));
							if ($cors){
								
						?>


							<strong><a href="prereq.php">Back to List</a></strong>


								<form method="POST" name="add_subject">
							<div id="addnewsubject" >

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">Pre-req:</label>
									<div class="col-md-8">


										

										<select class="form-control" name="select_prereq">
										<?php 
											$courselist = $func->selectallorderby('subjtbl','subjCode','ASC');
											for($n=0;$n<count($courselist);$n++){ 
												
										?>

										
										    <option value="<?php echo escape($courselist[$n]['subjID']); ?>"
										    	<?php if ($cors[0]['prereqSub'] == $courselist[$n]['subjID'] ){?> selected="selected" <?php } ?>> <?php echo escape($courselist[$n]['subjCode']) ." - ". escape($courselist[$n]['subjTitle']); ?></option>
										  <?php  }  ?>
										  </select>
									

									</div>	
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">to Subject :</label>
									<div class="col-md-8">


										<select class="form-control" name="select_tosubj">
										<?php 
											$courselist2 = $func->selectallorderby('subjtbl','subjCode','ASC');
											for($n=0;$n<count($courselist2);$n++){ 
												
										?>

										
										    <option value="<?php echo escape($courselist2[$n]['subjID']); ?>"
										    	<?php if ($cors[0]['subjID'] == $courselist2[$n]['subjID'] ){?> selected="selected" <?php } ?>> <?php echo escape($courselist2[$n]['subjCode']) ." - ". escape($courselist2[$n]['subjTitle']); ?></option>
										  <?php  }  ?>
										  </select>

									</div>	
								</div>

								
								
							<div class="col-md-11">
										<input type="hidden" name = "idnya" value="<?php echo $cors[0]['prereqID'] ?>">
								<?php 	} ?>
										<button type="submit" class="btn btn-md btn-info" name="savesubbut" style="float: right" >Submit</button>
									</div>
								
									
							</div>

							

							
								
					</div>

					
						
					</form>	

			</div>


		
			
		</div>
	</div>
		
			
			 
		