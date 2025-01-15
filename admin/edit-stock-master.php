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
include "connection.php";



// Initialize variables
$company_name = "";
$product_name = "";
$unit_name = "";
$product_quntity = "";
$product_selling_price = "";

// Retrieve product ID
$id = mysqli_real_escape_string($DBCON, $_GET['id']);

// Fetch product data for editing
$sql = "SELECT * FROM stock WHERE id = $id";
$res = mysqli_query($DBCON, $sql) or die("Error fetching product data");
while ($row = mysqli_fetch_array($res)) {
    $company_name = $row['product_company'];
    $product_name = $row['product_name'];
    $unit_name = $row['product_unit'];
    $product_quntity = $row['product_quntity'];
    $product_selling_price = $row['product_selling_price'];
}
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Update Stock</a></div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-align-justify"></i></span>
                        <h5>Update Stock</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <!-- Company Name -->
                            <div class="control-group">
                                <label class="control-label">Company Name :</label>
                                <div class="controls">
                                    <input type="text" name="cmp_name" value="<?php echo $company_name?>" readonly class="span11">
                                </div>
                            </div>

                            <!-- Product Name -->
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Add Product Name" value="<?php echo $product_name;  ?>" name="productName" readonly />
                                </div>
                            </div>

                            <!-- Unit Name -->
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls">
                                <input type="text" name="unit" value="<?php echo $unit_name?>" readonly class="span11">  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Quntity :</label>
                                <div class="controls">
                                <input type="text" name="quntity" value="<?php echo $product_quntity?>" readonly class="span11">  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Selling Price :</label>
                                <div class="controls">
                                <input type="text" name="sale" value="<?php echo $product_selling_price?>" class="span11">  
                                </div>
                            </div>

                            <!-- Pack Size -->
                            

                            <!-- Submit Button and Alerts -->
                            <div class="form-actions" style="display:flex;flex-direction:column;align-items:center">
                                <p class="btn-danger pull-left" id="user" style="display:none;padding: 8px 10px;width:20%">This Product already exists</p>
                                <button type="submit" class="btn btn-success" style="width:30%;padding: 8px 10px;" name="save">Update</button>
                                <p class="btn-success pull-left" id="user-success" style="display:none;padding: 8px 10px;width:20%;margin-top:10px">Product updated successfully</p>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_POST['save'])) {
                    $companyName1 = mysqli_real_escape_string($DBCON, $_POST['cmp_name']);
                    $productName = mysqli_real_escape_string($DBCON, $_POST['productName']);
                    $unitName = mysqli_real_escape_string($DBCON, $_POST['unit']);
                    $quntity = mysqli_real_escape_string($DBCON, $_POST['quntity']);
                    $sale = mysqli_real_escape_string($DBCON, $_POST['sale']);

                    // Check for existing product
                    
                        // Update product
                        $sql = "UPDATE stock SET product_company = '$companyName1', product_name = '$productName', product_unit = '$unitName', product_quntity = '$quntity', product_selling_price = '$sale' WHERE id = $id";
                        $result = mysqli_query($DBCON, $sql) or die("SQL update failed");

                        if ($result) {
                            echo "<script>alert('Product Updated Successfully'); window.location = 'stock-master.php';</script>";
                        } else {
                            echo "<p>User update failed.</p>";
                        }
                    }
                

                include "footer.php";
                ?>
