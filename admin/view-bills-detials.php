<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        ?>
        <script>
            window.location = "index.php";
        </script>
        <?php
    }
    include "header.php";
    include "sidebar.php";
    include "./connection.php";
    $id = $_GET['id'];

?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Detaild Bill</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <h3 style="text-align:center">Detailed Bills</h3>
        <?php 
        $sql = "SELECT * FROM billheader WHERE id = '$id'";
        $res = mysqli_query($DBCON, $sql) OR die("Select BillHeader Failed");
        while($row = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td><b>Bill No: </b></td>
                <td><?php echo $row['billNo']?></td>
            </tr>
            <br>
            <tr>
                <td><b>Full Name: </b></td>
                <td><?php echo $row['FullName']?></td>
            </tr><br>
            <tr>
                <td><b>Bill Type: </b></td>
                <td><?php echo $row['billType']?></td>
            </tr><br>
            <tr>
                <td><b>Bill Date: </b></td>
                <td><?php echo $row['date']?></td>
            </tr>
            <?php
        }
        ?>
        <table class="table table-bordered" style="margin-top:10px">
            <tr>
                <th>Sl No</th>
                <th>Product Company</th>
                <th>Product Name</th>
                <th>Prdocut Unit</th>
                <th>Packing Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Return</th>
            </tr>
            <?php 
            $sql2 = "SELECT * FROM billingdetails WHERE bill_id = $id";
            $res2 = mysqli_query($DBCON, $sql2) OR die("Select BillingDetails Failed");
            $count = 1;
            $total = 0;
            while($row = mysqli_fetch_array($res2)){
            ?>
            <tr>
                <td><?php echo $count?></td>
                <td><?php echo $row['product_company']?></td>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo $row['product_unit']?></td>
                <td><?php echo $row['packing_size']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['qty']?></td>
                <td><?php echo $row['price']*$row['qty']?></td>
                <td><a href="return.php?id=<?php echo $row['id']?>"><i  style="color:red;"class="fa-solid fa-right-left"></i></a></td>
                <?php $total += $row['price']*$row['qty']?>
            </tr>
            <?php
            $count++;
            }
            ?>
        </table>
        <h4 style="text-align:left">Grand Total: <?php echo $total?></h4>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<?php 
    include "footer.php";
?>