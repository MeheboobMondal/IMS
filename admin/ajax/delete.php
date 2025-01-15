<?php
session_start();

// Check if 'id' is set in the URL and if it's a valid index in the session cart
if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])) {
    $id = $_GET['id'];
    
    // Remove the item from the cart
    unset($_SESSION['cart'][$id]);

    // Re-index the cart array to avoid gaps in indices
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

// Redirect to sales-master.php after deletion
header("Location: sales-master.php");
exit;
?>
