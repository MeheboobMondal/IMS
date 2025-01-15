<?php 
$DBCON = mysqli_connect("localhost","root") or die("connectin failed");
mysqli_select_db($DBCON,"inventory_php") or die("connection failed");
if($DBCON == true){
    // echo "database connected";
}else{
    echo "database connectin failed";
}