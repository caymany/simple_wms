<!-- Importing the db connection -->
<?php include "includes/db_conn.php"?>
<?php
if(isset($_POST['submit']))
{
 $name = $_POST['ctgname'];
 $desc = $_POST['description'];
// Checking for double entry..Returns an error if there is a double entry
 $query = mysqli_query($conn,"select * from whscategory where Category_Name = '$name'")or die(mysqli_error());
        $count = mysqli_num_rows($query);
        
        if ($count > 0)
        { 
       echo "<script>alert('Failed. Please Try Again')</script>";
             }
        // Inserting the data into the db
        else{
        mysqli_query($conn,"insert into whscategory(Category_Name,Description) 
                values('$name','$desc')")or die(mysqli_error());
        
         echo "<script>alert('Category Added Successfully')</script>";
        }
    }
        ?> 
<!-- Warehouse category form -->
<link rel="stylesheet" href="css/main.css">
<?php include "includes/menu.php"?>
<div class = "body_sec">
        <section id="Content">
                <div class='cardd'>
                        <h2>WAREHOUSE CATEGORY FORM</h2>
                <form method="POST">
                        <div class="form-group"><br/>
                                <label>Category Name</label><br/>
                                <input type="text" name="ctgname" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label>Description</label><br/>
                                <input type="textarea" name="description" class="form-control">
                        </div>

                                <input type="submit" name="submit">
                        </div>
                </form>
        </section>
    </div>
   <?php include "includes/footer.php"?>
