<?php  
function insertInstrument($pdo, $name, $type, $brand, $price, $description) {
	$sql = "INSERT INTO instruments (name, type, brand, price, description) VALUES (?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$name, $type, $brand, $price, $description]);

	return $executeQuery;
}

function updateInstrument($pdo, $name, $type, $brand, $price, $description, $instrument_id) {
	$sql = "UPDATE instruments SET name = ?, type = ?, brand = ?, price = ?, description = ? WHERE instrument_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$name, $type, $brand, $price, $description, $instrument_id]);

	return $executeQuery;
}

function deleteInstrument($pdo, $instrument_id) {
	$deleteFeatures = "DELETE FROM features WHERE instrument_id = ?";
	$deleteStmt = $pdo->prepare($deleteFeatures);
	$deleteStmt->execute([$instrument_id]);

	$sql = "DELETE FROM instruments WHERE instrument_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$instrument_id]);

	return $executeQuery;
}

function getAllInstruments($pdo) {
	$sql = "SELECT * FROM instruments";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	return $stmt->fetchAll();
}

function getInstrumentByID($pdo, $instrument_id) {
	$sql = "SELECT * FROM instruments WHERE instrument_id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$instrument_id]);

	return $stmt->fetch();
}

function getFeaturesByInstrument($pdo, $instrument_id) {
	$sql = "SELECT features.feature_id, features.name AS feature_name, features.details, instruments.name AS instrument_name
			FROM features
			JOIN instruments ON features.instrument_id = instruments.instrument_id
			WHERE features.instrument_id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$instrument_id]);

	return $stmt->fetchAll();
}

function insertFeature($pdo, $feature_name, $details, $instrument_id) {
	$sql = "INSERT INTO features (name, details, instrument_id) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$feature_name, $details, $instrument_id]);

	return $executeQuery;
}

function updateFeature($pdo, $feature_name, $details, $feature_id) {
	$sql = "UPDATE features SET name = ?, details = ? WHERE feature_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$feature_name, $details, $feature_id]);

	return $executeQuery;
}

function deleteFeature($pdo, $feature_id) {
	$sql = "DELETE FROM features WHERE feature_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$feature_id]);

	return $executeQuery;
}

function placeOrder($pdo, $customer_id, $instrument_id, $quantity) {
    $sql = "INSERT INTO orders (customer_id, instrument_id, quantity) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$customer_id, $instrument_id, $quantity]);
}

function getOrdersByUser($pdo, $user_id) {
    $sql = "SELECT orders.order_id, instruments.name AS instrument_name, orders.quantity, orders.order_date 
            FROM orders
            JOIN instruments ON orders.instrument_id = instruments.instrument_id
            WHERE orders.user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    return $stmt->fetchAll();
}

function getOrderByID($pdo, $order_id) {
    $sql = "SELECT orders.order_id, instruments.name AS instrument_name, orders.quantity, orders.order_date, orders.user_id 
            FROM orders
            JOIN instruments ON orders.instrument_id = instruments.instrument_id
            WHERE orders.order_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$order_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllOrders($pdo) {
    $sql = "
        SELECT o.order_id, i.name, o.quantity, o.order_date, o.last_edited 
        FROM orders o
        JOIN instruments i ON o.instrument_id = i.instrument_id
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateOrder($pdo, $order_id, $quantity) {
    $sql = "UPDATE orders SET quantity = ?, last_edited = NOW() WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$quantity, $order_id]);
}

function deleteOrder($pdo, $order_id) {
    $sql = "DELETE FROM orders WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$order_id]);
}

?>
