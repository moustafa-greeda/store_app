<?php
if(isset($_GET['delete_categories'])){
    $get_id =$_GET['delete_categories'];
    // echo $get_id;
    $sql    = "DELETE FROM `categoreis` WHERE id_cat = $get_id";
    $result = mysqli_query($con , $sql);
    if($result){
        echo "<script>alert('deleted category successfuly')</script>";
    }
}
?>