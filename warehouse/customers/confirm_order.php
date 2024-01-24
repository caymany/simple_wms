
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
$userID = $row['id'];
$usernme = $row['Name'];
include "head.php"?>
<style>
.card {
        background-color: #fff;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: 0 auto;
  padding: 1rem;
  border-radius: 20px;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
<?php
$id = $_GET['id'];
$sqls = mysqli_query($conn, "SELECT  * from products where id='$id'") or die(mysqli_error());
$rows= mysqli_fetch_array($sqls); $count = mysqli_num_rows($sqls);
?>
<div class = "body_sec">
        <section id="Content">
                <div class="card">
                <h3>Product Details</h3>
                <hr/>
                <!-- Table to display the product details -->
                <table>
                        <tr><td>Image</td><td><img src="../<?php echo $rows['Picture'];?>"></td></tr>
                        <tr><td>Product Name</td><td><?php echo $rows['Product_Name'];?></td></tr>
                        <tr><td>Warehouse</td><td><?php echo $rows['Whs_Name'];?></td></tr>
                        <tr><td>Product Category</td><td><?php echo $rows['Category'];?></td></tr>
                        <tr><td>Product Description</td><td><?php echo $rows['Description'];?></td></tr>
                                        
                </table><br/>
                <!-- This form is hidden. It carries the info above to be submitted in the "Orders" -->
                <form method="post" action="process_order.php">
                        <p> Quantity : <input type='number' name='quantity' value='1'></p>
                        <p>Delivery Location : <input type= 'text' name='location'></p>
                        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                        <input type="hidden" name="cst_name" value="<?php echo $usernme; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $rows['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $rows['Product_Name']; ?>">
                        <input type="hidden" name="whs_name" value="<?php echo $rows['Whs_Name'];?>">

                        <input type="hidden" name="picture" value="<?php echo $rows['Picture'];?>">
                        <input type="submit" name="submit_order" value="Submit Order">

                </form>
                
       </section>
        </div>
        </div>
</section>