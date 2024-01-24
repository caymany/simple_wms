<?php
session_start();
include "../includes/db_conn.php";
include "../includes/user_menu.php";

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    header("Location: ../includes/login.php"); // Redirect to the login page if not logged in
    exit();
}
$username = $_SESSION['Username'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");
                while ($row = mysqli_fetch_assoc($sql)) {
                    $wname = $row['Whs_Name']; 

?>
<link rel="stylesheet" href="../css/main.css">
<div class = "body_sec">
        <section id="Content">
        	<h2>WAREHOUSE PRODUCTS REPORT</h2>
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
        			</tr>
        		</thead>
        		<tbody>
        			<?php

                        $sql = mysqli_query($conn, "SELECT  * from products where Whs_Name='$wname'");													
						while ($row = mysqli_fetch_assoc($sql)){
						?>
        			<tr>
        				<td><?php echo $row['id'];?></td>
        				<td><a href="view_prd.php?id=<?php echo htmlentities($row['id']);?>"><img src="../<?php echo $row['Picture'];?>"></a></td>
        				<td><?php echo $row['Product_Name'];?></td>
        				<td><?php echo $row['Whs_Name'];?></td>
        				<td><?php echo $row['Category'];?></td>
        				<td><?php echo $row['Total_Stock'];?></td>
        				

        			</tr>
        		<?php }}?>

        		</tbody>


