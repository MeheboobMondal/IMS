<?php
// session_start();
include '../connection.php';

$total = 0;

$sql = "SELECT total FROM tempproduct";
$res = mysqli_query($DBCON, $sql) or die("load-total-price failed");
while($row = mysqli_fetch_array($res)){
    $total += $row['total'];
}




echo $total;
?>
