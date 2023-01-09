<?php
include ('init/connect.php');
include ('commen_function/function.php');
session_start();
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart detail</title>
    <!-- link file css -->
    <link rel="stylesheet" href="style.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="parent container_fluid p-0 mer-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
        <img style="width: 5%; height: 5%;" src="./images/000749-online-store-logos-design-free-online-E-commerce-cart-logo-maker-02.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="welcome.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="displayall_product.php">products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="user_erae/register.php">register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#">contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
            </li>
            <li class="nav-item">
            </li>
        </ul>
        </div>
    </div>
    </nav>
<!------------------------- end nav bar --------------------------------------->
<!-- calling cart function -->
        <?php cart(); ?>
<!------------------------- start navbar2 ------------------------------------->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
                if(!isset($_SESSION['userName'])){
                echo "<li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>welcome guest</a>
                </li>";
                }else{
                echo "<li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>welcome ".$_SESSION['userName']."</a>
                </li>";
                }
                if(!isset($_SESSION['userName'])){
                echo "<li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='./user_erae/login.php'>login</a>
                </li>";
                }else{
                echo "<li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='./user_erae/logout.php'>log out</a>
                </li>";
            }
            ?>
            </ul>
        </nav>
<!------------------------- start hidden store ------------------------------->
    <div class="bg-light">
        <h3 class="text-center">hidden store</h3>
        <p class="text-center">communication i at the heart of e-commerce and community</p>
    </div>
<!------------------------ start tabel cart ------------------------------->
<div class="container">
    <div class="row">
        <form action="" method="post" style="min-height: 55vh;">
        <table class="table table-bordered mt-5 text-center">
            <tbody>
<!------------------------------- display daynamkic data -------------------->
<?php
    global $con;
    $ip = getIPAddress();
    $total = 0;
    $sql = "SELECT * FROM `cart_detail` WHERE ip_address ='$ip'";
    $result =  mysqli_query($con , $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "<thead>
        <tr>
            <th>product titel</th>
            <th>product image</th>
            <th>quantity</th>
            <th>total price</th>
            <th>remove</th>
            <th>operations</th>
        </tr>
    </thead>";
    while($row = mysqli_fetch_array($result)){
        $id_product = $row['id_product'];
        $select_query = "SELECT * FROM `products` WHERE id_product ='$id_product'";
        $result_select_query =  mysqli_query($con , $select_query);
        while($rows = mysqli_fetch_array($result_select_query)){
            $product_price = array($rows['product_price']);
            $product_img1  =$rows['product_img3'];
            $product_titel =$rows['product_titel'];
            $price         =$rows['product_price'];
            $value_product_price =array_sum($product_price);
            $total+= $value_product_price;

?>
                <tr>
                    <td><?php echo $product_titel; ?></td> 
                    <td><img src="./images/<?php echo $product_img1 ?>" style="object-fit:contain; width: 80px; height: 60px;" class="cart_img" alt="96"></td>
                    <td><input type="text"  class="form-inpt w-70" name="qty" id=""></td>
                    <?php
                        global $con;
                        $ip = getIPAddress();
                        if(isset($_POST['Update_Cart'])){
                            $quantity   = $_POST['qty'];
                            $update_qty = "UPDATE `cart_detail` SET quantity='$quantity' WHERE ip_address='$ip'";
                            $result_update_qty =  mysqli_query($con , $select_query);
                            $total = $total*$quantity;
                        }
                    ?>
                    <td><?php echo $price ?></td>
                    <td><input type="checkbox" name="removeitems[]" value ="<?php echo $id_product ?>"></td>
                    <td colspan="2">
                        <input type="submit" class="text-secondary bg-info border-0 py-2  px-2 text-center"
                         name="Update_Cart" value="Update Cart">
                        <input type="submit" class="text-secondary bg-info border-0 py-2  px-3"
                         name="Remove_Cart" value="Remove Cart">
                    </td>
                </tr>
<?php
        }
    }}
    else{
        echo "<h2 class='text-center text-danger'>cart is empty</h2>";
    }
?>
            </tbody>
        </table>
        <!-- sub total -->
        <div class="d-flex mb-5">
            <h4 class="px-4 mb-5">sub total: <strong><?php echo $total;?></strong></h4>
            <a href="welcome.php">
                <input type="submit" class="text-secondary bg-info border-0 py-3  px-3 mx-4" name="continu_shopping" value="Continu Shopping">
                <?php
                if(isset($_POST['continu_shopping'])){
                    echo "<script>window.open('welcome.php' , '_self')</script>";
                }
                ?>
            </a>

            <button class="text-secondary bg-secondary border-0 mb-4"><a class="text-light bg-secondary border-0   px-3 mx-4" href="user_erae/checkout.php">check out</a></button>
        
        </div>
    </div>
</div>
</form>
<!-----------------------function to remove items--------------------------->
<?php
function remove_item(){
    global $con;
    if(isset($_POST['Remove_Cart'])){
        foreach($_POST['removeitems'] as $remove_id){
            echo $remove_id;
            $delete_query = "DELETE  FROM `cart_detail` WHERE id_product = '$remove_id'";
            $result = mysqli_query($con , $delete_query);
            if($result){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    } 
}
echo $remove_items = remove_item();
?>
<!--------------------------start footer------------------------------------->
        <?php include('./init/footer.php')?>
    </div>

<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>