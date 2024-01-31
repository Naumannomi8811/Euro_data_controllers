<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Euro Security Services</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="stats/js/script.js"></script>
    
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="media/logos/e logo.png" />
    
    <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- <link href="https:// stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- CSS files -->

   
    <link href="css/tabler.min.css" rel="stylesheet"/>
    <link href="css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="css/tabler-vendors.min.css" rel="stylesheet"/>
   <link href="css/demo.min.css" rel="stylesheet"/> 
	
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <style>
      @import url('../rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
<body  class=" d-flex flex-column">
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="#" class="navbar-brand navbar-brand-autodark">
<!--					<img src="media/logos/e logo.png" height="36" alt="">-->
				</a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Login to your account</h2>
                  <form action="server.php" method="post">
                  <div class="mb-3">
                      <label class="form-label">Email address</label>
                      <input type="email" class="form-control" placeholder="your@email.com" required name="email" autocomplete="off">
                  </div>
                  <div class="mb-2">
                      <label class="form-label">
                          Password
                          <span class="form-label-description">
                              <a href="#">I forgot password</a>
                          </span>
                      </label>
					  <div class="input-group input-group-flat">
						<input type="password" class="form-control" placeholder="Your password" name="password" id="passwordField" autocomplete="off">
						<span class="input-group-text">
							<a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" id="showPassword">
								<!-- Your SVG eye icon -->
								<!-- Downloaded SVG icon from http://tabler-icons.io/i/eye -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
									<path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
								</svg>
							</a>
						</span>
					</div>

                  </div>
                  <div class="mb-2">
                      <label class="form-check">
                          <input type="checkbox" class="form-check-input" />
                          <span class="form-check-label">
                              Remember me on this device
                          </span>
                      </label>
                  </div>
                  <div class="form-footer">
                      <button type="submit" name="login_user" class="btn btn-primary w-100">
                          Sign in
                      </button>
                  </div>
              </form>

                </div>
              </div>
              <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="#" tabindex="-1">Sign up</a>
              </div>
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="media/euro-security-logo.png" height="300" class="d-block mx-auto" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="dist/js/tabler.min.js" defer></script>
    <script src="dist/js/demo.min.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#showPassword').click(function(e) {
        e.preventDefault();
        var passwordField = $('#passwordField');
        var fieldType = passwordField.attr('type');
        
        // Toggle password visibility
        if (fieldType === 'password') {
            passwordField.attr('type', 'text');
        } else {
            passwordField.attr('type', 'password');
        }
    });
});
</script>

  </body>

<!-- Mirrored from preview.tabler.io/sign-in-illustration.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Oct 2023 09:35:49 GMT -->
</html>