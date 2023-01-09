<?php
include ('../init/connect.php');
session_start();
// error_reporting(0);
$_GET['id_order'];
if(isset($_GET['id_order'])){
    $id_order = $_GET['id_order'];
    $sql      = "SELECT * FROM `user_orders` WHERE id_order = '$id_order'";
    $result   = mysqli_query($con , $sql);
    $data     = mysqli_fetch_assoc($result);
    $invoice_number = $data['invoice_number'];
    $amount_due    = $data['amount_due'];
}

if(isset($_POST['confirm'])){
    $invoice_number = $_POST['invoice_number'];
    $amount_due     = $_POST['amount'];
    $payment_mode   = $_POST['payment_mode'];
    echo $sql_insert = "INSERT INTO `user_payments`(id_order , invoice_number , amount , payment_mode)
    VALUES('$id_order','$invoice_number','$amount_due', '$payment_mode')";
    $result_insert   = mysqli_query($con , $sql_insert);
    if($result_insert){
        echo "<h2 class='text-center text-info'>successfuly payment</h2>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }else{
        echo "bad";
    }
    $sql_update = "UPDATE `user_orders` SET order_status = 'completed' WHERE id_order = '$id_order'";
    $result_update   = mysqli_query($con , $sql_update);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm payment</title>
    <!-- link file css -->
    <link rel="stylesheet" href="style.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >
    <div class="container my-5">
        <form action="" method="post">
            <h2 class="text-center ">confirm payment</h2>
        <!-- invoice_number -->
        <div class="form-outline text-center my-4 w-50 m-auto">
        <label for="invoice_number" class=" mb-2">invoice number</label>
            <input type="text" name="invoice_number" id="invoice_number" class="form-control" value="<?php echo $invoice_number;?>"
            required autocomplete="off">
        </div>
        <!-- amount -->
        <div class="form-outline text-center  my-4 w-50 m-auto">
            <label for="amount" class=" mb-2">amount</label>
            <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $amount_due;?>"
            required autocomplete="off">
        </div>
        <!-- payment option -->
        <div class="form-outline text-center  my-4 w-50 m-auto">
            <select name="payment_mode" class="form-select" required>
                <option >select payment more</option>
                <option >upi</option>
                <option >paybal</option>
                <option >cashbanking</option>
                <option >netBnaking</option>
                <option >payoffline</option>
            </select>
        </div>
        <!-- submit -->
        <div class="form-outline text-center  my-4 w-50 m-auto">
            <input type="submit" name="confirm" class="bg-info border-0 px-5 py-2 mt-4 text-light" 
            value="confirm">
        </div>
        </form>
    </div>
</body>
</html>
