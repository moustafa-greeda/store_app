<h1 class="text-success text-center mt-3">All  Users Payment</h1>
<table class="table table-bordered text-center mt-5">
    <thead class="bg-dark text-light">
        <tr>
            <th>pay no</th>
            <!-- <th>id order</th> -->
            <th>invoice number</th>
            <th>amount</th>
            <th>payment mode</th>
            <th>date</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM `user_payments`";
            $result = mysqli_query($con , $sql);
            $num_row = mysqli_num_rows($result);
            // echo $num_row;
            if($num_row == 0){
                echo "<h2 class='text-danger text-center mt-5'>no user payment found yet</h2>";
            }else{
                while($data = mysqli_fetch_assoc($result)){
                    // $id_order       = $data['id_order'];
                    $invoice_number = $data['invoice_number'];
                    $amount         = $data['amount'];
                    $payment_mode   = $data['payment_mode'];
                    $date           = $data['date'];
                    $number++;
                    ?>
                    <tr>
                        <td><?php echo $number ?></td>
                        <!-- <td><?php echo $id_order ?></td> -->
                        <td><?php echo $invoice_number ?></td>
                        <td><?php echo $amount ?></td>
                        <td><?php echo $payment_mode ?></td>
                        <td><?php echo $date ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

    </tbody>
</table>