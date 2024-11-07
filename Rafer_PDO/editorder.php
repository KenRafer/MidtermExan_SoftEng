<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_GET['order_id'])) {
    echo "Order ID is missing.";
    exit;
}

$order = getOrderByID($pdo, $_GET['order_id']);
if (!$order) {
    echo "Order not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Your Order</h1>
    <form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>" method="POST">
        <p>
            <label for="quantity">Quantity</label> 
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($order['quantity']); ?>" required>
            <input type="submit" name="updateOrderBtn" value="Update Order">
        </p>
    </form>
</body>
</html>