
<?php 
  
//  session_start();
  
  include("includes/db_conn.php"); 


  /*if(!isset($_SESSION['userName']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {
*/
  ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Laptops Request List</title>

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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	
</head>
<style type="text/css">
	#setbg{

			background: linear-gradient(to bottom, rgba(0, 0, 0, 0.37), rgba(0, 0, 0, 0.37)), url('gmc-images/gmc-logo.png');
			background-repeat: no-repeat;
			background-position: center;
			color: #fff;
			
	}

	#setbg label
	{
		font-size: 0.97em;
		font-weight: 500;
	}






</style>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img width="256.633" height="55" src="gmc-images/gmc-logo.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right">
			
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<?php   

						/*$user = $_SESSION['userName'];

						$get_user = "SELECT * FROM users_tbl WHERE fullname = '$user'";
						$run_user = mysqli_query($db, $get_user);
						$row_user = mysqli_fetch_array($run_user);

						$fullname = $row_user['fullname'];
						*/

					?>
						<span class="user-icon">
							<i class="fa fa-user"></i>
						</span>
						<span class="user-name"><?php // echo $fullname; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="account.php"><i class="dw dw-settings2"></i> Account Settings</a>
						<a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<?php include("includes/sidebar.php"); ?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Laptop Requests</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Laptop Requests</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Request Details </h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>Full Name</th>
									<th>Department</th>
									<th>Mine Number</th>
									<th>HoD Name</th>
									<th>Request Name</th>
									<th>Request Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								
								$lap_user = "SELECT * FROM request_tbl WHERE request_name = 'Laptop'";
								$run_user  = mysqli_query($db, $lap_user);

								while($row = mysqli_fetch_array($run_user))
								{	
									$user_id     = $row['request_id'];
									$fullname    = $row['fullname'];
									$mine_no     = $row['mine_number'];
									$hod_name    = $row['hod_name'];
									$req_name    = $row['request_name'];
									$dept_id     = $row['dept_id'];
									$status      = $row['request_status'];
									$req_type    = $row['request_type'];
									$soft_comp   = $row['software_comp'];
									$mach_inv    = $row['machine_inv_no'];
									$budget_cost = $row['budget_cost'];
									$req_date    = $row['request_date'];
									$comp_inc    = $row['comp_inc'];
									
									// Get Department
									$get_dept  = "SELECT * FROM tbl_dept WHERE dept_id = '$dept_id'";
									$run_dept  = mysqli_query($db, $get_dept);
									$row_dept  = mysqli_fetch_array($run_dept);
									$dept_name = $row_dept['dept_name'];

							  ?>
								<tr>
									<td><?php echo $fullname;  ?></td>
									<td><?php echo $dept_name; ?></td>
									<td><?php echo $mine_no;     ?></td>
									<td><?php echo $hod_name;    ?></td>
									<td><?php echo $req_name;   ?></td>
									<td>
										<?php 
											if($status == "Approved")
											{
													echo "<span class='badge badge-success'>Approved</span>";
											}
											else
											{
													echo "<span class='badge badge-danger'>Pending</span>";	
											}
										 
										?>
									</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												
												<a class="dropdown-item" data-target="#update<?php echo $user_id; ?>" data-toggle="modal" href="#update<?php echo $user_id; ?>"><i class="dw dw-eye"></i> View</a>
												<?php 
												   if($status == "Pending")
												   {
												   		echo "<a class='dropdown-item' data-target='#notregister' data-toggle='modal' href='#register'><i class='dw dw-edit2'></i> Register</a>";
												   }
												   else
												   {
												   		echo "<a class='dropdown-item' data-target='#register' data-toggle='modal' href='#register'><i class='dw dw-edit2'></i> Register</a>";
												   }

												?>

												<a class="dropdown-item" data-target="#delete<?php echo $user_id; ?>" data-toggle="modal" href="#delete<?php echo $user_id; ?>"><i class="dw dw-delete-3"></i> Delete</a>
											
											</div>
										</div>
									</td>
								</tr>
									<!-- Large Modal -->
			<div class="modal" id="update<?php echo $user_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">View User Request
							</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
						<form action="" method="">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Full Name</label>
											<input type="text" disabled class="form-control" value="<?php echo $fullname; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mine Number</label>
											<input type="text" disabled class="form-control" value="<?php echo $mine_no; ?>">
										</div>
									</div>
								</div>			

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<input type="text" disabled class="form-control" value="<?php echo $dept_name; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>HoD</label>
											<input type="text" disabled class="form-control" value="<?php echo $hod_name; ?>">
										</div>
									</div>
								</div>		


								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Request Name</label>
											<input type="text" disabled class="form-control" value="<?php echo $req_name; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Request Type</label>
											<input type="text" disabled class="form-control" value="<?php echo $req_type; ?>">
										</div>
									</div>
								</div>			
							
								<div class="form-group">
									<label>Software Components</label>
									<input type="text" disabled class="form-control" value="<?php echo $soft_comp; ?>">
								</div>
											
								<div class="form-group">
								 <label>Machine Inv Number</label>
								 <input type="text" disabled class="form-control" value="<?php echo $mach_inv; ?>">
								</div>

								<div class="form-group">
								 <label>Budget Cost</label>
								 <input type="text" disabled class="form-control" value="<?php echo $budget_cost; ?>">
								</div>

								<div class="form-group">
								 <label>Comp Inc</label>
								 <input type="text" disabled class="form-control" value="<?php echo $comp_inc; ?>">
								</div>

								<div class="form-group">
									<label>Request Status: </label>
										<?php 
											if($status == "Approved")
											{
													echo "<span class='badge badge-success'>Approved</span>";
											}
											else
											{
													echo "<span class='badge badge-danger'>Pending</span>";	
											}
										 
										?>
								</div>

							</section>	
						</form>
					</div>
				</div>
			</div>
		</div>

			<!--End Large Modal -->


		
			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $user_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Request Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="laptop-request-del.php" method="post">
							<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>" required> 
                      
                <p>Are you sure you want to <b>Delete</b> this Request?</p>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-danger" name="delete" type="submit">Yes</button>
							<button class="btn ripple btn-primary" data-dismiss="modal" type="button">No</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
				</div>
			</div>
			<!--End Delete Modal -->
			<!--End Large Modal -->			
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->

			<!-- Register User Large Modal -->
			<div class="modal" id="register">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Register User Request
							</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body" id="setbg">
						<form action="reg-lap-request.php" method="post">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Chasis Serial Number</label>
											<input type="text" class="form-control" name="serial_no">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >PC / Laptop Name</label>
											<input type="text" class="form-control" name="laptop_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>PC / Laptop Location</label>
											<input type="text" class="form-control" name="laptop_loc">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>System Name</label>
											<input type="text" class="form-control" name="system_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>System Owner</label>
											<input type="text" class="form-control" name="system_owner">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Domain Name (if applicable)</label>
											<input type="text" class="form-control" name="domain_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>System Role</label>
											<select class="form-control" name="system_role">
												<option disabled selected>Select Result</option>
												<option value="Workstation/Desktop">Workstation/Desktop</option>
												<option value="Mobile Device">Mobile Device</option>
												<option value="Domain Name">Domain Name</option>
												<option value="Office Laptop">Office Laptop</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>OS Installed</label>
											<input type="text" class="form-control" name="os_install">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Administered By</label>
											<input type="text" class="form-control" name="admin_name">
										</div>
									</div>
								</div>
							</section>
							<!-- Step 2 -->
							<h5 class="mb-5 mt-5" style="color: #fff;">Administration Details</h5>
							<hr>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Employee Name</label>
											<input type="text" class="form-control" name="emp_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Position</label>
											<input type="text" class="form-control" name="position">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Date</label>
											<input type="date" class="form-control" name="emp_date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Security Groups</label>
											<input type="text" class="form-control" name="sec_group">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Access Groups</label>
											<select class="form-control" name="access_group">
												<option disabled selected>Select Result</option>
												<option value="Email">Email</option>
												<option value="Internet">Internet</option>
												<option value="Dept Map Driver">Dept Map Driver</option>
												<option value="Office">Office</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Purpose</label>
											<select class="form-control" name="purpose">
												<option disabled selected>Select Result</option>
												<option value="Replacement">Replacement</option>
												<option value="Additional PC">Additional PC</option>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Additional Documents (User termination, user management log, screen shots) </label>
											<select class="form-control" name="add_doc">
												<option disabled selected>Select Result</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>								
								 </div>
								<div class="form-group">
								<button type="submit" name="lap-req-btn" class="btn btn-primary">Register User</button>
							 </div>
							</section>			
						</form>
					</div>
				</div>
			</div>
		</div>
<!--End Register User Large Modal -->

			

			<!-- Cannot Register User Modal -->
			<div class="modal" id="notregister">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Cannot Register User
							</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="" method="post">
					   
                <p>User request not approved yet, approve before registering.</p>
							
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Cannot Register User -->
		</div>



			<div class="footer-wrap pd-20 mb-20 card-box">
				© 2022 Ghana Manganese Company Limited - All rights reserved 
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</html>
<?php // } ?>