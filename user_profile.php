<?php
include('header.php');

include('config.php');
$user_id = $_GET['user_id'];
include('user-profile-nav.php');
?>


                  <div class="card-body">
                    <div class="tab-content">
                      <!-- ***************Profile******************* -->
                      <div class="tab-pane fade active show" id="tabs-profile">
                        <div class="col-md-12">
                          <h3 class="align-items-center">Profile Details</h3>
                          <hr>
                          <div class="card-body">
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Username:</label>
                                <div class="col-9">
                                  <strong><?php echo $urow['username']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">First Name:</label>
                                <div class="col-9">
                                  <strong><?php echo $urow['first_name']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Last Name:</label>
                                <div class="col-9">
                                  <strong><?php echo $urow['last_name']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Email Address</label>
                                <div class="col-9">
                                  <strong><?php echo $urow['email']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Contact Phone:</label>
                                <div class="col">
                                  <strong><?php echo $urow['phone']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Address:</label>
                                <div class="col">
                                  <strong><?php echo $urow['address']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">Company:</label>
                                <div class="col">
                                  <strong><?php echo $urow['company']; ?></strong>
                                </div>
                              </div>
                              <div class="mb-3 row align-items-center">
                                <label class="col-3 col-form-label text-muted">User Type:</label>
                                <div class="col">
                                  <strong><?php echo $urow['user_type']; ?></strong>
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
                              <form action="user-setting-process.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Avatar</label>
                                  <div class="col-9">
                                   <div class="col-auto">
                                     <?php
								if($urow['user_pic']){
								
								?>
								<img src="media/user-img/<?php echo $urow['user_pic'];  ?>" alt="User Image" style="border-radius: 8px;width: 120px;" class="mr-4"/>
								
										
								<?php
								}else{
									?>
									<img src="media/avatars/avatar.png" alt="User Image" class="mr-3"  style="border-radius: 8px;width: 120px;"/>
								<?php
								}
								?>
                                   </div>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <div class="col-9">
                                    <input type="hidden" class="form-control" value="<?php echo $urow['user_id']; ?>"  name="user_id">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required" >Change Avatar:</label>
                                  <div class="col-9">
                                    <input type="file" class="form-control"  name="avatar">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required" >Username:</label>
                                  <div class="col-9">
                                    <input type="text" class="form-control"  value="<?php echo $urow['username'];  ?>" name="username"/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">First Name:</label>
                                  <div class="col-9">
                                    <input type="text" class="form-control" value="<?php echo $urow['first_name'];  ?>" name="first_name"/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Last Name:</label>
                                  <div class="col">
                                    <input type="text" class="form-control"   value="<?php echo $urow['last_name'];  ?>" name="last_name"/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Email:</label>
                                  <div class="col">
                                    <input type="email" class="form-control"  value="<?php echo $urow['email'];  ?>" name="email"/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">Contact Phone:</label>
                                  <div class="col">
                                    <input type="number" class="form-control"  value="<?php echo $urow['phone'];  ?>" name="phone"/>
                                   
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Address:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $urow['address'];  ?>" name="address"/>
                                   
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label ">Company:</label>
                                  <div class="col">
                                    <input type="text" class="form-control" value="<?php echo $urow['company'];  ?>" name="company"/>
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-3 col-form-label required">User Type:</label>
                                  <div class="col"  >
									  <select class="form-control" name="user_type">
									  	<option selected><?php echo $urow['user_type'];?></option>
									  	<option value="Admistrator" >Admistrator</option>
									  	<option value="Accountant"  >Accountant</option>
									  	
										  
									  </select>
                                  </div>
                                </div>
                                <div class=" text-end pt-3">
                                  <button type="submit" name="submit" class="btn btn-primary">
									  Save Changes
								  </button>
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