<?php
include('../init/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <!-- link file css -->
    <link rel="stylesheet" href="./admin.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
            <h2 class="text-center m-3">Admin login</h2>
            <div class="col-lg-6 col-xl-5">
                <img src="../images/login.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" autocomplete="off" required>
                </div>
                 <!-- password -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                </div>
                <!-- Submit -->
                <div class="form-outline mb-4">
                    <input type="submit" class="btn px-5 bg-dark text-light" class="" name="login_admin" value="login">
                </div>
                <p  class="fw-bold">don't have an account? <a href="./admin_registeration.php" class="text-danger">register</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- <?php
    if(isset($_POST['login_admin'])){
        $admin_name = $_POST['user_name'];
        $password  = $_POST['password'];

        $sql = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $_SESSION['admin_name'] = $admin_name ;
            echo "<script>alert('successfuly login')</script>";
            echo "<script>window.open('./admin.php','_self')</script>";
        }else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
    }
?> -->
<?php
    if(isset($_POST['login_admin'])){
        $admin_name = $_POST['user_name'];
        $password  = $_POST['password'];

        $sql4 = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
        $result3 = mysqli_query($con, $sql4);
        if ($result3->num_rows > 0) {
            $_SESSION['admin_name'] = $admin_name ;
            // echo "<script>alert('successfuly login')</script>";
            echo "<script>window.open('./admin.php','_self')</script>";
        }
        else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
    }
?>

