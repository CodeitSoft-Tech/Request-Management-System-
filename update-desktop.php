<?php 

		include("includes/db_conn.php");

		if(isset($_POST['desk-upbtn']))
		{

			$user_id	= mysqli_real_escape_string($db, $_POST['user_id']);
		    $username   = mysqli_real_escape_string($db, $_POST['username']);
	        $email      = mysqli_real_escape_string($db, $_POST['email']);
	        $dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
	        $mach_type  = mysqli_real_escape_string($db, $_POST['m_type']);
	        $mach_model = mysqli_real_escape_string($db, $_POST['m_model']);
	        $purch_year = mysqli_real_escape_string($db, $_POST['purch_year']);


			$update_desk = "UPDATE desktop_users SET dept_id = '$dept_name', username = '$username', email = '$email', machine_type = '$mach_type', machine_model = '$mach_model', purch_year = '$purch_year' WHERE user_id = '$user_id'";
			$run_desk  = mysqli_query($db, $update_desk);


			if($run_desk)
			{
				echo "<script>alert('Desktop user updated successfully!')</script>";
				echo "<script>document.location='view-dtop-user.php'</script>";
			}

		
		}


?>