<?php
// Include the database connection file
include "../includes/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_order"])) {
    // Retrieve the form input values
    $userID = $_POST["userID"];
    $usern = $_POST["cst_name"];
    $prdId = $_POST["product_id"];
    $prdnm = $_POST["product_name"];
    $qty = $_POST["quantity"];
    $whs = $_POST["whs_name"];
    $orderDate = date("Y-m-d H:i:s"); //get current date
    $pct = $_POST["picture"];
    
    // Perform database operations to insert the data into the "orders" table
    $sql = "INSERT INTO orders (Prd_Id,Prd_Name,Quant,Cst_Id,Cst_Name, Whs_Name, Ord_Date, Status, Picture) 
            VALUES ('$prdId','$prdnm', '$qty', '$userID','$usern', '$whs', '$orderDate', 'Pending', '$pct')";
    
    if ($conn->query($sql) === TRUE) {
        
    // Redirect to another page with success parameter
    header("Location: products.php?success=true");
    exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
