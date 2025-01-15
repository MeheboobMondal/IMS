<?php 
session_start();
if(!isset($_SESSION['user'])){
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php
}
include "./connection.php";

$id = $_GET['id'];

$billNoId = "";
$return_date = date("Y-m-d");
$product_company = "";
$product_name = "";
$product_unit = "";
$packing_size = "";
$price = "";
$qty = "";
$total = "";

$sql2 = "SELECT * FROM billingdetails WHERE id = $id";
$res1 = mysqli_query($DBCON, $sql2) OR die("Select billingDetails Failed");
while($row = mysqli_fetch_array($res1)){
    $product_company = $row['product_company'];
    $product_name = $row['product_name'];
    $product_unit = $row['product_unit'];
    $packing_size = $row['packing_size'];
    $price = $row['price'];
    $qty = $row['qty'];
    $billNoId = $row['bill_id'];
    
}


$sql3 = "SELECT billNo FROM billheader WHERE id = '$billNoId'";
$res2 = mysqli_query($DBCON, $sql3) OR die("select bill header failed");
$billNo = "";
while($row = mysqli_fetch_array($res2)){
    $billNo = $row['billNo'];
}

$total = $price * $qty;

$sql4 = "INSERT INTO returnproduct VALUES(NULL, '$_SESSION[user]','$billNo','$return_date','$product_company','$product_name','$product_unit','$packing_size','$price','$qty','$total')";
$res3 = mysqli_query($DBCON, $sql4) OR die("Insert returnProduct Failed");



$sql1 = "UPDATE stock SET product_quntity = product_quntity + $qty WHERE product_company = '$product_company' AND product_name = '$product_name' AND product_unit = '$product_unit' AND packing_size = '$packing_size'";
$res1 = mysqli_query($DBCON, $sql1) OR die("Update Stock Failed");
$sql = "DELETE FROM billingdetails WHERE id = '$id'";
$res = mysqli_query($DBCON, $sql) OR die("delete query Failed");


?>


<script>
    
    alert("Return Successfully!!")
    window.location = "view-bills.php"
</script>





