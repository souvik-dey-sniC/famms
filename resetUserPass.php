<?php
   include('allMethods.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset User Password</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/password-resets/password-reset-6/assets/css/password-reset-6.css">
</head>
<body>
    <!-- Password Reset 6 - Bootstrap Brain Component -->
<section class="bg-primary p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
        <div class="card border-0 shadow-sm rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2 class="h3">Update Password</h2>
                 
                </div>
              </div>
            </div>
            <form action="" method="post">
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="" required>
                    <label for="password" name="password" class="form-label">Enter New Password</label>
                  </div>
                </div>
                <!-- <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="" required>
                    <label for="password" name="cpassword" class="form-label">Confirm Password</label>
                  </div>
                </div> -->
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-2xl btn-primary" name="resetPass" type="submit">Reset Password</button>
                  </div>
                </div>
              </div>
            
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-start">
                <a href="otpValidation.php" class="link-secondary text-decoration-none"><i class="fa-solid fa-angles-left fa-fade"></i>Prev page</a>
                <a href="userLogin.php" class="link-secondary text-decoration-none">Login<i class="fa-solid fa-angles-right fa-fade"></i></a>
                  <!-- <a href="userRegis.php" class="link-secondary text-decoration-none">Register</a> -->
                </div>
                
              </div>
            </div>
            <?php
                if(isset($_POST['updatePass']))
                {
                    $password = $_POST['password'];
                      $res = updatePassword($password);

                      if($res == 1)
                      {
                          echo "Your Password is Updated";
                      }
                      else{
                        echo "Somthing wrong, Try Again";
                      }
                }
           
            ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>

<!-- $cpassword = $_POST['cpassword'];
                    if($password == $cpassword)
                    {
                      $res = updatePassword($password);

                      if($res == 1)
                      {
                          echo "Your Password is Updated";
                      }
                      else{
                        echo "Somthing wrong, Try Again";
                      }
                    }
                    else{
                      echo "Password Not Matched, Try Again";
                    } -->