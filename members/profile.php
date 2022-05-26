<?php 


   include("includes/header.php");
   include("record-script.php"); 
 

	if(!isset($_SESSION['userName']))
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
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						          <?php 

													$fullname = $_SESSION['userName'];

													$call = "SELECT * FROM users_tbl WHERE fullname = '$fullname'";
													$run  = mysqli_query($db, $call);
													$row  = mysqli_fetch_array($run);
													$fullname = $row['fullname'];
													$mine_no  = $row['mine_no'];
													$dept_id  = $row['dept_id'];
													$email    = $row['email'];
													$user_id  = $row['user_id']; 


													$get_dept  = "SELECT * FROM tbl_dept WHERE dept_id = '$dept_id'";
													$run_dept  = mysqli_query($db, $get_dept);
													$row_dept  = mysqli_fetch_array($run_dept);
													$dept_name = $row_dept['dept_name'];


													
											?>
						<div class="pd-20 card-box height-100-p">
							
							<h5 class="text-center h5 mb-0"><?php echo $fullname; ?></h5>
							<p class="text-center text-muted font-14"></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Personal Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $email; ?>
									</li>
									<li>
										<span>Mine Number:</span>
										<?php echo $mine_no; ?>
									</li>
									<li>
										<span>Department</span>
										 <?php echo $dept_name; ?>
									</li>
								
								</ul>
							</div>
							
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">All Requests</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Update Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Change Password</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<?php 

													$fullname = $_SESSION['userName'];

													$call_user = "SELECT * FROM request_tbl WHERE fullname = '$fullname'";
													$run_user  = mysqli_query($db, $call_user);

													while($row = mysqli_fetch_array($run_user))
													{	
														$request_id  = $row['request_id'];
														$mine_no     = $row['mine_number'];
														$req_type    = $row['request_type'];
														$req_name    = $row['request_name'];
														$req_date    = $row['request_date'];
														$req_status  = $row['request_status'];
														$reqq_date   = date("M d, Y",strtotime($req_date));

											 ?>
											<div class="pd-20">
												<div class="profile-timeline">
													<div class="profile-timeline-list">
														<ul>
															<li>
																<div class="date"><?php echo $reqq_date; ?></div>
																<div class="task-name">
														       <?php 
																  if($req_status == "Pending")
																  {
																  		echo "<span class='badge badge-danger'>Pending Request</span>";
																  }
																  else 
																  {
																   	echo "<span class='badge badge-success'>Approved Request</span>";	 
																  } 

																 ?>

																</div>
																<p><?php echo $req_name .", ". $req_type; ?></p>
															</li>
														</ul>
													</div>
												
												</div>
											</div>
										<?php } ?>
										</div>
										<!-- Timeline Tab End -->

										<!-- Tasks Tab start -->
										<div class="tab-pane fade" id="tasks" role="tabpanel">
											<?php 

													$fullname = $_SESSION['userName'];

													$call = "SELECT * FROM users_tbl WHERE fullname = '$fullname'";
													$run  = mysqli_query($db, $call);
													$row  = mysqli_fetch_array($run);
													$fullname = $row['fullname'];
													$mine_no  = $row['mine_no'];
													$dept_id  = $row['dept_id'];
													$email    = $row['email'];
													$user_id  = $row['user_id']; 


													$get_dept  = "SELECT * FROM tbl_dept WHERE dept_id = '$dept_id'";
													$run_dept  = mysqli_query($db, $get_dept);
													$row_dept  = mysqli_fetch_array($run_dept);
													$dept_name = $row_dept['dept_name'];


													
											?>
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">				
												<form method="POST" action="update-profile.php">
													<div class="form-group">
														<label>Full Name</label>
														<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
														<input type="text"   name="fullname" value="<?php echo $fullname; ?>" class="form-control">
													</div>

													<div class="form-group">
														<label>Mine Number</label>
														<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
														<input type="text"  name="mine_no" value="<?php echo $mine_no; ?>" class="form-control">
													</div>

													<div class="form-group">
														<label>Email</label>
														<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
														<input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
													</div>

													<div class="form-group">
													<label>Department</label>
													<input type="hidden" name="user_id" value="">
													<select class="form-control" name="dept_name">
														<option value="<?php echo $dept_id;  ?>"><?php echo $dept_name; ?></option>
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
													<button type="submit" class="btn btn-primary" name="btn-update">Update Profile</button>
												</div>


												</form>						
												</div>
											</div>
										
										</div>
										<!-- Tasks Tab End -->


										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
											<div class="pd-20 profile-task-wrap">
												<div class="container pd-0">				
												<form method="POST" action="update-password.php">

													<div class="form-group">
														<label>New Password</label>
														<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
														<input type="text"   name="new_pass" placeholder="********************" class="form-control">
													</div>

													<div class="form-group">
														<label>Confirm New Password</label>
														<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
														<input type="text"  name="con_pass" placeholder="*******************" class="form-control">
													</div>

													

												<div class="form-group">
													<button type="submit" class="btn btn-primary" name="btn-pword">Update Password</button>
												</div>


												</form>						
												</div>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				© 2022 Ghana Manganese Company Limited - All rights reserved <!--<a href="https://www.linkedin.com/in/francis-tawiah-0ba441168/" target="_blank">Designed by CodeitSoft Technology</a>-->
       </div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>
<?php } ?>