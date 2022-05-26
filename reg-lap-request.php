<?php  
 	
 	include("includes/db_conn.php");

 	if(isset($_POST['lap-req-btn']))
 	{
 		$serial_no      = mysqli_real_escape_string($db, $_POST['serial_no']);
 		$laptop_name    = mysqli_real_escape_string($db, $_POST['laptop_name']);
 		$laptop_loc     = mysqli_real_escape_string($db, $_POST['laptop_loc']);
 		$system_name    = mysqli_real_escape_string($db, $_POST['system_name']);
 		$system_owner   = mysqli_real_escape_string($db, $_POST['system_owner']);
 		$domain_name    = mysqli_real_escape_string($db, $_POST['domain_name']);
 		$system_role    = mysqli_real_escape_string($db, $_POST['system_role']);
 		$os_install     = mysqli_real_escape_string($db, $_POST['os_install']);
 		$admin_name     = mysqli_real_escape_string($db, $_POST['admin_name']);
 		$emp_name       = mysqli_real_escape_string($db, $_POST['emp_name']);
 		$position       = mysqli_real_escape_string($db, $_POST['position']);
 		$emp_date       = mysqli_real_escape_string($db, $_POST['emp_date']);
 		$sec_group      = mysqli_real_escape_string($db, $_POST['sec_group']);
 		$access_group   = mysqli_real_escape_string($db, $_POST['access_group']);
 		$purpose        = mysqli_real_escape_string($db, $_POST['purpose']);
 		$add_doc        = mysqli_real_escape_string($db, $_POST['add_doc']);


 		$insert_reg = "INSERT INTO registered_request(chasis_no, laptop_name, location,	system_name, system_owner, domain_name, system_role, os_installed, admin_by, emp_name, position, date_taken, security_groups, access_groups, purpose, add_doc)VALUES('$serial_no', '$laptop_name', '$laptop_loc', '$system_name', '$system_owner', '$domain_name', '$system_role', '$os_install', '$admin_name', '$emp_name', '$position', '$emp_date', '$sec_group', '$access_group', '$purpose', '$add_doc')";
 		$run_reg = mysqli_query($db, $insert_reg);

 		if($run_reg)
 		{
 			echo "<script>alert('User registered successfully!')</script>";
 			echo "<script>document.location='view-laptop-request.php'</script>";
 		}



 	}

?>