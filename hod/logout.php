<?php  


    session_start();
    include("includes/db_conn.php");
    session_destroy();
 
    echo "<script>document.location='login.php'</script>";



?>