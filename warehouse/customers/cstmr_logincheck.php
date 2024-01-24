<!-- Verifying customer details  -->
<?php 
session_start(); 
include "../includes/db_conn.php";

// Receiving the Posted data from the login page.
if (isset($_POST['uname']) && isset($_POST['password'])) {

// Trimming data. .. Important to prevent SQL injections
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	// Displaying error when fields aren't filled

	if (empty($uname)) {
		header("Location: cstmr_login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: cstmr_login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password to md5
        // $pass = md5($pass);

        // Checking for the submitted details in the db
		$sql = "SELECT * FROM customers WHERE Username='$uname' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			// Starting the logged in session.
            if ($row['Username'] === $uname && $row['Password'] === $pass) {
            	$_SESSION['Username'] = $row['Username'];
            	$_SESSION['name'] = $row['Name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: dash.php");
		        exit();
            }else{
				header("Location: cstmr_login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: cstmr_login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	// Back to login page after unsuccessful login
	header("Location: cstmr_login.php");
	exit();
}