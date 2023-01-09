<?php
// include('./init/connect.php');
//----------------------- function get some product --------------------------------
function get_some_product(){
    global $con;
    // condition to check if is set or not
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    $sql    = "SELECT * FROM `products` ORDER BY rand()";
    $result =  mysqli_query($con , $sql);
    // arry to fetch data
    while($row = mysqli_fetch_assoc($result)){
        // declare variabel
        $id_product          = $row['id_product'];
        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_img1        = $row['product_img1'];
        $product_price       = $row['product_price'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        // print product
        echo  "<div class='col-md-4 mb-4'>
                <div class='card' style='width: 18rem;'>
                    <img id='product_img' style='height: 200px;' src='./admin_erea/product_images/$product_img1 ' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_titel</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price: $product_price /-</p>
                        <a href='welcome.php?add_to_cart=$id_product' class='btn btn-info'>add to cart</a>
                        <a href='product_detail.php?id_product=$id_product'
                        class='btn btn-secondary'>veiw more</a>
                    </div>
                </div>
               </div>";
    }
}
}
}
//----------------------- function get all product --------------------------------
function get_all_product(){
    global $con;
    // condition to check if is set or not
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    $sql    = "SELECT * FROM `products` ORDER BY rand()";
    $result =  mysqli_query($con , $sql);
    // arry to fetch data
    while($row = mysqli_fetch_assoc($result)){
        // declare variabel
        $id_product          = $row['id_product'];
        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_img1        = $row['product_img1'];
        $product_price       = $row['product_price'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        // print product
        echo  "<div class='col-md-4 mb-4'>
                <div class='card' style='width: 18rem;'>
                    <img id='product_img' style='height: 200px;' src='./admin_erea/product_images/$product_img1 ' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_titel</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price: $product_price /-</p>
                        <a href='welcome.php?add_to_cart=$id_product' class='btn btn-info'>add to cart</a>
                        <a href='product_detail.php?id_product=$id_product'
                        class='btn btn-secondary'>veiw more</a>
                    </div>
                </div>
               </div>";
    }
}
}
}
//-------------------- function get unique category-------------------------
function get_unique_cat(){
    global $con;
    // condition to check if is set or not
    if(isset($_GET['category'])){
    $catogery_id = $_GET['category'];
    $sql      = "SELECT * FROM `products` WHERE catogery_id='$catogery_id'";
    $result   =  mysqli_query($con , $sql);
    $num_rows =  mysqli_num_rows($result);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger pt-3'>No Stock For This Category</h2>";
    }
    // arry to fetch data
    while($row = mysqli_fetch_assoc($result)){
        // declare variabel
        $id_product          = $row['id_product'];
        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_img1        = $row['product_img1'];
        $product_price       = $row['product_price'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        // print product
        echo  "<div class='col-md-4 mb-4'>
                <div class='card' style='width: 18rem;'>
                    <img id='product_img' style='height: 200px;' src='./admin_erea/product_images/$product_img1 ' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_titel</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price: $product_price /-</p>
                        <a href='welcome.php?add_to_cart=$id_product' class='btn btn-info'>add to cart</a>
                        <a href='product_detail.php?id_product=$id_product'
                        class='btn btn-secondary'>veiw more</a>
                    </div>
                </div>
               </div>";
    }
}
}
//-------------------- function get unique brand-------------------------
function get_unique_brand(){
    global $con;
    // condition to check if is set or not
    if(isset($_GET['brand'])){
    $brand_id = $_GET['brand'];
    $sql      = "SELECT * FROM `products` WHERE brand_id='$brand_id'";
    $result   =  mysqli_query($con , $sql);
    $num_rows =  mysqli_num_rows($result);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger pt-3'>No Stock For This brand</h2>";
    }
    // arry to fetch data
    while($row = mysqli_fetch_assoc($result)){
        // declare variabel
        $id_product          = $row['id_product'];
        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_img1        = $row['product_img1'];
        $product_price       = $row['product_price'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        // print product
        echo  "<div class='col-md-4 mb-4'>
                <div class='card' style='width: 18rem;'>
                    <img id='product_img' style='height: 200px;' src='./admin_erea/product_images/$product_img1 ' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_titel</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price: $product_price /-</p>
                        <a href='welcome.php?add_to_cart=$id_product' class='btn btn-info'>add to cart</a>
                        <a href='product_detail.php?id_product=$id_product'
                        class='btn btn-secondary'>veiw more</a>
                    </div>
                </div>
               </div>";
    }
}
}
//------------------------------ function get brands ------------------------
function getbrands(){
    global $con;
$sql = "SELECT * FROM `brands`";
$result = mysqli_query($con , $sql);

while($data_row = mysqli_fetch_assoc($result)){
    $brand_id = $data_row['id_brand'];
    $brand_titel = $data_row['brand_titel'];
    echo "<li class='nav-item text-center'>
    <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_titel</a>
    </li>";
}
}
//----------------------- function get categories ---------------------------
function getcategory(){
    global $con;
    $sql = "SELECT * FROM `categoreis`";
    $result = mysqli_query($con , $sql);

    while($data_row = mysqli_fetch_assoc($result)){
        $id_cat    = $data_row['id_cat'];
        $titel_cat = $data_row['titel_cat'];
        echo "<li class='nav-item text-center'>
        <a class='nav-link text-light' href='index.php?category=$id_cat'>$titel_cat</a>
        </li>";
    }
}
// ---------------------- search product function ------------------------------
function search_product(){
global $con;

// condition to check if is set or not
if(isset($_GET['search_data_product'])){
    $value_search = $_GET['search_data'];
    $sql    = "SELECT * FROM `products` WHERE product_keyword LIKE '%$value_search%'";
    $result =  mysqli_query($con , $sql);
    $num_rows =  mysqli_num_rows($result);
    if($num_rows == 0){
        echo "<h2 class='text-center text-danger pt-3'>sorry! this result not found</h2>";
    }
    // arry to fetch data
    while($row = mysqli_fetch_assoc($result)){
        // declare variabel
        $id_product          = $row['id_product'];
        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_img1        = $row['product_img1'];
        $product_price       = $row['product_price'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        // print product
        echo  "<div class='col-md-4 mb-4'>
                <div class='card' style='width: 18rem;'>
                    <img id='product_img' style='height: 200px;' src='./admin_erea/product_images/$product_img1 ' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_titel</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price: $product_price /-</p>
                        <a href='welcome.php?add_to_cart=$id_product' class='btn btn-info'>add to cart</a>
                        <a href='product_detail.php?id_product=$id_product'
                        class='btn btn-secondary'>veiw more</a>
                    </div>
                </div>
               </div>";
    }
}
}
// ---------------------- detail product function ----------------------------
function detail_product(){
global $con;

// condition to check if is set or not
if(isset($_GET['id_product'])){
if(!isset($_GET['category'])){
if(!isset($_GET['brand'])){
    $id_product = $_GET['id_product'];
    $sql    = "SELECT * FROM `products` WHERE id_product='$id_product'";
    $result =  mysqli_query($con , $sql);
    // arry to fetch data
    while($row = mysqli_fetch_assoc($result)){
        // declare variabel
        $id_product          = $row['id_product'];
        $product_titel       = $row['product_titel'];
        $product_description = $row['product_description'];
        $product_img1        = $row['product_img1'];
        $product_img2        = $row['product_img2'];
        $product_img3        = $row['product_img3'];
        $product_price       = $row['product_price'];
        $catogery_id         = $row['catogery_id'];
        $brand_id            = $row['brand_id'];
        // print product
        echo  "<div class='row'>
        <div class='col-md-4 mb-4'>
                <div class='card' style='width: 18rem;'>
                    <img id='product_img' style='height: 250px;' src='./admin_erea/product_images/$product_img1 ' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_titel</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>price: $product_price /-</p>
                        <a href='welcome.php?add_to_cart=$id_product' class='btn btn-info'>add to cart</a>
                        <a href='welcome.php'
                        class='btn btn-secondary'>Go Home</a>
                    </div>
                </div>
               </div>
               <!-- related product -->
               <div class='col-md-8'>
               <div class='row'>
                   <div class='col-md-12'>
                   <h3 class='text-center text-info mb-5'>Related Product</h3>
                   <div class='row'>
                   <div class='col-md-6'>
                       <img class='card-img-top' style='height:300px' src='./admin_erea/product_images/$product_img2' alt=''>
                   </div>
                   <div class='col-md-6'>
                       <img class='card-img-top' style='height:300px' src='./admin_erea/product_images/$product_img3' alt=''>
                   </div>
                   </div>
               </div>
               </div>
               </div>
        </div>";
    }
}
} 
}
}
//------------------------function get ip address ---------------------------- 
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}   
// --------------------- cart function ---------------------------------------
function cart(){
    // condition to check if is set or not
    if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $get_id_product = $_GET['add_to_cart'];
    $sql            = "SELECT * FROM `cart_detail` WHERE ip_address = '$ip' AND
    id_product='$get_id_product'";
    $result =  mysqli_query($con , $sql);
    $num_rows =  mysqli_num_rows($result);
    if($num_rows>0){
        echo "<script>alert('this item already exsit in cart')</script>";
        echo "<script>window.open('welcome.php','_self')</script>";
    }else{
        $sql = "INSERT INTO `cart_detail`(id_product,ip_address,quantity)
        VALUES ('$get_id_product','$ip' , '0')";
        $result = mysqli_query($con , $sql);
        echo "<script>alert('this item added to cart !')</script>";
        echo "<script>window.open('welcome.php','_self')</script>";
    }
}
}
// ---------------------count cart item function ---------------------------------------
function cart_item(){
// condition to check if is set or not
if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();
    $sql            = "SELECT * FROM `cart_detail` WHERE ip_address = '$ip'";
    $result =  mysqli_query($con , $sql);
    $count_num_item =  mysqli_num_rows($result);
    }else{
        global $con;
        $ip = getIPAddress();
        $sql            = "SELECT * FROM `cart_detail` WHERE ip_address = '$ip'";
        $result =  mysqli_query($con , $sql);
        $count_num_item =  mysqli_num_rows($result); 
    }
    echo $count_num_item;
}
// ---------------------total price cart function ---------------------------------------
function total_price(){
    global $con;
    $ip = getIPAddress();
    $total = 0;
    $sql = "SELECT * FROM `cart_detail` WHERE ip_address ='$ip'";
    $result =  mysqli_query($con , $sql);
    while($row = mysqli_fetch_array($result)){
        $id_product = $row['id_product'];
        $select_query = "SELECT * FROM `products` WHERE id_product ='$id_product'";
        $result_select_query =  mysqli_query($con , $select_query);
        while($row = mysqli_fetch_array($result_select_query)){
            $item =$row['product_price'];
            $product_price = array($item);
            $value_product_price =array_sum($product_price);
            $total+= $value_product_price;
        }
    }
    echo $total;
}
// get user order details function
function get_user_order_detail(){
    global $con;
    $user_name = $_SESSION['userName'];
    $sql_user = "SELECT * FROM `user_tabel` WHERE userName = '$user_name'";
    $result_user =  mysqli_query($con , $sql_user);
    while($row = mysqli_fetch_array($result_user)){
        $id_user = $row['id_user'];

        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['myorders'])){
                if(!isset($_GET['delete_account'])){
                    $sql_order = "SELECT * FROM `user_orders` WHERE id_user = '$id_user'
                    AND order_status = 'pending'";
                    $result_order =  mysqli_query($con , $sql_order);
                    $row = mysqli_fetch_array($result_order);
                    $count = mysqli_num_rows($result_order);
                    if($count > 0){
                        echo "<div class='text-center'><h3 class='text-center text-success mt-5'>you have an <span class='text-danger'> $count </span> 
                        orders pending</h3>
                        <a href='profile.php?myorders' class='text-center'>product details</a> </div>";
                    }else{
                        echo "<h3 class='text-center mt-5'>you have an <span class='text-danger'> $count </span> 
                        orders pending</h3>";
                    }
                }
            }
        }
    }
}
?>