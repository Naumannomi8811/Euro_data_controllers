<?php
include('header.php');
$guard_id = $_GET['guard_id'];
include('guard-profile-nav.php');

?>
	   <div class="card-body">
		<div class="tab-content">
		  <div class="tab-pane fade active show" id="tabs-profile">
			<div class="col-md-12">
			  <h3 class="align-items-center">Address Proof</h3>
			  <hr>
			  <div class="card-body">
				<form action="g-proof-process.php" enctype="multipart/form-data" method="post">
				  <div class="mb-3 row">
					<input type="hidden" name="guard_id" class="form-control form-control-lg form-control-solid" value="<?php echo $guard_id; ?>" />
				  </div>
				  <div class="mb-3 row">
					<label class="col-3 col-form-label">Proof Type:</label>
					<div class="col">
					  <select class="form-select" name="proof_type">
						  <?php	
							$query="SELECT  * FROM `guard_address_proof` WHERE `guard_id`='$guard_id'";	
							$res=$connect->query($query);	
							$arow = mysqli_fetch_array($res);	
						?>
						  <option selected><?php echo $arow['proof_type'];?></option>
						  <?php
								$cquery=mysqli_query($connect,"SELECT  * FROM `guard_address_proof`");
								while($aprow = mysqli_fetch_array($cquery)){
								?>	
								<option value="<?php echo $aprow['proof_type']; ?>">
									<?php echo $aprow['proof_type']; ?>
								</option>
								<?php
								}
								?>
					  </select>
					</div>
				  </div>
				  <div class="mb-3 row">
					<div class="col-9">
					  <div class="col-auto">
						<span class="avatar avatar-lg rounded" style="background-image: url(static/avatars/<?php echo $arow['proof_img'];?>); border-radius: 8px; width: 35%; background-size: 100% 100%; margin-left: 33%; height: 150px;"></span>
					  </div>
					</div>
				  </div>
				  <div class="mb-3 row">
					<label class="col-3 col-form-label">Proof Image:</label>
					<div class="col-9">
					  <input type="file" class="form-control" name="proof_img">
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