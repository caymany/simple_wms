<!-- Db connection -->
<?php include "includes/db_conn.php"?> 
<?php
$id = $_GET['id']; //getting id from button clicked 

$sql = "DELETE FROM prdcategory WHERE id = $id";  //actual query 

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully.";
    header("Location:  prd_ctg_report.php");
} else {
    echo "Error deleting record: " . $conn->error;
}