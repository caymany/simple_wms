<!-- This is the dashboard page -->
<?php include "../includes/db_conn.php"?><!-- db connection -->
<?php include "head.php"?>
<link rel="stylesheet" href='../css/main.css'>
<link rel="stylesheet" href="../css/cards.css">

<div class = "body_sec">
        <section id="Content">
                <h3>WMS DASHBOARD</h3>
                <hr/>
<!-- Cards in the dashboard page -->
					<!-- Home card -->
					<div class="card">
					  <div class="card-header"><a href="products.php">Make Order</a></div>
					  <div class="card-main">
					    <a href="products.php"><img src='../image/cart.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
					<!--  -->
					<div class="card">
					  <div class="card-header"><a href="view_orders.php">View My Orders</a></div>
					  <div class="card-main">
					    <a href="view_orders.php"><img src='../image/products.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
					<!--  -->
					<div class="card">
					  <div class="card-header"><a href="customer_profile.php">Profile</a></div>
					  <div class="card-main">
					    <a href="customer_profile.php"><img src='../image/warehouse.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
        		
        	</div>
        </section>
