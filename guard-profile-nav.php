<?php
include('config.php');															
$query=mysqli_query($connect,"SELECT * FROM `guards` WHERE `guard_id`='$guard_id'");										
$grow = mysqli_fetch_array($query);	
?>
<div class="page-wrapper">
	<div class="page-header">
		
		
	  <div class="container">
		<div class="row align-items-center">
		  <div class="col-auto">
			<?php
				if(empty($grow['dp'])){
				?>
				<img src="media/avatars/avatar.png" alt="image" style="border-radius: 8px; width: 150px;"/>		
				<?php
				}else{
					?>
				<img src="media/guard-img/<?php echo $grow['dp']  ?>" alt="image" style="border-radius: 8px; width: 150px;"/>	
				<?php
				}
			?>
		  </div>
		  <div class="col">
			<h1 class="fw-bold">
			  <?php echo $grow['guard_name']; ?>
			 </h1>
			<div class="my-2">
			</div>
			<div class="list-inline list-inline-dots text-secondary">
			  <div class="list-inline-item">
				<!-- Download SVG icon from http://tabler-icons.io/i/map -->
				<i class="ti ti-gender-intergender"></i>
				<?php echo $grow['guard_gender']; ?>
			  </div>
			  <div class="list-inline-item">
				<!-- Download SVG icon from http://tabler-icons.io/i/mail -->
				<i class="ti ti-mail"></i>
				<a href="#" class="text-reset">
					<?php echo $grow['guard_email']; ?>
			    </a>
			  </div>
			  <div class="list-inline-item">
				<!-- Download SVG icon from http://tabler-icons.io/i/cake -->
				<i class="ti ti-map"></i>
				<?php echo $grow['guard_address']; ?>
			  </div>
			</div>
		  </div>
		  <div class="col-auto ms-auto">
			<div class="btn-list">
<!--			  <a href="#" class="btn btn-icon" aria-label="Button">-->
				<!-- Download SVG icon from http://tabler-icons.io/i/dots -->
<!--
				<i class="ti ti-dots"></i>
			  </a>
-->
<!--			  <a href="#" class="btn btn-icon" aria-label="Button">-->
				<!-- Download SVG icon from http://tabler-icons.io/i/message -->
<!--				<i class="ti ti-message"></i>-->
<!--			  </a>-->
			  <button style="background-color: #0054A6;" data-bs-toggle="modal" data-bs-target="#modalAddemployee" class="btn text-white align-text-top text-right">
					<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
					  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
					  <path d="M12 5l0 14" />
					  <path d="M5 12l14 0" />
					</svg>
					Add New Guard
				  </button>
                  <!-- Modal -->
                  <div class="modal modal-blur fade" id="modalAddemployee" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">

                          Add New Guard</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="add_guard_process.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Guard Name:</label>
                              <input type="text" class="form-control" name="guard_name" placeholder="Enter Guard name">
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <div class="mb-3">
                                  <label class="form-label">Email:</label>
                                  <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Password:</label>
                                  <input type="password" class="form-control" placeholder="******" required name="password"  minlength="6" />
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Contact Number:</label>
                                  <input type="number" class="form-control" name="phone" placeholder="+ xxxx xxxxxxx">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Address / Emergency Details:</label>
                                  <textarea class="form-control" rows="3" name="address"></textarea>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Guard Gender:</label>
                                  <select class="form-select" required name="gender">
                                    <option  selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Trans Gender">Trans Gender</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Per Hour Sallery</label>
                                  <input type="number"  class="form-control" placeholder="0000" required name="phs"/>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">National Insurance Number</label>
                                  <input type="text"  class="form-control" placeholder="National Insurance Number" required name="ni_num"  />
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">SIA Number</label>
                                  <input type="text"  class="form-control" placeholder="SIA Number" required name="sia"  />
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Guard Category</label>
                                  <select class="form-select" required name="ctg_id">
                                    <option value="" selected>Select Category</option>
                                      <option value="1">Event Security</option>
                                      <option value="2">Hotel Security</option>
                                      <option value="3">Bank Security</option>
                                      <option value="4">Shop Security</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                              Cancel
                            </a>
                            <button class="btn text-white ms-auto" style="background-color: #0054A6;" name="submit">
                              Add Member
                            </button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Page body -->
	<div class="page-body">
	  <div class="container-xl">
		<div class="row g-3">
		  <div class="col">
			<div class="col-md-12">
			<div class="card">
			  <!-- ***************Header******************* -->
			 <div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
				  <li class="nav-item">
					<a href="guard-profile.php?guard_id=<?php echo $guard_id; ?>" class="nav-link active">
						Profile
					</a>
				  </li>
				  <li class="nav-item">
					<a href="guard-setting.php?guard_id=<?php echo $guard_id; ?>" class="nav-link text-active-primary ms-0 me-10 ">
						Setting
					</a>
				  </li>
				  <li class="nav-item">
					<a href="security-licence.php?guard_id=<?php echo $guard_id; ?>" class="nav-link">
						Security Licence
					</a>
				  </li>
				  <li class="nav-item">
					<a href="address-proof.php?guard_id=<?php echo $guard_id; ?>" class="nav-link">
						Address Proof
					</a>
				  </li>
				  <li class="nav-item">
					<a href="visa-information.php?guard_id=<?php echo $guard_id; ?>" class="nav-link">
						Visa Information
					</a>
				  </li>
				</ul>
			  </div>
			  <!-- ***************End Header******************* -->