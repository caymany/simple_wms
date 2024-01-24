<!-- This is the dashboard page -->
<?php include "includes/db_conn.php"?><!-- db connection -->
<?php include "includes/menu.php"?>
<link rel="stylesheet" href='css/main.css'>
<link rel="stylesheet" href="css/cards.css">
<html>
<head>
    <title>View All Orders</title>
</head>
<body>
    <h1>All Orders</h1>
    
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Customer</th>
            <th>Warehouse</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Picture</th>
            <th>Details</th>
        </tr>
        
        <?php
        // Fetch orders from the database where the customer is the logged in user
        $query = "SELECT * FROM orders";
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
                echo "<td>" . $row["Status"] . "</td>";
                echo "<td><img src='" . $row["Picture"] . "''></td>";
                echo "<td><a href='order_details.php?id=" . htmlentities($row['order_id']) . "'>Details</a></td>";

                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No orders found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
