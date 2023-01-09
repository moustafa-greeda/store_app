<?php
    if(isset($_GET['edit_products'])){
        $edit_id = $_GET['edit_products'];
        // echo $edit_id;
        $get_data = "SELECT * FROM `products` WHERE id_product = $edit_id";
        $result   = mysqli_query($con , $get_data);
        $row      = mysqli_fetch_assoc($result);

        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_keyword     = $row['product_keyword'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        $product_img1        = $row['product_img1'];
        $product_img2        = $row['product_img2'];
        $product_img3        = $row['product_img3'];
        $product_price       = $row['product_price'];

        // fetching category name
        $sel_category = "SELECT * FROM `categoreis` WHERE id_cat = $catogery_id";
        $result_category = mysqli_query($con , $sel_category);
        $row_category    = mysqli_fetch_assoc($result_category);
        $category_title  = $row_category['titel_cat'];

        // fetching brand name
        $sel_brand       = "SELECT * FROM `brands` WHERE id_brand  = $brand_id";
        $result_brand    = mysqli_query($con , $sel_brand);
        $row_brand       = mysqli_fetch_assoc($result_brand);
        $brand_title     = $row_brand['brand_titel'];
}
?>
<div class="container mt-5">
    <h3 class="text-center">Edit product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_title" class="form-lable">Product Title</label>
            <input type="text" class="form-control" value="<?php echo $product_description?>" id="product_title" name="product_title" required>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_desc" class="form-lable">Product Description</label>
            <input type="text" class="form-control" value="<?php echo $product_titel?>" id="product_desc" name="product_desc" required>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_keyword" class="form-lable">Product Keyword</label>
            <input type="text" class="form-control" value="<?php echo $product_keyword?>" id="product_keyword" name="product_keyword" required>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <select class="form-select" name="product_category" id="product_category">
                <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                <?php
                    // fetching all categoreis name
                    $sel_category_all       = "SELECT * FROM `categoreis`";
                    $result_category_all    = mysqli_query($con , $sel_category_all);
                    while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                        $category_id        = $row_category_all['id_cat'];
                        $category_title     = $row_category_all['titel_cat'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <select class="form-select" name="product_brands" id="product_brands">
                <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
                <?php
                    // fetching all brand name
                    $sel_brand_all       = "SELECT * FROM `brands`";
                    $result_brand_all    = mysqli_query($con , $sel_brand_all);
                    while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                        $brand_id        = $row_brand_all['id_brand '];
                            $brand_title     = $row_brand_all['brand_titel'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_img1" class="form-lable">Product Image1</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_img1" name="product_img1" required>
                <img src="./product_images/<?php echo $product_img1?>" class="edit-img" alt="product_img1">
            </div>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_img2" class="form-lable">Product Image2</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto"  id="product_img2" name="product_img2" required>
                <img src="./product_images/<?php echo $product_img2?>" class="edit-img" alt="product_img2">
            </div>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_img3" class="form-lable">Product Image3</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" id="product_img3" name="product_img3" required>
                <img src="./product_images/<?php echo $product_img3?>" class="edit-img" alt="product_img3">
            </div>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_price" class="form-lable">Product Price</label>
            <input type="text" class="form-control" value="<?php echo $product_price?>" id="product_price" name="product_price" required>
        </div>
        <div class="text-center">
            <input type="submit" class="btn px-3 mb-3" name="product_edit" value="Update Product">
        </div> 
    </form>
</div>
<?php
    if(isset($_POST['product_edit'])){
        $product_titel         = $_POST['product_title'];
        $product_description   = $_POST['product_desc'];
        $catogery_id           = $_POST['product_category'];
        $brand_id              = $_POST['product_brands'];
        $product_price         = $_POST['product_price'];

        $product_img1          = $_FILES['product_img1']['name'];
        $product_img2          = $_FILES['product_img2']['name'];
        $product_img3          = $_FILES['product_img3']['name'];

        $product_img1_tmp     = $_FILES['product_img1']['tmp_name'];
        $product_img2_tmp     = $_FILES['product_img2']['tmp_name'];
        $product_img3_tmp     = $_FILES['product_img3']['tmp_name'];

    if($product_titel=='' or $product_description=='' 
    or $product_price==''or $product_img1=='' or $product_img2=='' or $product_img3=='' ){
        echo "<script>alert('error 100')</script>";
    }else{
        move_uploaded_file($product_img1_tmp , "./product_images/$product_img1");
        move_uploaded_file($product_img2_tmp , "./product_images/$product_img2");
        move_uploaded_file($product_img3_tmp , "./product_images/$product_img3");
        
        //query to update product 
        $update_product ="UPDATE `products` SET product_titel='$product_titel' , 
        product_description='$product_description',product_keyword='$product_keyword',
        catogery_id='$catogery_id',brand_id='$brand_id',product_img1='$product_img1',
        product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',date=NOW()
        WHERE id_product='$edit_id'";

        $res_update = mysqli_query($con , $update_product);
        if($res_update){
            echo "<script>alert('successfuly updated product')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
        else{
            echo "<script>alert('error 300')</script>";
            echo $update_product;
        }
    }
}
?>