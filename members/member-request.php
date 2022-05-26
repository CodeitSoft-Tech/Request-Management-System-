<?php  
	
	include("includes/db_conn.php");


	$ErrorForm = array();

	if(isset($_POST['btn-request']))
	{
		$fullname   = mysqli_real_escape_string($db, $_POST['fullname']);
		$mine_no    = mysqli_real_escape_string($db, $_POST['mine_number']);
		$dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
		$hod_name   = mysqli_real_escape_string($db, $_POST['hod_name']);
		$req_name   = mysqli_real_escape_string($db, $_POST['request_name']);
		$others     = mysqli_real_escape_string($db, $_POST['others']);
		$req_type   = mysqli_real_escape_string($db, $_POST['request_type']);
		$soft_comp  = $_POST['soft_comp'];
		$inv_number = mysqli_real_escape_string($db, $_POST['inv_number']);
		$budget_cost = mysqli_real_escape_string($db, $_POST['budget_cost']);
	//	$comp_inc    = mysqli_real_escape_string($db, $_POST['comp_inc']) ?? null;

		   
						$status = "Pending";
						$insert_string = '';
						
						// Retrieving each selected option
			            foreach ($soft_comp as $item)
			            {
       						$insert_string .= $item . ", ";
       					}

						$insert_req = "INSERT INTO request_tbl(dept_id,	fullname, mine_number, hod_name, request_name, other_request, request_type, software_comp, machine_inv_no, budget_cost, request_date, request_status)VALUES('$dept_name', '$fullname', '$mine_no', '$hod_name', '$req_name', '$others', '$req_type','$insert_string', '$inv_number', '$budget_cost', NOW(), '$status')"; 
							mysqli_query($db, $insert_req);
					     
					     echo "<script>alert('Request sent successfully, waiting for Approval!')</script>";
						 echo "<script>document.location='make-request.php'</script>";
							
	}
			
		
?>