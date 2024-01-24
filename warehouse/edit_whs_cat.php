<?php include "includes/db_conn.php"?>
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT  * from whscategory where id='$id'") or die(mysqli_error());
$rows= mysqli_fetch_array($sql); $count = mysqli_num_rows($sql);

if(isset($_POST['submit']))
{
 $name = $_POST['ctgname'];
 $desc = $_POST['description'];

        $query = mysqli_query($conn,"select * from whscategory where id = '1'")or die(mysqli_error());
        $count = mysqli_num_rows($query);
        
        if ($count > 0)
        { 
       echo "<script>alert('Failed. Please Try Again')</script>";
             }
        
        else{
        
        mysqli_query($conn,"update whscategory set Category_Name='$name',Description='$desc' where id='$id'");
        
         echo "<script>alert('Warehouse Category Updated')</script>";
        }
    }
        ?> 
<!-- Warehouse category form -->
<link rel="stylesheet" href="css/main.css">
<?php include "includes/menu.php"?>
<div class = "body_sec">
        <section id="Content">
                <div class='card'>
                        <h2>WAREHOUSE CATEGORY FORM</h2>
                <form method="POST">
                        <div class="form-group"><br/>
                                <label>Category Name</label><br/>
                                <input type="text" name="ctgname" class="form-control" value='<?php echo $rows["Category_Name"]; ?>' required>
                        </div>
                        <div class="form-group">
                                <label>Description</label><br/>
                                <input type="textarea" name="description" class="form-control" value='<?php echo $rows["Description"]; ?>'>
                        </div>

                                <input type="submit" name="submit">
                        </div>
                </form>
        </section>
    </div>
   <?php include "includes/footer.php"?>
