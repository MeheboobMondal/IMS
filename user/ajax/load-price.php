<?php 
include "../connection.php";
$company_name = $_GET['comp'];
$product_name = $_GET['pro'];
$unit_name = $_GET['un'];
$packing_size = $_GET['packSize'];



$sql = "SELECT * FROM stock WHERE product_company = '$company_name' AND product_name = '$product_name' AND product_unit = '$unit_name' AND packing_size = '$packing_size'";

$res = mysqli_query($DBCON, $sql) or die("Load price failed");
while($row = mysqli_fetch_array($res)){
    echo $row['product_selling_price'];
}