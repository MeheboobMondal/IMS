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
            
            <table class="table table-bordered">
                <tr>
                    <th>Sr No</th>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Product Unit</th>
                    <th>Packing Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php
                
                    $sql = "SELECT * FROM stock WHERE product_quntity < 5";
                    $res = mysqli_query($DBCON, $sql) or die("returnProduct Query Failed");
                    if(mysqli_num_rows($res) > 0){
                        $count = 1;
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $row['product_company'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['product_unit'] ?></td>
                                    <td><?php echo $row['packing_size'] ?></td>
                                    <td><?php echo $row['product_quntity'] ?></td>
                                    <td><?php echo $row['product_selling_price'] ?></td>
                                </tr>
                            <?php
                            $count++;
                            }
                    }
                    else{
                        ?>
                        <script>
                            alert("No Record Found!!")
                            window.location = "dashboard.php"
                        </script>
                        <?php
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