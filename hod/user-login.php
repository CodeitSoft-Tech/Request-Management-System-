<?php
    
  include("includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['login-btn']))
 {

    $fullname    = mysqli_real_escape_string($db, $_POST['fullname']);
    $password    = mysqli_real_escape_string($db, $_POST['password']);

      if(empty($fullname) || empty($password))
      {
        if($fullname == "")
        {
          $ErrorLogin[] = "Your Full Name is required";
        }

        if($password == "")
        {
          $ErrorLogin[] = "Password is required";
        }

      }

      else
      {
      
        $query ="SELECT * FROM tbl_hod WHERE hod_name = '$fullname'";
        $Result = $db->query($query);

        if($Result->num_rows == 1)
        {
        
          $MainSql = "SELECT * FROM tbl_hod WHERE hod_name ='$fullname' AND password = '$password'";
          $MainResult = $db->query($MainSql);

          if($MainResult->num_rows == 1)
          {
            $value     = $MainResult->fetch_assoc();
            $fullname  = $value['hod_name'];
            $user_id   = $value['hod_id'];
            
            // set session
            $_SESSION['userHod'] = $fullname;
            
            echo "<script>alert('Login successful!')</script>";
            echo "<script>document.location='index.php'</script>";

          } 
          else
          {
            $ErrorLogin[] = "Incorrect username/password combination";
          }

        }

        else
        {
          $ErrorLogin[] = "username does not exists";
        }

        
      }

      }


?>