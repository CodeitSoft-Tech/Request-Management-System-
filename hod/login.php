<?php 
	
		session_start();
		include("includes/db_conn.php");
		include("user-login.php");

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>GMC IT Request - HoD Panel</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

</head>
<style type="text/css">
	
	.btn-sign
	{
		background: #0081c9;
		padding: 12px;
		border: 1px solid #0081c9;
		color: #ffffff;
		border-radius: 5px;
	}

	.btn-sign:hover
	{
		color: #fff;
	}

	.text{
		color: #0081c9;
	}

	.btn-reg
	{
	   border: 1px solid #0081c9;
	   color:  #0081c9;
	}

	.btn-reg:hover
	{
		background: #0081c9;
		color: #fff;
	}




</style>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<img src="../gmc-images/gmc-logo.png" alt="GMC Logo" width="150" height="55">
				</a>
			</div>
			<div class="login-menu">
				<!--<ul>
					<li><a href="register.php">Register</a></li>
				</ul>-->
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="gmc-images/req.png" alt="IT Request Image">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text">Login To GMC IT Request</h2>
						</div>
						<form action="" method="POST">
							<?php 
			                  if($ErrorLogin)
			                  {
			                    foreach ($ErrorLogin as $key => $value) {
			                      echo '<div class="alert alert-danger  role="alert">
			                      <i class="fa fa-exclamation text-white"></i>
			                      '.$value.'
			                      </div>';
			                    }
			                  }

			              ?>
							<!--<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Employee
									</label>
								</div>
							</div>-->
							<div class="input-group custom">
								<input type="text" name="fullname" class="form-control form-control-lg" placeholder="Full Name">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<!--<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div> -->
								</div> 
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.php">Forgot Password?</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									<button type="submit" name="login-btn" class="btn btn-sign btn-lg btn-block">Sign In</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-reg btn-lg btn-block" href="register.php">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>