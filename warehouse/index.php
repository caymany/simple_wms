<?php include "includes/header.php" ?>
<link rel="stylesheet" href="css/main.css">
    <div class = "body_sec">
<head>
	<title>My Homepage</title>
	<style type="text/css">
		body{
			background-image: url("image/large_warehouse.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
		}
		.container{
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100%;
			color: white;
		}
		.btn{
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			background-color: #4CAF50;
			color: white;
			font-size: 16px;
			cursor: pointer;
			margin: 10px;
		}
		.btn:hover{
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Welcome to Warehouse Management System</h1>
		<button class="btn" onclick="window.location.href='admin_login.php'">Login as Admin</button>
		<button class="btn" onclick="window.location.href='includes/login.php'">Login as Manager</button>
		<button class="btn" onclick="window.location.href='customers/cstmr_login.php'">Login as Customer</button>
		
	</div>
</body>
</html>         