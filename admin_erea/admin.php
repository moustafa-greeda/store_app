<?php
include('../init/connect.php');
include ('../commen_function/function.php');
error_reporting(0);
session_start();
// echo "<script>alert('".$_SESSION['admin_name']."')</script>";
if (!isset($_SESSION['admin_name'])) {
    header("Location: ./admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <!-- link file css -->
    <link rel="stylesheet" href="./admin.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .edit-img{
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 mer-0">
        <!------------------------------- navbar -------------------------------------->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark rext-light" class="background">
            <div class="container-fluid">
                <img style="width: 5%; height:5%;" id="logo_admin" src="../images/000749-online-store-logos-design-free-online-E-commerce-cart-logo-maker-02.png" alt="logo_admin">
                <nav class="navbar-expand-lg">
                    <ul class="navbar-nav text-light">
                        <?php
                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item '><a href='' class='nav-link text-light'>welcom guest</a></li>";
                        }
                        else {
                            echo "<li class='nav-item text-light'><a href='' class='nav-link text-light'>welcom ".$_SESSION['admin_name']."</a></li>";
                        }
                        ?>
                        
                    </ul>
                </nav>
            </div>
        </nav>
    <!------------------------------- start navbar2 ------------------------------------>
    <div class="bg-light">
        <h3 class="text-center p-2">
            mange details
        </h3>
    </div>
    <!--------------------------start dashboard---------------------------------------->
    <div class="row me-0">
        <div class="col-md-12 bg-secondary p-1 d-flex algin-items-center">
            <div class="p-5">
                <!-- <?php
                    $admin_name = $_SESSION['admin_name'];
                    $sql = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
                    $result = mysqli_query($con , $sql);
                    $data = mysqli_fetch_assoc($result);
                    $admin_img = $data['admin_img'];
                    echo "<a href='#'>
                    <img class='admin-img' src='../images/$admin_img' alt= 'profile'>
                    </a>"
                ?> -->
                <p class="text-light text-center"><?php echo $_SESSION['admin_name']?></p>
            </div>
            <div class="button text-center">
                <button class="my-3">
                    <a href="insert_product.php" class="nav-link text-light bg-primary my-1">insert products</a>
                </button>
                <button>
                    <a href="admin.php?view_products" class="nav-link text-light bg-primary my-1">view products</a>
                </button>
                <button>
                    <a href="admin.php?insertCategoreis" class="nav-link text-light bg-primary my-1">insert catogeries</a>
                </button>
                <button>
                    <a href="admin.php?view_categories" class="nav-link text-light bg-primary my-1">view categories</a>
                </button>
                <button>
                    <a href="admin.php?brands" class="nav-link text-light bg-primary my-1">insert brands</a>
                </button>
                <button>
                    <a href="admin.php?view_brands" class="nav-link text-light bg-primary my-1">view brands</a>
                </button>
                <button>
                    <a href="admin.php?list_orders" class="nav-link text-light bg-primary my-1">all orders</a>
                </button>
                <button>
                    <a href="admin.php?list_payment" class="nav-link text-light bg-primary my-1">all payments</a>
                </button>
                <button>
                    <a href="admin.php?list_users" class="nav-link text-light bg-primary my-1">list users</a>
                </button>
                <button>
                    <a href="admin.php?logout" class="nav-link text-light bg-primary my-1">logout</a>
                </button>
            </div>
        </div>
    </div>
    <!-------------------------- php code ------------------------------------------->
    <div class="container" style="min-height: 45vh;">
        <?php
           if(isset($_GET["insertCategoreis"])){
               include ('insertCategoreis.php');
           }
           elseif(isset($_GET["brands"])){
               include ('brands.php');
           }
           elseif(isset($_GET["view_products"])){
            include ('view_products.php');
           }
           elseif(isset($_GET["edit_products"])){
            include ('edit_products.php');
           }
           elseif(isset($_GET["delete_products"])){
            include ('delete_products.php');
           }
           elseif(isset($_GET["view_categories"])){
            include ('view_categories.php');
           }
           elseif(isset($_GET["edit_categories"])){
            include ('edit_categories.php');
           }
           elseif(isset($_GET["delete_categories"])){
            include ('delete_categories.php');
           }
           elseif(isset($_GET["view_brands"])){
            include ('view_brands.php');
           }
           elseif(isset($_GET["edit_brands"])){
            include ('edit_brands.php');
           }
           elseif(isset($_GET["delete_brands"])){
            include ('delete_brands.php');
           }
           elseif(isset($_GET["list_orders"])){
            include ('list_orders.php');
           }
           elseif(isset($_GET["delete_orders"])){
            include ('delete_orders.php');
           }
           elseif(isset($_GET["list_users"])){
            include ('list_users.php');
           }
           elseif(isset($_GET["list_payment"])){
            include ('list_payment.php');
           }
           elseif(isset($_GET["logout"])){
            include ('logout.php');
           }
           
        ?>
    </div>
    <!--------------------------start footer------------------------------------------->
    </div>
    <?php include('../init/footer.php');?>
<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>