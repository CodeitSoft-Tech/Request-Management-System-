<?php 

		include("includes/db_conn.php");

		if(isset($_POST['mob-upbtn']))
		{

			$user_id	= mysqli_real_escape_string($db, $_POST['user_id']);
		    $username   = mysqli_real_escape_string($db, $_POST['username']);
	        $email      = mysqli_real_escape_string($db, $_POST['email']);
	        $dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
	        $mob_brand  = mysqli_real_escape_string($db, $_POST['brand']);
	        $mob_model  = mysqli_real_escape_string($db, $_POST['model']);
	        $purch_year = mysqli_real_escape_string($db, $_POST['purch_year']);


			$update_mob = "UPDATE mobile_users SET dept_id = '$dept_name', username = '$username', user_email = '$email', phone_brand = '$mob_brand', phone_model = '$mob_model', year_purch = '$purch_year' WHERE mob_user_id = '$user_id'";
			$run_mob  = mysqli_query($db, $update_mob);


			if($run_mob)
			{
				echo "<script>alert('Mobile phone user updated successfully!')</script>";
				echo "<script>document.location='view-mob-user.php'</script>";
			}

		
		}


?>