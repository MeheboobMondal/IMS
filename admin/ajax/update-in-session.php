
<?php
// session_start();
include "../connection.php";

$company_name = $_GET['comp'];
$product_name = $_GET['pn'];
$unit_name = $_GET['un'];
$packing_size = $_GET['ps'];
$price = $_GET['price'];
$quantity = $_GET['qy'];
$total = $_GET['total'];



    
        $av_qty = 0;
        $exist_qty = 0;
        $exist_qty = check_the_qty($company_name, $product_name, $unit_name, $packing_size, $DBCON);
        // $exist_qty += $quantity;
        $av_qty = check_qty($company_name, $product_name, $unit_name, $packing_size, $DBCON);
        if($av_qty >= $quantity){
            // $check_product_no_session = check_product_no_session($company_name, $product_name, $unit_name, $packing_size);
            // $b = array("company_name" => $company_name, "product_name" => $product_name, "unit" => $unit_name, "packing_size" => $packing_size, "price" => $price, "qty" => $exist_qty);
            // $_SESSION['cart'][$check_product_no_session] = $b;
            $tt = $exist_qty * $price;
            $sql2 = "UPDATE tempproduct SET product_qty = '$quantity', total = '$total' WHERE product_company = '$company_name' AND product_name = '$product_name' AND product_unit = '$unit_name' AND packing_size = '$packing_size'";
            $RES = mysqli_query($DBCON, $sql2) or die("Query failed unable to update cart");
            echo "Product added successfully";
        }
        else{
            echo "out of stock";
        }
    



// Initialize cart if not set
function check_qty($product_company, $product_name, $product_unit, $packing_siz, $DBCON){
    $productQty = 0;
    $sql = "SELECT * FROM stock WHERE product_company = '$product_company' AND product_name = '$product_name' AND product_unit = '$product_unit' AND packing_size = '$packing_siz'";
    $res = mysqli_query($DBCON, $sql) or die("stock read failed");

    while($row = mysqli_fetch_array($res)){
        $productQty = $row['product_quntity'];
    }
    return $productQty;

}

//jhokon session array vetore same product dubar add to cart koar chesta korbo 

function check_duplicate_product($product_company, $product_name, $product_unit, $packing_siz){
    $found = 0;
    $max = sizeof($_SESSION['cart']);
    for($i = 0; $i < $max; $i++){
        if(isset($_SESSION['cart'][$i])){
            $company_name_session = "";
            $product_name_session = "";
            $unit_session = "";
            $packing_size_session = "";

            foreach($_SESSION['cart'][$i] as $key => $val){
               if($key == "company_name"){
                $company_name_session = $val;
               } 
               else if($key == "product_name"){
                $product_name_session = $val;
               }
               else if($key == "unit"){
                $unit_session = $val;
               }
               else if($key == "packing_size"){
                $packing_size_session = $val;
               }
            }
            if($company_name_session == $product_company && $product_name_session == $product_name && $unit_session == $product_unit && $packing_size_session == $packing_siz){
                $found += 1;
            }
        }
    }
    return $found;
}

function check_the_qty($product_company, $product_name, $product_unit, $packing_siz, $DBCON){
    $qty_found = 0;
    // $qty_session = 0;
    // $max = sizeof($_SESSION['cart']);
    // for($i = 0; $i < $max; $i++){
    //     $company_name_session = "";
    //         $product_name_session = "";
    //         $unit_session = "";
    //         $packing_size_session = "";
    //     if(isset($_SESSION['cart'][$i])){
            

    //         foreach($_SESSION['cart'][$i] as $key => $val){
    //            if($key == "company_name"){
    //             $company_name_session = $val;
    //            } 
    //            else if($key == "product_name"){
    //             $product_name_session = $val;
    //            }
    //            else if($key == "unit"){
    //             $unit_session = $val;
    //            }
    //            else if($key == "packing_size"){
    //             $packing_size_session = $val;
    //            }
    //            else if($key == "qty"){
    //             $qty_session = $val;
    //            }
    //         }
            // if($company_name_session == $product_company && $product_name_session == $product_name && $unit_session == $product_unit && $packing_size_session == $packing_siz){
            //     $qty_found = $qty_session;
        //     }
        // }
            // }
        $sql = "SELECT * FROM tempProduct WHERE product_company = '$product_company' AND product_name = '$product_name' AND product_unit = '$product_unit' AND packing_size = '$packing_siz'";
        $res = mysqli_query($DBCON, $sql) OR die("check duplicate error");
        while($row = mysqli_fetch_array($res)){
            return $qty_found = $row['product_qty'];
        }
    
    return $qty_found;
}

function check_product_no_session($product_company, $product_name, $product_unit, $packing_siz){
    $recordNo = 0;
    $max = sizeof($_SESSION['cart']);
    for($i = 0; $i < $max; $i++){
        if(isset($_SESSION['cart'][$i])){
            $company_name_session = "";
            $product_name_session = "";
            $unit_session = "";
            $packing_size_session = "";

            foreach($_SESSION['cart'][$i] as $key => $val){
               if($key == "company_name"){
                $company_name_session = $val;
               } 
               else if($key == "product_name"){
                $product_name_session = $val;
               }
               else if($key == "unit"){
                $unit_session = $val;
               }
               else if($key == "packing_size"){
                $packing_size_session = $val;
               }
            }
            if($company_name_session == $product_company && $product_name_session == $product_name && $unit_session == $product_unit && $packing_size_session == $packing_siz){
                $recordNo = $i;
            }
        }
    }
    return $recordNo;
}