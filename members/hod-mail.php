<?<?php 

	include("includes/db_conn.php");

	
	if(isset($_POST['btn-hod']))
	{
		 $fullname = $_SESSION['userName'];

		 $users      = "SELECT * FROM users_tbl WHERE fullname = '$fullname'";
		 $run        = mysqli_query($db, $users);
		 $row        = mysqli_fetch_array($run);
		 $user_email = $row['email'];


		 $email      = mysqli_real_escape_string($db, $_POST['email']);
		 $subject    = mysqli_real_escape_string($db, $_POST['subject']);
		 $msg        = mysqli_real_escape_string($db, $_POST['message']);

		 


	}






?>