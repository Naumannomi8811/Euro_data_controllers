<?php
include('header.php');
include('config.php');

$site_id = $_GET['site_id'];
include('location-profile-nav.php');
?>


                  <div class="card-body">
                    <div class="tab-content">
                      <!-- ***************Profile******************* -->
                      <div class="tab-pane fade active show" id="tabs-profile">
                        <div class="col-md-12">
                          <h3 class="align-items-center">Location Overview</h3>
                          <hr>
                          <div class="card-body">
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Site Title:</label>
                                <div class="col-9">
                                  <strong><?php echo $srow['site_title']; ?> </strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Client Name:</label>
                                <div class="col-9">
                                  <strong>
									<?php 
									$client_id = $srow['client_id'];	
									$cquery=mysqli_query($connect,"SELECT * FROM `clients` WHERE client_id='$client_id'");						
									$crow = mysqli_fetch_array($cquery);	
									echo $crow['client_name'];
									?> 
								  </strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Street Address:</label>
                                <div class="col">
                                  <strong><?php echo $srow['site_address']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">City:</label>
                                <div class="col">
                                  <strong><?php echo $srow['site_city']; ?></strong>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <!-- ***************End Profile******************* -->
                      <!-- ***************Setting******************* -->
                      <div class="tab-pane fade" id="tabs-setting">
                        <div class="col-md-12">
                          <h3 class="">Location Setting</h3>
                          <hr>
                            <div class="card-body">
                              <form action="edit-site-process.php" enctype="multipart/form-data" method="post">
                                <div class="mb-3 row">
									<input type="hidden" class="form-control" aria-describedby="emailHelp" value="<?php echo $srow['site_id']; ?>" name="site_id" >
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">
									  Site Title:
									</label>
                                  <div class="col-9">
                                    <input type="text" class="form-control" value="<?php echo $srow['site_title'];?>" name="site_title" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Client Name:</label>
                                  <div class="col-9">
									<select class="form-control" name="client_id" required> 							  							 
								<option value="<?php echo $srow['client_id']; ?>"> 
									<?php 
									$client_id=$srow['client_id'];						 							
									$cquery=mysqli_query($connect,"SELECT * FROM `clients` WHERE client_id='$client_id'");						
									$crow = mysqli_fetch_array($cquery)	;								 
									echo $crow['client_name'];								  								  
									?> 
								</option>							  
								<?php								
								$query=mysqli_query($connect,"SELECT * FROM `clients`");								
								while($crow = mysqli_fetch_array($query)){							
								?>								  							                                
								<option value="<?php echo $crow['client_id']; ?>">
									<?php echo $crow['client_name']; ?> 
								</option>							  
								<?php								
								}									 
								?>                                                  						  
							</select> 
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Street Address:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $srow['site_address']; ?>" name="address" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">City:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $srow['site_city']; ?>" name="city">
                                   
                                  </div>
									
                                <div class=" text-end pt-3"> 
                                  <button type="submit" name="edit-site" class="btn btn-primary">
									  Update Site
							      </button>
                                </div>
                                </div>
                              </form>
                          </div>
                        </div>
                      </div>
                      <!-- ***************End Setting******************* -->
                    </div>
                  </div>
                </div>
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