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
                    // Getting warehouse managed by logged in user
                    $wname = $row['Whs_Name']; 

?>
<link rel="stylesheet" href="../css/main.css">
<div class = "body_sec">
        <section id="Content">
            <h2>STOCK REPORT</h2>

<?php
// Include the database connection
require_once "../includes/db_conn.php";

// Retrieve the sum of quantities for each product ID from the 'orders' table
$quantitySumByProduct = array();
$query = "SELECT Prd_Id, SUM(Quant) AS total_quantity FROM orders GROUP BY Prd_Id";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $quantitySumByProduct[$row['Prd_Id']] = $row['total_quantity'];
}

// Close the first result set before proceeding to the second one
$result->free();

?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Warehouse</th>
            <th>Category</th>
            <th>Stock In</th>
            <th>Stock Out</th>
            <th>Remaining Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch product information from the 'products' table
        $sql = mysqli_query($conn, "SELECT * FROM products WHERE Whs_Name='$wname'");
        while ($rows = mysqli_fetch_assoc($sql)) {
            $product_id = $rows['id'];

            // Calculate the difference and ordered quantity
            $initial_stock = $rows['Total_Stock'];
            $total_quantity = isset($quantitySumByProduct[$product_id]) ? $quantitySumByProduct[$product_id] : 0;
            $difference = $initial_stock - $total_quantity;
            $ordered_quantity = $initial_stock - $difference;

            ?>
            <tr>
                <td><?php echo $product_id; ?></td>
                <td><a href="view_prd.php?id=<?php echo htmlentities($product_id); ?>"><img src="../<?php echo $rows['Picture']; ?>"></a></td>
                <td><?php echo $rows['Product_Name']; ?></td>
                <td><?php echo $rows['Whs_Name']; ?></td>
                <td><?php echo $rows['Category']; ?></td>
                <td><?php echo $initial_stock; ?></td>
                <td><?php echo $ordered_quantity; ?></td>
                <td><?php echo $difference; ?></td>
            </tr>
        <?php }} ?>
    </tbody>
</table>




