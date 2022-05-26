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
      
        $query ="SELECT * FROM users_tbl WHERE fullname = '$fullname'";
        $Result = $db->query($query);

        if($Result->num_rows == 1)
        {
        
          $MainSql = "SELECT * FROM users_tbl WHERE fullname ='$fullname' AND password = '$password'";
          $MainResult = $db->query($MainSql);

          if($MainResult->num_rows == 1)
          {
            $value     = $MainResult->fetch_assoc();
            $fullname  = $value['fullname'];
            $user_id   = $value['user_id'];
            
            // set session
            $_SESSION['userName'] = $fullname;
            
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