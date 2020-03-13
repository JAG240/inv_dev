<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<?php
if(isset($_POST['hdd0']))
{
	$count = count($_POST) / 2;
	for($x = 0; $count > $x; $x++)
	{
		if(!empty($_POST['hdd' . $x]))
		{
		$hddSQL = "insert into device(serial, type_id, model_id, condition_id, parent_serial, rec_date, location_id, disp_id) values (?, 5, 10, 2, ?, curdate(), 5, 3);";
		$hddRun = $db->prepare($hddSQL);
		$hddRun->bind_param("ss", $_POST['hdd' . $x], $_POST['dev' . $x]);
		$hddRun->execute();
		$hddRun->close();
		
		$hdcSQL = "insert into dev_cont(dev_serial, cont_id, trans_date) values (?, ?, curdate());";
		$hdcRun = $db->prepare($hdcSQL);
		$hdcRun->bind_param("si", $_POST['hdd' . $x], $id);
		$hdcRun->execute();
		$hdcRun->close();
		}
	}
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Default Locations for Devices</title>
</head>

<body>
<form method="POST" action="../cont_add_location.php/?id=<?php echo $id; ?>">
Select the default location for the device: <br>
<select name="d_loc">
<?php
$sql = "select id, station from location;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<option value=\"" . $i . "\">" . $n . "</option>";
}
$run->close();
?>
</select><br>
Select the default location for the hard drives: <br>
<select name="h_loc">
<?php
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<option value=\"" . $i . "\">" . $n . "</option>";
}
$run->close();

echo "</select><br>Enter the CPU: <br>";

echo "<select name=\"cpu\">";
$cSQL = " select id, model, clock_speed from cpu;";
$cRun = $db->prepare($cSQL);
$cRun->execute();
$cRun->bind_result($ci, $cm, $cs);
while($cRun->fetch())
{
	echo "<option value=\"" . $id . "\">" . $cm . " @ " . $cs . "GHz" . "</option>";
}
$cRun->close();

echo "</select><br>";

echo "Enter the amount of RAM in GB: <br> <input type=\"number\" name=\"ram\"><br>";

for($y = 0; $count > $y; $y++)
{
	echo "<input type=\"hidden\" value=\"" . $_POST['hdd' . $y] . "\" name=\"hdd" . $y . "\">"; 
	echo "<input type=\"hidden\" value=\"" . $_POST['dev' . $y] . "\" name=\"dev" . $y . "\">";
}
echo "<input type=\"hidden\" value=\"" . $count . "\" name=\"count\">";
?>
<br><input type="submit">
</body>
</html>