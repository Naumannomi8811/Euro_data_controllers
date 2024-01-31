<?php																				
	$query=mysqli_query($connect,"SELECT * FROM `users` WHERE `user_id`='$user_id'");										
	$urow = mysqli_fetch_array($query);										
	?>
<div class="page-wrapper">
        <div class="page-header">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-auto">
				  <?php
								if($urow['user_pic']){
								
								?>
								<img src="media/user-img/<?php echo $urow['user_pic'];  ?>" alt="User Image" style="border-radius: 8px;width: 150px;" class="mr-4"/>
								
										
								<?php
								}else{
									?>
									<img src="media/avatars/avatar.png" alt="User Image" class="mx-3"  style="border-radius: 8px;width: 150px;"/>
								<?php
								}
								?>
              </div>
              <div class="col">
                <h1 class="fw-bold">
					<?php echo $urow['first_name']; ?>
					<?php echo $urow['last_name']; ?> 
				</h1>
                <div class="my-2">
                </div>
                <div class="list-inline list-inline-dots text-secondary">
                  <div class="list-inline-item">
                    <!-- Download SVG icon from http://tabler-icons.io/i/map -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>
                    <?php echo $urow['address']; ?>
                  </div>
                  <div class="list-inline-item">
                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                    <a href="#" class="text-reset">
						<?php echo $urow['email']; ?>
					</a>
                  </div>
                </div>
              </div>
              <div class="col-auto ms-auto">
                <div class="btn-list">
                  <a href="#" class="btn btn-icon" aria-label="Button">
                    <!-- Download SVG icon from http://tabler-icons.io/i/dots -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                  </a>
                  <a href="#" class="btn btn-icon" aria-label="Button">
                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                  </a>
                  <a href="#" class="btn btn-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    Following
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row g-3">
              <div class="col">
                <div class="col-md-12">
                <div class="card">
                  <!-- ***************Header******************* -->
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                      <li class="nav-item">
                        <a href="#tabs-profile" class="nav-link active" data-bs-toggle="tab">Profile Overview</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-setting" class="nav-link" data-bs-toggle="tab">Settings</a>
                      </li>
                    </ul>
                  </div>
                  <!-- ***************End Header******************* -->