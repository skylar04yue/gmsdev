<?php
	include 'menu.php';

?>
<!DOCTYPE html>
<html>
<head>

	<script>
		$(document).ready(function(){
			var comCount = 0 ;
			$("#kuhanan").change(function(){
				comCount = document.getElementById("kuhanan").value;
				$("#comments").load("load-jdyn.php", {
					comNewCount: comCount
				});
			});
		});

	</script>


</head>
<body>
	<div class="container-fluid">
		<br>
	<br>
	
		 <div class="row" >
		 	<?php $subjlis = $func->selectall('curriculum'); 
		 		
		 	 ?>


		 	
		 		<select name="kuhanan" id="kuhanan">

		 		<?php	for($n=0;$n<count($subjlis);$n++){ 
													
										?>
											
				<option value="<?php echo escape($subjlis[$n]['currID']); ?>"> <?php echo escape($subjlis[$n]['curriName']) ."ver. ".escape($subjlis[$n]['version']) ; ?></option>
					<?php  }  ?>

				</select>
		 	<div id="comments">
		 		
		 	<?php
			$subjlist1 = $func->select_one('curri_subjtbl',array('currID','=',1)); 

			echo "<select>";
			for($n=0;$n<count($subjlist1);$n++){ 
				echo "<option>";
					echo escape($subjlist1[$n]['subjID']);

				echo "<option>";

			}
			echo "</select>";
		?>


	</div>
	
	<button id="butbut">Show more comments</button>
		</div>
	</div>
</body>
</html>
