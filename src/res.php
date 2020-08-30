<?php
	require_once("src/db.php");
	class res{
		private $class_var;

		function __construct(){
			global $con;
			$this->class_var=$con;
		}

		//select  join
		function selectjoin($table,$table2,$ref,$ref2){
			global $con;
			$list = array();
					
			$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2}";
							
			
					$qry = $con->query($sql);
					
					$rowcount = mysqli_num_rows($qry);
																			
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
			
		}
		
		
		
		//select join sample
		/*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/




		//select  joinlike
		function selectjoin_like($table,$table2,$ref,$ref2,$tblorder,$byfield,$likestr,$where = array()){
			global $con;
			$list = array();

			$likeval = '%' . $likestr . '%';

			if(count($where) === 2) {

				$tbl1	= $where[0];
				$field1 = $where[1];
				
					
			$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1} LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield}";
			
			} else if (count($where) === 4){
				$tbl1	= $where[0];
				$field1 = $where[1];
				$tbl2	= $where[3];
				$field2 = $where[4];
				
					
			$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1}  LIKE '{$likeval}' OR {$tbl2}.{$field2}  LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield}";

			}



			
					$qry = $con->query($sql);
					
					$rowcount = mysqli_num_rows($qry);
																			
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
			
		}
		
		
		
		//select join sample
		/*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/
		

	//select  joinlike 
		function selectjoin_likelimit($table,$table2,$ref,$ref2,$tblorder,$byfield,$likestr,$sortorder,$start,$perPage,$where = array()){
			global $con;
			$list = array();

			$likeval = '%' . $likestr . '%';

			if(count($where) === 2) {

				$tbl1	= $where[0];
				$field1 = $where[1];
				
					
			$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1} LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield} {$sortorder} LIMIT {$start}, {$perPage}";
			
			} else if (count($where) === 4){
				$tbl1	= $where[0];
				$field1 = $where[1];
				$tbl2	= $where[2];
				$field2 = $where[3];
				
					
			$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$tbl1}.{$field1}  LIKE '{$likeval}' OR {$tbl2}.{$field2}  LIKE '{$likeval}' ORDER BY {$tblorder}.{$byfield} {$sortorder} LIMIT {$start}, {$perPage}";

			}



			
					$qry = $con->query($sql);
					
					$rowcount = mysqli_num_rows($qry);
																			
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
			
		}
		
		
		
		//select join sample
		/*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/
		

		
			
		function selectjoinorderby($table,$table2,$ref,$ref2,$tableref,$col,$sortorder,$start,$perPage){
				
			global $con;
			$list = array();
			
				
				$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} ORDER BY {$tableref}.{$col} {$sortorder} LIMIT {$start}, {$perPage}";
				
				//echo $sql;
					
					$qry = $con->query($sql);
					
					$rowcount = mysqli_num_rows($qry);
					
							
										
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
	
		}

			/*	sample procedure selectall	
			$cemail = $func->selectjoinorderby('person',mngt_memberslist,'person','pid','person','lastname','start','perpage');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/
		

			//select join order no limit
		function selectjoinorderby_nolimit($table,$table2,$ref,$ref2,$tableref,$col,$sortorder){
				
			global $con;
			$list = array();
			
				
				$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} ORDER BY {$tableref}.{$col} {$sortorder}";
				
				//echo $sql;
					
					$qry = $con->query($sql);
					
					$rowcount = mysqli_num_rows($qry);
					
							
										
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
	
		}

			/*	sample procedure selectall	
			$cemail = $func->selectjoinorderby('person',mngt_memberslist,'person','pid','person','lastname','start','perpage');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/

	
			//select  join with orderby
		function selectjoinorderby2($table,$table2,$ref,$ref2){
			global $con;
			$list = array();
					
			$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2}";
							
			
					$qry = $con->query($sql);
					
					$rowcount = mysqli_num_rows($qry);
														
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;		
		}
		
			
		//select join sample
		/*
		$samm = $func->selectjoin('users','person','person_id','person_id');
		//print_r($samm);
		
		//echo count($samm);
		
		for($x=0;$x<count($samm);$x++){
					
					$m = $samm[$x]['permission'];
					if ($m ==3){
						echo $samm[$x]['permission'] .'<br>';
						echo $samm[$x]['username'] .'<br>';
					}
					
				}
	*/
			
		function selectjoin_where($table,$table2,$ref,$ref2,$table3,$where = array()){
			global $con;
			$list = array();
							
			if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

				if(in_array($operator, $operators)) {
					$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} WHERE {$table3}.{$field} {$operator} '{$value}'";
				
					
					$qry = $con->query($sql);
					
					
					$rowcount = mysqli_num_rows($qry);
					
					
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}		
		}
		
			
		

		function selectjoin3_where($table,$table2,$table3,$ref,$ref2,$ref3,$ref4,$tableref,$where = array()){
			global $con;
			$list = array();
							
			if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

				if(in_array($operator, $operators)) {
					$sql = "SELECT * FROM {$table} JOIN {$table2} ON {$table}.{$ref}={$table2}.{$ref2} JOIN {$table3} ON {$table2}.{$ref3}={$table3}.{$ref4} WHERE {$tableref}.{$field} {$operator} '{$value}'";
				
					
					$qry = $con->query($sql);
					
					
					$rowcount = mysqli_num_rows($qry);
					
					
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}		
		}
		
		//selecting * with 2 logical operator
		function select_logics2($table,$where1 = array(),$logic,$where2 = array(),$logic2,$where3 = array()){
			global $con;
			$list = array();
			
		
			
			if(count($where1) === 3 AND  count($where2) === 3){
			$operators = array('=', '>', '<', '>=', '<=');

			$field1		= $where1[0];
			$operator1 	= $where1[1];
			$value1		= $where1[2];
			$field2		= $where2[0];
			$operator2 	= $where2[1];
			$value2		= $where2[2];
			$field3		= $where3[0];
			$operator3 	= $where3[1];
			$value3		= $where3[2];

				if(in_array($operator1, $operators) AND in_array($operator2, $operators)) {
					$sql = "SELECT * FROM {$table} WHERE {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' {$logic2} {$field3} {$operator3} '{$value3}' ";				
					
					$qry = $con->query($sql);
			
					$rowcount = mysqli_num_rows($qry);
					
					//echo '<script>alert("'.rowcount.'");</script>';
										
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						//print_r($row);
							
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}
		}	

		//selecting * with logical operator
		function select_logic($table,$where1 = array(),$logic,$where2 = array()){
			global $con;
			$list = array();
			
		
			
			if(count($where1) === 3 AND  count($where2) === 3){
			$operators = array('=', '>', '<', '>=', '<=');

			$field1		= $where1[0];
			$operator1 	= $where1[1];
			$value1		= $where1[2];
			$field2		= $where2[0];
			$operator2 	= $where2[1];
			$value2		= $where2[2];

				if(in_array($operator1, $operators) AND in_array($operator2, $operators)) {
					$sql = "SELECT * FROM {$table} WHERE {$field1} {$operator1} '{$value1}' {$logic} {$field2} {$operator2} '{$value2}' ";				
					
					$qry = $con->query($sql);
			
					$rowcount = mysqli_num_rows($qry);
					
					//echo '<script>alert("'.rowcount.'");</script>';
										
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						//print_r($row);
							
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}
		}
		
		/*sample procedure select_logic row
		$cemail = $func->select_logic('users',array('username','=','alex'),'AND',array('name','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/
		
		//selecting * with where parameters
		function select_one($table,$where = array()){
			global $con;
			$list = array();
		
			if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

				if(in_array($operator, $operators)) {
					$sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}'";
									
					$qry = $con->query($sql);										
					$rowcount = mysqli_num_rows($qry);
				
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}
		}
		
		/*sample procedure select_one row
		
				$cemail = $func->select_one('users',array('username','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/

		//selecting * with where parameters
		function select_one_orderby($table,$where = array(),$orderfield,$sortorder){
			global $con;
			$list = array();
		
			if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

				if(in_array($operator, $operators)) {
					$sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}' ORDER BY {$orderfield}  {$sortorder}  ";
									
					$qry = $con->query($sql);										
					$rowcount = mysqli_num_rows($qry);
				
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}
		}
		
		/*sample procedure select_one row
		
				$cemail = $func->select_one('users',array('username','=','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/




		//selecting * with where  Like parameters
		function select_like($table,$where = array()){
			global $con;
			$list = array();


			if(count($where) === 3) {
				

			$field		= $where[0];
			$field2 	= $where[1];
			$value 	= $where[2];
			$valued = '%' . $value . '%';


			$sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%'";

		
			}else if(count($where) === 4) {
				

			$field		= $where[0];
			$field2 	= $where[1];
			$field3 	= $where[2];
			$value 	= $where[3];
			$valued = '%' . $value . '%';
			

			
					$sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%' OR {$field3} LIKE '%{$valued}%'";


				
			} else if(count($where) === 5) {
			

			$field		= $where[0];
			$field2 	= $where[1];
			$field3 	= $where[2];
			$value 	= $where[3];
			$sortorder 	= $where[4];
			$valued = '%' . $value . '%';


			$sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%' OR {$field3} LIKE '%{$value}%' ORDER BY {$field} {$sortorder} ";
			
			}

			
					
						
					$qry = $con->query($sql);										
					$rowcount = mysqli_num_rows($qry);
				
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				
			
		


		}
		
		/*sample procedure select_like row
		
				$cemail = $func->select_one('users',array('fname','lname','mname','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/



		//selecting * with where  Like parameters
		function select_likelimit($table,$orderfield,$sortorder,$start, $perPage, $where = array()){
			global $con;
			$list = array();

		
			if(count($where) === 3) {	

			$field		= $where[0];
			$field2 	= $where[1];
			$value 	= $where[2];
			$valued = '%' . $value . '%';
			

			
					$sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%'  ORDER BY {$orderfield} {$sortorder} LIMIT {$start}, {$perPage}";



				
			} else if(count($where) === 4) {
			

			$field		= $where[0];
			$field2 	= $where[1];
			$field3 	= $where[2];
			$value 	= $where[3];
			$valued = '%' . $value . '%';
			


			
					$sql = "SELECT * FROM {$table} WHERE {$field} LIKE '%{$valued}%' OR {$field2} LIKE '%{$valued}%' OR {$field3} LIKE '%{$value}%' ORDER BY {$orderfield} {$sortorder} LIMIT {$start}, {$perPage}";
									
			}
						
					$qry = $con->query($sql);										
					$rowcount = mysqli_num_rows($qry);
				
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				
		
			
		}
		
		/*sample procedure select_like row
		
				$cemail = $func->select_one('users',array('fname','lname','mname','alex'));
		print_r($cemail);

		for($x=0;$x<count($cemail);$x++){
			
			echo $cemail[$x]['name'] .'<br>';
			
		}
		*/


		
		//generic select * function
		function selectall($table){
			global $con;
			
			$list = array();
			$sql = "SELECT * FROM {$table}";
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


		//generic select * function
		function selectall_where($table,$where = array()){
			global $con;
			
			$list = array();


			if(count($where) === 3) {	

			$field		= $where[0];
			$operator 	= $where[1];
			$value 	= $where[2];

			}

			$sql = "SELECT * FROM {$table} WHERE {$field} {$operator} {$value}";
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


		//select distinct
		function select_distinct($table,$col_arr = array()){
			global $con;
			
			$list = array();


			if(count($col_arr) === 1) {	
			$field	= $col_arr[0];

			$sql = "SELECT DISTINCT {$field} FROM {$table} ";

			}
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


		//select distinct where
		function select_distinctwhere($table,$byfield,$sortorder,$col_arr = array(),$saan = array()){
			global $con;
			
			$list = array();


			if(count($col_arr) === 1) {	
			$field	= $col_arr[0];




					$sql = "SELECT DISTINCT {$field} FROM {$table} WHERE {$saan[0]} {$saan[1]} {$saan[2]} ORDER BY {$byfield}  {$sortorder}";

		

			

			

			}
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


		//select distinct
		function select_distinctlimit($table,$start,$perPage,$col_arr = array()){
			global $con;
			
			$list = array();


			if(count($col_arr) === 1) {	
			$field	= $col_arr[0];

			$sql = "SELECT DISTINCT {$field} FROM {$table} ";

			}
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/



		//generic select * function with sorting
		function selectallorderby($table,$col,$sortorder){
			global $con;
			
			$list = array();
			$sql = "SELECT * FROM {$table} ORDER BY {$col} {$sortorder}";
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/


			//generic select * function with sorting
		function selectallorderbylimit($table,$col,$sortorder,$start,$perPage){
			global $con;
			
			$list = array();
			$sql = "SELECT * FROM {$table} ORDER BY {$col} {$sortorder} LIMIT {$start}, {$perPage}";
			$qry = $con->query($sql);
			while($row = mysqli_fetch_assoc($qry)){
				$list[] = $row;
			}
			return $list;
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/
		
		
		function selectorderby($table,$col,$col2,$start,$perPage,$sortorder,$where = array()){
						
			global $con;
			$list = array();
						
			if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

				if(in_array($operator, $operators)) {
					$sql = "SELECT * FROM {$table} WHERE {$field} {$operator} '{$value}' ORDER BY {$col} {$sortorder}, {$col2} {$sortorder} LIMIT {$start}, {$perPage}";
							
					$qry = $con->query($sql);
													
					$rowcount = mysqli_num_rows($qry);
				
					if ($rowcount!=0){
						for($x=1;$x<=$rowcount;$x++){
						$row = mysqli_fetch_assoc($qry);
						$list[] = $row;
						}
						return $list;
					}
						return null;
				}
			}		
		}

			/*	sample procedure selectall	
			$cemail = $func->selectall('users','col','start','perpage');
			print_r($cemail);

			for($x=0;$x<count($cemail);$x++){
				
				echo $cemail[$x]['password'] .'<br>';
				
			}
			*/
				
		function delete($table,$where = array()){
			global $con;
			$list = array();
						
			if(count($where) === 3) {
			$operators = array('=', '>', '<', '>=', '<=');

			$field		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

				if(in_array($operator, $operators)) {
					$sql = "DELETE FROM {$table} WHERE {$field} {$operator} '{$value}'";
									
					$qry = $con->query($sql);
					
					return true;
				}
			}
			return false;
		}
		
		/* delete procedure
			$cemail = $func->delete('users',array('username','=','Dale'));

			if ($cemail){
				echo "record Deleted";
			} else {
				echo "failed";
			}
		*/
		
		//generic insert function
		//  parameter table and fields
		function insert($table, $fields = array()) {
		global $con;
		$keys = array_keys($fields);
		$values = '';
		$x = 1;

				foreach($fields as $field) {
					$values .= "'".$field."'";
					if($x < count($fields)) {
						$values .= ', ';
					}
					$x++;
				}

		$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
		
		$qry = $con->query($sql);
		
		
		if($qry){
				return true;
			} else {	
				return false;
			}
	}
	  /* sample procedure for page
		$userInsert = $func->insert('users',array(
		'name' => 'Dale',
		'username' => 'Dale',
		'password' => 'password'
		));
		*/
				
		function update($table,$param, $param_value, $fields) {
			global $con;
		$set = '';
		$x = 1;

		foreach($fields as $name => $value) {
			$set .= "{$name} = '{$value}'";
			if($x < count($fields)) {
				$set .= ', ';
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE {$param} = {$param_value}";
		//echo $sql;
		$qry = $con->query($sql);
		if($qry){
				return true;
			} else {	
				return false;
			}
	}
	
		/* sample update procedure
			$userUpdate = $func->update('users','userid',3, array(
					'password' => 'newpassword', 
					 'name' => 'Dale Garret'
				));

				
			if ($userUpdate){
				echo "record updated";
			} else {
				echo "failed";
			}
		*/
				
	function uploadfiles($filetoupload,$dir){
		
		$error='';

  	//make the allowed extensions
	$goodExtensions = array(
  	'.jpg', '.png','.jpeg',); 
  	
  	//set the current directory where you wanna upload the doc/docx  or pdf files
	$uploaddir = $dir;
	//get the names of the file that will be uploaded
			
  	$fname = $_FILES[$filetoupload]['name'];	
  	$min_filesize=10;//set up a minimum file size(a doc/docx can't be lower then 10 bytes)
  	$stem=substr($fname,0,strpos($fname,'.'));
	
  	//take the file extension
  	$extension = substr($fname, strpos($fname,'.'), strlen($fname)-1);
	 	
	//verify if the file extension is jpeg or png or jpg
   	if(!in_array($extension,$goodExtensions) )
     $error.='Extension not allowed<br>';
	 echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1
   
   	if(filesize($_FILES[$filetoupload]['tmp_name']) < $min_filesize )
     $error.='File size too small<br>'."\n";
  	$uploadfile = $uploaddir . $stem.$extension;
		
	$filename=$stem.$extension;
	
	//upload the file to

		if (move_uploaded_file($_FILES[$filetoupload]['tmp_name'], $uploadfile)) {
		echo $fname .' has been uploaded... ' ;
		} 
		
	return $uploadfile;
		
	} //end of  upload
		
	// End of functions
	}
	$func = new res();
?>
