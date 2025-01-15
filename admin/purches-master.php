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
                                    <select name="companyName" id="" class="span11" onchange="product(this.value)">
                                        <option>Select</option>
                                        <?php
                                        $sql = "SELECT * FROM company";
                                        $res = mysqli_query($DBCON, $sql) or die("company Query Failed");
                                        while ($row = mysqli_fetch_array($res)) {
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
                                <div class="controls" id="fr">

                                    <select name="" id="" class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls" id="un">

                                    <select name="" id="" class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pack Size :</label>
                                <div class="controls" id="ps1">

                                    <select name="" id="" class="span11">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Enter Quntity :</label>
                                <div class="controls">

                                    <input type="text" name="quntity" required class="span11">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Enter Price :</label>
                                <div class="controls">

                                    <input type="text" name="price" required class="span11">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Select Party Name:</label>
                                <div class="controls">

                                    <select name="selectParty" id="" class="span11">
                                        <option>Select</option>
                                        <?php
                                        $sql_one = "SELECT * FROM partyinfo";
                                        $res_one = mysqli_query($DBCON, $sql_one) or die("PartyInfor query failed");
                                        while ($row = mysqli_fetch_array($res_one)) {
                                            echo "<option>";
                                            echo $row['bussiness_name'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Payment Method :</label>
                                <div class="controls">

                                    <select name="pmethod" id="" class="span11">
                                        <option>Cash</option>
                                        <option>Debit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Expaire Date :</label>
                                <div class="controls">

                                    <input type="text" name="dt" id="dt" class="span11" required pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>


                            <div class="form-actions" style="display:flex;flex-direction:column;align-items:center">
                                <p class="btn-danger pull-left" id="user" style="display:none;padding: 8px 10px;width:20%">This Product already Exist</p>
                                <button type="submit" class="btn btn-success" style="width:30%;padding: 8px 10px;" name="save">Save</button>
                                <p class="btn-success pull-left" id="user-success" style="display:none;padding: 8px 10px;width:20%;margin-top:10px"> Product purches Successfully</p>
                            </div>
                        </form>
                    </div>

                </div>

                <?php
                $purchesDate = date("Y-m-d");

                if (isset($_POST['save'])) {
                    $sql = "INSERT INTO purchesmaster VALUES(NULL,'$_POST[companyName]','$_POST[productName]','$_POST[unitName]','$_POST[packSize]','$_POST[quntity]','$_POST[price]','$_POST[selectParty]','$_POST[pmethod]','$_POST[dt]','$purchesDate','$_SESSION[admin]')";
                    $res = mysqli_query($DBCON, $sql) or die("Insert into perches query failed");

                    // copy perches
                    $sqlTwo = "INSERT INTO copypurches VALUES(NULL,'$_POST[companyName]','$_POST[productName]','$_POST[unitName] ','$_POST[packSize]','$_POST[quntity]','$_POST[price]','$_POST[selectParty]')";
                    $resultTwo = mysqli_query($DBCON, $sqlTwo) or die("swlTwo Failed");
                    if ($res) {
                ?>
                        <script>
                            let msg = document.getElementById('user-success')
                            msg.style.display = "block"
                            setTimeout(() => {
                                window.location = "purches-master.php"
                            }, 2000)
                        </script>
                <?php
                    }

                    $count = 0;
                    $sql1 = "SELECT * FROM stock WHERE product_company = '$_POST[companyName]' and product_name = '$_POST[productName]' and product_unit = '$_POST[unitName]'";
                    $res1 = mysqli_query($DBCON, $sql1) or die("select stock query failed");
                    $count = mysqli_num_rows($res1);
                    if ($count == 0) {
                        $sql2 = "INSERT INTO stock values(NULL,'$_POST[companyName]','$_POST[productName]','$_POST[unitName]', '$_POST[packSize]','$_POST[quntity]', '$_POST[price]')";
                        $res2 = mysqli_query($DBCON, $sql2) or die("insert stock query failed");
                    } else {
                        $sql3 = "UPDATE stock set product_quntity = product_quntity+$_POST[quntity] WHERE product_company = '$_POST[companyName]' and product_name = '$_POST[productName]' and product_unit = '$_POST[unitName]'";
                        $res3 = mysqli_query($DBCON, $sql3) or die("update stock query failed");
                    }
                    

                       
                    
                }
                ?>


                <!--end-main-container-part-->

                <!--Footer-part-->

                <?php
                include "footer.php";
                ?>

                <script type="text/javascript">
                    function product(companyName) {
                        let xhttp = new XMLHttpRequest();
                        // let companyName =companyName;
                        // alert(companyName)


                        xhttp.onreadystatechange = () => {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                document.getElementById('fr').innerHTML = xhttp.responseText
                            } else {
                                document.getElementById('fr').innerHTML = "404 Error"
                            }
                        }

                        xhttp.open("GET", "ajax/load-product.php?comName=" + companyName, true)
                        xhttp.send()
                    }
                    const unit = (product_name) => {
                        let unit = new XMLHttpRequest
                        unit.onreadystatechange = () => {
                            if (unit.readyState == 4 && unit.status == 200) {
                                document.getElementById('un').innerHTML = unit.responseText
                            } else {
                                document.getElementById('un').innerHTML = "404 Error"

                            }
                        }
                        unit.open("GET", "ajax/load-unit.php?pn=" + product_name, true)
                        unit.send()
                    }
                    const packSize = (unit1, prName) => {
                        let xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                document.getElementById('ps1').innerHTML = xhr.responseText;
                            } else if (xhr.readyState == 4) {
                                document.getElementById('ps1').innerHTML = "404 Error";
                            }
                        };

                        xhr.open("GET", "ajax/load-packSize.php?un=" + unit1 + "&pn=" + prName, true);
                        xhr.send();
                    };
                </script>