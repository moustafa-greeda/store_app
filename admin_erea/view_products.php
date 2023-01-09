<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark text-light">
        <th>Product Id</th>
        <th>Product Titel</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
            $get_products = "SELECT * FROM `products`";
            $result       = mysqli_query($con , $get_products);
            while($data = mysqli_fetch_assoc($result)){
                $product_id    = $data['id_product'];
                $product_titel = $data['product_titel'];
                $product_img1  = $data['product_img1'];
                $product_price = $data['product_price'];
                $status        = $data['status'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number;?></td>
                <td><?php echo $product_titel;?></td>
                <td><img style='width:50px; height:50px;' src='./product_images/<?php echo $product_img1;?>'></td>
                <td><?php echo $product_price;?></td>
                <td>
                   <?php
                        $get_count    = "SELECT * FROM order_pending WHERE id_product =$product_id";
                        $result_count = mysqli_query($con , $get_count);
                        $count_row    = mysqli_num_rows($result_count);
                        echo $count_row;
                   ?>
                </td>
                <td><?php echo $status;?></td>
                <td><a href='admin.php?edit_products=<?php echo $product_id;?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='admin.php?delete_products=<?php echo $product_id;?>'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>