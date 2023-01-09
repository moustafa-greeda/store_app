<?php
include ('../init/connect.php');
include ('../commen_function/function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- php code to access user id -->
    <?php
    $ip_user = getIPAddress() ;
    // $user_name = $_SESSION['userName'];

    // $sql = "SELECT * FROM `user_tabel` WHERE ip_address = '$ip_user'";-------------------------
    $sql = "SELECT * FROM `user_tabel` WHERE ip_address = '$ip_user'";
    $result= mysqli_query($con , $sql);
    $row = mysqli_fetch_array($result);
    $id_user = $row['id_user'];
    ?>
<div class="container">
    <h2 class="text-center m-4">payment option</h2>
    <div class="row d-flex align-items-center justify-content-center mb-5">
       <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img style="width: 90%; margin-left:10%;" src="../images/paypal.3-810x524.jpg" alt="paypal"></a>
       </div>
       <div class="col-md-6">
            <a href="order.php?id_user=<?php echo $id_user?>" target="_blank" class="text-center"><h2>pay offline</h2></a>
       </div>
    </div>
</div>
<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>