
<?php 
  
  session_start();
  
  include("includes/db_conn.php"); 


  if(!isset($_SESSION['userHod']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {

  ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>IT Request System - GMC</title>

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

						$user = $_SESSION['userHod'];

						$get_user = "SELECT * FROM tbl_hod WHERE hod_name = '$user'";
						$run_user = mysqli_query($db, $get_user);
						$row_user = mysqli_fetch_array($run_user);

						$fullname = $row_user['hod_name'];

					?>
						<span class="user-icon">
							<i class="fa fa-user"></i>
						</span>
						<span class="user-name"><?php echo $fullname; ?></span>
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
								<h4>Requests</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Requests</li>
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
									<th class="table-plus datatable-nosort">Mine No</th>
									<th>Request By</th>
									<th>Request Name</th>
									<th>Request Type</th>
									<th>Date Requested</th>
									<th>Request Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								$fullname = $_SESSION['userHod'];

								$call_user = "SELECT * FROM request_tbl WHERE hod_name = '$fullname'";
								$run_user  = mysqli_query($db, $call_user);

								while($row = mysqli_fetch_array($run_user))
								{	
									$request_id  = $row['request_id'];
									$fullname    = $row['fullname'];
									$mine_no     = $row['mine_number'];
									$req_type    = $row['request_type'];
									$req_name    = $row['request_name'];
									$req_date    = $row['request_date'];
									$dept_id     = $row['dept_id'];
									$req_status  = $row['request_status'];
									$hod         = $row['hod_name'];
									$soft        = $row['software_comp'];
									$other       = $row['other_request'];
									$reqq_date   = date("M d, Y",strtotime($req_date));


									// Get Department
									$get_dept  = "SELECT * FROM tbl_dept WHERE dept_id = '$dept_id'";
									$run_dept  = mysqli_query($db, $get_dept);
									$row_dept  = mysqli_fetch_array($run_dept);
									$dept_name = $row_dept['dept_name'];

							  ?>
								<tr>
									<td class="table-plus"><?php echo $mine_no; ?></td>
									<td><?php echo $fullname; ?></td>
									<td><?php echo $req_name; ?></td>
									<td><?php echo $req_type; ?></td>
									<td><?php echo $reqq_date; ?></td>
									<td>
									 <?php 
									  if($req_status == "Pending")
									  {
									  		echo "<span class='badge badge-danger'>Pending</span>";
									  }
									  else 
									  {
									   		echo "<span class='badge badge-success'>Approved</span>";	 
									  } 

									 ?>
									</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" data-target="#update<?php echo $request_id; ?>" data-toggle="modal" href="#update<?php echo $request_id; ?>"><i class="dw dw-edit2"></i> View</a>
												<a class="dropdown-item" data-target="#delete<?php echo $request_id; ?>" data-toggle="modal" href="#delete<?php echo $request_id; ?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>

									<!-- Large Modal -->
			<div class="modal" id="update<?php echo $request_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">View Request Details
									 
							</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
						<form method="POST" action="approve-request.php">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text"  disabled  name="fullname" value="<?php echo $fullname; ?>" class="form-control">
							</div>

							<div class="form-group">
								<label>Mine Number</label>
								<input type="text" disabled  name="mine_no" value="<?php echo $mine_no; ?>" class="form-control">
							</div>

							<div class="form-group">
								<label>Request Name</label>
								<input type="text" disabled name="request_name" value="<?php echo $req_name; ?>" class="form-control">
							</div>

							<div class="form-group mb-20">
								<label>Request Type</label>
								<input type="text" disabled name="request_type" value="<?php echo $req_type; ?>" class="form-control">
							</div>

							<div class="form-group mb-20">
								<label>Software Components</label>
								<input type="text" multiple disabled name="soft_comp" value="<?php echo $soft; ?>" class="form-control">
							</div>


							
							<h3>HoD Confirmation:</h3>
							<hr>
							 <div class="form-group">
							 <label>Department</label>
							 <select class="form-control" name="dept_name">
								 <option disabled selected>Select Department</option>
								 <?php  
									 $get_dept = "SELECT * FROM tbl_dept";
									 $run_dept = mysqli_query($db, $get_dept);

									 while($row = mysqli_fetch_array($run_dept))
									 {
										 $dept_id   = $row['dept_id'];
										 $dept_name = $row['dept_name'];

										 echo "<option value='$dept_id'>$dept_name</option>";
									 }

								 ?> 
								</select>
								</div>

								<div class="form-group">
									<label>Capex/Opex to be funded from our Budget</label>
									<select class="form-control" name="copex_budget" required>
										<option disabled selected>Select option</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>

								<div class="form-group">
									<label>If Yes above, Budget Code is: </label>
									<input type="text" name="budget_code" class="form-control">
								</div>


								<div class="form-group">
									<label>Capex/Opex to be funded from IT Budget</label>
									<select class="form-control" name="it_budget" required>
										<option disabled selected>Select option</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>

								<div class="form-group">
									<label>This machine is MISSION CRITICAL, a 24hrs hotspare must be available from stock share</label>
									<select class="form-control" name="mach_crit" required>
										<option disabled selected>Select option</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>

								<div class="form-group">
									<label>Request Status</label>
									<select class="form-control" name="request_status" required>
										<option value="<?php echo $req_status; ?>"><?php echo $req_status; ?></option>
										<option value="Approved">Approved</option>
										<option value="Pending">Pending</option>
									</select>
								</div>

								<div class="form-group mb-20">
								<label>Date</label>
								<input type="date" name="request_date" class="form-control" required>
							  </div>

							  <div class="form-group mb-20">
								<label>Hod Note</label>
								<textarea class="form-control" name="hod_note"></textarea>
								</div>

								 <div class="form-group">
									<button type="submit" class="btn btn-primary" name="btn-approve">Approve</button>
								 </div>
						</form>			
					</div>
				</div>
			</div>
		</div>

			<!--End Large Modal -->


		
			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $request_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Request Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="request-del.php" method="post">
							<input type="hidden" class="form-control" name="request_id" value="<?php echo $request_id; ?>" required> 
                      
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
<?php } ?>