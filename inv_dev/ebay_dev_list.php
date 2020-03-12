<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Devices in Ebay</title>
</head>

<body>
<table>
<tr><th>Serial</th><th>Date Received</th><th>Disposition</th><th>Model</th></tr>
<?php 
$sql = "select serial, rec_date, disposition.name, model.name
		from device, disposition, model
		where location_id = 2
		and device.disp_id = disposition.id
		and model_id = model.id;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($s, $r, $d, $m);
while($run->fetch())
{
	echo "</tr><td><a href=\"ebay_details.php/?id=" . $s . "\">" . $s .
		 "</a></td><td>" . $r . 
		 "</td><td>" . $d . 
		 "</td><td>" . $m . 
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="ebay.php"><button type="button">Back</button></a>
</body>
</html>