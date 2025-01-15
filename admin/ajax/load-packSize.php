<?php 

include "../connection.php";
$unit_Name = $_GET['un'];
$product_Name = $_GET['pn'];

$sql = "SELECT * FROM product WHERE product_name = '$product_Name' and unit = '$unit_Name'";
$res = mysqli_query($DBCON, $sql) or die("load product query failed");
?>
<select name="packSize" id="valo" class="span11">
    <option>Select</option>
    <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option>";
            echo $row['pack_size'];
            echo "</option>";
        }
    ?>
</select>