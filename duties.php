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
          Duties Statistics
        </h2>
        <button style="background-color: #0054A6;" data-bs-toggle="modal" data-bs-target="#modalAddduties" class="btn text-white align-text-top text-right">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
          </svg>
          Add New Duties
        </button>
        <!-- Modal -->
        <div class="modal modal-blur fade" id="modalAddduties" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">
                  Assign Duties to Guard
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
				<form action="assign-duty-process.php" method="post" enctype="multipart/form-data">
             		<div class="modal-body">
					<div class="mb-3">
					  <label class="form-label">Job Title:</label>
						<select class="form-select" name="job_id">
						  <option selected >Select Job Title</option>
						  <?php
								$jsql=mysqli_query($connect,"SELECT * FROM `jobs`");
								while($jrow = mysqli_fetch_array($jsql)){			
							?>
						  <option value="<?php echo $jrow['job_id']; ?>">
							<?php echo $jrow['job_title']; ?>
						  </option>
						<?php
						}
						?>
					   </select>
	<!--
					  <select class="form-select">
						<option value="1" selected>Select Job Title:</option>
						<option value="2">Night Shift - At Prenero Solutions</option>
						<option value="3">Day Shift - At Meezan Bank</option>
						</select>
	-->
					</div>
					<div class="row">
					  <div class="col-lg-12">
						<div class="mb-3">
						  <label class="form-label">Job Date:</label>
						  <div class="input-group input-group-flat">
							<input type="date" class="form-control " name="job_date">
						  </div>
						</div>
					  </div>
					  <div class="col-lg-12">
					  <div class="mb-3">
						<label class="form-label">Employee:</label>
						<select class="form-select" name="guard_id">
						  <option selected >Select Guard</option>
						  <?php
								$gsql=mysqli_query($connect,"SELECT * FROM `guards`");
								while($grow = mysqli_fetch_array($gsql)){			
							?>
						  <option value="<?php echo $grow['guard_id']; ?>">
							<?php echo $grow['guard_name']; ?>
						  </option>
						<?php
						}
						?>
					   </select>
					  </div>
					  </div>
					  <div class="col-lg-12">
						<div class="mb-3">
						  <label class="form-label">Guard Cost:</label>
						  <input type="text" class="form-control" placeholder="Guard Cost" required name="guard_cost" />
						</div>
					  </div>
					</div>
					<div class="modal-footer">
<!--
					  <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
						Cancel
					  </a>
-->
					  <button style="background-color: #0054A6;" class="btn text-white ms-auto" data-bs-dismiss="modal">
						Assign Job
					  </button>
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
                        <th><button class="table-sort" data-sort="sort-city">Employee Name</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Guard Cost</button></th>
                        <th><button class="table-sort" data-sort="sort-type">Job Date</button></th>
                        <th><button class="table-sort text-center" data-sort="sort-score">Duty Status</button></th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
					<?php
										
						$query = mysqli_query($connect,"
						SELECT j.job_title, s.site_title, g.guard_name, d.guard_cost, d.job_date, d.duty_status
						FROM duties AS d
						LEFT JOIN jobs AS j ON d.job_id = j.job_id
						LEFT JOIN sites AS s ON j.site_id = s.site_id
						LEFT JOIN guards AS g ON d.guard_id = g.guard_id");

						if (!$query) {
							die("Query failed: " . mysqli_error($connect));
						}

						while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td class="sort-name">
								<div class="d-flex py-1 align-items-center">
									<span class="avatar me-2" style="background-image: url(static/avatars/010m.jpg)"></span>
									<div class="flex-fill">
										<div class="font-weight-medium">
											<?php echo $row['job_title']; ?>
										</div>
										<div class="text-secondary">
											<a href="#" class="text-reset">
												<?php echo $row['site_title']; ?>
											</a>
										</div>
									</div>
								</div>
							</td>
							<td class="sort-city">
								<div>
									<?php echo $row['guard_name']; ?>
								</div>
							</td>
							<td class="sort-type">
								<?php echo $row['guard_cost']; ?>
							</td>
							<td class="sort-type">
								<?php echo $row['job_date']; ?>
							</td>
							<td class="sort-score text-center">
								<?php echo $row['duty_status']; ?>
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