<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewFeatureBtn'])) {
	$query = insertFeature($pdo, $_POST['featureName'], $_POST['details'], $_GET['instrument_id']);

	if ($query) {
		header("Location: ../viewfeatures.php?instrument_id=" . $_GET['instrument_id']);
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editFeatureBtn'])) {
	$query = updateFeature($pdo, $_POST['featureName'], $_POST['details'], $_GET['feature_id']);

	if ($query) {
		header("Location: ../viewfeatures.php?instrument_id=" . $_GET['instrument_id']);
	} else {
		echo "Update failed";
	}
}

if (isset($_POST['deleteFeatureBtn'])) {
	$query = deleteFeature($pdo, $_GET['feature_id']);

	if ($query) {
		header("Location: ../viewfeatures.php?instrument_id=" . $_GET['instrument_id']);
	} else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertCustomerBtn'])) {
    $query = insertCustomer($pdo, $_POST['username'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['placeOrderBtn'])) {
    $query = placeOrder($pdo, $_POST['customer_id'], $_POST['instrument_id'], $_POST['quantity']);
    if ($query) {
        header("Location: ../vieworders.php?customer_id=" . $_POST['customer_id']);
    } else {
        echo "Order placement failed";
    }
}

if (isset($_POST['updateOrderBtn'])) {
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        $quantity = $_POST['quantity'];

        $query = updateOrder($pdo, $order_id, $quantity);
        if ($query) {
            header("Location: ../vieworders.php");
            exit;
        } else {
            echo "Order update failed.";
        }
    } else {
        echo "Order ID is missing.";
    }
}

if (isset($_POST['deleteOrderBtn'])) {
    if (isset($_POST['order_id'])) {
        $order_id = $_POST['order_id'];

        $query = deleteOrder($pdo, $order_id);
        if ($query) {
            header("Location: ../vieworders.php");
            exit;
        } else {
            echo "Order deletion failed.";
        }
    } else {
        echo "Order ID is missing.";
    }
}

?>
