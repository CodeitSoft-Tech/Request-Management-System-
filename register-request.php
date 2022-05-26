<?php include("includes/header.php"); ?>


<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Laptop Request</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Register User</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				
	                <div class="clearfix">
						<h4 class="text-blue h4">User Registration/ Deregistration Protocol</h4>
					</div>
					<div class="wizard-content">
						<form action="add-request.php" method="post">
							<h5 class="mb-5">Target System Details</h5>
							<hr>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Chasis Serial Number</label>
											<input type="text" class="form-control" name="serial_number">
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
											<input type="text" class="form-control" name="laptop_location">
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
											<select class="form-control custom-select2" name="system_role">
												<option disabled selected>Select Result</option>
												<option value="Workstation">Workstation</option>
												<option value="Mobile Device">Mobile Device</option>
												<option value="Domain Name">Domain Name</option>
												<option value="Office Laptop">Office Laptop</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>OS Installed</label>
											<input type="text" class="form-control" name="os_installed">
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
							<h5 class="mb-5">Administration Details</h5>
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
											<input type="text" class="form-control date-picker" name="emp_date">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Security Groups</label>
											<input type="text" class="form-control" name="security_group">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Access Groups</label>
											<select class="form-control custom-select2" name="access_groups">
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
											<select class="form-control custom-select2" name="purpose">
												<option disabled selected>Select Result</option>
												<option value="Replacement">Replacement</option>
												<option value="Additional PC">Additional PC</option>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Additional Documents (User termination, user management log, screen shots) </label>
											<select class="form-control custom-select2" name="purpose">
												<option disabled selected>Select Result</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
									</div>
									
								</div>

								<div class="form-group">
									<button type="submit" name="request-btn" class="btn btn-primary">Register User</button>
								</div>
							</section>			
						</form>
					</div>
				</div>
			</div>
			<?php include("includes/footer.php"); ?>
		</div>
	</div>
	<?php include("includes/footer-links.php");?>
