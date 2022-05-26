<?php include("includes/header.php"); ?>


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
									<li class="breadcrumb-item active" aria-current="page">Desktop Users</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				
	                	<div class="clearfix">
						<h4 class="text-blue h4">Add Desktop User</h4>
					</div>
					<div class="wizard-content">
						<form action="add-desktop.php" method="post">
							<h6 class="mb-5">User Details</h6>
							<hr>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>User Name</label>
											<input type="text" class="form-control" name="username">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="text" class="form-control" name="email">
										</div>
									</div>
								</div>			
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<select class="form-control custom-select2" name="dept_name">
												<option disabled selected>Select Result</option>

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
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Machine Type</label>
											<input type="text" class="form-control" name="mach_type">
										</div>
									</div>
								</div>

								<div class="form-group">
								 <label>Machine Model</label>
								 <input type="text" class="form-control" name="mach_model">
								</div>

								<div class="form-group">
								 <label>Purchased Year</label>
								 <input type="text" class="form-control" name="purch_year">
								</div>

								<div class="form-group">
									<button type="submit" name="desk-btn" class="btn btn-primary">Add User</button>
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
