<?php
if(isset($_GET['edit_brands'])){
    $edit_id  = $_GET['edit_brands'];
    $get_data = "SELECT * FROM `brands` WHERE id_brand = $edit_id";
    $result   = mysqli_query($con , $get_data);
    $data     = mysqli_fetch_assoc($result);
    $id_brands= $data['id_brand'];
    $titel_brands = $data['brand_titel'];
}
?>
<h3 class="text-center ">Edit Brand</h3>
<p class="text-center">Title Brand</p>
<form action="" method="post" class="mt-5 text-center">
    <div class="input-group flex-nowrap w-50 mb-3 m-auto">
        <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="titel_brand" 
        placeholder="insert categoreis" aria-label="Categoreis" aria-describedby="addon-wrapping"
        value="<?php echo $titel_brands; ?>" required>
    </div> 
    <input type="submit" class="btn border-0 p-2 my-3 m-auto bg-dark text-light text-center" name="update_brand"
    value="update brand"  aria-label="Username" aria-describedby="addon-wrapping">

</form>
<?php
if(isset($_POST['update_brand'])){
    $titel_brands = $_POST['titel_brand'];
    $update_brand   = "UPDATE `brands` SET brand_titel = '$titel_brands' WHERE id_brand = '$edit_id'";
    $result_update     = mysqli_query($con , $update_brand);
    if($result_update){
        echo "<script>alert('updated brand successfuly')</script>";
        echo "<script>window.open('./admin.php' , '_self')</script>";
    }    
}
?>