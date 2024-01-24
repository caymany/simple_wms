<?php include "../includes/header2.php"?>
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
        	<form action="cstmr_logincheck.php" method="post">
			     	<h2>CUSTOMER LOGIN</h2>
			     	<?php if (isset($_GET['error'])) { ?>
			     		<p class="error"><?php echo $_GET['error']; ?></p>
			     	<?php } ?>
			     	<label>User Name</label>
			     	<input type="text" name="uname" placeholder="User Name"><br>

			     	<label>Password</label>
			     	<input type="password" name="password" placeholder="Password"><br>

			     	<button type="submit">Login</button>
			          <a href="../index.php" class="ca">Back</a>
			          <br/><br/>
			          <hr/>
			          <a href = "new_acc.php" class= "ca"> Create Account </a>
			       
     </form>
 </div>

</div>