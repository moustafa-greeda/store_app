<?php
include('../init/connect.php');
include ('../commen_function/function.php');
error_reporting(0);
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin registeration</title>
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
            <h2 class="text-center m-3">Admin Registeration</h2>
            <div class="col-lg-6 col-xl-5">
                <img src="../images/register.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                <!-- user name -->
                <div class="form-outline mb-4">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="admin_name" id="user_name" autocomplete="off" required>
                </div>
                <!-- email -->
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="admin_email" id="email" autocomplete="off" required>
                </div>
                 <!-- password -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                </div>
                <!-- confirm password -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Coinfirm Password</label>
                    <input type="password" class="form-control" name="con_password" id="password" autocomplete="off" required>
                </div>
                <!-- admin img -->
                <div class="form-outline mb-4">
                    <label for="admin_img" class="form-label">admin image</label>
                    <input type="file" name="admin_img" class="form-control" 
                    placeholder="enter admin img" required autocomplete="off">
                </div>
                <!-- submit -->
                <div class="form-outline mb-4">
                    <input type="submit" class="btn px-5 bg-dark text-light" class="background" name="admin_register" value="register">
                </div>
                <p  class="fw-bold">do you already have account? <a href="./admin_login.php" class="text-danger">login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['admin_register'])){
    $admin_name        = $_POST['admin_name'];
    $admin_email       = $_POST['admin_email'];
    $user_password     = $_POST['password'];
    $password_hash     = password_hash($user_password , PASSWORD_DEFAULT);
    $con_user_password = $_POST['con_password'];
    $con_password_hash = password_hash($con_user_password , PASSWORD_DEFAULT);
    $admin_img         = $_FILES['admin_img']['name'];
    $admin_tmp_img     = $_FILES['admin_img']['tmp_name'];

    if ($user_password == $con_user_password) {
		$sql    = "SELECT * FROM admin_table WHERE admin_name='$admin_name'";
		$result = mysqli_query($con, $sql);

		if (!$result->num_rows > 0) {
            move_uploaded_file($admin_tmp_img  , "./product_images/$admin_img");
			$sql = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password , admin_img)
					VALUES ('$admin_name', '$admin_email', '$password_hash' , '$admin_img')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				$sql = "SELECT admin_name FROM admin_table WHERE admin_email='$admin_email'";
				$result = mysqli_query($con, $sql);
				$row = mysqli_fetch_assoc($result);
				$_SESSION['admin_name'] = $row['admin_name'];

				header('Location: admin.php');
                
				$admin_name = "";
				$admin_email = "";
				$_POST['password'] = "";
				$_POST['con_password'] = "";
                $admin_img = "";
			} else {
				echo "<script>alert('Woops! Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>