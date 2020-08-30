<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

if (isset($_POST['savecoursebut'])){

		$coursetitle=$_POST['course_title'];
		$courseacro=$_POST['course_acro'];
		$coursedept=$_POST['course_dept'];
		$pid=$_POST['idnya'];
		

	$courseUpdate = $func->update('coursetbl','courseID',$pid, array(
				'courseAcro' => $courseacro,
				'courseTitle' => $coursetitle,
				'courseDept' => $coursedept
				));
				
				if($courseUpdate){	
					
					echo '<script>alert("Succeed");</script>';
						
					

				} else {
					echo '<script>alert("EDITING COURSE FAILED !!");</script>';
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
						<p id="pangs" >Edit Course</p>

						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('coursetbl',array('courseID','=',$col));
							if ($cors){
								
						?>


							<strong><a href="dashboard.php">Back to List</a></strong>
							<form method="POST" name="add_course">
							<div id="editcourse">
								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label">Course Title</label>
									<div class="col-md-8">
										<input type="text" placeholder="Ex: B.S. Information Technology" class="form-control" name="course_title" value="<?php echo $cors[0]['courseTitle'] ?>" required>
										<br>
									</div> 
								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label">Acronym:</label>
									<div class="col-md-3">
										
										<input type="text" placeholder="Ex: BSIT" class="form-control" name="course_acro" value="<?php echo $cors[0]['courseAcro'] ?>"  required>
									</div>
									<label class="col-md-2 control-label">Department:</label>
									<div class="col-md-3">
										<input type="text" placeholder="Ex: CICT" class="form-control" name="course_dept" value="<?php echo $cors[0]['courseDept'] ?>" required>
									</div>
							
								</div>
								<input type="hidden" name = "idnya" value="<?php echo $cors[0]['courseID'] ?>">
							<?php 	} ?>	
							<button type="submit" class="btn btn-md btn-info" name="savecoursebut"  style="float:right">Save</button>
								</div>
								
								
									
							</div>

							

							
								
					</div>

					
						
						</form>	

					
					
							
			</div>


		
			
		</div>
	</div>
		
			
			 
		