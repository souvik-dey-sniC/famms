<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?Php
   include('allMethods.php');
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
        
        <!-- font awesome style -->
      <!-- <link rel="icon" href="efly/images/fevicon.png" type="image/gif" /> -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
		<!-- Bootstrap CSS -->
		<link href="furni/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="furni/css/tiny-slider.css" rel="stylesheet">
		<link href="furni/css/style.css" rel="stylesheet">
		<title>Famms Shopping Website.. </title>
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

		<!-- Start Header/Navigation -->
         <?php
            include('navBar.php');
         ?>
		<!-- End Header/Navigation -->
<?php
//session_start();
if(!isset($_SESSION['email']))
{
    header('location:index.php');
}

?>

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>My Cart</h1>
							</div>
						</div>
						<div class="col-lg-5">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <?php
                          $email = $_SESSION['email'];
                          $res = viewAllCartDetails($email);
                          $records = mysqli_num_rows($res);

                          $total_amount = 0;

                          if($records > 0) {
                           while($data = mysqli_fetch_assoc($res)) {
                               $pid = $data['pid'];
                               $qnt = $data['qnt'];
                               $cartid = $data['cartid'];

                               $res1 = getDataByProductId($pid);
                               $data1 = mysqli_fetch_assoc($res1);

                               $image = $data1["image"];
                               $name = $data1["name"];
                               $price = $data1["price"];

                               $amount = $data1["price"] * $qnt;
                               $total_amount += $amount;

                               echo '
                               <tbody>
                                      <tr>
                                        <td class="product-thumbnail">
                                          <img src="'.$image.'" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                          <h2 class="h5 text-black">'.$name.'</h2>
                                        </td>
                                        <td>Rs. '.$price.'/-</td>
                                        <td>
                                          <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                              <a href="decreaseCartItem.php?cartid='.$cartid.' &qnt='.$qnt.'" class="btn btn-outline-black decrease" type="button">&minus;</a>
                                            </div>
                                            <input type="text" class="form-control text-center quantity-amount" value="'.$qnt.'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                              <a href="increaseCartItem.php?cartid='.$cartid.'" class="btn btn-outline-black increase" type="button">&plus;</a>
                                            </div>
                                          </div>
        
                                        </td>
                                        <td>Rs. '.$amount.'</td>
                                        <td><a href="deleteCartItem.php?cartid='.$cartid.'" class="btn btn-black btn-sm"><i class="fa-solid fa-trash fa-fade fa-lg" style="color: #bf1f0d;"></i></a></td>
                                      </tr>
                                </tbody>
                               ';
                           }
                          }
                          else {
                           echo "<h2>There Are No Products In Your Cart..., First Get A Job Done Add To Cart!</h2>";
                          }
                       ?>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block"><a href="index.php" style="color:white">Continue Shopping</a></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-black h4" for="coupon">Coupon</label>
                      <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                      <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-black">Apply Coupon</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs. <?php echo $total_amount;?>.00</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs. <?php echo $total_amount;?>.00</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php?flag=1'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		

		<!-- Start Footer Section -->
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
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
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
		<!-- End Footer Section -->	
    <!-- onclick="deleteItem('.$cartid.')" -->
    <script>
        function deleteItem(cartid)
        {
            alert(cartid)
            if(confirm("Are you sure to delete this item?"))
            {
                $.ajax ({
                    url: "deleteCartItem.php",
                    method: "get",
                    data: {"cartid": cartid},
                    success: function(res) {
                        alert(res);
                        window.location.href = "";
                    }
                })
            }
        }
    </script>


		<script src="furni/js/bootstrap.bundle.min.js"></script>
		<script src="furni/js/tiny-slider.js"></script>
		<script src="furni/js/custom.js"></script>
	</body>
</html>
