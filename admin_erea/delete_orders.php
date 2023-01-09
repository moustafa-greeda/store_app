<?php
if(isset($_GET['delete_orders'])){
    $get_id = $_GET['delete_orders'];
    // echo $get_id;
    $sql = "DELETE FROM `user_orders` WHERE id_order ='$get_id'";
    $result = mysqli_query($con , $sql);
    if($result){
        echo "<script>alert('delete order successfuly')</script>";
        echo "<script>window.open('./admin.php' , '_self')</script>";
    }
}
?>