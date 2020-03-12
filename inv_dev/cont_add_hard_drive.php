<?php
require "db.php";
require "db2.php";
include_once("navbar2.html");
$id = $_GET['id'];
$x = 0;
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Receive Hard Drive</title>
</head>

<body>
<form method="POST" action="../cont_default_disp.php/?id=<?php echo $id; ?>">
<table>
<tr><th>Model</th><th>Device Serial</th><th>Hard Drive Serial</th></tr>
<?php
$sql = "select device.serial, model.name from device, dev_cont, model
		where device.serial = dev_cont.dev_serial
		and device.model_id = model.id
		and cont_id = ?
		and type_id = 1
		union
		select device.serial, model.name from device, dev_cont, model
		where device.serial = dev_cont.dev_serial
		and device.model_id = model.id
		and cont_id = ?
		and type_id = 2;";
$run = $db->prepare($sql);
$run->bind_param("ii", $id, $id);
$run->execute();
$run->bind_result($ds, $mn);

while($run->fetch())
{
	echo "<tr><td>" . $mn . 
		 "</td><td>" . $ds . 
		 "</select></td><td>" . "<input type=\"text\" name=\"hdd" . $x . "\">". 
		 "</select></td></tr>";
	echo "<input type=\"hidden\" name=\"dev" . $x ."\" value=\"" . $ds . "\">";
	$x++;
}
$run->close();
?>
</table>
<br><input type="submit">
</form>
</body>
</html>