<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?Php
   ob_start();
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
		<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		      <div class="row mb-5">
		        <div class="col-md-12">
		          <div class="border p-4 rounded" role="alert">
		            Returning customer? <a href="userlogin.php">Click here</a> to login
		          </div>
                  <div class="border p-4 rounded" role="alert">
		            <a href="cart.php" class="col-lg-5">Click here</a> to <span class="text-success">My Cart</span>
		          </div>
		        </div>
		      </div>
			  <?php
			     $email = $_SESSION['email'];
				 $res = viewAllCartDetails($email);
				 $records = mysqli_num_rows($res); 
			  ?>
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		            <div class="form-group">
                      <input type="hidden" name="" id="nop" value="<?php echo $records;?>">
                      <input type="hidden" name="" id="email" value="<?php echo $email;?>">
		              <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
		              <select id="country" class="form-control">
		                <option value="">Select a country</option>    
		                <option value="Algeria">Algeria</option>    
		                <option value="Afghanistan">Afghanistan</option>    
		                <option value="Ghana">Ghana</option>        
		                <option value="India">India</option>    
		                <option value="Bahrain">Bahrain</option>    
		                <option value="Colombia">Colombia</option>    
		                <option value="Dominican Republic">Dominican Republic</option>    
		              </select>
		            </div>
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="fname" name="fname">
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="lname" name="c_lname">
		              </div>
		            </div>

		            <!-- <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">Company Name </label>
		                <input type="text" class="form-control" id="c_companyname" name="c_companyname">
		              </div>
		            </div> -->

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="address" name="" placeholder="Apartment, suite, unit etc. (optional)">
		              </div>
		            </div>

		            <!-- <div class="form-group mt-3">
		              <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
		            </div> -->

		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="state" name="">
		              </div>
		              <div class="col-md-6">
		                <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="zip" name="">
		              </div>
		            </div>

		            <div class="form-group row mb-5">
                    <div class="col-md-6">
		                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="contact" name="" placeholder="Phone Number">
		              </div>
		              <!-- <div class="col-md-6">
		                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
		              </div> -->
		            </div>
		            <div class="form-group">
		              <label for="c_create_account" class="text-black" data-bs-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
		              <div class="collapse" id="create_an_account">
		                <div class="py-2 mb-4">
		                  <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
		                  <div class="form-group">
		                    <label for="c_account_password" class="text-black">Account Password</label>
		                    <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
		                  </div>
		                </div>
		              </div>
		            </div>


		             <!-- <div class="form-group">
		               <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
		              <div class="collapse" id="ship_different_address">
		                <div class="py-2">

		                  <div class="form-group">
		                    <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
		                    <select id="c_diff_country" class="form-control">
		                      <option value="1">Select a country</option>    
		                      <option value="2">bangladesh</option>    
		                      <option value="3">Algeria</option>    
		                      <option value="4">Afghanistan</option>    
		                      <option value="5">Ghana</option>    
		                      <option value="6">Albania</option>    
		                      <option value="7">Bahrain</option>    
		                      <option value="8">Colombia</option>    
		                      <option value="9">Dominican Republic</option>    
		                    </select>
		                  </div>


		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
		                    </div>
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-12">
		                      <label for="c_diff_companyname" class="text-black">Company Name </label>
		                      <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
		                    </div>
		                  </div>

		                  <div class="form-group row  mb-3">
		                    <div class="col-md-12">
		                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
		                    </div>
		                  </div>

		                  <div class="form-group row mb-5">
		                    <div class="col-md-6">
		                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
		                    </div>
		                  </div>

		                </div>

		              </div> 
		            </div>-->

		            <!-- <div class="form-group">
		              <label for="c_order_notes" class="text-black">Order Notes</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
		            </div> -->

		          </div>
		        </div>
		        <div class="col-md-6">

		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Coupon Code</h2>
		              <div class="p-3 p-lg-5 border bg-white">

		                <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
		                <div class="input-group w-75 couponcode-wrap">
		                  <input type="text" class="form-control me-2" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
		                  <div class="input-group-append">
		                    <button class="btn btn-black btn-sm" type="button" id="button-addon2">Apply</button>
		                  </div>
		                </div>

		              </div>
		            </div>
		          </div>

		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Your Order</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
                          <?php
						     $flag = $_GET['flag'];

							 if($flag == 1)
							 {
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
	  
									 $name = $data1["name"];
									 $price = $data1["price"];
	  
									 $amount = $data1["price"] * $qnt;
									 $total_amount += $amount;
   
									 echo '
									 <tbody>
									 <tr>
									   <td>'.$name.'<strong class="mx-2">x</strong>'.$qnt.'</td>
									   <td>Rs. '.$price.'.00/-</td>
									 </tr>
									 <tr>
									   <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
									   <td class="text-black font-weight-bold"><strong>Rs. '.$total_amount.'.00/-</strong></td>
									 </tr>
								   </tbody>
								   ';
								 }
							   }
	  
							 }
							 else{
								$productid = $_GET['productid'];
								//echo "Product ID: ".$productid;
								$email = $_SESSION['email'];
								$res = viewCartByProductid($productid);
								$records = mysqli_num_rows($res);
	  
								$total_amount = 0;
	  
								if($records > 0) {
								 if($data = mysqli_fetch_assoc($res)) {
									
	  
									 $name = $data["name"];
									 $price = $data["price"];
	  
									 $amount = $data["price"] * 1;
									 $total_amount += $amount;
   
									 echo '
									 <tbody>
									 <tr>
									   <td>'.$name.'<strong class="mx-2">x</strong>1</td>
									   <td>Rs. '.$price.'.00/-</td>
									 </tr>
									 <tr>
									   <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
									   <td class="text-black font-weight-bold"><strong>Rs. '.$total_amount.'.00/-</strong></td>
									 </tr>
								   </tbody>
								   ';
								 }
							   }
							 }
                            
                          ?>
		                  
		                </table>

		                <!-- <div class="border p-3 mb-3">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

		                  <div class="collapse" id="collapsebank">
		                    <div class="py-2">
		                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
		                    </div>
		                  </div>
		                </div>

		                <div class="border p-3 mb-3">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

		                  <div class="collapse" id="collapsecheque">
		                    <div class="py-2">
		                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
		                    </div>
		                  </div>
		                </div>

		                <div class="border p-3 mb-5">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

		                  <div class="collapse" id="collapsepaypal">
		                    <div class="py-2">
		                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
		                    </div>
		                  </div>
		                </div> -->

                    <div class="form-group">
		              <label for="c_country" class="text-black">Mode of Payment<span class="text-danger">*</span></label>
		              <select name ="mop" id="mop" class="form-control">
		                <option value="">Select Payment Mode</option>    
		                <option value="cash">Cash on Delivery</option> 
                        <option value="online">Online</option>      
		              </select>
		            </div><br>
                    <b class="text-black font-weight-bold">Total Amount:    </b>
                    <strong class="text-black font-weight-bold" id="tamt">Rs. <?php echo $total_amount;?>.00/-</strong><br>
		                <div class="form-group">
		                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="confirmOrder()">Place Order</button>
		                </div><br>
                       
		              </div>
		            </div>
		          </div>
                  
		        </div>
		      </div>
		      <!-- </form> -->
		    </div>
		  </div>

		<!-- Start Footer Section -->
		<?php
		   include('footer.php');
		?>
		<!-- End Footer Section -->	

        <script>
	 function confirmOrder() {

		        var itm = "Item Orders";
                var email = document.getElementById('email').value;
				var country = document.getElementById('country').value;
				var fname = document.getElementById('fname').value;
				var lname = document.getElementById('lname').value;
				var address = document.getElementById('address').value;
				var state = document.getElementById('state').value;
				var zip = document.getElementById('zip').value;
				var contact = document.getElementById('contact').value;
                var nop = document.getElementById('nop').value;
				var tamt = document.getElementById('total_amount').innerHTML;
				var mop = document.getElementById('mop').value;
				alert(tamt);
				alert(email + " " + country + " " + fname + " " + lname + " " + address + " " + state + " " + zip + " " + contact + " " + nop + " " + tamt + " " + mop + " ");

				// if(mop == "cash") {
				// 	alert('Hi')
				// 	$.ajax ({
                //     url: "ProductOrder.php",
                //     method: "post",
                //     data: {"email": email, "country": country, "fname": fname, "lname": lname, "address": address, "state": state, "zip": zip, "contact": contact, "nop": nop, "tamt": tamt, "mop": mop},
                //     success: function(response) {
                //         alert(response);
                //         window.location.href = "";
                //     }
                // })
				// }
			// 	else if(mop == "online") {
			// 	    var options = {
            //     "key": "rzp_test_ND81BEh4gRO77Q", // Enter the Key ID generated from the Dashboard
            //     "amount": tamt*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            //     "currency": "INR",
            //     "name": "famms", //your business name
            //     "description": itm,
            //     "image": "https://www.nicepng.com/png/detail/202-2026863_connection-icon-reliance-jio-jio-logo-png.png",
            //     "handler": function (response){
            //         payid = (response.razorpay_payment_id);

			// 		$.ajax ({
            //         url: "ProductOrder.php",
            //         method: "post",
            //         data: {"email": email, "country": country, "fname": fname, "lname": lname, "address": address, "state": state, "zip": zip, "contact": contact, "nop": nop, "tamt": tamt, "mop": mop, "transactionid": payid},
            //         success: function(response) {
            //             alert(response);
            //             window.location.href = "";
            //         }
            //     })
            //         Swal.fire({
            //             position: "top-end",
            //             icon: "success",
            //             title: " "+payid,
            //             showConfirmButton: false,
            //             timer: 1500
            //         });
            //     },
            // };

            // var rzp1 = new Razorpay(options);
            // rzp1.open();

			// 	}
			// 	else {
			// 		alert("Please Select Mode of Payment..");
			// 	}
	 	}
		
    //   $.ajax({
    //     type: "POST",
    //     url: "addorders.php",
    //     data: {
    //       nop: nop,
    //       fname: fname,
    //       lname: lname,
    //       country: country,
    //       address: address,
    //       state: state,
    //       zip: zip,
    //       contact: contact,
    //       email: email,
    //       subtotal: subtotal,
    //       totalamount: totalamount
    //     },
    //     success: function (data) {
    //       if (data == "SUCCESS") {
    //         alert("Your order has been successfully placed.");
    //       } else {
    //         alert("Order failed. Please try again.");
    //       }
    //     }
    //   });
    //}
        </script>

		<script src="furni/js/bootstrap.bundle.min.js"></script>
		<script src="furni/js/tiny-slider.js"></script>
		<script src="furni/js/custom.js"></script>
	</body>
</html>
<?php
   ob_end_flush();
?>
<!-- alert(tamt);
                var email = document.getElementById('email').value;
				var country = document.getElementById('country').value;
				var fname = document.getElementById('fname').value;
				var lname = document.getElementById('lname').value;
				var address = document.getElementById('address').value;
				var state = document.getElementById('state').value;
				var zip = document.getElementById('zip').value;
				var contact = document.getElementById('contact').value;
                var nop = document.getElementById('nop').value;
				var tamt = document.getElementById('total_amount').innerHTML;
				var mop = document.getElementById('mop').value;

                alert(email + " " + country + " " + fname + " " + lname + " " + address + " " + state + " " + zip + " " + contact + " " + nop + " " + tmt + " " + mop + " ");
             -->