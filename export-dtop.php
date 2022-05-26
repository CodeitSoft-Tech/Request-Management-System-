<?php include("includes/header.php "); ?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Desktop Users</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Data</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>

				<!-- Export Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">List of GMC Desktop Users </h4>
					</div>
					<div class="pb-20">
						<table class="table hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">User Name</th>
									<th>Department</th>
									<th>Email</th>
									<th>Machine Type</th>
									<th>Machine Model</th>
									<th>Purchase Year</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								$i = 0;
								//$fullname = $_SESSION['userName'];

								$dtop_user = "SELECT * FROM desktop_users";
								$run_user  = mysqli_query($db, $dtop_user);

								while($row = mysqli_fetch_array($run_user))
								{	
									$user_id     = $row['user_id'];
									$username    = $row['username'];
									$m_type      = $row['machine_type'];
									$m_model     = $row['machine_model'];
									$purch_year  = $row['purch_year'];
									$dept_id     = $row['dept_id'];
									$email       = $row['email'];
									
									// Get Department
									$get_dept  = "SELECT * FROM tbl_dept WHERE dept_id = '$dept_id'";
									$run_dept  = mysqli_query($db, $get_dept);
									$row_dept  = mysqli_fetch_array($run_dept);
									$dept_name = $row_dept['dept_name'];

									$i++;

							  ?>
								<tr>
									<td class="table-plus"><?php echo $username; ?></td>
									<td><?php echo $dept_name;  ?></td>
									<td><?php echo $email;      ?></td>
									<td><?php echo $m_type      ?></td>
									<td><?php echo $m_model;    ?></td>
									<td><?php echo $purch_year; ?></td>
								</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
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