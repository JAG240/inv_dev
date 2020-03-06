<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['dev_name']))
{
	$addSQL = "insert into quote_dev(name, weight) values (?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("si", $_POST['dev_name'], $_POST['dev_weight']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Quote Devices</title>
</head>

<body>
<a href="quote_device_form.php"><button type="button">Create New Quote Device</button></a><br>
<br><table>
<tr><th>ID</th><th>Name</th><th>Weight</th></tr>
<?php
$devSQL = "select id, name, weight from quote_dev;";
$devRun = $db->prepare($devSQL);
$devRun->execute();
$devRun->store_result();
$devRun->bind_result($i, $n, $w);
while($devRun->fetch())
{
	echo "<tr><td>" . $i .
		 "</td><td>" . $n . 
		 "</td><td>" . $w . 
		 "</td></tr>";
}
$devRun->close();
?>
</table>
<br><a href="quotes.php"><button type="button">Back</button></a>
</html>
</body>