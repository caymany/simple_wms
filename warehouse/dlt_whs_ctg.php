<?php include "includes/db_conn.php"?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM whscategory WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
    header("Location:  whs_ctg_report.php");
} else {
    echo "Error deleting record: " . $conn->error;
}