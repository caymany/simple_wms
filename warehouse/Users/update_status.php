<?php
include "../includes/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST["order_id"];
    $status = $_POST["status"];
    
    // Update the status in the database
    $updateQuery = "UPDATE orders SET Status = '$status' WHERE order_id = '$orderID'";
    if ($conn->query($updateQuery) === TRUE) {
        echo "<script>alert('Status updated successfully!'); window.location.href = 'whs_orders.php';</script>";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}
?>
