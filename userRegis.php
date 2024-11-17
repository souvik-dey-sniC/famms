<?php
    include('allMethods.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Famms User Registration../</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="reg/fonts/linearicons/style.css">

		<!-- CDN -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

		<!-- SWEETALERT -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="reg/css/style.css">
<!-- Bootstrap CSS -->
<link href="furni/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="furni/css/tiny-slider.css" rel="stylesheet">
<link href="furni/css/style.css" rel="stylesheet">
	</head>
	<style>
		.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
}
	</style>
	<body>
    <!-- start header section -->
    <?php
        include('navBar.php');
    ?>
<!-- end header section -->

		<div class="wrapper">
			<div class="inner">
				<img src="reg/images/image-1.png" alt="" class="image-1">
				<form action="" method="post">
					<h3>SIGN UP</h3>
					<div class="form-holder">
						<span></span>
						<input type="text" name="email" class="form-control" placeholder="Mail">
					</div>
					<div class="form-holder">
						<span></span>
						<input type="text" name="name" class="form-control" placeholder="Username">
					</div>
					<div class="form-holder">
						<span></span>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-holder">
						<span></span>
						<input type="text" name="contact" class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-holder">
						<select name="gender" class="form-control" id="">
						  <option class="form-control">Select Gender</option>
						  <option value="Male">Male</option>
						  <option value="Female">Female</option>
						  <option value="Other">Other</option>
						</select>
			       </div>
					<button type="submit" name="register">
						Register
					</button>
					<div class="register-link">
						<p>Already registered? <a href="userLogin.php">Login</a></p>
					  </div>
					  <div>
						<?php
						    if(isset($_POST['register'])) {
								$response = registerUser($_POST);
                                if($response == 1) {
                                    echo '
									<script>
                                        Swal.fire({
                                        position: "middle",
                                        icon: "success",
                                        title: "User Registration Success! 👍",
                                        showConfirmButton: false,
                                        timer: 2000
                                       });
                                    </script>
									';
									//header('location: userLogin.php');
                                }
                                else {
                                    echo '<script>
                                    Swal.fire({
                                    icon: "error",
                                    title: "User Registration Failed!",
                                    text: "Something went wrong!",
                                    });
                                    </script>';
                                }
                            }
						?>
					  </div>
				</form>
				<img src="reg/images/image-2.png" alt="" class="image-2">
			</div>
		</div>

		<!-- footer start -->
		<footer class="footer-section">
			<div class="container relative">

				<!-- <div class="sofa-img">
					<img src="furni/images/sofa.png" alt="Image" class="img-fluid">
				</div> -->

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="furni/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-con" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-con" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Famms<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<!-- <div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div> -->
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
      <!-- footer end -->
		
		<script src="reg/js/jquery-3.3.1.min.js"></script>
		<script src="reg/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>