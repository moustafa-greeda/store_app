<?php
include ('../init/connect.php');
include ('../commen_function/function.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registeration</title>
    <!-- link file css -->
    <link rel="stylesheet" href="style.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="overflow-x: hidden;">
    <div class="parent container_fluid p-0 mer-0">
    <!--------------------------start footer---------------------------------------->
    <h2 class="text-center pt-3"> User Registeration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6 col-xl-5">
                <img src="../images/register.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-10 col-xl-4">
            <form action="" class="" method="post" enctype="multipart/form-data">
                <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="userName" class="form-label">user name</label>
                    <input type="text" name="user_user_name" class="form-control" value="<?php echo $user_name?>"
                    placeholder="enter user name" required autocomplete="off">
                </div>
                <!-- user email -->
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">email</label>
                    <input type="email" name="user_email" class="form-control" 
                    placeholder="enter email" required autocomplete="off">
                </div>
                <!-- user password -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">user password</label>
                    <input type="password" name="user_password" class="form-control" 
                    placeholder="enter password" required autocomplete="off">
                </div>
                <!-- user confirm password -->
                <div class="form-outline mb-4">
                    <label for="con_password" class="form-label">confirm password</label>
                    <input type="password" name="con_user_password" class="form-control" 
                    placeholder="confirm password" required autocomplete="off">
                </div>
                <!-- user img -->
                <div class="form-outline mb-4">
                    <label for="user_img" class="form-label">user image</label>
                    <input type="file" name="user_img" class="form-control" 
                    placeholder="enter user img" required autocomplete="off">
                </div>
                <!-- user address -->
                <div class="form-outline mb-4">
                    <label for="address" class="form-label">user address</label>
                    <input type="text" name="address" class="form-control" 
                    placeholder="enter your address" required autocomplete="off">
                </div>
                <!-- user mobile -->
                <div class="form-outline mb-4">
                    <label for="mobile" class="form-label">contact</label>
                    <input type="text" name="mobile" class="form-control" 
                    placeholder="enter your mobile" required autocomplete="off">
                </div>
                <div class="mt-4 mb-4">
                    <input type="submit" name="register" class="text-light bg-dark border-0 px-4 py-2" value="Register">
                </div>
                <p class="fw-bold mb-5 mt-3">alraey have account? <a href="login.php" class="text-decoration-none text-danger px-2">login</a></p>
            </form>
        </div>
    </div>
    </div>

<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['register'])){
    $user_name = $_POST['user_user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $password_hash = password_hash($user_password , PASSWORD_DEFAULT);
    $con_user_password = $_POST['con_user_password'];
    $con_password_hash = password_hash($con_user_password , PASSWORD_DEFAULT);
    $user_img = $_FILES['user_img']['name'];
    $user_tmp_img = $_FILES['user_img']['tmp_name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $ip_user = getIPAddress();

    // select data
    $select_query = "SELECT * FROM `user_tabel` WHERE userName = '$user_name' OR email='$user_email'";
    $result_select = mysqli_query($con , $select_query);
    $row_count = mysqli_num_rows($result_select);
    if($row_count > 0){
        echo "<script>alert('user name or email not valid')</script>";
    }elseif($user_password !== $con_user_password ){
        echo "<script>alert('password not matched')</script>";
    }else{
    // insert data
    move_uploaded_file($user_tmp_img  , "./images_user/$user_img");
    $ip_user = getIPAddress();
    $sql = "INSERT INTO `user_tabel` (userName , email , password_user , con_password_user , user_img , ip_address , user_address , mobile)
    VALUES ('$user_name' , '$user_email' , '$password_hash' , '$con_password_hash' , '$user_img' , '$ip_user' , '$address' , '$mobile')";
    $result = mysqli_query($con , $sql);
    if($result){
        echo "<script>alert('good added')</script>";
    }else{
        echo "<script>alert('not !!!!!!!! added')</script>";
    }
    }
    // select cart items
    $select_cart = "SELECT * FROM `cart_detail` WHERE ip_address = '$ip' ";
    $result = mysqli_query($con , $select_cart);
    $row_count = mysqli_num_rows($result);
    if($row_count > 0){
        $_SESSION['userName'] = $user_name;
        echo "<script>alert('you have item in your cart')</script>";
        echo "<script>window.open('checkout.php' , '_self')</script>";
    }else{
        $_SESSION['userName'] = $user_name;
        echo "<script>window.open('../welcome.php' , '_self')</script>";
    }
}
?>