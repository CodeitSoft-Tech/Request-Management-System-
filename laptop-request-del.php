<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['user_id']);
		
		$delete     = "DELETE FROM request_tbl WHERE request_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));


     	if($run_delete)
		{
			echo "<script>alert('Request deleted successfully')</script>";
			echo "<script>document.location='view-laptop-request.php'</script>";
		}
	}	


?>