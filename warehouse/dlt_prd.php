<!-- Deleting products -->
<?php include "includes/db_conn.php"?> <!--db connection -->
<?php

$id = $_GET['id']; //Getting the id from the button clicked

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
    header("Location:  prd_report.php");
} else {
    echo "Error deleting record: " . $conn->error;
}