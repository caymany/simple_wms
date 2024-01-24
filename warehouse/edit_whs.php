
<?php include "includes/db_conn.php"?>
<?php include "includes/menu.php"?>
<?php
// Fetch the existing data
$Id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT  * from warehouse where id='$Id'") or die(mysqli_error());
  $rows= mysqli_fetch_array($sql); $count = mysqli_num_rows($sql);

if(isset($_POST['submit']))
{
$wname = $_POST['wname'];
$category = $_POST['category'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$desc = $_POST['description'];
$lct = $_POST['location'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);

            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);

    $picture = "uploads/" . $_FILES["image"]["name"];
        $query = mysqli_query($conn,"select * from warehouse where Whs_Name = '$wname'")or die(mysqli_error());
        $count = mysqli_num_rows($query);
        
        if ($count > 0)
        { 
       echo "<script>alert('Failed. Please Try Again')</script>";
             }
        
        else{
        
        mysqli_query($conn,"update warehouse set Whs_Name='$wname', Whs_Category='$category', Contact='$contact', Email='$email', Description='$desc', Location='$lct', Picture='$picture' where id='$Id'");
        
         echo "<script>alert('Warehouse Updated Successfully')</script>";
        }
    }
        ?> 
<!-- Html for the form -->
<link rel="stylesheet" href="css/main.css">

<div class = "body_sec">
        <section id="Content">
        	<div class='cardd'>
        		<h2>EDIT WAREHOUSE</h2>
        	<form method="POST" enctype='multipart/form-data'>
        		<div class="form-group"><br/>
        			<label>Warehouse Name</label><br/>
        			<input type="text" name="wname" class="form-control" value='<?php echo $rows["Whs_Name"]; ?>' required>
        		</div>
        		<div class="form-group">
                    <label>Category</label><br/>
                    <select name="category" class="form-control">
                         <?php
                                        include "includes/db_conn.php";
                                        $records = mysqli_query($conn, "SELECT * from whscategory");
                                        while($data=mysqli_fetch_array($records))
                                        {
                                        echo "<option value='".$data['Category_Name']."'>".$data['Category_Name']."</option>";
                                        }
                                        ?>
                    </select>
                </div>
        		<div class="form-group">
        			<label>Contact Number</label><br/>
        			<input type="text" name="contact" class="form-control" value='<?php echo $rows["Contact"]; ?>'>
        		</div>
        		<div class="form-group">
        			<label>Email</label><br/>
        			<input type="text" name="email" class="form-control" value='<?php echo $rows["Email"]; ?>'>
        		</div>
                <div class="form-group">
                    <label>Location</label><br/>
                    <input type="text" name="location" class="form-control" value='<?php echo $rows["Location"]; ?>'>
                </div>
        		<div class="form-group">
        			<label>Description</label><br/>
        			<input type="textarea" name="description" class="form-control" value='<?php echo $rows["Description"]; ?>'>
        		</div>
        		<div class="form-group">
        			<label>Image</label><br/>
        			<div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" id="image" required="required" autocomplete="off">
                                 </div>
        		</div>
        		<div class="form-group">
        			<input type="submit" name="submit">
        		</div>
        	</form>
        </section>
    </div>
   <?php include "includes/footer.php"?>


