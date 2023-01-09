<?php
include ('../init/connect.php');
include ('../commen_function/function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <!-- link file css -->
    <link rel="stylesheet" href="../style.css">
    <!-- cdn bootstrab -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x: hidden;
        }
        .parent_img{
            width: 180px;
            height: 180px;
            margin: auto;
            border-radius: 50%;
            overflow: hidden;
        }
        .profile_img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
        <img style="width: 5%; height: 5%;" src="../images/000749-online-store-logos-design-free-online-E-commerce-cart-logo-maker-02.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="../welcome.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="../displayall_product.php">products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="register.php">register</a>
            </li>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="profile.php">my Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#">contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">total price: <?php total_price(); ?> /-</a>
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
                    <a class='nav-link active' aria-current='page' href='login.php'>login</a>
                </li>";
                }else{
                echo "<li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='logout.php'>log out</a>
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
    <div class="row">
            <div class="col-md-2">
                <ul  class="navbar-nav navbar-light bg-secondary text-center">
                    <li class="nav-item py-2 bg-info text-light">
                        <h3>my profile</h3>
                    </li>
                    <?php
                        $user_name = $_SESSION['userName'];
                        $sql       = "SELECT * FROM `user_tabel` WHERE userName = '$user_name'";
                        $result    = mysqli_query($con , $sql);
                        $row_count = mysqli_fetch_array($result);
                        $user_img  = $row_count['user_img'];
                        echo "<li class='nav-item my-4  parent_img'>
                        <img class='profile_img' src='./images_user/$user_img' alt='image profile'>
                        </li>";
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-light p-3" href="profile.php">pending orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light p-3" href="?edit_account">edit account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light p-3" href="?myorders">my orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light p-3" href="?delete_account">delete account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light mb-5" href="logout.php">logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 m-auto">
                <?php
                    get_user_order_detail();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['myorders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                ?>
            </div>
<!--------------------------start footer------------------------------------->
        <?php include('../init/footer.php')?>


<!-- bootstrab js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>