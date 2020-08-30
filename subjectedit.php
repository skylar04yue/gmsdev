<?php 
include'menu.php'; 
include'menuside_dash.php'; 
		

if (isset($_POST['savesubbut'])){


		$subjcode= $strip->strip($_POST['subj_code']);
		$subjtitle= $strip->strip($_POST['subj_title']);
		$creditunit= $strip->strip($_POST['credit_unit']);
		$lecunit= $strip->strip($_POST['lec_unit']);

		$labunit= $strip->strip($_POST['lab_unit']);

		$pid=$_POST['idnya'];
		

	$courseUpdate = $func->update('subjtbl','subjID',$pid, array(
				'subjCode' => $subjcode,
				'subjTitle' => $subjtitle,
				'subjUnit' => $creditunit,
				'subjLec' => $lecunit,
				'subjLab' => $labunit
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
				
				<div class="col-lg-12 form-group paper">
							
						<br>
						<p id="pangs" >Edit Course</p>



						<?php
							//for edit
							$col = "-1";
							
							if (isset($_GET['id'])) {
								$col = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
								
								
							}
								
						

							$cors = $func->select_one('subjtbl',array('subjID','=',$col));
							if ($cors){
								
						?>


							<strong><a href="subject.php">Back to List</a></strong>

								<form method="POST" name="add_subject">
							<div id="editnewsubject">

								<div class="col-lg-12 form-group">
									<label class="col-md-1 control-label"></label>
									<label class="col-md-2 control-label" style="text-align: right">Subject Code:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: ITP 06" class="form-control" name="subj_code" value="<?php echo $cors[0]['subjCode'] ?>" required>
									</div>
									<label class="col-md-2 control-label" style="text-align: right">Subject Title:</label>
									<div class="col-md-5">
										<input type="text" placeholder="Ex: Web Development" class="form-control" name="subj_title" value="<?php echo $cors[0]['subjTitle'] ?>" required>
									</div>
									
							
								</div>

								<div class="col-lg-12 form-group">
									<label class="col-md-2 control-label" style="text-align: right">UNIT:</label>
									<label class="col-md-1 control-label" style="text-align: right">Credit:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: 3" class="form-control" name="credit_unit" value="<?php echo $cors[0]['subjUnit'] ?>" required>
									</div>
									<label class="col-md-1 control-label" style="text-align: right">Lec:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: 3" class="form-control" name="lec_unit" value="<?php echo $cors[0]['subjLec'] ?>" >
									</div>
									<label class="col-md-2 control-label" style="text-align: right">Lab:</label>
									<div class="col-md-2">
										<input type="text" placeholder="Ex: 3" class="form-control" name="lab_unit" value="<?php echo $cors[0]['subjLab'] ?>">
									</div>
									
									
							
								</div>
								
								
							<div class="col-md-11">
										<input type="hidden" name = "idnya" value="<?php echo $cors[0]['subjID'] ?>">
								<?php 	} ?>
										<button type="submit" class="btn btn-md btn-info" name="savesubbut" style="float: right" >Submit</button>
									</div>
								
									
							</div>

							

							
								
					</div>

					
						
					</form>	


							
						

					
					
							
			</div>


		
			
		</div>
	</div>
		
			
			 
		