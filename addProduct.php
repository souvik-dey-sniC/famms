<?php
    include('allMethods.php');
    session_start();
    if(!isset($_SESSION['addmail']))
    {
        header('location:adminLogin.php');
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Eflyer Add Product</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="reg/fonts/linearicons/style.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- CDN -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

		<!-- SWEETALERT -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="reg/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="reg/images/image-1.png" alt="" class="image-1">
				<form action="" method="post" enctype="multipart/form-data">
					<h3>ADD PRODUCT</h3>
                    <div class="form-holder">
						<span></span>
						<input type="text" name="type" id="type" class="form-control" placeholder="Type">
					</div>
					<div class="form-holder">
						<span></span>
						<input type="text" name="name" id="name" class="form-control" placeholder="Name">
					</div>
					<div class="form-holder">
						<span></span>
						<input type="number" name="price" id="price" class="form-control" placeholder="Price">
					</div>
                    <div class="form-holder">
						<span></span>
						<input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
					</div>
                    <div class="form-holder">
						<!-- <span class="lnr lnr-phone-handset"></span> -->
						<input type="file" name="image" id="image" class="form-control" placeholder="image">
					</div>
					<button type="submit" name="upload">
						Upload Product
					</button>
                    <div class="register-link">
						<p><a href="products.php">View Products<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a></p>
					  </div>
					<div>
						<?php
						    if(isset($_POST['upload'])) {
								$response = uploadImage($_POST);
                                echo $response;
							}

						?>
					  </div>
				</form>
				<img src="reg/images/image-2.png" alt="" class="image-2">
			</div>
		</div>
		
		<script src="reg/js/jquery-3.3.1.min.js"></script>
		<script src="reg/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>