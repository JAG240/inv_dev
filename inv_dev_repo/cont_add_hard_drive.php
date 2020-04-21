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
<tr><th>Device Serial</th><th>Hard Drive Serial</th></tr>
<?php
$sql = "select device.serial from device, dev_type, dev_cont
where parent_serial is null
and type_id = dev_type.id
and device.serial = dev_cont.dev_serial
and dev_cont.cont_id = ?
order by dev_cont.id desc;";
$run = $db->prepare($sql);
$run->bind_param("i" , $id);
$run->execute();
$run->bind_result($d);
while($run->fetch())
{
	$sql2 = "select serial, count(serial) from device 
			where parent_serial = ?;";
	$run2 = $db2->prepare($sql2);
	$run2->bind_param("s", $d);
	$run2->execute();
	$run2->bind_result($s, $c);
	while($run2->fetch())
	{
		if($c < 1)
		{
			echo "</td><td>" . $d . 
			"</td><td><input type=\"text\" name=\"hdd" . $x . "\"></td></tr>" . 
			"<input type=\"hidden\" name=\"dev" . $x . "\" value=\"" . $d . "\">";
			$x++;
		}
	}
	$run2->close();
}
$run->close();
?>
</table>
<br><input type="submit">
</form>
</body>
</html>