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


?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Add Product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add Product</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Company Name :</label>
                                <div class="controls">
                                    <select name="companyName" id=""class="span11">
                                        <?php 
                                            $sql = "SELECT * FROM company";
                                            $res = mysqli_query($DBCON, $sql) OR die ("company Query Failed");
                                            while($row = mysqli_fetch_array($res)){
                                                echo "<option>";
                                                    echo $row['company_name'];
                                                echo "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Add Product Name" name="productName" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls">
                                    <select name="unitName" id=""class="span11">
                                        <?php 
                                            $sql = "SELECT * FROM unit";
                                            $res = mysqli_query($DBCON, $sql) OR die ("company Query Failed");
                                            
                                            while($row = mysqli_fetch_array($res)){
                                                echo "<option>";
                                                    echo $row['unit_name'];
                                                echo "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Packing Size :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Unit Name" name="packging" required />
                                </div>
                            </div>
                            


                            <div class="form-actions" style="display:flex;flex-direction:column;align-items:center">
                                <p class="btn-danger pull-left" id="user" style="display:none;padding: 8px 10px;width:20%">This Product already Exist</p>
                                <button type="submit" class="btn btn-success" style="width:30%;padding: 8px 10px;" name="save">Save</button>
                                <p class="btn-success pull-left" id="user-success" style="display:none;padding: 8px 10px;width:20%;margin-top:10px">This Product name already Exist</p>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Packeging Size</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM product";
                                $result1 = mysqli_query($DBCON, $sql);
                                $count = 1;
                                while ($row = mysqli_fetch_array($result1)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo $count ?></td>
                                        <td class="center"><?php echo $row['company_name'] ?></td>
                                        <td class="center"><?php echo $row['product_name'] ?></td>
                                        <td class="center"><?php echo $row['unit'] ?></td>
                                        <td class="center"><?php echo $row['pack_size'] ?></td>

                                        <td class="center"><a href="edit-product.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="center"><a href="delete-product.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>

                                    </tr>
                                    <?php
                                    $count += 1;
                                }
                                ?>





                            </tbody>
                        </table>
                    </div>
                </div>

                <?php

                if (isset($_POST['save'])) {
                    $companyName = mysqli_real_escape_string($DBCON, $_POST['companyName']);
                    $productName = mysqli_real_escape_string($DBCON, $_POST['productName']);
                    $unitName = mysqli_real_escape_string($DBCON, $_POST['unitName']);
                    $packSize = mysqli_real_escape_string($DBCON, $_POST['packging']);
                    


                    $sql = "SELECT * FROM product WHERE company_name = '$companyName' AND product_name = '$productName' AND unit = '$unitName' AND pack_size = '$packSize'";

                    $result = mysqli_query($DBCON, $sql) or die("SQL failed");
                    if (mysqli_num_rows($result) > 0) {
                ?>
                        <script>
                            let user = document.getElementById('user');
                            user.style.display = "block";
                        </script>
                        <?php
                    } else {
                        $sql1 = "INSERT INTO product VALUES(NULL, '$companyName', '$productName', '$unitName', '$packSize')";

                        $res = mysqli_query($DBCON, $sql1) or die("SQL2 Failed");

                        if ($res) {
                        ?>
                            <script>
                                let user1 = document.getElementById('user-success');
                                user1.innerHTML = "Product added Successful!!!";
                                user1.style.display = "block";
                                setTimeout(() => {
                                    window.location = "add-product.php"
                                }, 1000)
                            </script>
                <?php
                        } else {
                            echo "User registration failed";
                        }
                    }
                }

                ?>


                <!--end-main-container-part-->

                <!--Footer-part-->

                <?php
                include "footer.php";
                ?>