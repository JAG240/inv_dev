<?php
require "db.php";
include_once("navbar.html");
?> 
<?php
if(isset($_POST['model']))
{
	$addSQL = "insert into cpu(model, clock_speed) values (?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("sd", $_POST['model'], $_POST['clock']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>CPU List</title>
</head>

<body>
<table>
<tr><th>ID</th><th>Model</th><th>Clock Speed</th><tr>
<?php 
$SQL = "select id, model, clock_speed from cpu;";
$run = $db->prepare($SQL);
$run->execute();
$run->bind_result($i, $m, $c);
while($run->fetch())
{
	echo "<tr><td>" . $i . 
		 "</td><td>" . $m . 
		 "</td><td>" . $c. " Ghz" . 
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="devices.php"><button type="button">Back</button></a>
<a href="new_cpu_form.php"><button type="button">Make New CPU</button></a>
</body>
</html>