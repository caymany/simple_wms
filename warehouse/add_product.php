<!-- Database connection -->
<?php include "includes/db_conn.php"?>

<?php
if(isset($_POST['submit']))
{
$pname = $_POST['pname'];
$wname = $_POST['wname'];
$category = $_POST['category'];
$stock = $_POST['tstock'];
$desc = $_POST['description'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);

            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);

        $picture = "uploads/" . $_FILES["image"]["name"];
$query = mysqli_query($conn,"select * from products where Product_Name = '$pname'")or die(mysqli_error());
        $count = mysqli_num_rows($query);
        
        if ($count > 0)
        { 
       echo "<script>alert('Failed. Please Try Again')</script>";
             }
        
        else{
        mysqli_query($conn,"insert into products(Product_Name,Whs_Name,Category,Total_Stock,Description,Picture) 
        values('$pname','$wname','$category','$stock','$desc','$picture')");
        
         echo "<script>alert('Product Added Successfully')</script>";
        }
    }
        ?> 
<!-- Add product form code -->
<link rel="stylesheet" href="css/main.css">
<?php include "includes/menu.php"?>
<div class = "body_sec">
        <section id="Content">
        	<div class='cardd'>
        		<h2>ADD PRODUCT</h2>
        	<form method="POST" enctype='multipart/form-data'>
        		<div class="form-group"><br/>
        			<label>Product Name</label><br/>
        			<input type="text" name="pname" class="form-control" required>
        		</div>
                        <div class="form-group">
                                <label>Warehouse</label><br/>
                                <select name="wname" class="form-control">
                                    <!-- Fetching all warehouse info from the db so that the user can allocate a products to a certain warhouse  -->
                                        <?php
                                        include "includes/db_conn.php";
                                        $records = mysqli_query($conn, "SELECT * from warehouse");
                                        while($data=mysqli_fetch_array($records))
                                        {
                                        echo "<option value='".$data['Whs_Name']."'>".$data['Whs_Name']."</option>";
                                        }
                                        ?>
                            </select>
                                </select>
                        </div>
        		<div class="form-group">
        			<label>Product Category</label><br/>
        			<select name="category" class="form-control">
                        <!-- Fetching Categories from db to assign the new products -->
        				 <?php
                                        include "includes/db_conn.php";
                                        $records = mysqli_query($conn, "SELECT * from prdcategory");
                                        while($data=mysqli_fetch_array($records))
                                        {
                                        echo "<option value='".$data['Category_Name']."'>".$data['Category_Name']."</option>";
                                        }
                                        ?>
        			</select>
        		</div>
        		<div class="form-group">
        			<label>Total Stock</label><br/>
        			<input type="text" name="tstock" class="form-control">
        		</div>
        		
        		<div class="form-group">
        			<label>Product Description</label><br/>
        			<input type="textarea" name="description" class="form-control">
        		</div>
        		<div class="form-group">
        			<label>Image</label><br/>
        			<input type="file" name="image" class="form-control" id="image" required="required" autocomplete="off">
        		</div>
        		<div class="form-group">
        			<input type="submit" name="submit">
        		</div>
        	</form>
        </section>
    </div>
   <?php include "includes/footer.php"?>


