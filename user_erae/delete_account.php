<h2 class="rext-success text-center">delete account</h2>
<form action="" method="post">
    <div class="form-outline">
        <input type="submit" name="delete" value="delete account" class="form-control mt-4 w-50 m-auto">
    </div>
    <div class="form-outline">
        <input type="submit" name="dont_delete" value="don't delete account" class="form-control mt-4  w-50 m-auto">
    </div>
</form>
<?php
    $user_name = $_SESSION['userName'];
    if(isset($_POST['delete'])){
    $sql = "DELETE FROM `user_tabel` WHERE userName = '$user_name'";
    $result = mysqli_query($con , $sql);
    if($result){
        session_destroy();
        echo "<script>window.open('../welcome.php' , '_self')</script>";
    }
}
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php' , '_self')</script>";
}
?>