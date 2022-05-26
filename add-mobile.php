<?php 
 
    include("includes/db_conn.php");

    if(isset($_POST['mob-btn']))
    {   
    	$username   = mysqli_real_escape_string($db, $_POST['username']);
        $email      = mysqli_real_escape_string($db, $_POST['email']);
        $dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
        $mob_brand  = mysqli_real_escape_string($db, $_POST['mob_brand']);
        $mob_model  = mysqli_real_escape_string($db, $_POST['mob_model']);
        $purch_year = mysqli_real_escape_string($db, $_POST['purch_year']);

        $insert_mob = "INSERT INTO mobile_users(username, user_email, dept_id, phone_brand, phone_model, year_purch)VALUES('$username', '$email', '$dept_name', '$mob_brand', '$mob_model', '$purch_year')";
        $run_mob    = mysqli_query($db,  $insert_mob);

        if($run_mob)
        {
            echo "<script>alert('User added successfully!')</script>";
            echo "<script>document.location='view-mob-user.php'</script>";
        }
    }

?>