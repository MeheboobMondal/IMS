<?php
session_start();
if (!isset($_SESSION['admin'])) {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
include "header.php";
include "sidebar.php";
include "./connection.php";
?>


    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="#" class="tip-bottom"><i class="icon-home"></i>
                    Stock Master</a></div>
        </div>
        <!--End-breadcrumbs-->
        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:200px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:200px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Purchase From These Dates</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>

                <br>


                <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



                <div class="span12">

                    <div class="widget-content nopadding">
                    <?php 
                    if(isset($_POST['submit1'])){
                    ?>
                    <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Purchase By</th>
                        <th>Product Company</th>
                        <th>Product Name</th>
                        <th>Product Unit</th>
                        <th>Packing Size</th>
                        <th>Product Qty</th>
                        <th>Price</th>
                        <th>Party Name</th>
                        <th>Purchase Type</th>
                        <th>Purchase Date</th>
                        <th>Expiry Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM purchesmaster WHERE (expiry_date >= '$_POST[dt]') AND (expiry_date <= '$_POST[dt2]')";

                        $result = mysqli_query($DBCON, $sql) OR die("Select Query Failed");
                        $count = 1;
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td><?php echo $row['userName']?></td>
                                    <td><?php echo $row['company_name']?></td>
                                    <td><?php echo $row['product_name']?></td>
                                    <td><?php echo $row['unit']?></td>
                                    <td><?php echo $row['pack_size']?></td>
                                    <td><?php echo $row['quntity']?></td>
                                    <td><?php echo $row['price']?></td>
                                    <td><?php echo $row['party_name']?></td>
                                    <td><?php echo $row['payment_method']?></td>
                                    <td><?php echo $row['purchesDate']?></td>
                                    <td><?php echo $row['expiry_date']?></td>
                                </tr>
                                <?php
                                $count ++;
                            }
                        }
                        else{
                            ?>
                            <script>
                                alert("No Product Found!!")
                            </script>
                            <?php
                        }
                        ?>
                    </tbody>
                    </table>
                    <?php
                    }
                    else{
                    ?>
                    <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Purchase By</th>
                        <th>Product Company</th>
                        <th>Product Name</th>
                        <th>Product Unit</th>
                        <th>Packing Size</th>
                        <th>Product Qty</th>
                        <th>Price</th>
                        <th>Party Name</th>
                        <th>Purchase Type</th>
                        <th>Purchase Date</th>
                        <th>Expiry Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM purchesmaster";
                        $result = mysqli_query($DBCON, $sql) OR die("Select Query Failed");
                        $count = 1;
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?php echo $count?></td>
                                <td><?php echo $row['userName']?></td>
                                <td><?php echo $row['company_name']?></td>
                                <td><?php echo $row['product_name']?></td>
                                <td><?php echo $row['unit']?></td>
                                <td><?php echo $row['pack_size']?></td>
                                <td><?php echo $row['quntity']?></td>
                                <td><?php echo $row['price']?></td>
                                <td><?php echo $row['party_name']?></td>
                                <td><?php echo $row['payment_method']?></td>
                                <td><?php echo $row['purchesDate']?></td>
                                <td><?php echo $row['expiry_date']?></td>
                            </tr>
                            <?php
                            $count ++;
                        }
                        ?>
                    </tbody>
                    </table>
                    <?php
                    }
                    ?>
                      

                    </div>

                </div>
            </div>


        </div>


    </div>




<?php
include "footer.php";
?>



