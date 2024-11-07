<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Musical Instruments</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register.php");
    exit;
}
?>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</h1>
<p><a href="logout.php">Logout</a>
<a href="vieworders.php"><button>View Orders</button></a></p>
	<h1>Welcome to Tugtugin!</h1>
    <h2>Instruments List</h2>
	<?php $allInstruments = getAllInstruments($pdo); ?>
	<?php foreach ($allInstruments as $instrument) { ?>
	<div class="container" style="border: 1px solid; width: 50%; padding: 20px; margin-top: 20px;">
		<h3>Instrument: <?php echo $instrument['name']; ?></h3>
		<h3>Brand: <?php echo $instrument['brand']; ?></h3>
		<h3>Type: <?php echo $instrument['type']; ?></h3>
		<h3>Price: $<?php echo $instrument['price']; ?></h3>

		<div class="editAndDelete" style="float: right;">
		<a href="placeorder.php?instrument_id=<?php echo $instrument['instrument_id']; ?>" style="margin-left: 10px;">Place Order</a>
			<a href="viewfeatures.php?instrument_id=<?php echo $instrument['instrument_id']; ?>">View Features</a>
		</div>
	</div>
	<?php } ?>
</body>
</html>
