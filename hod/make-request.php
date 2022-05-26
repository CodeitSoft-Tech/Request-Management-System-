<?php 
		
  include("includes/header.php"); 

  if(!isset($_SESSION['userHod']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {


?>
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Make A Request</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Make Request</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				
	           <div class="clearfix">
						<h4 class="text-blue h4 mb-10">GMC IT standard machinery, PC CAPEX/OPEX calc</h4>
					</div>
					<div class="wizard-content mt-5">
						<form action="member-request.php" method="post">
					
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Full Name</label>
											<input type="text" class="form-control" name="fullname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mine Number</label>
											<input type="text" class="form-control" name="mine_number">
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
											<label>HOD Name</label>
											<input type="text" class="form-control" name="hod_name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Request Name</label>
											<select class="form-control custom-select2" name="request_name">
												<option disabled selected>Select Result</option>
												<option value="Laptop">Laptop</option>
												<option value="Mobile Device">Mobile Device</option>
												<option value="Desktop">Desktop</option>
												<option value="Others">Others</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>If others, enter request name</label>
											<input type="text" class="form-control" name="others">
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Request Type</label>
											<select class="form-control custom-select2" name="request_type">
												<option disabled selected>Select Result</option>
												<option value="Replacement">Replacement</option>
												<option value="Additional PC">Additional PC</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										<label>Software Components</label>
										<select class="form-control custom-select2" multiple="multiple" name="soft_comp[]">
												<option value="Word">Word (Text Editor)</option>
												<option value="Excel">Excel (Calculations)</option>
												<option value="Access">Access (Databases)</option>
												<option value="Powerpoint">Office Laptop (Presentations)</option>
												<option value="Publisher">Publisher (Publications Editor)</option>
												<option value="Visio">Visio (Flowcharts)</option>
												<option value="Project">Project (Project Management)</option>
												<optgroup label="If none above, same will be available as OpenOffice">
											  <option value="DeskWin Client">DeskWin Client (Mine Planning/Geology)</option>
												<option value="Mcguan">McGuan (Maintenance Planning (obsolete))</option>
												<option value="NAV">NAV (Navision Client)</option>
												<option value="TAS/PMS">TAS/PMS (Attendance/HR Management)</option>
												<option value="Surpac">Surpac  (Mine Planning)</option>
												<option value="AZ">Leica Geooffice (Survey Software)</option>
											</optgroup>
											<optgroup label="Online Access, requires signed AOU Policy">
												<option value="Email">Email (Adds Outlook standard Client)</option>
												<option value="Web-Browsing">Web-Browsing  (Adds Browsing</option>
											</optgroup>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Machine's INV-Number</label>
											<input type="text" class="form-control" name="inv_number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Budget Machine Cost</label>
											<input type="text" class="form-control" name="budget_cost">
										</div>
									</div>
								</div>

								<div class="form-group">
								<label>Includes:</label>
								<textarea disabled="disabled" class="form-control" name="comp_inc">
								 Network connectivity shared value
								 Maintenance shared value (power)
								 Server components
								</textarea>
							    </div>
							</section>
							<div class="form-group">
								<button type="submit" class="btn btn-primary" name="btn-request">Make Request</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
			<?php include("includes/footer.php"); ?>
		</div>
	</div>
	<?php include("includes/footer-links.php");?>

<?php } ?>