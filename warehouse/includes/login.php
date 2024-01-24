<?php include "header2.php"?>
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/style.css">
<style>
	body{
			background-image: url("../image/large_warehouse.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
		}
	</style>
<div class = "body_sec">
        <section id="Content">
        	<div class="lcard">
        	<form action="login-check.php" method="post">
			     	<h2>USER LOGIN</h2>
			     	<?php if (isset($_GET['error'])) { ?>
			     		<p class="error"><?php echo $_GET['error']; ?></p>
			     	<?php } ?>
			     	<label>User Name</label>
			     	<input type="text" name="uname" placeholder="User Name"><br>

			     	<label>Password</label>
			     	<input type="password" name="password" placeholder="Password"><br>

			     	<button type="submit">Login</button>
			          <a href="../admin_login.php" class="ca">Admin Login</a>
			          <br/><br/>
			       
     </form>
 </div>

</div>