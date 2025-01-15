<?php
session_start();
include "header.php";
include "sidebar.php";
include "./connection.php"
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Dashboard</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div style="display: flex; justify-content: space-evenly; align-items: center; padding: 50px; background-color: #ffffff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <!-- Total Product -->
                <div style="text-align: center; padding: 20px; width: 25%; background-color: #007BFF; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
                    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='#007BFF'; this.style.transform='scale(1)';">
                    <?php
                    $sql = "SELECT * FROM product";
                    $res = mysqli_query($DBCON, $sql) or die("Prodct Query Failed");
                    $count = mysqli_num_rows($res);
                    ?>
                    <h2 style="margin: 10px 0; font-size: 36px;"><?php echo $count ?></h2>
                    <p style="font-size: 18px; font-weight: bold;">No of Products</p>
                </div>

                <!-- Total Order -->
                <div onclick="openProduct()"style="text-align: center; padding: 20px; width: 25%; background-color: #28A745; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
                    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='#28A745'; this.style.transform='scale(1)';">
                    <?php
                    $sql1 = "SELECT * FROM billheader";
                    $res1 = mysqli_query($DBCON, $sql1) or die("Prodct Query Failed");
                    $count1 = mysqli_num_rows($res1);
                    ?>
                    <h2 style="margin: 10px 0; font-size: 36px;"><?php echo $count1 ?></h2>
                    <p style="font-size: 18px; font-weight: bold;">Total Orders</p>
                </div>

                <!-- Total Company -->
                <div style="text-align: center; padding: 20px; width: 25%; background-color: #007BFF; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
                    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor='#007BFF'; this.style.transform='scale(1)';">
                    <?php
                    $sql2 = "SELECT * FROM company";
                    $res2 = mysqli_query($DBCON, $sql2) or die("Prodct Query Failed");
                    $count2 = mysqli_num_rows($res2);
                    ?>
                    <h2 style="margin: 10px 0; font-size: 36px;"><?php echo $count2 ?></h2>
                    <p style="font-size: 18px; font-weight: bold;">No of Companies</p>
                </div>
               
            </div>
            <!-- Second Row -->
            <div style="display: flex; justify-content: space-evenly; align-items: center; padding: 50px; background-color: #ffffff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <!-- Total Product -->
                <div onclick="openReturn()"style="text-align: center; padding: 20px; width: 25%; background-color: #AE445A; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
                    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor=' #AE445A'; this.style.transform='scale(1)';">
                    <?php
                    $sql3 = "SELECT * FROM returnproduct";
                    $res3 = mysqli_query($DBCON, $sql3) or die("Prodct Query Failed");
                    $count3 = mysqli_num_rows($res3);
                    ?>
                    <h2 style="margin: 10px 0; font-size: 36px;"><?php echo $count3 ?></h2>
                    <p style="font-size: 18px; font-weight: bold;">Total Returns</p>
                </div>
                <div style="text-align: center; padding: 20px; width: 25%; background-color: #28A745; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
                    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor=' #28A745'; this.style.transform='scale(1)';">
                    <?php
                    $sql4 = "SELECT * FROM partyinfo";
                    $res4 = mysqli_query($DBCON, $sql4) or die("Prodct Query Failed");
                    $count4 = mysqli_num_rows($res4);
                    ?>
                    <h2 style="margin: 10px 0; font-size: 36px;"><?php echo $count4 ?></h2>
                    <p style="font-size: 18px; font-weight: bold;">No of Party</p>
                </div>
                <div onclick="openLowStock()"style="text-align: center; padding: 20px; width: 25%; background-color: #AE445A; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
                    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.backgroundColor=' #AE445A'; this.style.transform='scale(1)';">
                    <?php
                    $sql5 = "SELECT * FROM stock WHERE product_quntity < 5";
                    $res5 = mysqli_query($DBCON, $sql5) or die("Prodct Query Failed");
                    $count5 = mysqli_num_rows($res5);
                    ?>
                    <h2 style="margin: 10px 0; font-size: 36px;"><?php echo $count5 ?></h2>
                    <p style="font-size: 18px; font-weight: bold;">Low Stock Products</p>
                </div>

                
                
               
            </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<?php
include "footer.php";
?>
<script>
    const openProduct = () => {
        window.location = "view-bills.php"
    }
</script>
<script>
    const openReturn = () => {
        window.location = "return-products.php"
    }
</script>
<script>
    const openLowStock = () => {
        window.location = "low-stock.php"
    }
</script>