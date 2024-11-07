<?php 
session_start();
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Your Orders</h1>
    <table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Instrument</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Last Edited</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $orders = getAllOrders($pdo);
        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($order['order_id']) . "</td>";
            echo "<td>" . htmlspecialchars($order['name']) . "</td>";
            echo "<td>" . htmlspecialchars($order['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($order['order_date']) . "</td>";
           
                echo "<td>" . htmlspecialchars($order['last_edited']) . "</td>";
                echo "<td>
                        <a href='editorder.php?order_id=" . htmlspecialchars($order['order_id']) . "'>Edit</a>
                        <a href='deleteorder.php?order_id=" . htmlspecialchars($order['order_id']) . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>