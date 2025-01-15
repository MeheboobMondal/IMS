<?php
include "../header.php";
include "../sidebar.php";
session_start();

// Check if 'id' is set in the URL and if it's a valid index in the session cart
if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']])) {
    $id = $_GET['id'];
    $item = $_SESSION['cart'][$id];

    // Check if the form is submitted to update the item
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and update the fields from POST data
        $_SESSION['cart'][$id]['product_company'] = htmlspecialchars($_POST['product_company']);
        $_SESSION['cart'][$id]['product_name'] = htmlspecialchars($_POST['product_name']);
        $_SESSION['cart'][$id]['product_unit'] = htmlspecialchars($_POST['product_unit']);
        $_SESSION['cart'][$id]['packing_size'] = htmlspecialchars($_POST['packing_size']);
        $_SESSION['cart'][$id]['price'] = (float) $_POST['price'];
        $_SESSION['cart'][$id]['product_quantity'] = (int) $_POST['quantity'];

        // Redirect back to the cart page after updating
        header("Location: cart.php");
        exit;
    }
} else {
    // If the item ID is invalid, redirect to the cart page
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>

<h2>Edit Product</h2>
<form method="POST">
    <label>Product Company:</label>
    <input type="text" name="product_company" value="<?php echo htmlspecialchars($item['product_company']); ?>" required><br><br>

    <label>Product Name:</label>
    <input type="text" name="product_name" value="<?php echo htmlspecialchars($item['product_name']); ?>" required><br><br>

    <label>Product Unit:</label>
    <input type="text" name="product_unit" value="<?php echo htmlspecialchars($item['product_unit']); ?>" required><br><br>

    <label>Packing Size:</label>
    <input type="text" name="packing_size" value="<?php echo htmlspecialchars($item['packing_size']); ?>" required><br><br>

    <label>Product Price:</label>
    <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required><br><br>

    <label>Quantity:</label>
    <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['product_quantity']); ?>" min="1" required><br><br>

    <button type="submit">Update Product</button>
</form>

<a href="cart.php">Back to Cart</a>

</body>
</html>
