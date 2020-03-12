<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Ebay- Device Details</title>
</head>

<body>
<table>
<?php
$sql = "select serial, rec_date, model.name, dev_type.name, grade from device, dev_type, dev_condition, model
		where type_id = dev_type.id
		and condition_id = dev_condition.id
		and model_id = model.id
		and serial = ?;";
$run = $db->prepare($sql);
$run->bind_param("s", $id);
$run->execute();
$run->bind_result($s, $r, $m, $t, $g);
while($run->fetch())
{
	echo "<tr><th>Device Serial</th><td>" . $s . "</td></tr>" .
		 "<tr><th>Date Received</th><td>" . $r . "</td></tr>" . 
		 "<tr><th>Model</th><td>" . $m . "</td></tr>" . 
		 "<tr><th>Device Type</th><td>" . $t . "</td></tr>" . 
		 "<tr><th>Condition</th><td>" . $g . "</td></tr>";
}
?>
</table>
</body>
</html>