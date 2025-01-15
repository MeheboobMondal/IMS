<?php 
    include "connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM stock WHERE id = $id";
    $result = mysqli_query($DBCON, $sql) or die("Delte Query Failed");
    if($result){
        ?>
        <script>
            window.location = "stock-master.php"
        </script>
        <?php
    }