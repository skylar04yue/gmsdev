<?php 
	include'menu.php'; 
	include'menuside.php'; 
?> 

	<!-- /. NAV SIDE  --> 
    <div id="page-wrapper"; >
        <div id="page-inner">
            <div class="row" >
                <div class="col-lg-12">
                    <h2>UNIT OWNERS <small><a href="addowner.php">Add</a></small></h2>  
					<div class="container-fluid"><br>
						<div class="row">	  
							<center>
								<div class="table-responsive">
									<table width:800px class="table table-hover"  height:100px; overflow: scroll; >
										<tr style=" color:#ffffff; background-color:#0080ff;"> 
											<td>No</td>
											<td>Name</td>			
											<td>Cellphone #</td>
											<td>Local Address</td>
											<td>Email</td>
											<td >Unit No</td>
											<td >Action</td>
											</strong>
										</tr>
									<?php $y = 1;?>
									<?php  
										$sttt = null;
										if ((isset($_POST['delete']))) {
											$mid = $_POST['mid'];
											$delete = $func->update('messagebox','msgId',$mid, array(
													'msgstatus' => 3
												));
										}
						
										$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
										$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

										//Positioning
										$start = ($page > 1) ? ($page * $perPage) - $perPage : 0; 

										//Pages 						
										$unitowner = $func->selectjoin('mngt_memberslist','person','pid','person_id');
										$totalcountrow = count($unitowner);


										$pages = ceil($totalcountrow/$perPage);
							

										$view = $func->selectjoinorderby('person','mngt_memberslist','person_id','pid','person','lastname',$start,$perPage);

										echo '<script> alert('.count($view) .');</script>';
										if (count($view) == 0) {
											echo "No Post Available";
										} else {
											for($x=0;$x<count($view);$x++){ 
												$y = ($y + 1)*$page;
									?>
										<tr onclick="getElementById('.<?php echo escape($x) +1; ?>.').click()" style="cursor: pointer">
											<td>
												<?php 
													if($page>1){
														$pagec = $page *10 + $x +1;
														echo $pagec;
													} else {
												
													echo $x +1; } ?>
											</td>
											<td>
												<?php echo escape($view[$x]['lastname']).", ". escape($view[$x]['firstname']); ?>
											</td>
											<td>
												<?php echo escape($view[$x]['cpnum']); ?>
											</td>
											<td>
													<?php echo  escape($view[$x]['address']); ?>
											</td>
											<td>
													<?php echo  escape($view[$x]['email']); ?>
											</td>
											<td>
													<?php echo  escape($view[$x]['houseno']); ?>
											</td>
											<form method="post">
												<input type="hidden" name="mid" value="<?php echo escape($view[$x]['mem_id']); ?>"> 
												<input type="hidden" name="pid" value="<?php echo escape($view[$x]['pid']); ?>"> 
											<td>
												<a href="owner.php?id=<?php echo  escape($view[$x]['mem_id']); ?> " id=".<?php echo escape($x) +1; ?>.">View Details</a>
												<a href="homeownerlist.php?mid=<?php echo escape($view[$x]['msgId']); ?>">
													<input type="submit" name="delete" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
												</a>
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

             <!-- /. PAGE INNER  -->
        </div>
	
		<script>
			document.getElementById('ownerlist').className = "active-link";
			$("link[rel*='icon']").attr("href", "img/logo.png");
		</script>