<?php 
include "connection.php";
$id = $_GET['id'];

$sql = "DELETE FROM partyinfo WHERE id = $id";
$res = mysqli_query($DBCON, $sql) or die("Query Failed");
if($res){
    ?>
    <script>
        window.location = "add-party.php";
    </script>
    <?php 
}