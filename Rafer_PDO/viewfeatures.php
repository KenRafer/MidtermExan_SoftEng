<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Features</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $instrument = getInstrumentByID($pdo, $_GET['instrument_id']); ?>
	<h1>Instrument: <?php echo $instrument['name']; ?></h1>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Feature ID</th>
	    <th>Feature Name</th>
	    <th>Details</th>
	  </tr>
	  <?php $features = getFeaturesByInstrument($pdo, $_GET['instrument_id']); ?>
	  <?php foreach ($features as $feature) { ?>
	  <tr>
	  	<td><?php echo $feature['feature_id']; ?></td>	  	
	  	<td><?php echo $feature['feature_name']; ?></td>	  	
	  	<td><?php echo $feature['details']; ?></td>  	
	  </tr>
	<?php } ?>
	</table>
</body>
</html>
