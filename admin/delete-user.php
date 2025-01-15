<?php 
include "connection.php";
$id = $_GET['id'];

$sql = "DELETE FROM userregistration WHERE id = $id";
$res = mysqli_query($DBCON, $sql) or die("Query Failed");
if($res){
    ?>
    <script>
        window.location = "add-user.php";
        alert("Delete Successfully!!")
    </script>
    <?php 
}