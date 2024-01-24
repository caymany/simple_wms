<?php
include "includes/menu.php";
include "includes/db_conn.php";
?>
<link rel="stylesheet" href="css/main.css">
<div class="body_sec">
    <section id="Content">
        <h2>WAREHOUSE DETAILS</h2>
        <hr/>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Warehouse Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_GET['id'];

                $sql = mysqli_query($conn, "SELECT * FROM warehouse WHERE id='$id'");
                while ($row = mysqli_fetch_assoc($sql)) {
                    $wname = $row['Whs_Name']; // Assign Whs_Name value to $wname variable
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><a href="view_whs.php?id=<?php echo htmlentities($row['id']); ?>"><img src="<?php echo $row['Picture']; ?>"></a></td>
                        <td><?php echo $row['Whs_Name']; ?></td>
                        <td><?php echo $row['Contact']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
        <hr/>
        <h2>PRODUCTS AVAILABLE</h2>
        <hr/>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Warehouse</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM products WHERE Whs_Name='$wname'");
                while ($row = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><a href="view_prd.php?id=<?php echo htmlentities($row['id']); ?>"><img src="<?php echo $row['Picture']; ?>"></a></td>
                        <td><?php echo $row['Product_Name']; ?></td>
                        <td><?php echo $row['Whs_Name']; ?></td>
                        <td><?php echo $row['Category']; ?></td>
                        <td><?php echo $row['Total_Stock']; ?></td>
                        <td><a href="edit_prd.php?id=<?php echo htmlentities($row['id']); ?>">Edit </a></td>
                        <td><a href="dlt_prd.php?id=<?php echo htmlentities($row['id']); ?>">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</div>
