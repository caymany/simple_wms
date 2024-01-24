
<?php
include "includes/menu.php";
include "includes/db_conn.php";
?>
<link rel="stylesheet" href="css/main.css">
<div class="body_sec">
    <section id="Content">
        <h2>All Products</h2>
        <hr/>
        <div class="grid-container">
            <!-- Fetching all products info from db -->
            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $prdId = $row['id'];
                    $whsName = $row['Whs_Name'];
                    $prdName = $row['Product_Name'];
                    $whsImage = $row['Picture'];
                    ?>

                    <!-- Here, some info is pulled from db and displayed in the frontend -->
                    <div class="grid-item">
                        <a href="view_prd.php?id=<?php echo $prdId; ?>">
                            <div class="card">
                                <img src="<?php echo $whsImage; ?>" alt="<?php echo $whsName; ?>" width=200 height=200>
                                <h3>Name: <?php echo $prdName; ?></h3>
                                <h3>Warehouse: <?php echo $whsName; ?></h3>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No warehouses found.</p>";
            }
            ?>
        </div>
    </section>
</div>
