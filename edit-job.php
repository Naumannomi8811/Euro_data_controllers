<?php
include('header.php');
include('config.php');

$job_id = $_GET['job_id'];
include('job-profile-nav.php');
?>


                  <div class="card-body">
                    <div class="tab-content">
                      <!-- ***************Profile******************* -->
                      <div class="tab-pane fade active show" id="tabs-profile">
                        <div class="col-md-12">
                          <h3 class="align-items-center">Job Overview</h3>
                          <hr>
                          <div class="card-body">
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Job Title:</label>
                                <div class="col-9">
                                  <strong>
									  <?php echo $jrow['job_title']; ?> 
									</strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Site Name:</label>
                                <div class="col-9">
                                  <strong>
									<?php 
										$site_id = $jrow['site_id'];
										$cquery = mysqli_query($connect,"SELECT * FROM `sites` WHERE site_id='$site_id'");						
										$crow = mysqli_fetch_array($cquery)	;
										echo $crow['site_title'];	  
									?> 
								  </strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Start Time:</label>
                                <div class="col">
                                  <strong><?php echo $jrow['start_time']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">End Time:</label>
                                <div class="col">
                                  <strong><?php echo $jrow['end_time']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Break Time:</label>
                                <div class="col">
                                  <strong><?php echo $jrow['break_time']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Job Date:</label>
                                <div class="col">
                                  <strong><?php echo $jrow['job_date']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Client Cost:</label>
                                <div class="col">
                                  <strong><?php echo $jrow['client_cost']; ?></strong>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <!-- ***************End Profile******************* -->
                      <!-- ***************Setting******************* -->
                      <div class="tab-pane fade" id="tabs-setting">
                        <div class="col-md-12">
                          <h3 class="">Job Setting</h3>
                          <hr>
                            <div class="card-body">
                              <form action="edit-job-process.php" enctype="multipart/form-data" method="post">
                                <div class="mb-3 row">
									<input type="hidden" class="form-control" aria-describedby="emailHelp" value="<?php echo $jrow['job_id']; ?>" name="job_id" >
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">
									  Job Title:
									</label>
                                  <div class="col-9">
                                    <input type="text" class="form-control" value="<?php echo $jrow['job_title'];?>" name="job_title" required>
                                  </div>		
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Site Name:</label>
                                  <div class="col-9">
									<select class="form-control" name="site_id" required> 
									<option value="<?php echo $jrow['site_id']; ?>"> 
										<?php 
										$site_id = $jrow['site_id'];	
										$squery = mysqli_query($connect,"SELECT * FROM `sites` WHERE site_id = '$site_id'");						
										$srow = mysqli_fetch_array($squery)	;	
										echo $srow['site_title'];		  
										?> 
									</option>							  
									<?php								
									$query = mysqli_query($connect,"SELECT * FROM `sites`");								
									while($crow = mysqli_fetch_array($query)){							
									?>								  							                                
									<option value="<?php echo $crow['site_id']; ?>">
										<?php echo $crow['site_title']; ?> 
									</option>							  
									<?php								
									}									 
									?>                                                  						  
								</select> 
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Start Time:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $jrow['start_time']; ?>" name="start_time" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">End Time:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $jrow['end_time']; ?>" name="end_time" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Break Time:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $jrow['break_time']; ?>" name="break_time" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Job Date:</label>
                                  <div class="col">
                                    <input type="date" class="form-control" value="<?php echo $jrow['job_date']; ?>" name="job_date" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Client Cost:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $jrow['client_cost']; ?>" name="client_cost">
                                   
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