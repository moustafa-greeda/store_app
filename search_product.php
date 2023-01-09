<?php
include ('init/connect.php');
include ('commen_function/function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
    <!-- link file css -->
    <link rel="stylesheet" href="style.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="parent container_fluid p-0 mer-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
            <img style="width: 5%; height: 5%;" src="./images/000749-online-store-logos-design-free-online-E-commerce-cart-logo-maker-02.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="displayall_product.php">products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_erae/user_register.php">register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">total price :100/-</a>
                </li>
            </ul>
            <form class="d-flex" action="" method="get">
                <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
                <input type="submit" name="search_data_product" value="Search" class="btn btn-outline-light">
            </form>
            </div>
        </div>
        </nav>
        <!------------------------- end nav bar --------------------------------------->
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
                    <a class='nav-link active' aria-current='page' href='./user_erae/logout.php'>login</a>
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
        <div class="row me-0">
            <div class="col-md-10">
                <div class="row px-3">
                <!-- fetching product -->
                <?php
                // calling function products
                    search_product();
                    get_unique_cat();
                    get_unique_brand();
                ?>
                    <!-- end product -->
                </div>
            </div>
            <!---------------------------------------- aside ----------------------------->
            <div class="col-md-2 bg-secondary p-0 me-0">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info">
                        <h3 class="nav-link text-light" href="#">Delivary brands</h3>
                    </li>
                    <?php
                    // calling function brands
                    getbrands();
                    ?>
                </ul>
                <!-- end brand -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info">
                        <h3 class="nav-link text-light" href="#">categories</h3>
                    </li>
                    <?php
                    // calling function categories
                    getcategory();
                    ?>
                </ul>
                <!-- endcategories -->
            </div>
        </div>
        <!--------------------------start footer---------------------------------------->
        <?php include('./init/footer.php')?>
    </div>

<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>