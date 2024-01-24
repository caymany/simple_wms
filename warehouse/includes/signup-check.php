<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['acctype']) && isset($_POST['wname'])) {

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
	$acctype = validate($_POST['acctype']);
	$wname = validate($_POST['wname']);


	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: ../add_user.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: ../add_user.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: ../add_user.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: ../add_user.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($acctype)){
        header("Location: ../add_user.php?error=Account type is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: ../add_user.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE Username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../add_user.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(Username, Password, Name, Acc_Type,Whs_Name) VALUES('$uname', '$pass', '$name','$acctype','$wname')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: ../add_user.php?success=Account has been created successfully");
	         exit();
           }else {
	           	header("Location: ../add_user.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: ../add_user.php");
	exit();
}