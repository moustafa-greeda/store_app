<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark text-light">
        <th>category Id</th>
        <th>category Titel</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
            $get_categories = "SELECT * FROM `categoreis`";
            $result       = mysqli_query($con , $get_categories);
            while($data = mysqli_fetch_assoc($result)){
                $category_id    = $data['id_cat'];
                $category_titel = $data['titel_cat'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number;?></td>
                <td><?php echo $category_titel;?></td>
                <td><a href='admin.php?edit_categories=<?php echo $category_id;?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='admin.php?delete_categories=<?php echo $category_id;?>'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>