<?php
include "includes/menu.php";
include "includes/db_conn.php";
?>
<link rel="stylesheet" href="css/main.css">
<div class="body_sec">
    <section id="Content">
        <h2>All Warehouses</h2>
        <hr/>
        <div class="grid-container">
            <?php
            $sql = "SELECT * FROM warehouse";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $whsId = $row['id'];
                    $whsName = $row['Whs_Name'];
                    $whsImage = $row['Picture'];
                    ?>
                    <div class="grid-item">
                        <a href="whs_detail.php?id=<?php echo $whsId; ?>">
                            <div class="card">
                                <img src="<?php echo $whsImage; ?>" alt="<?php echo $whsName; ?>" width=200 height=200>
                                <h3><?php echo $whsName; ?></h3>
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
