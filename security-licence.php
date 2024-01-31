<?php
include('header.php');
$guard_id = $_GET['guard_id'];
include('guard-profile-nav.php');

?>
	   <div class="card-body">
		<div class="tab-content">
		  <div class="tab-pane fade active show" id="tabs-profile">
			<div class="col-md-12">
			  <h3 class="align-items-center">Security Licence</h3>
			  <hr>
			  <div class="card-body">
				<form action="security-licence-process.php" enctype="multipart/form-data" method="post">
					<div class="mb-3 row">
						<div class="col">
							<div class="mb-3 row">
								  <input type="hidden" name="guard_id" class="form-control form-control-lg form-control-solid" value="<?php echo $guard_id;  ?>" />
								<label class="col-3 col-form-label">Name on Licence:</label>
								  <?php
									$sl_id = $grow['sl_id'];
									$query=mysqli_query($connect,"SELECT * FROM `security_licence` WHERE `sl_id` = '$sl_id'");										
									$srow = mysqli_fetch_array($query);	
								 ?>
								<div class="col-9">
								  <input type="text" class="form-control" name="sl_name" value="<?php echo $srow['name'];  ?>"/>
								</div>
							  </div>
							<div class="mb-3 row">
								<label class="col-3 col-form-label ">Licence Number:</label>
								<div class="col-9">
								  <input type="number" class="form-control" name="sl_num"  value="<?php echo $srow['sl_num'];  ?>">

								</div>
							  </div>
							<div class="mb-3 row">
								<label class="col-3 col-form-label">Expiry:</label>
								<div class="col">
								  <input type="date" class="form-control" name="sl_exp"  value="<?php echo $srow['expiry_date'];  ?>">
								</div>
							  </div>
							<div class="mb-3 row">
								<img src="media/security-licence/<?php echo $srow['sl_img'];  ?>"  style="border-radius: 12px; width: 230px; margin-left: 25%;">
							  </div>
							<div class="mb-3 row">
								<label class="col-3 col-form-label ">Licence Image:</label>
								<div class="col">
								  <input type="file" class="form-control" name="sl_img" />

								</div>
							  </div>
							<div class="mb-3 row">
								<label class="col-3 col-form-label ">Security Type:</label>
								<div class="col">
								 <select class="form-select" name="st_id">
									<option selected>
										<?php
										$st_id = $grow['st_id'];
										$stmt = $connect->prepare("SELECT * FROM `security_type` WHERE `st_id` = ?");
										$stmt->bind_param("i", $st_id);
										$stmt->execute();
										$result = $stmt->get_result();

										if ($result->num_rows > 0) {
											$strow = $result->fetch_assoc();
											echo $strow['security_type'];
										} else {
											echo "No security type found for the given ID.";
										}
										$stmt->close();
										?>
									</option>
									<?php
									$stquery = mysqli_query($connect, "SELECT * FROM `security_type`");
									while ($strow = mysqli_fetch_array($stquery)) {
									?>
										<option value="<?php echo $strow['st_id'] ?>">
											<?php echo $strow['security_type'] ?>
										</option>
									<?php
									}
									?>
								</select>
								</div>
							  </div>
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