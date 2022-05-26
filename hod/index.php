<?php 


   include("includes/header.php");
   include("record-script.php"); 
 

	if(!isset($_SESSION['userHod']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {

?>
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="../gmc-images/miner.jpg" width="200" height="150" alt="GMC Miner">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?php echo $fullname; ?>!</div>
						</h4>
						<p class="font-18 max-width-600">Mine No: <?php echo $mine_no; ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				
				   <div class="col-md-4 mb-30">
						<div class="card text-white card-box">
							<div class="card-header bg-primary">Total Requests</div>
							<div class="card-body">
								<h5 style="font-size: 30px; text-align: center;" class="card-title text-white text-primary">
									<?php echo allRequest(); ?>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-30">
						<div class="card text-white card-box">
							<div class="card-header bg-primary">Approved Requests</div>
							<div class="card-body">
								<h5 style="font-size: 30px; text-align: center;" class="card-title text-white text-primary">
									<?php echo approvedRequest(); ?>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-30">
						<div class="card text-white card-box">
							<div class="card-header bg-primary">Pending Requests</div>
							<div class="card-body">
								<h5 style="font-size: 30px; text-align: center;" class="card-title text-white text-primary">
								<?php echo pendingRequest(); ?>
								</h5>
							</div>
						</div>
					</div>
			</div>
			
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">All Requests</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">No.</th>
							<th>Request Name</th>
							<th>Request Type</th>
							<th>Date Requested</th>
							<th>Request Status</th>
							<th>Request Delivery</th>
						</tr>
					</thead>
					<tbody>
							<?php 

								$fullname = $_SESSION['userHod'];

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
									$req_deliv   = $row['request_delivered'];
									$reqq_date   = date("M d, Y",strtotime($req_date));

							  ?>
								<tr>
									<td class="table-plus"><?php echo $mine_no; ?></td>
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
									 <?php 
									  if($req_deliv == "Delivered")
									  {
									  		echo "<span class='badge badge-success'>Delivered</span>";
									  }
									  else 
									  {
									   	echo "<span class='badge badge-danger'>Not Delivered</span>";	 
									  } 

									 ?>
									</td>
						</tr>

					<?php } ?>
					</tbody>
				</table>
			</div>

			<?php include("includes/footer.php"); ?>
		</div>
	</div>
	<?php include("includes/footer-links.php"); ?>
	<?php } ?>