<?php

	
	include('includes/db_conn.php');

	
	function allRequest()
	{
			 global $db;

			 $fullname = $_SESSION['userName'];
	      
			 // Total 
		     $tot_req    = "SELECT * FROM request_tbl WHERE fullname = '$fullname'";
		     $run_req    = mysqli_query($db, $tot_req);
    		 $count_req  = mysqli_num_rows($run_req);

		     echo $count_req;
	}

	function approvedRequest()
	{
			 global $db;

			 $fullname = $_SESSION['userName'];
	      
			 // Total 
		     $tot_req    = "SELECT * FROM request_tbl WHERE fullname = '$fullname' AND request_status = 'Approved'";
		     $run_req    = mysqli_query($db, $tot_req);
    		 $count_ap   = mysqli_num_rows($run_req);

		     echo $count_ap;
	}

	function pendingRequest()
	{
			 global $db;

			 $fullname = $_SESSION['userName'];
	      
			 // Total 
		     $tot_req    = "SELECT * FROM request_tbl WHERE fullname = '$fullname' AND request_status = 'Pending'";
		     $run_req    = mysqli_query($db, $tot_req);
    		 $count_pd   = mysqli_num_rows($run_req);

		     echo $count_pd;
	}

	





?>