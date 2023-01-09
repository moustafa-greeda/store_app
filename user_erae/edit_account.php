<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">edit account</h3>
    <form action="" method="post" enctype="multipart/form-data" class= "col-md-10  w-40 m-auto">
        <!-- user name -->
        <div class="form-outline mb-4">
            <input type="text" name="user_user_name" class="form-control" value="<?php echo $user_name?>"
            placeholder="enter user name" required autocomplete="off">
        </div>
        <!-- user email -->
        <div class="form-outline mb-4">
            <input type="email" name="user_email" class="form-control" 
            placeholder="enter email" required autocomplete="off">
        </div>
        <!-- user img -->
        <div class="form-outline mb-4">
            <input type="file" name="user_img" class="form-control" 
            placeholder="enter user img" required autocomplete="off">
            <!-- <img src="./images_user/<?php $user_img?>" alt="edit_img" class="edit_img"> -->
        </div>
        <!-- user address -->
        <div class="form-outline mb-4">
            <input type="text" name="address" class="form-control" 
            placeholder="enter your address" required autocomplete="off">
        </div>
        <!-- user mobile -->
        <div class="form-outline mb-4">
            <input type="text" name="mobile" class="form-control" 
            placeholder="enter your mobile" required autocomplete="off">
        </div>
        <div class="text-center mt-4 mb-4">
            <input type="submit" name="edit_account" class="text-light  bg-info border-0 px-4 py-2" value="edit account">
        </div>
    </form>
</body>
</html>