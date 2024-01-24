<?php 
session_start(); 
include "../includes/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email'])){

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	
	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: new_acc.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: new_acc.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: new_acc.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: new_acc.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: new_acc.php?error=Account type is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: new_acc.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM customers WHERE Username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: new_acc.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO customers (Name,Username,Email,Password,Picture) VALUES('$name','$uname','$email','$pass','')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: cstmr_login.php?success=Account has been created successfully");
           	 echo "<script>alert('Account Created Successfully')</script>";
	         exit();
           }else {
	           	header("Location: new_acc.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: new_acc.php");
	exit();
}