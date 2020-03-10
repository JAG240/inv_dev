<?php
require "db.php";
include_once("navbar.html");
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Device List</title>
</head>

<body>
<table>
<tr><th>Device Serial</th><th>Model</th><th>Location</th><th>Disposition</th></tr>
<?php
$dSQL = "select serial, model.name, station, disposition.name
		 from device, model, dev_type, location, disposition
		 where device.model_id = model.id
		 and type_id =  dev_type.id
		 and location_id = location.id
		 and disp_id = disposition.id;";
$dRun = $db->prepare($dSQL);
$dRun->execute();
$dRun->bind_result($ds, $m, $s, $d);
while($dRun->fetch())
{
	echo "</tr><td><a href=\"device_details.php/?id=" . $ds . "\">" . $ds . 
		 "</a></td><td>" . $m . 
		 "</td><td>" . $s . 
		 "</td><td>" . $d . 
		 "</td></tr>";
}
$dRun->close();
?>
</table>
<br><a href="devices.php"><button type="button">Back</button></a>
</body>
</html>