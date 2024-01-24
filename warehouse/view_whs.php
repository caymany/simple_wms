<?php include "includes/db_conn.php"?>
<?php include "includes/menu.php"?>
<link rel="stylesheet" href="css/main.css">
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT  * from warehouse where id='$id'") or die(mysqli_error());
$rows= mysqli_fetch_array($sql); $count = mysqli_num_rows($sql);
?>
<div class = "body_sec">
        <section id="Content">
                <div class="card">
                <h3>Warehouse Details</h3>
                <hr/>
                <div class="left">
                <table>
                        <tr><td>Images</td><td><img src="<?php echo $rows['Picture'];?>"></td></tr>
                        <tr><td>Warehouse Id</td><td><?php echo $rows['id'];?></td></tr>
                        <tr><td>Warehouse Name</td><td><?php echo $rows['Whs_Name'];?></td></tr>
                        <tr><td>Warehouse Category</td><td><?php echo $rows['Whs_Category'];?></td></tr>
                        <tr><td>Warehouse Email</td><td><?php echo $rows['Email'];?></td></tr>
                        <tr><td>Warehouse Contact</td><td><?php echo $rows['Contact'];?></td></tr>
                </table>
        </div>
        <hr/>
         <h3>Products Available</h3>
        </section>
        </div>
        <?php include "includes/footer.php"?>