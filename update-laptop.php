<?php 

		include("includes/db_conn.php");

		if(isset($_POST['lap-upbtn']))
		{

			$user_id	= mysqli_real_escape_string($db, $_POST['user_id']);
		    $username   = mysqli_real_escape_string($db, $_POST['username']);
	        $email      = mysqli_real_escape_string($db, $_POST['email']);
	        $dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
	        $mach_type  = mysqli_real_escape_string($db, $_POST['m_type']);
	        $mach_model = mysqli_real_escape_string($db, $_POST['m_model']);
	        $purch_year = mysqli_real_escape_string($db, $_POST['purch_year']);


			$update_lap = "UPDATE laptop_users SET dept_id = '$dept_name', username = '$username', email = '$email', machine_type = '$mach_type', machine_model = '$mach_model', purch_year = '$purch_year' WHERE user_id = '$user_id'";
			$run_lap  = mysqli_query($db, $update_lap);


			if($run_lap)
			{
				echo "<script>alert('Laptop user updated successfully!')</script>";
				echo "<script>document.location='view-lap-user.php'</script>";
			}

		
		}


?>