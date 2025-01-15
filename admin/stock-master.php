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
                Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Stock Master</h5>
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
                                    <th>Product Quntity</th>
                                    <th>Product Selling Price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM stock";
                                $result1 = mysqli_query($DBCON, $sql);
                                $count = 1;
                                while ($row = mysqli_fetch_array($result1)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo $count ?></td>
                                        <td class="center"><?php echo $row['product_company'] ?></td>
                                        <td class="center"><?php echo $row['product_name'] ?></td>
                                        <td class="center"><?php echo $row['product_unit'] ?></td>
                                        <td class="center"><?php echo $row['packing_size'] ?></td>
                                        <td class="center"><?php echo $row['product_quntity'] ?></td>
                                        <td class="center"><?php echo $row['product_selling_price'] ?></td>

                                        <td class="center"><a href="edit-stock-master.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="center"><a href="delete-stock.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>

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

                

                ?>


                <!--end-main-container-part-->

                <!--Footer-part-->

                <?php
                include "footer.php";
                ?>