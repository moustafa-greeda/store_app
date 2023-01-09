<?php
include ('../init/connect.php');

if(isset($_POST['submit'])){
    $titel_cat = $_POST['titel_catergoreis'];
    // select data from db
    $select_query = "Select * from 	`categoreis` where titel_cat='$titel_cat'";
    $result = mysqli_query($con , $select_query);
    $num = mysqli_num_rows($result);
    if($num > 0){
        echo "<script>alert('category already exsit')</script>";
    }else{
        // insert data to db
        $sql = "insert into `categoreis`(titel_cat) values ('$titel_cat')";
        $result = mysqli_query($con , $sql);

        if($result){
            echo "<script>alert('add category successful')</script>";
        }  
    }
}
?>
<form action="" method="post" class="mt-5">
    <div class="input-group flex-nowrap w-90 mb-3">
        <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="titel_catergoreis" placeholder="insert categoreis" aria-label="Categoreis" aria-describedby="addon-wrapping" required>
    </div> 
    <div class="input-group flex-nowrap w-10 mb-2">
        <input type="submit" class="border-0 p-2 my-3 bg-info" name="submit" value="insert categoreis"  aria-label="Username" aria-describedby="addon-wrapping">
    </div>
</form>