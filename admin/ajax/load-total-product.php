<?php
// session_start();
include "../connection.php";
?>
<table class="table table-bordered">
    <tr>
        <th>Product Company</th>
        <th>Product Name</th>
        <th>Product Unit</th>
        <th>Packing Size</th>
        <th>Product Price</th>
        <th>Product Qty</th>
        <th>Total</th>
        <!-- <th>Edit</th> -->
        <th>Delete</th>
    </tr>
    <?php
    $qty_found = 0;
    $qty_session = "";
    $max = 0;
   $sql = "SELECT * FROM tempproduct";
   $res = mysqli_query($DBCON, $sql) OR die("Unable to load product!!!");
   $count = 1;
   while($row = mysqli_fetch_array($res)){
    ?>
    <tr?>
    <td><?php echo $row['product_company']?></td>
    <td><?php echo $row['product_name']?></td>
    <td><?php echo $row['product_unit']?></td>
    <td><?php echo $row['packing_size']?></td>
    <td><?php echo $row['product_price']?></td>
    <td><input type="text" id="tt<?php echo $count?>" value="<?php echo $row['product_qty']?>"><i style="font-size:17px; margin-left: 10px;cursor:pointer"class="fa-solid fa-repeat" onclick="editQty(document.getElementById('tt<?php echo $count?>').value,'<?php echo $row['product_company']?>','<?php echo $row['product_name']?>','<?php echo $row['product_unit']?>','<?php echo $row['packing_size']?>','<?php echo $row['product_price']?>')"></i></td>
    <td><?php echo $row['total']?></td>
    <!-- <td>edit</td> -->
    <td onclick="deletepro(<?php echo $row['id']?>)">delete</td>
   </tr
   <?php
   $count += 1;
   }
   ?>
            
    






</table>