<?php
   include('allMethods.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
                  <h2 class="h3">OTP Verification</h2>
                  <h3 class="fs-6 fw-normal text-secondary m-0">Please Check Your Mail.</h3>
                </div>
              </div>
            </div>
            <form action="" method="post">
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="userotp" id="userotp" placeholder="" required>
                    <label for="userotp" name="userotp" class="form-label">Enter OTP</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-2xl btn-primary" name="verify" type="submit">Check</button>
                  </div>
                </div>
              </div>
            
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-start">
                  <a href="forgetPass.php" class="link-secondary text-decoration-none"><i class="fa-solid fa-angles-left fa-fade"></i>Prev page</a>
                  <!-- <a href="userRegis.php" class="link-secondary text-decoration-none">Register</a> -->
                </div>
              </div>
            </div>
            <div>
            <?php
                $i = 1;
                session_start();
                if(isset($_SESSION['i']))
                {
                    $i = $_SESSION['i'];
                    
                }
                else{
                    $_SESSION['i'] = 1;
                    
                }
                if(isset($_POST['verify']))
                {
                    $userotp = $_POST['userotp'];

                    $otp = $_SESSION['otp'];

                    if($userotp == $otp)
                    {
                        header('location: resetUserPass.php');
                    }
                    else{
                        if($i == 3)
                        {
                            unset($_SESSION['otp']);
                            unset($_SESSION['i']);
                            header('location: userLogin.php?error=1');
                        }
                        else{                           
                            echo "OTP not matched, Try Again ". (3-$i). " left more";
                            $i++;
                            $_SESSION['i'] = $i;
                        }
                    }

                }
            ?>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
   if(isset($_POST['resetPass'])) {
    $email = $_POST['email'];
    $res = sendOTP($email);

    if($res == 1) {
        header('location: otpValidation.php');
    }
    else {
        echo "Something Wrong, Try Again!!";
    }
   }
?>
</body>
</html>