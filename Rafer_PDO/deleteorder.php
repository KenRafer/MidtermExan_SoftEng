<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_GET['order_id'])) {
    echo "Order ID is missing.";
    exit;
}

$order_id = $_GET['order_id'];
$order = getOrderByID($pdo, $order_id);

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
    <title>Delete Order</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Delete Order</h1>
    <p>Are you sure you want to delete the following order?</p>
    <p>Order ID: <?php echo $order['order_id']; ?></p>
    <p>Instrument: <?php echo $order['instrument_name']; ?></p>
    <p>Quantity: <?php echo $order['quantity']; ?></p>
    <form action="core/handleForms.php?order_id=<?php echo $order_id; ?>" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
        <input type="submit" name="deleteOrderBtn" value="Delete Order">
    </form>
    <a href="vieworders.php">Cancel</a>
</body>
</html>