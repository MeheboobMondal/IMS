<?php 
include "../connection.php";
$companyName = $_GET['comName'];
$sql = "SELECT * FROM product WHERE company_name = '$companyName'";
$res = mysqli_query($DBCON, $sql) or die("load product query failed");
?>
<select name="productName" id="pr" class="span11" onchange="unit(this.value)">
    <option>Select</option>
    <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option>";
            echo $row['product_name'];
            echo "</option>";
        }
    ?>
</select>