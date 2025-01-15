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
                Party Reports</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <form class="form-inline" action="" name="form1" method="post" style="margin-bottom:10px">
                <div class="form-group">
                    <label for="email">Select Party Name</label>
                    <select name="companyName" id="">
                        <option value="">Select</option>
                        <?php 
                        $sql = "SELECT bussiness_name FROM partyinfo";
                        $res = mysqli_query($DBCON, $sql) OR die("Select query failed");
                        while($row = mysqli_fetch_array($res)){

                        
                        ?>
                        <option value="<?php echo $row['bussiness_name']?>"><?php echo $row['bussiness_name']?></option>
                        <?php

                    }
                        ?>
                    </select>
                </div>
                
                <button type="submit" name="submit1" class="btn btn-success">Show Purchase From These Company</button>
                <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
            </form>
            <table class="table table-bordered">
                <tr>
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Packing Size</th>
                    <th>Quntity</th>
                    <th>Price</th>
                    <th>Party Name</th>
                    <th>Payment Method</th>
                    <th>Expiry Date</th>
                    <th>Purches Date</th>
                    <th>User Name</th>
                </tr>
                <?php
                
                if(isset($_POST['submit1'])){
                    $partyName = mysqli_real_escape_string($DBCON, $_POST['companyName']);
                   
                    $sql = "SELECT * FROM purchesmaster WHERE party_name = '$partyName'";
                    $res1 = mysqli_query($DBCON, $sql) or die("Party-report Query Failed");
                    if(mysqli_num_rows($res1) > 0){
                        
                        while ($row = mysqli_fetch_array($res1)) {
                        ?>
                            <tr>
                                <td><?php echo $row['company_name'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['unit'] ?></td>
                                <td><?php echo $row['pack_size'] ?></td>
                                <td><?php echo $row['quntity'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['party_name'] ?></td>
                                <td><?php echo $row['payment_method'] ?></td>
                                <td><?php echo $row['expiry_date'] ?></td>
                                <td><?php echo $row['purchesDate'] ?></td>
                                <td><?php echo $row['userName'] ?></td>
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
                    $sql = "SELECT * FROM purchesmaster";
                $res = mysqli_query($DBCON, $sql) or die("returnProduct Query Failed");
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row['company_name'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['unit'] ?></td>
                        <td><?php echo $row['pack_size'] ?></td>
                        <td><?php echo $row['quntity'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['party_name'] ?></td>
                        <td><?php echo $row['payment_method'] ?></td>
                        <td><?php echo $row['expiry_date'] ?></td>
                        <td><?php echo $row['purchesDate'] ?></td>
                        <td><?php echo $row['userName'] ?></td>
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