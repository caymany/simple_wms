<?php include "includes/db_conn.php"?>
<?php include "includes/menu.php"?>
<link rel="stylesheet" href="css/main.css">
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT  * from orders where order_id='$id'") or die(mysqli_error());
$rows= mysqli_fetch_array($sql); $count = mysqli_num_rows($sql);
$cstid = $rows['Cst_Id'];
?>
<div class = "body_sec">
        <section id="Content">
                <div class="card">
                <h3>Order Details</h3>
                <hr/>
                <?php 
                $qry = mysqli_query($conn, "SELECT  * from customers where id='$cstid'") or die(mysqli_error());
                        $row= mysqli_fetch_array($qry); $count = mysqli_num_rows($qry);
                        ?>
                <table>
                        <tr><td>Image</td><td><img src="<?php echo $rows['Picture'];?>"></td></tr>
                        <tr><td>Customer Name</td><td><?php echo $rows['Cst_Name'];?></td></tr>
                        <tr><td>Customer Email</td><td><?php echo $row['Email'];?></td></tr>

                        <tr><td>Product Name</td><td><?php echo $rows['Prd_Name'];?></td></tr>
                        <tr><td>Warehouse</td><td><?php echo $rows['Whs_Name'];?></td></tr>
                        <tr><td>Quantity</td><td><?php echo $rows['Quant'];?></td></tr>
                        <tr><td>Delivery Location</td><td><?php echo $rows['Location'];?></td></tr>
                        <tr><td>Date</td><td><?php echo $rows['Ord_Date'];?></td></tr>
                </table>

        </section>
        </div>
        </div>
        <?php include "includes/footer.php"?>