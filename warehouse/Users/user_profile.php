<?php
session_start();
include "../includes/db_conn.php";

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    header("Location: ../includes/login.php"); // Redirect to the login page if not logged in
    exit();
}

include "../includes/user_menu.php";

// Fetch the user details from the session
$username = $_SESSION['Username'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='$username'");
$row = mysqli_fetch_assoc($sql);

// Now you can use the session data in your profile page
$name = $row['Name'];
$userID = $row['id'];
$rights = $row['Acc_Type'];
$whs = $row['Whs_Name']
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .profile-card {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .profile-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .profile-card .profile-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .profile-card .profile-info img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
        }
        
        .profile-card .profile-info .user-details {
            flex-grow: 1;
        }
        
        .profile-card .profile-info .user-details h3 {
            margin: 0;
        }
        
        .profile-card .profile-info .user-details p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="profile-info">
            <div class="user-details">
                <h2><?php echo $username?> Profile</h2>
                
                <p>Your username is: <b><u><?php echo $username; ?></u></b></p>
                <p>Your user ID is: <b><u><?php echo $userID; ?></u></b></p>
                <p>Your Account Type is: <b><u><?php echo $rights; ?></u></b></p>
                <p>You are Managing : <b><u><?php echo $whs; ?> </b></u></p>
            </div>
        </div>
    </div>
</body>
</html>
