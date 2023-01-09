<h1 class="text-success text-center mt-3">All  Users</h1>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-dark text-light">
        <tr>
            <th>user on</th>
            <th>user name</th>
            <th>email</th>
            <th>user image</th>
            <th>user address</th>
            <th>mobile</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM `user_tabel`";
            $result = mysqli_query($con , $sql);
            $num_row = mysqli_num_rows($result);
            // echo $num_row;
            if($num_row == 0){
                echo "<h2 class='text-danger text-center mt-5'>no user found yet</h2>";
            }else{
                while($data = mysqli_fetch_assoc($result)){
                    $id_user  = $data['id_user '];
                    $userName = $data['userName'];
                    $email = $data['email'];
                    $user_img = $data['user_img'];
                    $user_address = $data['user_address'];
                    $mobile = $data['mobile'];
                    $number++;
                    ?>
                    <tr>
                        <td><?php echo $number ?></td>
                        <td><?php echo $userName ?></td>
                        <td><?php echo $email ?></td>
                        <td><img src='../user_erae/images_user/<?php echo $user_img;?>' style='width:70px; hieght:70;' alt="img user"></td>
                        <td><?php echo $user_address ?></td>
                        <td><?php echo $mobile ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

    </tbody>
</table>