<?php
session_start();

// Check if the cart exists in the session
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $max = count($_SESSION['cart']); // Count the items in the cart

    for ($i = 0; $i < $max; $i++) {
        // Check if the current item is an array
        if (isset($_SESSION['cart'][$i]) && is_array($_SESSION['cart'][$i])) {
            // Extract values using array keys
            $company_name = $_SESSION['cart'][$i]['company_name'] ?? '';
            $product_name = $_SESSION['cart'][$i]['product_name'] ?? '';
            $unit = $_SESSION['cart'][$i]['unit'] ?? '';
            $packing_size = $_SESSION['cart'][$i]['packing_size'] ?? '';
            $qty = $_SESSION['cart'][$i]['qty'] ?? '';

            // Output the product details
            echo htmlspecialchars("$company_name $product_name $unit $packing_size $qty");
            echo "<br>";
        }
    }
} else {
    echo "The cart is empty.";
}
?>
