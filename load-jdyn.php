<?php
	include 'menu.php';

	$comNewCount = $_POST['comNewCount'];
	$subjlist1 = $func->select_one('curri_subjtbl',array('currID','=',$comNewCount)); 

		echo '<select class="form-control" name="select_subj" id="mycross">';
		for($n=0;$n<count($subjlist1);$n++){ 
			echo '<option value="'. escape($subjlist1[$n]['subjID']) .'">';

				$subjtp = $func->select_one_orderby('subjtbl',array('subjID','=',$subjlist1[$n]['subjID']),'subjCode','ASC');

				
					echo escape($subjtp[0]['subjCode']) ." - " . escape($subjtp[0]['subjTitle']);
				

				

				echo '</option>';

			}
		echo "</select>";



	


?>

