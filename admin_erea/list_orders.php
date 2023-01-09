<h1 class="text-success text-center mt-3">All Orders</h1>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-dark text-light">
        <tr>
            <th>order on</th>
            <th>price</th>
            <th>invoice number</th>
            <th>total product</th>
            <th>order date</th>
            <th>status</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM user_orders";
            $result = mysqli_query($con , $sql);
            $num_row = mysqli_num_rows($result);
            // echo $num_row;
            if($num_row == 0){
                echo "<h2 class='text-danger text-center mt-5'>no order found yet</h2>";
            }else{
                while($data = mysqli_fetch_assoc($result)){
                    $id_order = $data['id_order'];
                    $id_user = $data['id_user'];
                    $amount_due = $data['amount_due'];
                    $invoice_number = $data['invoice_number'];
                    $total_products = $data['total_products'];
                    $order_data = $data['order_data'];
                    $order_status = $data['order_status'];
                    $number++;
                    ?>
                    <tr>
                        <td><?php echo $number ?></td>
                        <td><?php echo $amount_due ?></td>
                        <td><?php echo $invoice_number ?></td>
                        <td><?php echo $total_products ?></td>
                        <td><?php echo $order_data ?></td>
                        <td><?php echo $order_status ?></td>
                        <td><a href='admin.php?delete_orders=<?php echo $id_order;?>'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
                    <?php
                }
            }
            ?>

    </tbody>
</table>