<!-- Adding styles -->
<?php include "../includes/header2.php"?>
<link rel="stylesheet" href="../css/card_style.css">
<div class = "body_sec">
        <section id="Content">
            <div class="lcard">
               <form action="acc_check.php" method="post">
                                   <!-- Login form fields -->
                    <h2>CREATE ACCOUNT</h2>
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


                         <label>Email</label>
                         <?php if (isset($_GET['email'])) { ?>
                              <input type="text" 
                                   name="email" 
                                   placeholder="Email"
                                   value="<?php echo $_GET['email']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text"
                                   name="email" 
                                   placeholder="Email"><br>
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
                    <button type="submit">Submit</button>
                    
               </div>
          </form>
     </div>
</section>

                           