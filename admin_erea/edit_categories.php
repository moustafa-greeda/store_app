<?php
if(isset($_GET['edit_categories'])){
    $edit_id  = $_GET['edit_categories'];
    $get_data = "SELECT * FROM `categoreis` WHERE id_cat = $edit_id";
    $result   = mysqli_query($con , $get_data);
    $data     = mysqli_fetch_assoc($result);
    $id_catergoreis = $data['id_cat'];
    $titel_catergoreis = $data['titel_cat'];
}
?>
<h3 class="text-center ">Edit category</h3>
<p class="text-center">Title category</p>
<form action="" method="post" class="mt-5 text-center">
    <div class="input-group flex-nowrap w-50 mb-3 m-auto">
        <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="titel_catergoreis" 
        placeholder="insert categoreis" aria-label="Categoreis" aria-describedby="addon-wrapping"
        value="<?php echo $titel_catergoreis; ?>" required>
    </div> 
    <input type="submit" class="border-0 p-2 my-3 bg-dark text-light" name="update_category"
    value="update categoreis"  aria-label="Username" aria-describedby="addon-wrapping">
</form>
<?php
if(isset($_POST['update_category'])){
    $titel_catergoreis = $_POST['titel_catergoreis'];
    $update_category   = "UPDATE `categoreis` SET titel_cat = '$titel_catergoreis' WHERE id_cat = '$edit_id'";
    $result_update     = mysqli_query($con , $update_category);
    if($result_update){
        echo "<script>alert('updated category successfuly')</script>";
        echo "<script>window.open('./admin.php' , '_self')</script>";
    }    
}
?>