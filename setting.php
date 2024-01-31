<?php
include('link.php');
?>
<div class="tab-pane fade" id="tabs-setting">
	<div class="col-md-12">
	  <h3 class="">Setting</h3>
	  <hr>
		<div class="card-body">
		  <form action="guard-setting-process.php" enctype="multipart/form-data" method="post">
			<div class="mb-3 row">
			  <label class="col-3 col-form-label ">Avatar</label>
			  <div class="col-9">
			   <div class="col-auto">
					<img src="media/avatars/<?php echo $grow['dp']; ?>" alt="image" /> 
			   </div>
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label required">Edit Avatar:</label>
			  <div class="col-9">
				<input type="file" class="form-control" aria-describedby="emailHelp" name="g_id">
			  </div>
			</div>
			<div class="mb-3 row">
				<input type="hidden" class="form-control" aria-describedby="emailHelp" value="<?php echo $grow['guard_id']; ?>"  name="g_id">
			  <label class="col-3 col-form-label required">Full Name:</label>
			  <div class="col-9">
				<input type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $grow['guard_name']; ?>" name="g_name">
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label required">Email:</label>
			  <div class="col-9">
				<input type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $grow['guard_email']; ?>" name="g_email">
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label required">Contact Phone:</label>
			  <div class="col">
				<input type="text" class="form-control" value="<?php echo $grow['guard_phone']; ?>" name="g_phone">
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label ">Address:</label>
			  <div class="col">
				<input type="text" class="form-control" value="<?php echo $grow['guard_address']; ?>" name="g_address">

			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label ">Per Hour Salary:</label>
			  <div class="col">
				<input type="number" class="form-control" value="<?php echo $grow['per_hour_salary']; ?>" name="phs">

			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label">Gender</label>
			  <div class="col">
				<select class="form-select" name="gender">
				  <option>
					  <?php echo $grow['guard_gender']; ?>
					</option>								
				  <option value="Male">
					  Male
					</option>
				  <option value="Female">
					  Female
					</option>
				  <option value="Trans Gender">
					  Trans Gender
				  </option>
				</select>
			  </div>
			</div>
			<div class="mb-3 row">
				<?php	
					$query="SELECT  * FROM `guards` WHERE `guard_id`='$guard_id'";	
					$res=$connect->query($query);	
					$prow = mysqli_fetch_array($res);	
				?>													
					<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
						<div class="card-title m-0">
						</div>
					</div>
					<div id="kt_account_settings_profile_details" class="collapse show">	
					<?php		
					if(empty($prow['id_card'])){		
					?>					

					<?php			
					}else{															
					?>									
					<img src="media/guard-img/id-proof/<?php echo $prow['id_card']; ?>" style="width: 60%; margin-left: 20%; margin-bottom: 50px;">
					<?php		
					}					
				?>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label ">ID Card / Passport:</label>
			  <div class="col">
				<input type="file" class="form-control" name="id_card">
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label">Guard Category:</label>
			  <div class="col">
				<select class="form-select" name="g_ctg">
				  	<?php
						$ctg_id = $grow['guard_ctg'];
						$ctquery = mysqli_query($connect,"SELECT * FROM `guard_category` WHERE `ctg_id`='$ctg_id'");	
						$ctrow = mysqli_fetch_array($ctquery);
						?>				
						<option value="<?php echo $ctrow['ctg_id']; ?>" selected>
							<b>
								<?php echo $ctrow['guard_category']; ?>
							</b>
						</option>
						<?php
						$cquery=mysqli_query($connect,"SELECT * FROM `guard_category`");
						while($crow = mysqli_fetch_array($cquery)){
						?>	
						<option value="<?php echo $crow['ctg_id']; ?>">
							<?php echo $crow['guard_category']; ?>
						</option>
						<?php
						}
						?>			
				</select>
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label ">National Insurance Number:</label>
			  <div class="col">
				<input type="text" class="form-control" value="<?php echo $grow['ni_num']; ?>" name="nin">
			  </div>
			</div>
			<div class="mb-3 row">
			  <label class="col-3 col-form-label ">SIA Number:</label>
			  <div class="col">
				<input type="text" class="form-control" value="<?php echo $grow['sia_num']; ?>" name="sia">
			  </div>
			</div>
			<div class=" text-end pt-3">
			  <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
			</div>
		  </form>
	  </div>
	  <div class="col-12">
		<form>
		<h3 class="">Change Password</h3>
		<div class="mb-3 row">
		  <label class="col-3 col-form-label required">Email:</label>
		  <div class="col-9">
			<input type="text" class="form-control">
		  </div>
		</div>
		<div class="mb-3 row">
		  <label class="col-3 col-form-label required">Password:</label>
		  <div class="col-9">
			<input type="password" class="form-control">
		  </div>
		</div>
		<div class="text-end pt-3">
		  <a href="#" class="btn btn-primary">
			Change Password
		  </a>
		</div>
		</form>
	  </div>
	</div>
</div>

