<?php include "../includes/user_menu.php"?>
<?php include "../includes/db_conn.php"?>
<link rel="stylesheet" href="../css/main.css">
<div class = "body_sec">
        <section id="Content">
        	<h2>WAREHOUSE REPORT</h2>
        	<hr/>
        	<table>
        		<thead>
        			<tr>
        				<th>Id</th>
        				<th>Image</th>
        				<th>Warehouse Name</th>
        				<th>Contact</th>
        				<th>Email</th>
                                        <th>Details</th>
        				<th>Edit</th>
        				<th>Delete</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php
                        $sql = mysqli_query($conn, "SELECT  * from warehouse");													
						while ($row = mysqli_fetch_assoc($sql)){
						?>
        			<tr>
        				<td><?php echo $row['id'];?></td>
        				<td><a href="view_whs.php?id=<?php echo htmlentities($row['id']);?>"><img src="<?php echo $row['Picture'];?>"></a></td>
        				<td><?php echo $row['Whs_Name'];?></td>
        				<td><?php echo $row['Contact'];?></td>
        				<td><?php echo $row['Email'];?></td>
                                        <td><a href="whs_detail.php?id=<?php echo htmlentities($row['id']);?>">Details</td>
        				<td><a href="edit_whs.php?id=<?php echo htmlentities($row['id']);?>">Edit</td>
        				<td><a href="dlt_whs.php?id=<?php echo htmlentities($row['id']);?>">Delete</a></td>

        			</tr>
        		<?php }?>

        		</tbody>


