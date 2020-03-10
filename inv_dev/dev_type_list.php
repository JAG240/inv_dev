<?php
require "db.php";
include_once("navbar.html");
?> 
<?php
if(isset($_POST['name']))
{
	$addSQL = "insert into dev_type(name) values (?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("s", $_POST['name']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Device Type List</title>
</head>

<body>
<table>
<tr><th>ID</th><th>Type</th></tr>
<?php
$SQL = "select id, name from dev_type;";
$run = $db->prepare($SQL);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<tr><td>" . $i .
		 "</td><td>" . $n . 
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="devices.php"><button type="button">Back</button></a>
<a href="new_dev_type_form.php"><button type="button">Make New Device Type</button></a>
</body>
</html>