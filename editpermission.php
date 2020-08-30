<?php 
include'menu.php'; 



if(empty($_SESSION['userid'])){
	header('location: register.php');
}
$status =null;

$permitlevel = null;
$useremail = null;

if (isset($_POST['update'])){
		$reglevel=$_POST['reglevel'];
		$regid=$_POST['regid'];
		

	$permissonUpdate = $func->update('users','user_id',$regid, array(
				'permission' => $reglevel
				));
				
			
				
					if($permissonUpdate){
								
								$status= "Data Has Been Updated!";
								
							} else {
								$status= "Update Failed!";
							}
	
				
				
			
			
	
}



?> 

   <style>
     .well{
	background-color: #C8F7C5;
	/*border-bottom	: 2px groove black;
	height: 100px;*/
}
	 div#corner{
	background-color: white;
	border:10px;
	/*border-bottom	: 5px groove black;
	height: 100px;*/
}


h1{
	color:black;
}

    </style>
  <!-- /. NAV SIDE  -->
 
  
  
        <div id="page-wrapper"; >
            <div id="page-inner">
					
	
                <div class="col-lg-12">
		<br>
	
	<div class="row">
	
	<?php  
						$sttt = null;
						
						
					
						
			
						if ((isset($_POST['searchuser']))) {
							$useremail = $_POST['useremail'];
							
								
							$searchUser =  $func->select_one('users',array('username','=',$useremail));
							
							
						
							if($searchUser){
								$permitlevel = $searchUser[0]['permission']; 
							}
							
							
						}
		
						
					
					
									

							?>
	
	
				<form method="POST">
				<div class="paper" id="corner">
				<p><?php echo  $status; ?></p>
				
					<div id="printarea">
					<H3>Edit Account Level</H3>
						<div class="row">
						<H3>Search</H3>
						<div class="col-sm-2 form-group">
								<label  class="col-sm-2 control-label">Username</label>
								</div>
							<div class="col-sm-6 form-group">
								<input type="email"  class="form-control" name="useremail"  value="<?php echo $useremail  ?>">
						
								</div>
					
							
							<div class="col-sm-4 form-group">
								<button type="submit" class="btn btn-info"name="searchuser">Search</button>		</div>
						</div>	
</div>							
						
						
						<hr>
					<H3>RESULT:</H3>
					<p class="alert-danger">
					<strong>LEGEND:</strong>
					1 - member,  2 - admin
					</p>
					
					<div class="row">
					<div class="col-sm-2 form-group">
								<label>Account Level</label>
								
							</div>
					<div class="col-sm-2 form-group">
							
								<input type="text"  class="form-control" name="reglevel" value="<?php echo $permitlevel ?>">
							</div>
					<div class="col-sm-2 form-group">
							<input type="hidden"  class="form-control" name="regid" value="<?php echo $searchUser[0]['user_id'] ?>">
								<button type="submit" class="btn btn-info"name="update">Update</button>	
							</div>
					
					</div>
					
						
				</form> 
				
	</div>
	

	
	
	
	
	
	
	
	
	</div>
             <!-- /. PAGE INNER  -->
            </div>
			
			
			
			 <script>
	
				document.getElementById('editpermit').className = "active";
				
				 $("link[rel*='icon']").attr("href", "img/logo.png");
				 
				 
				 
				 function printDiv(divName) {
						var printContents = document.getElementById(divName).innerHTML;
					 var originalContents = document.body.innerHTML;

					 document.body.innerHTML = printContents;

					 window.print();

					 document.body.innerHTML = originalContents;
				}
				  
			</script>