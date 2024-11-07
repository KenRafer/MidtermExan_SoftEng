<?php
session_start();
require_once 'core/dbConfig.php';
require_once 'core/models.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['instrument_id'])) {
    $instrument_id = $_GET['instrument_id'];
    $user_id = $_SESSION['user_id'];
    
    try {
        $sql = "INSERT INTO orders (user_id, instrument_id, quantity, order_date) VALUES (?, ?, 1, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $instrument_id]);
        
        header("Location: vieworders.php");
        exit;
    } catch (PDOException $e) {
        echo "Error placing order: " . $e->getMessage();
    }
} else {
    echo "Instrument ID is missing.";
}
?>
