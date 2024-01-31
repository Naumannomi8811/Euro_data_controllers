<?php
include('header.php');
$guard_id = $_GET['guard_id'];
include('guard-profile-nav.php');

?>
	   <div class="card-body">
		<div class="tab-content">
		  <div class="tab-pane fade active show" >
			<div class="col-md-12">
			  <h3 class="align-items-center">Profile Overview</h3>
			  <hr>
			  <div class="card-body">
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Full Name:</label>
				<div class="col-9">
				  <strong><?php echo $grow['guard_name']; ?></strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Email Address:</label>
				<div class="col-9">
				  <strong><?php echo $grow['guard_email']; ?></strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Contact Phone:</label>
				<div class="col">
				  <strong><?php echo $grow['guard_phone']; ?></strong>
				  <span class="badge badge-success">Verified</span>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Address:</label>
				<div class="col">
				  <strong><?php echo $grow['guard_address']; ?></strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Gender:</label>
				<div class="col">
				  <strong><?php echo $grow['guard_gender']; ?></strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Per Hour Salary:</label>
				<div class="col">
				  <strong><?php echo $grow['per_hour_salary']; ?></strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">Guard Category:</label>
				<div class="col">
				  <strong>
				   <?php
						$ctg_id = $grow['guard_ctg'];
						$cquery=mysqli_query($connect,"SELECT * FROM `guard_category` WHERE `ctg_id`='$ctg_id'");
						$crow = mysqli_fetch_array($cquery);
						echo $crow['guard_category'];
					?>
				  </strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">National Insurance Number:</label>
				<div class="col">
				  <strong><?php echo $grow['ni_num']; ?></strong>
				</div>
			  </div>
			  <div class="mb-3 row align-items-center">
				<label class="col-3 col-form-label text-muted">SIA Number:</label>
				<div class="col">
				  <strong><?php echo $grow['sia_num'] ?></strong>
				</div>
			  </div>
		  </div>
		</div>
	  </div>
		  <div class="tab-pane fade" id="tabs-activity-8">
			<h4>Activity tab</h4>
			<div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
		  </div>
		</div>
	  </div>
	</div>
	</div>
<?php
include('footer.php');
?>