<?php
session_start();
if (!isset($_SESSION['user'])) {
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


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Return Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <form class="form-inline" action="" name="form1" method="post" style="margin-bottom:10px">
                <div class="form-group">
                    <label for="email">Select Start Date</label>
                    <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:200px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender">
                </div>
                <div class="form-group">
                    <label for="email">Select End Date</label>
                    <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender" class="form-control" style="width:200px;border-style:solid; border-width:1px; border-color:#666666">
                </div>
                <button type="submit" name="submit1" class="btn btn-success">Show Return From These Dates</button>
                <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
            </form>
            <table class="table table-bordered">
                <tr>
                    <th>Bill No</th>
                    <th>Return By</th>
                    <th>Return Date</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Product Unit</th>
                    <th>Packing Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                if(isset($_POST['submit1'])){
                    $sql = "SELECT * FROM returnproduct WHERE (return_date >= '$_POST[dt]') AND (return_date <= '$_POST[dt2]')";
                    $res = mysqli_query($DBCON, $sql) or die("returnProduct Query Failed");
                    if(mysqli_num_rows($res) > 0){
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['bill_no'] ?></td>
                                    <td><?php echo $_SESSION['user'] ?></td>
                                    <td><?php echo $row['return_date'] ?></td>
                                    <td><?php echo $row['product_company'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['product_unit'] ?></td>
                                    <td><?php echo $row['packing_size'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td><?php echo $row['total'] ?></td>
                                </tr>
                            <?php
                            }
                    }
                    else{
                        ?>
                        <script>
                            alert("No Record Found!!")
                        </script>
                        <?php
                    }
                }
                else{
                    $sql = "SELECT * FROM returnproduct";
                $res = mysqli_query($DBCON, $sql) or die("returnProduct Query Failed");
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row['bill_no'] ?></td>
                        <td><?php echo $_SESSION['user'] ?></td>
                        <td><?php echo $row['return_date'] ?></td>
                        <td><?php echo $row['product_company'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['product_unit'] ?></td>
                        <td><?php echo $row['packing_size'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                    </tr>
                <?php
                }
            }
                ?>
                
            </table>
        </div>

    </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<?php
include "footer.php";
?>