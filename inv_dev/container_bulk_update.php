<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$x = 0;
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Bulk Update</title>
</head>

<body>
<form method="POST" action="../cont_bulk_assign.php/?id=<?php echo $id; ?>">
<table>
<tr><th>Device Serial</th><th>Model</th><th>Location</th><th>Disposition</th><th>Update</th></tr>
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
	echo "<tr><td><a href=\"../device_details.php/?id=" . $ds . "\">" . $ds . 
		 "</a></td><td>" . $mn . 
		 "</td><td>" . $s . 
		 "</td><td>" . $di .
		 "</td><td><input type=\"checkbox\" value=\"" . $ds . "\" name=\"dev" . $x . "\">"  . "</td></tr>";
		 $x++;
}
$dRun->close();
?>
</table>
<input type="hidden" value="<?php echo $x; ?>" name="num">
<br><input type="submit">
</form>
</body>
</html>