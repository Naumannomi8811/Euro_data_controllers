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
                      Guard Salary
                  </h2>
<!--
                  <button style="background-color: #0054A6;" data-bs-toggle="modal" data-bs-target="#modalAdduser" class="btn text-white align-text-top text-right">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M12 5l0 14" />
                      <path d="M5 12l14 0" />
                    </svg>
                    Add New User
                  </button>
-->
                  <!-- Modal -->
<!--
                  <div class="modal modal-blur fade" id="modalAdduser" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">
                          Add New User
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
					  <form action="user-process.php" method="post" enctype="multipart/form-data">
                       	<div class="modal-body">
						  <div class="row">
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required">First Name:</label>
                              <div class="input-group input-group-flat">
                                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required">Last Name:</label>
                              <div class="input-group input-group-flat">
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required">Username:</label>
                              <div class="input-group input-group-flat">
                                <input type="text" class="form-control" name="username" placeholder="Enter Username" required/>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required">Email:</label>
                              <div class="input-group input-group-flat">
                                <input type="email" class="form-control " name="uemail" placeholder="Enter Your Email" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required">Contact Number:</label>
                              <div class="input-group input-group-flat">
                                <input type="number" class="form-control" name="uphone" placeholder="+ xx xxx xxxxxx" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required" >Password:</label>
                              <div class="input-group input-group-flat">
                                <input type="password" class="form-control " name="upass" placeholder="Enter Your Password" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label required">User Type:</label>
							<select class="form-select" name="u_type">
								  <option selected >Select User Type</option>
								  <option>Administrator</option>
								  <option>Accountant</option>
							  </select>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="mb-3">
                              <label class="form-label required">Select Profile Image:</label>
                              <div class="input-group input-group-flat">
                                <input type="file" class="form-control" required name="upic">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                          </a>
                          <button style="background-color: #0054A6;" name="submit" class="btn text-white ms-auto">
                            Add User
                          </button>
                        </div>
                      </div>
					  </form>
                    </div>
                  </div>
                </div>
-->
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
                        <th>
							<button class="table-sort" data-sort="sort-name">
								Guard Code
							</button>
						</th>
                        <th>
							<button class="table-sort" data-sort="sort-city">
								Salary Month
							</button>
						</th>
                        <th>
							<button class="table-sort" data-sort="sort-type">
								Present Duties
							</button>
						</th>
                        <th>
							<button class="table-sort" data-sort="sort-type">
								Total Salary
							</button>
						</th>
                        <th>
							<button class="table-sort text-center" data-sort="sort-score">
								Actions
							</button>
						</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody align-content-center">
						<?php	
							$uquery=mysqli_query($connect,"SELECT * FROM `users`");
							while($urow = mysqli_fetch_array($uquery)){
						?>
                      <tr>
                        <td class="sort-name">
                          <div class="d-flex py-1 ">
							  <?php
								if($urow['user_pic']){
								
								?>
								<img src="media/user-img/<?php echo $urow['user_pic'];  ?>" alt="User Image" width="80px" style="border-radius: 8px;" class=""/>
								
										
								<?php
								}else{
									?>
									<img src="media/avatars/avatar.png" alt="User Image" width="80px" class="" style="border-radius: 8px;"/>
								<?php
								}
								?>
                              <div class="flex-fill">
                                <div class="font-weight-medium mx-3">
									<?php echo $urow['first_name']; ?>
									<?php echo $urow['last_name']; ?>
								</div>
                                <div class="text-secondary mx-3">
									<a href="#" class="text-reset">
										<?php echo $urow['user_type']; ?>
									</a>
								  </div>
                              </div>
                            </div>
                        </td>
                        <td class="sort-city">
                          <div>
							  <?php echo $urow['phone']; ?>
						  </div>
                        </td>
                        <td class="sort-type">
							<?php echo $urow['address']; ?>
						</td>
						<td></td>
                        <td class="sort-score">
                          <div class="btn-list flex-nowrap justify-content-center">
                              <div class="dropdown">
                                <!-- <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"> -->
                                <a href="#" class="btn  align-text-top">
                                  Generate Salary
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