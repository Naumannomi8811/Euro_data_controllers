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
                      Work Force
                  </h2>
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
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-name">Employee Name</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Contact</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Per Hour Rate</button></th>
                        <th><button class="table-sort text-center" data-sort="sort-score">Actions</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php

                        $query=mysqli_query($connect,"SELECT * FROM `guards`");
                         while($nrow = mysqli_fetch_array($query)){
                      ?>  
                      <tr>
                        <td class="sort-name">
                          <div class="d-flex py-1 ">
                              <div class="symbol symbol-45px me-5">
                                <?php
                                  if(empty($nrow['dp'])){
                                ?>
                                <img src="media/avatars/avatar.png" alt="image" width="80px" style="border-radius: 8px;"/>    
                                <?php
                                  }else{
                                ?>
                                <img src="media/guard-img/<?php echo $nrow['dp']  ?>" alt="image" width="80px" style="border-radius: 8px;"/>  
                                <?php
                                  }
                                ?>
                              </div>
                              <div class="flex-fill">
                                <div class="font-weight-medium">
                                  <?php echo $nrow['guard_name'] ?>
                                </div>
                                <div class="text-secondary">
                                  <a href="#" class="text-reset">
                                    <?php echo $nrow['guard_gender'] ?>
                                  </a>
                              </div>
                              </div>
                            </div>
                        </td>
                        <td class="sort-city">
                          <div><?php echo $nrow['guard_phone'] ?></div>
                          <div class="text-secondary"><?php echo $nrow['guard_email'] ?></div>
                        </td>
                        <td class="sort-type">
                          <?php echo $nrow['per_hour_salary'] ?>
                        </td>
                        <td class="sort-score">
                          <div class="btn-list flex-nowrap justify-content-center">
                              <a href="guard-profile.php?guard_id=<?php echo $nrow['guard_id']; ?>" class="btn">
                                View
                              </a>
                              <div class="dropdown">
                                <!-- <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown"> -->
                                <a href="delete_guard.php?guard_id=<?php echo $nrow['guard_id']; ?>" class="btn  align-text-top">
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