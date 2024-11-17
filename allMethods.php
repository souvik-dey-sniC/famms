<?php
    ob_start();
    include('phpmailer/PHPMailerAutoload.php');
    function dbConnect()
    {
        $hostName = "localhost";
        $userName = "root";
        $userPassword = "";
        $dbName = "famms";

        $conn = mysqli_connect($hostName, $userName, $userPassword, $dbName);
        return $conn;
    }

    function countUsers() {
        $conn = dbConnect();
 
         
         if($conn) {
             $sql = "select *from user_regis";
 
             $response = mysqli_query($conn, $sql);

             $records = mysqli_num_rows($response);
 
             return $records;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function countProducts() {
        $conn = dbConnect();
 
         
         if($conn) {
             $sql = "select *from upload_pro";
 
             $response = mysqli_query($conn, $sql);

             $records = mysqli_num_rows($response);
 
             return $records;
         }
         else {
             echo "Database Not Connected";
         }
     }

    function uploadImage($data)
    {
        $conn = dbConnect();
        $type = $data['type'];
        $name = $data['name'];
        $price = $data['price'];
        $stock = $data['stock'];
        $target_dir = "upload/";
        $target_file = $target_dir.basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
        {
            echo "Sorry, Only JPG, PNG, JPEG, GIF files are allowed";
        }
        else if(file_exists($target_file))
        {
            echo "Sorry, This file already exists";
        }
        else
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file))
            {
                $sql = "insert into upload_pro(type, name, price, stock, image) values('$type','$name', '$price', '$stock', '$target_file')";
                $response = mysqli_query($conn, $sql);
                if($response == 1)
                {
                    echo "File Uploaded and Inserted Successfully";
                }
                else
                {
                    echo "Not Inserted";
                }
            }
            else
            {
                echo "There was an error uploading your file";
            }
        }
    }

    function getAllProducts()
    {
        $conn = dbConnect();
        if($conn)
        {
            $sql = "select * from upload_pro";
            $response = mysqli_query($conn, $sql);
            return $response;
        }
        else
        {
            echo "Database not connected";
        }
    }

    function viewAllCartDetails($email) {
        $conn = dbConnect();

        $sql = "select * from cart where email='$email'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function viewCartByProductid($productid) {
        $conn = dbConnect();

        $sql = "select * from upload_pro where productid='$productid'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function increaseCart($cartid) {
        $conn = dbConnect();

        $sql = "update cart set qnt=qnt+1 where cartid='$cartid'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function decreaseCart($cartid) {
        $conn = dbConnect();

        $sql = "update cart set qnt=qnt-1 where cartid='$cartid'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function deleteCartByCartid($cartid) {
        $conn = dbConnect();

        $sql = "delete from cart where cartid='$cartid'";

        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function getAllProductsbycategory($category)
    {
        $conn = dbConnect();
        if($conn)
        {
            $sql = "select * from upload_pro where type='$category'";   // add a column named type in the table to give the products category
            $response = mysqli_query($conn, $sql);
            return $response;
        }
        else
        {
            echo "Database not connected";
        }
    }

    function getPathById($productid)
    {
        $conn = dbConnect();
        
        $sql = "select * from upload_pro where productid='$productid'";

        $response = mysqli_query($conn, $sql);
        
        $data = mysqli_fetch_assoc($response);

        return $data['image'];
    }

    function deleteProduct($productid)
    {
        $conn = dbConnect();
        
        $imagepath = getPathById($productid);
        
        $sql = "delete from upload_pro where productid='$productid'";

        $response = mysqli_query($conn, $sql);

        if($response == 1)
        {
            unlink($imagepath);
        }

        return $response;
    }

    function updateImage($data)
    {
        $conn = dbConnect();
        $productid = $data['productid'];
        $type = $data['type'];
        $name = $data['name'];
        $price = $data['price'];
        $stock = $data['stock'];
        $target_dir = "uploads/";
        if($_FILES['image'] && $_FILES['image']['name'])
        {
            $target_file = $target_dir.basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg")
            {
                echo "Sorry, Only JPG, PNG, GIF, JPEG files are allowd";
            }
            else if(file_exists($target_file))
            {
                echo "Sorry, This file already exists";
            }
            else
            {
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
                {
                    $imagepath = getPathById($productid);
                    unlink($imagepath);
                    $sql = "update upload_pro set type='$type', name='$name', price='$price', stock='$stock', image='$target_file' where productid='$productid'";
                    $response = mysqli_query($conn, $sql);
                    if($response == 1)
                    {
                        echo "The file has been uploaded and updated successfully";
                    }
                    else
                    {
                        echo "Not updated";
                    }
                }
                else
                {
                    echo "There was an error to uploading your file";
                }
            }
        }
        else
        {
            $sql = "update upload_pro set type='$type', name='$name', price='$price', stock='$stock' where productid='$productid'";
            $response = mysqli_query($conn, $sql);
            if($response == 1)
            {
                echo "The product data is updated";
            }
            else
            {
                echo "Not updated";
            }
        }
    }

    function getDataByProductId($pid)
    {
        $conn = dbConnect();
        $sql = "select * from upload_pro where productid='$pid'";
        $response = mysqli_query($conn, $sql);
        return $response;
    }

    function addToCart($pid, $email) {
        $conn = dbConnect();

        //Check that Product already Added by User or Not
        $flag = checkProductInCart($pid, $email);

        if($flag == 1) {
            return 2;
        }
        else {
            $sql = "insert into cart(pid, email, qnt) values('$pid', '$email', '1')";

            $response = mysqli_query($conn, $sql);

            return $response;
        }
    }

    function checkProductInCart($pid, $email) {
        $conn = dbConnect();

        $sql = "select * from cart where pid = '$pid' and email = '$email'";

        $response = mysqli_query($conn, $sql);

        $records = mysqli_num_rows($response);

        if($records > 0) {
            return 1;
        }
        else {
            return 0;
        }
    }

    function countCart($email) {
        $conn = dbConnect();

        $sql = "select * from cart where email = '$email'";

        $response = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($response);

        $records = mysqli_num_rows($response);

        return $records;
    }

    // User Method
    function registerUser($data) {
        $conn = dbConnect();

        $email = $data["email"];
        $name = $data["name"];
        $password = $data["password"];
        $gender = $data["gender"];
        $contact = $data["contact"];

        if($conn) {
            // echo "Database Connected Successfully";
            // $sql = "insert into blooddonor values('$email', '$name', '$address', '$password', '$contact', '$blood_group', '$status')";
            $sql = "insert into user_regis(email, name, password, gender, contact) values('$email', '$name', '$password', '$gender', '$contact')";

            $response = mysqli_query($conn, $sql);

            return $response;
        }
        else {
            echo "Database Not Connected";
        }
    }

    function updateUser($data) {
        $conn = dbConnect();

        $email = $data["email"];
        $name = $data["name"];
        $password = $data["password"];
        $gender = $data["gender"];
        $contact = $data["contact"];
        if($conn) {
            $sql = "update user_regis set name='$name', password='$password', gender='$gender', contact='$contact' where email='$email'";

            $response = mysqli_query($conn, $sql);

            return $response;
        }
        else {
            echo "Database Not Connected";
        }
    }

    function deleteUser($email) {
       $conn = dbConnect();

        
        if($conn) {
            $sql = "delete from user_regis where email='$email'";

            $response = mysqli_query($conn, $sql);

            return $response;
        }
        else {
            echo "Database Not Connected";
        }
    }

    function getAllUsers() {
        $conn = dbConnect();
 
         
         if($conn) {
             $sql = "select *from user_regis";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

    //  function countUsers() {
    //     $conn = dbConnect();
 
         
    //      if($conn) {
    //          $sql = "select *from user_regis";
 
    //          $response = mysqli_query($conn, $sql);

    //          $records = mysqli_num_rows($response);
 
    //          return $records;
    //      }
    //      else {
    //          echo "Database Not Connected";
    //      }
    //  }

     function getUserByEmail($email) {
        $conn = dbConnect();
 
         
         if($conn) {
             $sql = "select *from user_regis where email='$email'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function loginUser($data) {
        $email = $data["email"];
        $password = $data["password"];
        
        $conn = dbConnect();
 
         
         if($conn) {
             $sql = "select *from user_regis where email='$email' and password='$password'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function loginAdmin($data) {
        $email = $data["email"];
        $password = $data["password"];
        
        $conn = dbConnect();
 
         
         if($conn) {
             $sql = "select *from admin where email='$email' and password='$password'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function sendOTP($email) {
        $otp = random_int(100000, 999999);
        session_start();
        $_SESSION['otp'] = $otp;

        $mail = new phpmailer;
		$mail->isSMTP();  //Only enable when use in local server 

		$mail->Host = 'smtp.gmail.com'; //SMTP=>Simple Mail Transfer Protocol
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = 'souvik.de1612@gmail.com'; //company emailid
		$mail->Password = 'cmhnwvfnoejtgpma';

		$mail->setFrom('souvik.de1612@gmail.com', 'SOUVIK'); //company emailid and company name
		$mail->addAddress($email);
		$mail->addReplyTo('souvik.de1612@gmail.com');

        //$filepath = 'my_photo.jpg';
        //$mail->addAttachment($filepath);

		$mail->isHTML(true);
		$mail->Subject = 'OTP for Password Reset';
        $message = "";
        // $message = $message."<img src='my_photo.jpg' width='30%' height='50%'>";
        $message = $message."<h3>Hi, Your OTP(ONE TIME PASSWORD) is ".$otp." Do not share your OTP Your OTP is</h3>"."\n";
        $mail->Body = $message;

		if(!$mail->send())
		{
			return 1;
		}
		else{
            // addContact($data);
			return 0;
		}
     }

     function updatePassword($password) {
        session_start();
        $email = $_SESSION['email'];
        session_destroy();

        $conn = dbConnect();

        $sql = "update user_regis set password='$password' where email='$email'";

        $response = mysqli_query($conn, $sql);

        return $response;
    }
    //Oder Section
    function orderProduct() {
        $conn = dbConnect();

        $email = $_POST['email'];
        $country = $_POST['country'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $contact = $_POST['contact'];
        $nop = $_POST['nop'];
        $tamt = $_POST['tamt'];
        $mop = $_POST['mop'];

        $sql = "insert into product_order(email, country, fname, lname, address, state, zip, contact, noofproducts, totalamount, modeofpayment, status) values('$email', '$country', '$fname', '$lname', '$address', '$state', '$zip', '$contact', '$nop', '$tamt', '$mop', 'Pending')";

        $response = mysqli_query($conn, $sql);

        $orderid = mysqli_insert_id($conn);

        return $orderid;
    }
    
?>