<?php include "../includes/db_conn.php"?>
<?php include "../includes/user_menu.php"?>
<link rel="stylesheet" href='../css/main.css'>
<link rel="stylesheet" href="../css/cards.css">

<div class = "body_sec">
        <section id="Content">
                <h3>USER DASHBOARD</h3>
                <hr/>
        	
        		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

					<!--  -->
					<!-- Add products -->
					<div class="card">
					  <div class="card-header"><a href="user_add_products.php">Add Product</a></div>
					  <div class="card-main">
					    <a href="user_add_products.php"><img src='../image/cart.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
					<!-- Add product category -->
					<div class="card">
					  <div class="card-header"><a href="user_add_ptcg.php">Add Product Category</a></div>
					  <div class="card-main">
					    <a href="user_add_ptcg.php"><img src='../image/add.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
					<!-- View  Products Report-->
					
					<div class="card">
					  <div class="card-header"><a href="user_prd_report.php">Product Report</a></div>
					  <div class="card-main">
					    <a href="user_prd_report.php"><img src='../image/chart.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
					<!-- User Profile -->

				<div class="card">
					  <div class="card-header"><a href="user_profile.php">My Profile</a></div>
					  <div class="card-main">
					    <a href="user_profile.php"><img src='../image/warehouse.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
					
					<!--  -->
						<div class="card">
					  <div class="card-header">All Orders</div>
					  <div class="card-main">
					     <a href="whs_orders.php"><img src='../image/order.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
                </div>
					
                <!--  -->
						<div class="card">
					  <div class="card-header">Stock</div>
					  <div class="card-main">
					     <a href="stock.php"><img src='../image/inventory.png'></a>
					    <div class="main-description"></div>
					  </div>
					</div>
                </div>

        		
        	</div>
        </section>
