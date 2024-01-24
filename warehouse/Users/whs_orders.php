<?php
session_start();
include "../includes/db_conn.php";

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    header("Location: ../includes/login.php"); // Redirect to the login page if not logged in
    exit();
}

include "../includes/user_menu.php";

// Fetch the user details from the session
$username = $_SESSION['Username'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");
$row = mysqli_fetch_assoc($sql);
// Get the warehouse name being managed by the logged in user
$whs = $row['Whs_Name']
?>
<link rel="stylesheet" href='../css/main.css'>
<link rel="stylesheet" href="../css/cards.css">
<html>
<head>
    <title>View Warehouse Orders</title>
    
</head>
<body>
    <h1>Orders</h1>
    
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Customer</th>
            <th>Warehouse</th>
            <th>Order Date</th>
            <th>Picture</th>
            <th>Current Status</th>
            <th>Change Status</th>
        </tr>
        
        <?php
        // Fetch orders from the database where the manager is the logged in user
        $query = "SELECT * FROM orders where Whs_Name = '$whs'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["order_id"] . "</td>";
                echo "<td>" . $row["Prd_Name"] . "</td>";
                echo "<td>" . $row["Quant"] . "</td>";
                echo "<td>" . $row["Cst_Name"] . "</td>";
                echo "<td>" . $row["Whs_Name"] . "</td>";
                echo "<td>" . $row["Ord_Date"] . "</td>";
                echo "<td><img src='../" . $row["Picture"] . "''></td>";
                echo "<td>" . $row["Status"] . "</td>";
                 echo "<td>";
                 // Changing the order Status
                echo "<form method='post' action='update_status.php'>";
                echo "<input type='hidden' name='order_id' value='" . $row["order_id"] . "'>";
                echo "<select name='status'>";
                echo "<option value='Pending'>Pending</option>";
                echo "<option value='Confirmed'>Confirmed</option>";
                echo "<option value='Shipped'>Shipped</option>";
                echo "<option value='Delivered'>Delivered</option>";
                echo "</select>";
                echo "<input type='submit' value='Update'>";
                echo "</form>";
                echo "</td>";

        echo "</tr>";
                
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No orders found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
