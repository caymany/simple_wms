<!-- Adding styles -->
<?php include "includes/menu.php"?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
<div class = "body_sec">
        <section id="Content">
            <div class="lcard">
               <form action="includes/signup-check.php" method="post">
                                   <!-- Login form fields -->
                    <h2>ADD SYSTEM USER</h2>
                    <?php if (isset($_GET['error'])) { ?>
                         <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                         <?php if (isset($_GET['success'])) { ?>
                              <p class="success"><?php echo $_GET['success']; ?></p>
                         <?php } ?>

                         <label>Name</label>
                         <?php if (isset($_GET['name'])) { ?>
                              <input type="text" 
                                   name="name" 
                                   placeholder="Name"
                                   value="<?php echo $_GET['name']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="name" 
                                   placeholder="Name"><br>
                         <?php }?>

                         <label>User Name</label>
                         <?php if (isset($_GET['uname'])) { ?>
                              <input type="text" 
                                   name="uname" 
                                   placeholder="User Name"
                                   value="<?php echo $_GET['uname']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="uname" 
                                   placeholder="User Name"><br>
                         <?php }?>
                         <!-- User Rigts selection -->
                         <label>Account Type</label><br/>
                         <?php if (isset($_GET['acctype'])){?>
                              <select id="acctype"  name="acctype">
                                   <option value="Admin">Administrator</option>
                                   <option value="User">Standard</option>
                              </select>
                         <?php }else{ ?>
                              <select id="acctype"  name="acctype">
                                   <option value="Admin">Administator</option>
                                   <option value="User">Standard</option>
                              </select><br>
                         <?php }?>
                         <!-- Warehouse selection -->
                         <label> Warehouse Allocation</label>
                         <!-- The data is being fetch from db so that the admin can assign users to a warehouse -->
                         <?php if (isset($_GET['acctype'])){?>
                              <select name="wname" id="wname">
                                                       <?php
                                                       include "includes/db_conn.php";
                                                       $records = mysqli_query($conn, "SELECT * from warehouse");
                                                       while($data=mysqli_fetch_array($records))
                                                       {
                                                       echo "<option value='".$data['Whs_Name']."'>".$data['Whs_Name']."</option>";
                                                       }
                                                       ?>
                                        </select>
                                        <!-- Same fetching of the data from db for warehouse info -->
                         <?php }else{ ?>
                              <select name="wname" id="wname">
                                                       <?php
                                                       include "includes/db_conn.php";
                                                       $records = mysqli_query($conn, "SELECT * from warehouse");
                                                       while($data=mysqli_fetch_array($records))
                                                       {
                                                       echo "<option value='".$data['Whs_Name']."'>".$data['Whs_Name']."</option>";
                                                       }
                                                       ?>
                                        </select><br>
                         <?php }?>

               <!-- Password -->
                    <label>Password</label>
                    <input type="password" 
                              name="password" 
                              placeholder="Password"><br>
               <!-- Password confirmation...The passwords are merged above -->
                         <label>Re Password</label>
                         <input type="password" 
                              name="re_password" 
                              placeholder="Re_Password"><br>
                    <button type="submit">Add User</button>
                                                  </div>
                           