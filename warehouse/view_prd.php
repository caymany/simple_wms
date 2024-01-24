<?php include "includes/db_conn.php"?>
<?php include "includes/menu.php"?>
<link rel="stylesheet" href="css/main.css">
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT  * from products where Id='$id'") or die(mysqli_error());
$rows= mysqli_fetch_array($sql); $count = mysqli_num_rows($sql);
?>
<div class = "body_sec">
        <section id="Content">
                <div class="card">
                <h3>Product Details</h3>
                <hr/>
                <table>
                        <tr><td>Image</td><td><img src="<?php echo $rows['Picture'];?>"></td></tr>
                        <tr><td>Product Id</td><td><?php echo $rows['id'];?></td></tr>
                        <tr><td>Product Name</td><td><?php echo $rows['Product_Name'];?></td></tr>
                        <tr><td>Warehouse</td><td><?php echo $rows['Whs_Name'];?></td></tr>
                        <tr><td>Product Category</td><td><?php echo $rows['Category'];?></td></tr>
                        <tr><td>Total Stock</td><td><?php echo $rows['Total_Stock'];?></td></tr>
                        <tr><td>Product Description</td><td><?php echo $rows['Description'];?></td></tr>
                </table>

        </section>
        </div>
        </div>
        <?php include "includes/footer.php"?>