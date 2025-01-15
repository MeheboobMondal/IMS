<?php 
include "../connection.php";
 $id1 = $_GET['id'];
 $price1 = $_GET['price'];

 

 
 
   
 $sql5 = "UPDATE purchesmaster SET price = '$price1' WHERE id = '$id1'";
 $res = mysqli_query($DBCON, $sql5) OR die("sql failed");
 if($res){
     echo "Price Updated Successfully!!";
 }
 else{
     echo "Somthing Went Wrong!!";
 }
    
    

    