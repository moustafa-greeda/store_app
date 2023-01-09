<?php
include ('../init/connect.php');

if(isset($_POST['submit'])){
    $brand_titel = $_POST['brand_titel'];
    // select data from db
    $select_query = "Select * from 	`brands` where brand_titel='$brand_titel'";
    $result = mysqli_query($con , $select_query);
    $num = mysqli_num_rows($result);
    if($num > 0){
        echo "<script>alert('brand already exsit')</script>";
    }else{
        // insert data to db
        $sql = "insert into `brands`(brand_titel) values ('$brand_titel')";
        $result = mysqli_query($con , $sql);

        if($result){
            echo "<script>alert('add brand successful')</script>";
        }  
    }
}
?>
<form action="" method="post" class="mt-5">
    <div class="input-group flex-nowrap w-90 mb-3">
        <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_titel" placeholder="insert brands" aria-label="brands" aria-describedby="addon-wrapping">
    </div> 
    <div class="input-group flex-nowrap w-10 mb-2">
        <input type="submit" class="bg-info p-2 me-3 border-0" name="submit" value="insert brands"  aria-label="Username" aria-describedby="addon-wrapping">
    </div>
</form>