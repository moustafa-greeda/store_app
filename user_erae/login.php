<?php
include ('../init/connect.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registeration</title>
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
    <h2 class="text-center pt-3">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6 col-xl-5">
                <img src="../images/register.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-5">
            <form action="" class="" method="post" enctype="multipart/form-data">
                <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="userName" class="form-label">user name</label>
                    <input type="text" name="user_user_name" class="form-control" 
                    placeholder="enter user name" required autocomplete="off">
                </div>
                <!-- user password -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">user password</label>
                    <input type="password" name="password" class="form-control" 
                    placeholder="enter password" required autocomplete="off">
                </div>
                <div class="mt-4 mb-4">
                    <input type="submit" name="login" class="text-light bg-info border-0 px-4 py-2" value="login">
                </div>
                <p class="fw-bold mb-5 mt-3">don't have account ? 
                    <a href="user_register.php" class="text-decoration-none text-danger px-2">register</a>
                </p>
            </form>
        </div>
    </div>
    </div>

<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(isset($_POST['login'])){
        $user_name = $_POST['user_user_name'];
        $password  = $_POST['password'];

        $sql = "SELECT * FROM `user_tabel` WHERE userName = '$user_name'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $_SESSION['userName'] = $user_name ;
            echo "<script>alert('successfuly login')</script>";
            echo "<script>window.open('../welcome.php','_self')</script>";
        }else {
            echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        }
    }
?>