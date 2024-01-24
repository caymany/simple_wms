<?php include "../includes/menu.php"?>
<?php include "../includes/db_conn.php"?>
<link rel="stylesheet" href="../css/main.css">
<div class = "body_sec">
        <section id="Content">
        	<h2>PRODUCTS REPORT</h2>
        	<hr/>
        	<table>
        		<thead>
        			<tr>
        				<th>Id</th>
        				<th>Image</th>
        				<th>Product Name</th>
        				<th>Warehouse</th>
        				<th>Category</th>
        				<th>Stock</th>
        				<th>Edit</th>
        				<th>Delete</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php
                        $sql = mysqli_query($conn, "SELECT  * from products");													
						while ($row = mysqli_fetch_assoc($sql)){
						?>
        			<tr>
        				<td><?php echo $row['id'];?></td>
        				<td><a href=""><img src="<?php echo $row['Picture'];?>"></a></td>
        				<td><?php echo $row['Product_Name'];?></td>
        				<td><?php echo $row['Whs_Name'];?></td>
        				<td><?php echo $row['Category'];?></td>
        				<td><?php echo $row['Total_Stock'];?></td>
        				<td><a href="edit_prd.php?id=<?php echo htmlentities($row['id']);?>">Edit </a></td>
        				<td><a href="dlt_prd.php?id=<?php echo htmlentities($row['id']);?>">Delete</a></td>

        			</tr>
        		<?php }?>

        		</tbody>


