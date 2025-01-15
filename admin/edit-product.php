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
$pack_size = "";

// Retrieve product ID
$id = mysqli_real_escape_string($DBCON, $_GET['id']);

// Fetch product data for editing
$sql = "SELECT * FROM product WHERE id = $id";
$res = mysqli_query($DBCON, $sql) or die("Error fetching product data");
while ($row = mysqli_fetch_array($res)) {
    $company_name = $row['company_name'];
    $product_name = $row['product_name'];
    $unit_name = $row['unit'];
    $pack_size = $row['pack_size'];
}
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Update Product</a></div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-align-justify"></i></span>
                        <h5>Update Product</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <!-- Company Name -->
                            <div class="control-group">
                                <label class="control-label">Company Name :</label>
                                <div class="controls">
                                    <select name="companyName1" id="companySelect" class="span11">
                                        <?php
                                        $sql = "SELECT * FROM company";
                                        $res = mysqli_query($DBCON, $sql) or die("Company query failed");
                                        while ($row = mysqli_fetch_array($res)) {
                                            $selected = ($row['company_name'] == $company_name) ? "selected" : "";
                                            echo "<option value=\"{$row['company_name']}\" $selected>{$row['company_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Product Name -->
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Add Product Name" value="<?php echo htmlspecialchars($product_name); ?>" name="productName" required />
                                </div>
                            </div>

                            <!-- Unit Name -->
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls">
                                    <select name="unitName" id="unitSelect" class="span11">
                                        <?php
                                        $sql = "SELECT * FROM unit";
                                        $res = mysqli_query($DBCON, $sql) or die("Unit query failed");
                                        while ($row = mysqli_fetch_array($res)) {
                                            $selected = ($row['unit_name'] == $unit_name) ? "selected" : "";
                                            echo "<option value=\"{$row['unit_name']}\" $selected>{$row['unit_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Pack Size -->
                            <div class="control-group">
                                <label class="control-label">Pack Size :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Unit Name" name="packging" value="<?php echo htmlspecialchars($pack_size); ?>" required />
                                </div>
                            </div>

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
                    $companyName1 = mysqli_real_escape_string($DBCON, $_POST['companyName1']);
                    $productName = mysqli_real_escape_string($DBCON, $_POST['productName']);
                    $unitName = mysqli_real_escape_string($DBCON, $_POST['unitName']);
                    $packSize = mysqli_real_escape_string($DBCON, $_POST['packging']);

                    // Check for existing product
                    $sql1 = "SELECT * FROM product WHERE company_name = '$companyName1' AND product_name = '$productName' AND unit = '$unitName' AND pack_size = '$packSize'";
                    $result1 = mysqli_query($DBCON, $sql1) or die("SQL failed");
                    
                    if (mysqli_num_rows($result1) > 0) {
                        echo "<script>document.getElementById('user').style.display = 'block';</script>";
                    } else {
                        // Update product
                        $sql = "UPDATE product SET company_name = '$companyName1', product_name = '$productName', unit = '$unitName', pack_size = '$packSize' WHERE id = $id";
                        $result = mysqli_query($DBCON, $sql) or die("SQL update failed");

                        if ($result) {
                            echo "<script>alert('Product Updated Successfully'); window.location = 'add-product.php';</script>";
                        } else {
                            echo "<p>User update failed.</p>";
                        }
                    }
                }

                include "footer.php";
                ?>
