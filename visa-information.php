<?php
include('header.php');
$guard_id = $_GET['guard_id'];
include('guard-profile-nav.php');

?>
	   <div class="card-body">
		<div class="tab-content">
		  <div class="tab-pane fade active show" id="tabs-profile">
			<div class="col-md-12">
			  <h3 class="align-items-center">Visa Information</h3>
			  <hr>
			  <div class="card-body">
				<form action="visa-information-process.php" method="post" enctype="multipart/form-data">
				  <div class="mb-3 row">
					<input type="hidden" name="guard_id" class="form-control form-control-lg form-control-solid" value="<?php echo $guard_id; ?>" />
				  </div>
				  <div class="mb-3 row">
					<label class="col-3 col-form-label">Visa Type:</label>
					<div class="col">
					  <select class="form-select" name="visa_type">
						  <?php	
							$query="SELECT * FROM `guard_visa` WHERE `guard_id`='$guard_id'";	
							$res=$connect->query($query);	
							$vrow = mysqli_fetch_array($res);	
						?>
						<option><?php echo $vrow['visa_type'];?></option>
						  <option>Open Visa</option>
						  <option>Work Permit</option>
					  </select>
					</div>
				  </div>
				  <div class="mb-3 row">
					<label class="col-3 col-form-label">Expiry Date:</label>
					<div class="col-9">
					  <input type="date" class="form-control" name="expiry_date" value="<?php echo $vrow['visa_expiry'];?>">
					</div>
				  </div>
				  <div class="mb-3 row">
					<div class="col-9">
					  <div class="col-auto">
						<span class="avatar avatar-lg rounded" style="background-image: url(static/avatars/<?php echo $vrow['visa_img'];?>); border-radius: 8px; width: 35%; background-size: 100% 100%; margin-left: 33%; height: 150px;"></span>
					  </div>
					</div>
				  </div>
				  <div class="mb-3 row">
					<label class="col-3 col-form-label">Proof Image:</label>
					<div class="col-9">
					  <input type="file" class="form-control" name="visa_img">
					</div>
				  </div>
				  <div class="text-end">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
<?php
include('footer.php');
?>