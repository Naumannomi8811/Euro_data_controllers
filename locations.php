<?php
	include('header.php');
	include('config.php');			

//	$query=mysqli_query($connect,"SELECT * FROM `clients` WHERE `client_id`='$client_id'");
//	$crow = mysqli_fetch_array($query);	

?>


      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col-12 d-flex justify-content-between">
                  <h2 class="page-title">
                      Locations Statistics
                  </h2>
                  <button style="background-color: #0054A6;" data-bs-toggle="modal" data-bs-target="#modalAddlocation" class="btn text-white align-text-top text-right">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M12 5l0 14" />
							<path d="M5 12l14 0" />
					    </svg>
                        Add New Location
                    </button>
                  <!-- Modal -->
                  <div class="modal modal-blur fade" id="modalAddlocation" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">

                          Add New Location</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
						  <form action="add-site-process.php" method="post" enctype="multipart/form-data">
                        	<div class="modal-body">
                          <div class="mb-3">
                            <label class="form-label">Site Title:</label>
                            <input type="text" class="form-control" placeholder="Enter Site name" name="site_title">
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="mb-3">
                                <label class="form-label">Client Name:</label>
                                <div class="input-group input-group-flat">
                                  <select class="form-select" name="client_id">
									  <option selected >Select Client Name</option>
									  <?php
										$csql=mysqli_query($connect,"SELECT * FROM `clients`");
										while($crow = mysqli_fetch_array($csql)){			
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
                            </div>
                            <div class="col-lg-12">
                              <div class="mb-3">
                                <label class="form-label">Street Address:</label>
                                <input type="text" class="form-control" placeholder="Street Address" required name="address"   />
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="mb-3">
                                <label class="form-label">City:</label>
                                <input type="text" class="form-control" placeholder="City" required name="city"   />
                              </div>
                            </div>
                              <div class="modal-footer">
                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                  Cancel
                                </a>
                                <button style="background-color: #0054A6;" class="btn text-white ms-auto" name="add-site">
                                  Add Site
                                </button>
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
                        <th><button class="table-sort" data-sort="sort-name">Site Title</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Address</button></th>
                        <th><button class="table-sort" data-sort="sort-type">City</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Date Added</button></th>
                        <th><button class="table-sort text-center" data-sort="sort-score">Actions</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
						<?php		
							$query=mysqli_query($connect,"SELECT * FROM `sites`");	
							while($nrow = mysqli_fetch_array($query)){	
						?>	
                      <tr>
                        <td class="sort-name">
                          <div class="d-flex py-1 align-items-center">
                              <span class="avatar me-2" style="background-image: url(media/avatars/<?php echo $nrow['site_pic']; ?>)"></span>
                              <div class="flex-fill">
                                <div class="font-weight-medium">
									<?php echo $nrow['site_title']; ?>
								</div>
                                <div class="text-secondary">
									<a href="#" class="text-reset">
										<?php
											$clientId = $nrow['client_id'];

											$result = mysqli_query($connect, "SELECT client_name FROM clients WHERE client_id = '$clientId'");
											if ($result && mysqli_num_rows($result) > 0) {
												$row = mysqli_fetch_assoc($result);
												echo $row['client_name']; 
											} else {
												echo "Client not found";
											}
											mysqli_free_result($result);
										?>
									</a>
								  </div>
                              </div>
                            </div>
                        </td>
                        <td class="sort-city">
                          <div><?php echo $nrow['site_address']; ?></div>
                        </td>
                        <td class="sort-type"><?php echo $nrow['site_city']; ?></td>
                        <td class="sort-type"><?php echo $nrow['date_added']; ?></td>
                        <td class="sort-score">
                          <div class="btn-list flex-nowrap justify-content-center">
                              <a href="edit_location.php?site_id=<?php echo $nrow['site_id']; ?>" class="btn">
							   Edit
							  </a>

<!-- Modal -->


                               
                              
                              <div class="">
								<a href="delete-location.php?site_id=<?php echo $nrow['site_id']; ?>" class="btn  align-text-top">
                                  Delete
                                </a>
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