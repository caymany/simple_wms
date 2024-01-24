<!-- This is the admin login form -->
<?php include "includes/header.php"?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
<style>
	body{
			background-image: url("image/large_warehouse.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
		}
	</style>
<div class = "body_sec">
        <section id="Content">
        	<div class="lcard">
        	<form action="admin_login_check.php" method="post">
			     	<h2>ADMIN LOGIN</h2>
			     	<!-- Displays error message -->
			     	<?php if (isset($_GET['error'])) { ?>
			     		<p class="error"><?php echo $_GET['error']; ?></p>
			     	<?php } ?>
			     	<label>User Name</label>
			     	<input type="text" name="uname" placeholder="User Name"><br>

			     	<label>Password</label>
			     	<input type="password" name="password" placeholder="Password"><br>

			     	<button type="submit">Login</button>

			     	<!-- A link to the Standard user account -->
			          <a href="includes/login.php" class="ca">User Login</a>
			          <br/><br/>
			          <hr/>
			          <a href="customers/cstmr_login.php" class="ca">Customer?</a>
			       
     </form>
 </div>

</div>