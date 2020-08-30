<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

if (isset($_POST['savemajorbut'])){

		$majortitle= $strip->strip($_POST['majortitle']);
		$selectcourse= $strip->strip($_POST['selectCourse']);
		$pid=$_POST['idnya'];
		

	$courseUpdate = $func->update('majortbl','majorID',$pid, array(
				'MajorName' => $majortitle,
				'courseID' => $selectcourse
				));
				
				if($courseUpdate){	
					
					echo '<script>alert("Succeed");</script>';
						
					

				} else {
					echo '<script>alert("EDITING MAJOR FAILED !!");</script>';
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
				
				<div class="col-lg-11 form-group paper">
							
						<br>
						<p id="pangs" >Edit Major</p>

						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('majortbl',array('majorID','=',$col));
							if ($cors){
								
						?>


							<strong><a href="major.php">Back to List</a></strong>


							<form method="POST" name="add_major">
							<div id="editmajor">
								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label"></label>
									<label class="col-md-2 control-label">Major Title</label>
									<div class="col-md-5">
										<input type="text" placeholder="Ex: Programming" class="form-control" name="majortitle" value="<?php echo $cors[0]['majorName'] ?>" required>
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

										
										    <option value="<?php echo escape($courselist[$n]['courseID']); ?>"
										    	<?php if ($cors[0]['courseID'] == $courselist[$n]['courseID'] ){?> selected="selected" <?php } ?>> <?php echo escape($courselist[$n]['courseAcro']); ?></option>
										  <?php  }  ?>
										  </select>
									</div>
									
									<div class="col-md-3">
										<input type="hidden" name = "idnya" value="<?php echo $cors[0]['majorID'] ?>">
							<?php 	} ?>	
							<button type="submit" class="btn btn-md btn-info" name="savemajorbut"  style="float:right">Save</button>
									</div>
							
								</div>
								
							
								
									
							</div>

							

							
								
					</div>

					
						
						</form>	


						

					
					
							
			</div>


		
			
		</div>
	</div>
		
			
			 
		