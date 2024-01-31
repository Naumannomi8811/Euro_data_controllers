<?php																				
	$query=mysqli_query($connect,"SELECT * FROM `clients` WHERE `client_id`='$client_id'");										
	$crow = mysqli_fetch_array($query);										
	?>
<div class="page-wrapper">
        <div class="page-header">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-auto">
				  <?php
					if(empty($crow['profile_pic'])){
					?>
					<img src="media/avatars/avatar.png" alt="image" style="border-radius: 8px; width: 150px;"/>		
					<?php
					}else{
						?>
					<img src="media/client-img/<?php echo $crow['profile_pic'];  ?>" alt="image" style="border-radius: 8px; width: 150px;"/>	
					<?php
					}
				  ?>
              </div>
              <div class="col">
                <h1 class="fw-bold">
					<?php echo $crow['client_name']; ?> 
				</h1>
                <div class="my-2">
                </div>
                <div class="list-inline list-inline-dots text-secondary">
                  <div class="list-inline-item">
                    <!-- Download SVG icon from http://tabler-icons.io/i/map -->
                    <i class="ti ti-map"></i>
                    <?php echo $crow['client_address']; ?>
                  </div>
                  <div class="list-inline-item">
                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                    <i class="ti ti-mail"></i>
                    <a href="#" class="text-reset">
						<?php echo $crow['client_email']; ?>
					</a>
                  </div>
                </div>
              </div>
              <div class="col-auto ms-auto">
                <div class="btn-list">
                  <button style="background-color: #0054A6;" data-bs-toggle="modal" data-bs-target="#modalAddguard" class="btn text-white align-text-top text-right">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Add New Client
                    </button>
                  <!-- Modal -->
                  <div class="modal modal-blur fade" id="modalAddguard" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">
                          	Add New Client
						  </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
						<form action="client-process.php" method="post" enctype="multipart/form-data">
                       		<div class="modal-body">
                          <div class="mb-3">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="cl_name" placeholder="Enter Client name">
                          </div>
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group input-group-flat">
                                  <input type="email" class="form-control " placeholder="Enter Client Email" name="cl_email">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="*******" required name="cl_password"  minlength="6" />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Phone Number</label>
                                  <input type="number" class="form-control" placeholder="+xxxx xxxxxxx" required name="cl_phone"/>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Other Details</label>
                                  <textarea class="form-control" id="exampleTextarea" rows="3" name="cl_details"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">Address / Emergency Details</label>
                                  <textarea class="form-control" id="exampleTextarea" rows="3" name="cl_address"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">GST Number</label>
                                  <input type="number"  class="form-control" placeholder="GST0000" required name="gst"  />
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="mb-3">
                                  <label class="form-label">PAN Number:</label>
                                  <input type="text"  class="form-control" placeholder="PAN000000" required name="cl_pan"  />
                                </div>
                              </div>
                            </div>
                            
                              <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                  Cancel
                                </a>
								  <button style="background-color: #0054A6;" class="btn text-white ms-auto">Add Client</button>
                              </div>
                    </div>
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
                        <a href="#tabs-profile" class="nav-link active" data-bs-toggle="tab">Profile Overview</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-setting" class="nav-link" data-bs-toggle="tab">Settings</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-address-proof" class="nav-link" data-bs-toggle="tab">
                          Address Proof
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!-- ***************End Header******************* -->