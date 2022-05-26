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
						
							// Retrieving each selected option
			            foreach ($soft_comp as $item)
			            {
       						$comp = $item;

       						$insert_req = "INSERT INTO request_tbl SET dept_id = '$dept_name', fullname = '$fullname', mine_number = '$mine_no', hod_name = '$hod_name', request_name = '$req_name', other_request = '$others', request_type = '$req_type', software_comp = '$comp', machine_inv_no = '$inv_number', budget_cost = '$budget_cost', request_date = NOW(), request_status = '$status'";

						/*	$insert_req = "INSERT INTO request_tbl(dept_id,	fullname, mine_number, hod_name, request_name, other_request,request_type, software_comp, machine_inv_no, budget_cost, request_date, request_status)VALUES('$dept_name', '$fullname', '$mine_no', '$hod_name', '$req_name', '$others', '$req_type','$comp', '$inv_number', '$budget_cost', NOW(), '$status')"; */

							mysqli_query($db, $insert_req);

					   }
					     
					     echo "<script>alert('Request sent successfully, waiting for Approval!')</script>";
						 echo "<script>document.location='make-request.php'</script>";
							
					}
			
		
	



?>