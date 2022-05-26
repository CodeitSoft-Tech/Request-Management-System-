<?php 
 
    include("includes/db_conn.php");

    if(isset($_POST['lap-btn']))
    {   
    	$username   = mysqli_real_escape_string($db, $_POST['username']);
        $email      = mysqli_real_escape_string($db, $_POST['email']);
        $dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
        $mach_type  = mysqli_real_escape_string($db, $_POST['mach_type']);
        $mach_model = mysqli_real_escape_string($db, $_POST['mach_model']);
        $purch_year = mysqli_real_escape_string($db, $_POST['purch_year']);

        $insert_lap = "INSERT INTO laptop_users(username, email, dept_id, machine_type, machine_model, purch_year)VALUES('$username', '$email', '$dept_name', '$mach_type', '$mach_model', '$purch_year')";
        $run_lap    = mysqli_query($db,  $insert_lap);

        if($run_lap)
        {
            echo "<script>alert('User added successfully!')</script>";
            echo "<script>document.location='view-lap-user.php'</script>";
        }
    }



?>