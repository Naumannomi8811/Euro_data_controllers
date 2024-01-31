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
					Jobs Statistics
				</h2>
				 <button style="background-color: #0054A6;" data-bs-toggle="modal" data-bs-target="#modalAddlocation" class="btn text-white align-text-top text-right">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<path d="M12 5l0 14" />
							<path d="M5 12l14 0" />
					    </svg>
                        New Job
                    </button>
                  <!-- Modal -->
                  <div class="modal modal-blur fade" id="modalAddlocation" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">
									Add New Job
								</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="add-job-process.php" method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label">Job Title:</label>
										<input type="text" class="form-control" name="job_title" placeholder="Enter Job Title">
									</div>
									<div class="mb-3">
										<label class="form-label">Site Name:</label>
										<div class="input-group input-group-flat">
											<select class="form-select" name="site_id">
											  <option selected >Select Site Name</option>
											  <?php
												$csql=mysqli_query($connect,"SELECT * FROM `sites`");
												while($crow = mysqli_fetch_array($csql)){			
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
									<div class="row">
										<div class="col-lg-6">
											<div class="mb-3">
												<label class="form-label">Start Time:</label>
												<input type="time" class="form-control" name="start_time" />
											</div>
										</div>
										<div class="col-lg-6">
											<div class="mb-3">
												<label class="form-label">End Time:</label>
												<input type="time" class="form-control" name="end_time" />
											</div>
										</div>
										<div class="col-lg-12">
											<div class="mb-3">
												<label class="form-label">Break Time (Hour):</label>
												<input type="text" class="form-control" name="break_time" placeholder="Hour" />
											</div>
										</div>
										<div class="col-lg-12">
											<div class="mb-3">
												<label class="form-label">Job Date:</label>
												<input type="date" class="form-control" name="job_date" />
											</div>
										</div>
										<div class="col-lg-12">
											<div class="mb-3">
												<label class="form-label">Client Cost:</label>
												<input type="text" class="form-control" name="client_cost" placeholder="Client Cost" />
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" style="background-color: #0054A6;" class="btn text-white">
											Add Job
										</button>
									</div>
								</form>
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
                        <th><button class="table-sort" data-sort="sort-name">Job Title</button></th>
                        <th><button class="table-sort" data-sort="sort-city">Timing</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Break</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Job Date</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Job Status</button></th>
                        <th><button class="table-sort text-center" data-sort="sort-score">Actions</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
						<?php	
							$query=mysqli_query($connect,"SELECT * FROM `jobs`");
							while($nrow = mysqli_fetch_array($query)){
						?>		
                      <tr>
                        <td class="sort-name">
                          <div class="d-flex py-1 align-items-center">
                              <span class="avatar me-2" style="background-image: url(media/avatars/jobs.jpg)"></span>
                              <div class="flex-fill">
                                <div class="font-weight-medium"><?php echo $nrow['job_title']; ?></div>
                                <div class="text-secondary">
									<a href="#" class="text-reset">
										<?php echo $nrow['client_cost']; ?>
									</a>
								  </div>
                              </div>
                            </div>
                        </td>
                        <td class="sort-city">
                          <div>
							  <?php echo $nrow['start_time'];?>
							</div>
                          <div class="text-secondary">
							<?php echo $nrow['end_time']; ?>
						  </div>
                        </td>
                        <td class="sort-type"><?php echo $nrow['break_time']; ?></td>
                        <td class="sort-type"><?php echo $nrow['job_date']; ?></td>
                        <td class="sort-type"><?php echo $nrow['job_status']; ?></td>
                        <td class="sort-score">
                          <div class="btn-list flex-nowrap justify-content-center">
                              <a href="edit-job.php?job_id=<?php echo $nrow['job_id']; ?>" class="btn">
                                Edit
                              </a>
							  <a href="delete-job.php?job_id=<?php echo $nrow['job_id']; ?>" class="btn  align-text-top">
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