<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark text-light">
        <th>brand Id</th>
        <th>brand Titel</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
            $get_brands = "SELECT * FROM `brands`";
            $result       = mysqli_query($con , $get_brands);
            while($data = mysqli_fetch_assoc($result)){
                $brand_id    = $data['id_brand'];
                $brand_titel = $data['brand_titel'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number;?></td>
                <td><?php echo $brand_titel;?></td>
                <td><a href='admin.php?edit_brands=<?php echo $brand_id;?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='admin.php?delete_brands=<?php echo $brand_id;?>'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>