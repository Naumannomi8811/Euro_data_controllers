<?php
include('header.php');
include('config.php');
?>


      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col-12 d-flex justify-content-between">
                  <h2 class="page-title">
                      Clients Statistics
                  </h2>
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
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-name">Client Name</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Contact</button></th>
                        <th><button class="table-sort" data-sort="sort-type">GST Number</button></th>
                        <th><button class="table-sort text-center" data-sort="sort-score">Actions</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
						<?php	
							$query=mysqli_query($connect,"SELECT * FROM `clients`");
							while($nrow = mysqli_fetch_array($query)){
						?>	
                      <tr>
                        <td class="sort-name">
                          <div class="d-flex py-1 ">
                              <?php
								if(empty($nrow['profile_pic'])){
								
								?>
								
								
								<img src="media/avatars/avatar.png" alt="image" width="80px" style="border-radius: 8px;"/>		
								<?php
								}else{
									?>
								<img src="media/client-img/<?php echo $nrow['profile_pic'];  ?>" alt="image" width="80px" style="border-radius: 8px;"  />	
								<?php
									
									
									
								}
								?>
                              <div class="flex-fill">
                                <div class="font-weight-medium mx-3"><?php echo $nrow['client_name']; ?></div>
                                <div class="text-secondary">
									<a href="#" class="text-reset mx-3">
										<?php echo $nrow['client_address']; ?>
									</a>
								  </div>
                              </div>
                            </div>
                        </td>
                        <td class="sort-city ">
                          <div>
							  <?php echo $nrow['client_phone']; ?>
						  </div>
                          <div class="text-secondary">
							<?php echo $nrow['client_email']; ?>
						  </div>
                        </td>
                        <td class="sort-type"><?php echo $nrow['gst_num']; ?></td>
                        <td class="sort-score">
                          <div class="btn-list flex-nowrap justify-content-center">
                              <a href="client_profile.php?client_id=<?php echo $nrow['client_id'] ?>" class="btn">
                                View
                              </a>
                              <div class="dropdown">
                                <!-- <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"> -->
                              <a href="delete-client.php?client_id=<?php echo $nrow['client_id'] ?>" class="btn">
								  Delete
								  </a>
                                <!-- <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="#">
                                    Action
                                  </a>
                                  <a class="dropdown-item" href="#">
                                    Another action
                                  </a>
                                </div> -->
                              </div>
                            </div>
                        </td>
                      </tr>
						<?php
							}
						?>
                      
                    </tbody>
                  </table>
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