<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<?php
if(isset($_POST['mar']))
{
$osSQL = "insert into os(mar, dev_serial, name, date_issued) values (?, ?, ?, curdate());";
$osRun = $db->prepare($osSQL);
$osRun->bind_param("sss", $_POST['mar'], $id, $_POST['name']);
$osRun->execute();
$osRun->close();
}
?>
<?php
if(isset($_POST['newDisp']))
{
$di = "update device set disp_id = ? where serial = ?;";
$run = $db->prepare($di);
$run->bind_param("is", $_POST['newDisp'], $id);
$run->execute();
$run->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Ebay Device Details</title>
</head>

<body>
<table>
<?php
$sql = "select serial, rec_date, model.name, dev_type.name from device, dev_type, model
		where type_id = dev_type.id
		and model_id = model.id
		and serial = ?;";
$run = $db->prepare($sql);
$run->bind_param("s", $id);
$run->execute();
$run->bind_result($s, $r, $m, $t);
while($run->fetch())
{
	echo "<tr><th>Device Serial</th><td>" . $s . "</td></tr>" .
		 "<tr><th>Date Received</th><td>" . $r . "</td></tr>" . 
		 "<tr><th>Model</th><td>" . $m . "</td></tr>" . 
		 "<tr><th>Device Type</th><td>" . $t . "</td></tr>";
}
$run->close();

$cSQL = "select cpu.model, cpu.clock_speed from device, cpu where device.cpu_id = cpu.id and serial = ?;";
$cRun = $db->prepare($cSQL);
$cRun->bind_param("s", $id);
$cRun->execute();
$cRun->store_result();
$cRun->bind_result($cm, $cc);
if($cRun->num_rows > 0)
{
	while($cRun->fetch())
	{
		echo "<tr><th>CPU Model</th><td>" . $cm . "</td></tr>" .
			 "<tr><th>Clock Speed</th><td>" . $cc . "</td></tr>";
	}
}
$cRun->close();

$oSQL = "select mar, name, date_issued from os where dev_serial = ?;";
$oRun = $db->prepare($oSQL);
$oRun->bind_param("s", $id);
$oRun->execute();
$oRun->store_result();
$oRun->bind_result($om, $on, $od);
if($oRun->num_rows > 0)
{
	while($oRun->fetch())
	{
		echo "<tr><th>OS MAR</th><td>" . $om . "</td></tr>" . 
			 "<tr><th>OS</th><td>" . $on . "</td></tr>" . 
			 "<tr><th>Date OS issued</th><td>" . $od . "</td></tr>";
	}
}
$oRun->close();
?>
</table><br>
<br><a href="../ebay_dev_list.php"><button type="button">Back</button></a>
 <a href="../ebay_disp_change.php/?id=<?php echo $id; ?>"><button type="button">Change Disposition</button></a>
<?php
$osSQL = "select mar from os where dev_serial = ?;";
$osRun = $db->prepare($osSQL);
$osRun->bind_param("s", $id);
$osRun->execute();
$osRun->store_result();
if($osRun->num_rows == 0)
{
	echo "<a href=\"../issue_os.php/?id=". $id . "\"><button type=\"button\">Issue OS</button></a>";
}
$osRun->close();
?>
</body>
</html>