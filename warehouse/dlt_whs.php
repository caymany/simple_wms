<!-- db connection -->
<?php include "includes/db_conn.php"?>
<?php
$id = $_GET['id']; // getting id from btn clicked
$sql = "DELETE FROM warehouse WHERE id = $id"; // actual query

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
    header("Location:  whs_report.php");
} else {
    echo "Error deleting record: " . $conn->error;
}