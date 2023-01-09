<?php
 include('../init/connect.php');
//  check insert product
if(isset($_POST['insert_product'])){
    
    // Declare variabel 
    $product_titel       = $_POST['product_titel'];
    $product_description = $_POST['product_description'];
    $product_keyword     = $_POST['product_keyword'];
    $select_catogery     = $_POST['select_catogery'];
    $select_brand        = $_POST['select_brand'];
    $product_price       = $_POST['product_price'];
    $product_status      = 'true';
    
    // asseccimg img 
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    // asseccimg img tmp name
    $tmp_product_img1 = $_FILES['product_img1']['tmp_name'];
    $tmp_product_img2 = $_FILES['product_img2']['tmp_name'];
    $tmp_product_img3 = $_FILES['product_img3']['tmp_name'];
    
    // check empty condition
    if($product_titel =='' | $product_description=='' | $product_keyword=='' | $select_catogery==''
    | $select_brand=='' | $product_price=='' | $product_img1=='' | $product_img2=='' | $product_img3==''){
        echo "<script>alert('Please! fill all availabel field')</script>";
        exit();
    }else{
        move_uploaded_file($tmp_product_img1 , "./product_images/$product_img1");
        move_uploaded_file($tmp_product_img2 , "./product_images/$product_img2");
        move_uploaded_file($tmp_product_img3 , "./product_images/$product_img3");

        // insert query
        $sql = "INSERT INTO `products`(product_titel,product_description,product_keyword,
        catogery_id,brand_id,product_img1, product_img2,product_img3,product_price,date,status)
        VALUES ('$product_titel ','$product_description','$product_keyword','$select_catogery',
        '$select_brand','$product_img1','$product_img2','$product_img3','$product_price',NOW(),
        '$product_status')";
        $result = mysqli_query($con , $sql);
        if($result){
            echo "<script>alert('add product successfuly')</script>";
        }else{
            echo "<script>alert('add product faild!')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product</title>
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-4">insert product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product titel -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-titel" class="form-label">product titel</label>
                <input type="text" class="form-control" name="product_titel" id="product-titel" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-description" class="form-label">product description</label>
                <input type="text" class="form-control" name="product_description" id="product-description" autocomplete="off" required>
            </div>
            <!-- product key word -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keyword" class="form-label">product keyword</label>
                <input type="text" class="form-control" name="product_keyword" id="keyword" autocomplete="off" required>
            </div>
            <!-- select category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-select" name="select_catogery" id="">
                    <?php
                        $sql    = "SELECT * FROM `categoreis`";
                        $result = mysqli_query($con , $sql);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $id_cat     = $row['id_cat'];
                            $tittel_cat = $row['titel_cat'];
                            echo "<option value='$id_cat '>$tittel_cat</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- select category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select class="form-select" name="select_brand" id="">
                    <?php
                        $sql    = "SELECT * FROM `brands`";
                        $result = mysqli_query($con , $sql);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $id_brand    = $row['id_brand'];
                            $brand_titel = $row['brand_titel'];
                            echo " <option value='$id_brand'>$brand_titel</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- imag 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img1" class="form-label">product img 1</label>
                <input type="file" class="form-control" name="product_img1" id="keyword" required>
            </div>
            <!-- imag 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img2" class="form-label">product img 2</label>
                <input type="file" class="form-control" name="product_img2" id="keyword" required>
            </div>
            <!-- imag 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_img3" class="form-label">product img 3</label>
                <input type="file" class="form-control" name="product_img3" id="keyword" required>
            </div>
            <!-- product price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">product price</label>
                <input type="text" class="form-control" name="product_price" id="product_price" autocomplete="off" required>
            </div>
            <!-- product submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="btn btn-info" name="insert_product" value="insert product">
            </div>
        </form>
    </div>

<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>