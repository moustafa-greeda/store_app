<?php
include ('../init/connect.php');
include ('../commen_function/function.php');

$id_user = $_GET['id_user'];

// getting total items and total price from all items
$ip_user = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_detail` WHERE ip_address = '$ip_user'";
$result = mysqli_query($con , $cart_query_price);
$invoice_number = mt_rand();
$status = "pending";
$count_product = mysqli_num_rows($result);
while($row_price = mysqli_fetch_array($result)){
    $id_product = $row_price['id_product'];
    $select_product = "SELECT *  FROM `products` WHERE id_product = '$id_product'";
    $result_select_product = mysqli_query($con , $select_product);
    while($row_product_price = mysqli_fetch_array($result_select_product)){
        $product_price = array($row_product_price['product_price']);
        $value_product_price = array_sum($product_price);
        $total_price += $value_product_price;
    }
}
// getting quantity items
$sql_quantity = "SELECT * FROM `cart_detail`";
$result_quantity = mysqli_query($con , $sql_quantity);
$row_quantity = mysqli_fetch_array($result_quantity);
$quantity = $row_quantity['quantity'];
if($quantity == 0){
    $quantity =1;
    $subtotal = $total_price;
}else{
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}
// echo "<script>alert('$total_price')</script>";
// insert orders
$insert_order = "INSERT INTO `user_orders` ( id_user , amount_due , invoice_number ,
total_products , order_data , order_status) VALUES ( '$id_user' , '$subtotal' , '$invoice_number',
'$count_product' , NOW() , '$status')";
$result_insert_order= mysqli_query($con , $insert_order);
if($result_insert_order){
    echo "<script>alert('successfuly order submitted')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
// insert orders order_pending
$insert_order = "INSERT INTO `order_pending` ( id_user , invoice_number , id_product , 
quantity , status ) VALUES ( '$id_user' , '$invoice_number' , '$id_product',
'$quantity' , '$status')";
$result_insert_order= mysqli_query($con , $insert_order);

// delete item from cart
$ip_user = getIPAddress();
$empty_cart = "DELETE FROM `cart_detail` WHERE ip_address = '$ip_user'";
$result_delete_order= mysqli_query($con , $empty_cart);

?>
