<?php include "includes/menu.php"?>
<?php include "includes/db_conn.php"?>
<link rel="stylesheet" href="css/main.css">
<div class = "body_sec">
        <section id="Content">
        	<h2>PRODUCTS CATEGORY REPORT</h2>
                <hr/>
                <table>
                        <thead>
                                <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                        $sql = mysqli_query($conn, "SELECT  * from prdcategory");                                                                                                  
                                                while ($row = mysqli_fetch_assoc($sql)){
                                                ?>
                                <tr>
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['Category_Name'];?></td>
                                        <td><?php echo $row['Description'];?></td>
                                        <td><a href="edit_prd_ctg.php?id=<?php echo htmlentities($row['id']);?>">Edit </a></td>
                                        <td><a href="dlt_prd_ctg.php?id=<?php echo htmlentities($row['id']);?>">Delete</a></td>
                                </tr>
                                <?php }?>
                        </tbody>
                </table>
        </section>
</div>
