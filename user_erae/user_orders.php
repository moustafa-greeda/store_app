<?php
$user_name =  $_SESSION['userName'];
$sql       = "SELECT * FROM `user_tabel` WHERE userName = '$user_name'";
$result   = mysqli_query($con , $sql);
$fetch_row = mysqli_fetch_assoc($result);
$id_user = $fetch_row['id_user'];
?>
<h3 class="text-center text-success">user orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light text-center">
        <tr>
            <th>S1 no</th>
            <th>amount due</th>
            <th>total products</th>
            <th>invoice number</th>
            <th>date</th>
            <th>complete / incomplete</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
    <?php

            $sql = "SELECT * FROM `user_orders` WHERE id_user = '$id_user'";
            $result   = mysqli_query($con , $sql);
            $number   = 1;
            while($row_orders = mysqli_fetch_assoc($result)){
                $id_order       = $row_orders['id_order'];
                $amount_due     = $row_orders['amount_due'];
                $invoice_number = $row_orders['invoice_number'];
                $total_products = $row_orders['total_products'];
                $order_data     = $row_orders['order_data'];
                $order_status   = $row_orders['order_status'];
                if($order_status == 'pending'){
                    $order_status = 'Incompleted';
                }else{
                    $order_status = 'Completed';
                }
                echo "<tr class=' text-center'>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number </td>
                    <td>$order_data</td>
                    <td>$order_status   </td>
                    <td><a href='confirment.php?id_order=$id_order' class=''>confirm</a> </td></tr>";
            }
                    ?>
                    
    </tbody>
</table>