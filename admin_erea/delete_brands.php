<?php
if(isset($_GET['delete_brands'])){
    $get_id = $_GET['delete_brands'];
    $delete_brand  = "DELETE FROM `brands` WHERE id_brand = $get_id";
    $result = mysqli_query($con , $delete_brand);
    echo $delete_brand;
    if($result){
        echo "<script>alert('successfuly delete brand');</script>";
        echo "<script>window.open('admin.php','_self')</script>";
    }
}
?>