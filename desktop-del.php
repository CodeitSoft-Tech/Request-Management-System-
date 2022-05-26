<?php  

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['user_id']);

		$delete     = "DELETE FROM desktop_users WHERE user_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo"<script>alert('Desktop user details deleted successfully!')</script>";
			echo "<script>document.location='view-dtop-user.php'</script>";
		}
	}	


?>