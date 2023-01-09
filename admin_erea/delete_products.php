<?php
if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    $delete_product = "DELETE FROM `products` WHERE id_product = $delete_id";
    $result         = mysqli_query($con , $delete_product);
    if($result){
        echo "<script>alert('deleted product successfuly')</script>";
        echo "<script>window.open('../welcome.php','_self')</script>";
    }
}
?>