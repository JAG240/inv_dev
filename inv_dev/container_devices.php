<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Devices in Container</title>
</head>

<body>
<h2>Devices in Container #<?php echo $id; ?></h2>
<table>
<tr><th>Device Serial</th><th>Model</th><th>Location</th><th>Disposition</th></tr>
<?php
$dSQL = "select dev_serial, model.name, station, disposition.name
		 from dev_cont, device, model, dev_type, location, disposition
		 where cont_id = ?
		 and dev_serial = device.serial
		 and device.model_id = model.id
		 and type_id =  dev_type.id
		 and location_id = location.id
		 and disp_id = disposition.id;";
$dRun = $db->prepare($dSQL);
$dRun->bind_param("i", $id);
$dRun->execute();
$dRun->bind_result($ds, $mn, $s, $di);
while($dRun->fetch())
{
	echo "<tr><td>" . $ds . 
		 "</td><td>" . $mn . 
		 "</td><td>" . $s . 
		 "</td><td>" . $di .
		 "</td></tr>";
}
$dRun->close();
?>
</table>
<br>
<?php echo " <a href=\"../container_details.php/?id=" . $id . "\"><button type=\"button\">Container Details</button></a>"; ?>
</body>
</html>