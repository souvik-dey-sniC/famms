<?php
    include('allMethods.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Eflyer Add Product</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="reg/fonts/linearicons/style.css">

		<!-- CDN -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

		<!-- SWEETALERT -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="reg/css/style.css">
	</head>

	<body>
    <?php
        $pid = $_GET['pid'];
        $response = getDataByProductId($pid);
        $data = mysqli_fetch_assoc($response);
    ?>

		<div class="wrapper">
			<div class="inner">
				<img src="reg/images/image-1.png" alt="" class="image-1">
				<form action="" method="post" enctype="multipart/form-data">
					<h3>Edit PRODUCT</h3>
                    <input type="hidden" name="productid" value="<?php echo $data['productid']?>">
					<div class="form-holder">
						<span></span>
						<input type="text" name="type" id="type" class="form-control" placeholder="Type" value="<?php echo $data['type']?>">
					</div>
					<div class="form-holder">
						
						<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $data['name']?>">
					</div>
					<div class="form-holder">
						
						<input type="number" name="price" id="price" class="form-control" placeholder="Price" value="<?php echo $data['price']?>">
					</div>
                    <div class="form-holder">
						
						<input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" value="<?php echo $data['stock']?>">
					</div>
                    <img src="<?php echo $data['image']?>" style="width:20%" id="preview"> <br>
                    <div class="form-holder">
						<!-- <span class="lnr lnr-phone-handset"></span> -->
						<input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)" placeholder="image">
					</div>
					<button type="submit" name="update">
						Update Product
					</button>
				</form>
                <div>
						<?php
						    if(isset($_POST['update'])) {
								$response = updateImage($_POST);
								if($response == 1) {
									echo '
									<script>
									let timerInterval;
									Swal.fire({
									  title: "Login Success!",
									  html: "Page will be redirect to Dashboard",
									  timer: 1000,
									  timerProgressBar: true,
									  didOpen: () => {
										Swal.showLoading();
										const timer = Swal.getPopup().querySelector("b");
										timerInterval = setInterval(() => {
										  timer.textContent = `${Swal.getTimerLeft()}`;
										}, 100);
									  },
									  willClose: () => {
										clearInterval(timerInterval);
									  }
									}).then((result) => {
									  /* Read more about handling dismissals below */
									  if (result.dismiss === Swal.DismissReason.timer) {
										window.location.href="products.php";
										//alert("");
									  }
									});
									</script>
									';
								}
                                header('location: products.php');
							}

						?>
					  </div>
      <script type="text/javascript">
      function previewImage(event) 
      {
         var input = event.target;
         var image = document.getElementById('preview');
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               image.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>
				<img src="reg/images/image-2.png" alt="" class="image-2">
			</div>
		</div>
		
		<script src="reg/js/jquery-3.3.1.min.js"></script>
		<script src="reg/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>