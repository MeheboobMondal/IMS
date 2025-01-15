<?php 
include "../connection.php";
$productName = $_GET['pn'];
$sql = "SELECT * FROM product WHERE product_name = '$productName'";
$res = mysqli_query($DBCON, $sql) or die("load product query failed");
?>
<select name="unitName" id="un" class="span11" onchange="packSize(this.value, '<?php echo $productName?>')" >
    <option>Select</option>
    <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option>";
            echo $row['unit'];
            echo "</option>";
        }
    ?>
</select>