<?php
    session_start();
    ob_start();
?>
<!-- start header section -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

            <div class="container">
               <a class="navbar-brand" href="index.html"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
   
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
   
               <div class="collapse navbar-collapse" id="navbarsFurni">
                  <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li><a class="nav-link" href="AllProduct.php">Products</a></li>
                     <li><a class="nav-link" href="about.php">About us</a></li>
                     <li><a class="nav-link" href="blog_list.php">Blog</a></li>
                     <li><a class="nav-link" href="contact.php">Contact us</a></li>
                     <li class="nav-item">
                        <a class="nav-link" href="userLogin.php">Login/Register</a>
                     </li>
                  </ul>
   
                  <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                     <li><a class="nav-link" href="userProfile.php"><i class="fa-solid fa-user-tie fa-2x fa-beat" style="color: #86a6f0;"></i></a></li>
                     <?php
                        if(isset($_SESSION['email'])) {
                           $email = $_SESSION['email'];
                           $items = countCart($email);
                           echo '
                           <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart fa-2x" style="color: #e6ca6e;"></i><span class="badge badge-warning" id="lblCartCount"> '.$items.' </span></a>
                           ';
                        }
                        else {
                           echo '
                           <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart fa-2x" style="color: #e6ca6e;"></i><span class="badge badge-warning" id="lblCartCount"> 0 </span></a>
                           ';
                        }
                     ?>
                     <!-- <li><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart fa-xl" style="color: #e8dfb0;"></i></a></li> -->
                   </ul>
               </div>
            </div>
               
         </nav>
<!-- end header section -->