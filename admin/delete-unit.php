<?php
include "connection.php"; 
$id = $_GET['id'];
$sql = "DELETE FROM unit WHERE unit_id = $id";
$res = mysqli_query($DBCON, $sql) or die("Query Failed");
if($res){
    ?>
    <script>
        window.location = "add-unit.php"
    </script>
    <?php
}