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
                <div onclick="openProducts()"style="text-align: center; padding: 20px; width: 25%; background-color: #007BFF; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
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
                <div onclick="openCompany()"style="text-align: center; padding: 20px; width: 25%; background-color: #007BFF; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
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
                <div onclick="openParty()"style="text-align: center; padding: 20px; width: 25%; background-color: #28A745; color: white; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;cursor:pointer"
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
            <form method="post" style="display: flex; justify-content: space-evenly; align-items: center; padding: 50px; background-color: #ffffff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card">
                    <button class="acti" name="submit1" onclick="active(this)">Last Month</button>
                </div>
                <div class="card">
                    <button  name="submit2" onclick="active(this)">2 Month</button>
                </div>
                <div class="card">
                    <button  name="submit3" onclick="active(this)">3 Month</button>
                </div>
                <div class="card">
                    <button name="submit4" onclick="active(this)">4 Month</button>
                </div>
                <div class="card">
                    <button name="submit5" onclick="active(this)">5 Month</button>
                </div>
                <div class="card">
                    <button name="submit6"onclick="active(this)">6 Month</button>
                </div>
                <div class="card">
                    <button name="submit7" onclick="active(this)">7 Month</button>
                </div>
                <div class="card">
                    <button name="submit8"onclick="active(this)">8 Month</button>
                </div>
                <div class="card">
                    <button name="submit9" onclick="active(this)">9 Month</button>
                </div>
                <div class="card">
                    <button name="submit10" onclick="active(this)">10 Month</button>
                </div>
                <div class="card">
                    <button name="submit11" onclick="active(this)">11 Month</button>
                </div>
                <div class="card">
                    <button name="submit12" onclick="active(this)">12 Month</button>
                </div>
            </form>
            <div style="display: flex; justify-content: space-evenly; align-items: center; padding: 20px;PADDING-BOTTOM:100px; background-color: #ffffff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="border: 2px solid black; padding:20px 50px">Total Sales:  <?php echo loadtotal($DBCON)?></h2>
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
    const openParty = () => {
        window.location = "add-party.php"
    }
</script>
<script>
    const openCompany = () => {
        window.location = "add-company.php"
    }
</script>
<script>
    const openProducts = () => {
        window.location = "add-product.php"
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

<?php 
    
    function loadtotal($DBCON){
        if(isset($_POST['submit1'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit2'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 2 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit3'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 3 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit4'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 4 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit5'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 5 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit6'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 6 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit7'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 7 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit8'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 8 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit9'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 9 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit10'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 10 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit11'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 11 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else if(isset($_POST['submit12'])){
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 12 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        else{
            $id = '';
            $total = 0;
            $sql1 = "SELECT * FROM `billheader`
                    WHERE `date` >= DATE_FORMAT(CURDATE() - INTERVAL 1 MONTH, '%Y-%m-01')
                    AND `date` < DATE_FORMAT(CURDATE(), '%Y-%m-01');";
            $res1 = mysqli_query($DBCON, $sql1);
            while($row = mysqli_fetch_array($res1)){
                $id = $row['id'];
                $sql2 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
                $res2 = mysqli_query($DBCON, $sql2) OR die("billing Details Failed");
                while($row1 = mysqli_fetch_array($res2)){
                    $total += $row1['price'] * $row1['qty'];
                }

            }
            return $total;
        }
        
    }
?>
<script>
    function active(button) {
        // Remove the 'acti' class from all buttons
        const buttons = document.querySelectorAll("button");
        buttons.forEach(btn => btn.classList.remove("acti"));

        // Add the 'acti' class to the clicked button
        button.classList.add("acti");
    }
</script>