<?php
session_start();
include "../includes/db_conn.php";

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    header("Location: ../includes/login.php"); // Redirect to the login page if not logged in
    exit();
}
$username = $_SESSION['Username'];
$sql = mysqli_query($conn, "SELECT * FROM customers WHERE Username='$username'");
$row = mysqli_fetch_assoc($sql);
//Get the Id of the user
$userID = $row['id'];
include "head.php"?>
<!DOCTYPE html>
<html>
<head>
    <title>View My Orders</title>
    <!-- Include your CSS and other head elements here -->
</head>
<body>
    <h1>View Orders</h1>
    
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Warehouse</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Picture</th>
            <th>Actions</th>
        </tr>
        
        <?php
        // Fetch orders from the database where the customer is the logged in user
        $query = "SELECT * FROM orders where Cst_Id='$userID'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["order_id"] . "</td>";
                echo "<td>" . $row["Prd_Name"] . "</td>";
                echo "<td>" . $row["Quant"] . "</td>";
                echo "<td>" . $row["Whs_Name"] . "</td>";
                echo "<td>" . $row["Ord_Date"] . "</td>";
                echo "<td>" . $row["Status"] . "</td>";
                echo "<td><img src='../" . $row["Picture"] . "''></td>";
                echo "<td><a href='products.php'>New Order</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No orders found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
