<?php
include('header.php');
include('config.php');
$client_id = $_GET['client_id'];
include('client-profile-nav.php');
?>


                  <div class="card-body">
                    <div class="tab-content">
                      <!-- ***************Profile******************* -->
                      <div class="tab-pane fade active show" id="tabs-profile">
                        <div class="col-md-12">
                          <h3 class="align-items-center">Profile Overview</h3>
                          <hr>
                          <div class="card-body">
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Full Name:</label>
                                <div class="col-9">
                                  <strong><?php echo $crow['client_name']; ?> </strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Email Address:</label>
                                <div class="col-9">
                                  <strong><?php echo $crow['client_email']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Contact Phone:</label>
                                <div class="col">
                                  <strong><?php echo $crow['client_phone']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Address:</label>
                                <div class="col">
                                  <strong><?php echo $crow['client_address']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Other Details:</label>
                                <div class="col">
                                  <strong><?php echo $crow['other_details']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">GST Number:</label>
                                <div class="col">
                                  <strong><?php echo $crow['gst_num']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">PAN Number:</label>
                                <div class="col">
                                  <strong><?php echo  $crow['pan_num']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Postal Code:</label>
                                <div class="col">
                                  <strong><?php echo $crow['post_code']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">VAT:</label>
                                <div class="col">
                                  <strong><?php echo $crow['vat']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center ">
                                <label class="col-3 col-form-label text-muted">Company Name:</label>
                                <div class="col text-bold">
                                  <strong><?php echo $crow['company_name']; ?></strong>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <!-- ***************End Profile******************* -->
                      <!-- ***************Setting******************* -->
                      <div class="tab-pane fade" id="tabs-setting">
                        <div class="col-md-12">
                          <h3 class="">Profile Setting</h3>
                          <hr>
                            <div class="card-body">
                              <form action="client-setting-process.php" enctype="multipart/form-data" method="post">
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Avatar</label>
                                  <div class="col-9">
                                   <div class="col-auto">
                                     <?php
										if(empty($crow['profile_pic'])){
										?>
										<img src="media/avatars/avatar.png" alt="image" />		
										<?php
										}else{
											?>
										<img src="media/client-img/<?php echo $crow['profile_pic'];  ?>" alt="image" style="border-radius: 8px; width: 120px;"/>	
										<?php
										}
									  ?>
                                   </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
									<input type="hidden" class="form-control" aria-describedby="emailHelp" value="<?php echo $crow['client_id']; ?>" name="c_id" >
                                  <label class="col-3 col-form-label required">
									  Change Avatar:
									</label>
                                  <div class="col-9">
                                    <input type="file" class="form-control" aria-describedby="emailHelp" value="<?php echo $crow['client_name'];?>"  name="avatar" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">
									  Full Name:
									</label>
                                  <div class="col-9">
                                    <input type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $crow['client_name'];?>" name="c_name" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Email:</label>
                                  <div class="col-9">
                                    <input type="email" class="form-control" aria-describedby="emailHelp" value="<?php echo $crow['client_email']; ?>" name="c_email" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Contact Phone:</label>
                                  <div class="col">
                                    <input type="number" class="form-control" value="<?php echo $crow['client_phone']; ?>" name="c_phone" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Address:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $crow['client_address']; ?>" name="c_address">
                                   
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Other Details:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $crow['other_details']; ?>" name="others">
                                   
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">GST Number:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $crow['gst_num']; ?>" name="gst" required>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">PAN Number:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $crow['pan_num'] ?>" name="pan">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Postal Code:</label>
                                  <div class="col">
                                    <input type="number" class="form-control" value="<?php echo $crow['post_code'] ?>" name="pc">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">VAT:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $crow['vat'] ?>" name="vat">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Company Name:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $crow['company_name'] ?>" name="cn">
                                  </div>
                                </div>
                                <div class=" text-end pt-3"> 
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                              </form>
                          </div>
                          <div class="col-12">
                            <form action="change-client-pass.php" enctype="multipart/form-data" method="post">
                            <h3 class="">Change Password</h3>
                            <div class="mb-3 row">
								<input type="hidden" class="form-control" value="<?php echo $crow['client_id']; ?>" name="client_id">
                              <label class="col-3 col-form-label required">
								  Old Password:
							  </label>
                              <div class="col-9">
                                <input type="text" class="form-control" placeholder="********" name="old_pass" required>
								  
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label class="col-3 col-form-label required">
								  New Password:
							  </label>
                              <div class="col-9">
                                <input type="text" placeholder="********" class="form-control" name="new_pass" required/>
                              </div>
                            </div>
                            <div class="text-end pt-3">
								<button type="submit" class="btn btn-primary" name="submit">
									Change Password
								</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- ***************End Setting******************* -->
                      <!-- ***************Address Proof******************* -->
                      <div class="tab-pane fade" id="tabs-address-proof">
                        <div class="col-md-12">
                          <h3 class="align-items-center">Address Proof</h3>
                          <hr>
                          <div class="card-body">
                            <form action="g-proof-process.php" enctype="multipart/form-data" method="post">
							  <div class="mb-3 row">
								<input type="hidden" name="client_id" class="form-control form-control-lg form-control-solid" value="<?php echo $client_id; ?>" />
							  </div>
							  <div class="mb-3 row">
								<label class="col-3 col-form-label">Proof Type:</label>
								<div class="col">
								  <select class="form-select" name="proof_type">
									  <?php	
										$query="SELECT * FROM `address_proof` WHERE `client_id`='$client_id'";	
										$res=$connect->query($query);	
										$clrow = mysqli_fetch_array($res);	
									   ?>
									  <option selected><?php echo $clrow['proof_type'];?></option>
									  <?php
											$cquery=mysqli_query($connect,"SELECT * FROM `address_proof`");
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
									<span class="avatar avatar-lg rounded" style="background-image: url(static/avatars/<?php echo $clrow['proof_img'];?>); border-radius: 8px; width: 35%; background-size: 100% 100%; margin-left: 33%; height: 150px;"></span>
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
                      <!-- ***************End Address Proof******************* -->
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