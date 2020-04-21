<?php
require "db.php";
include_once("navbar.html");
?> 
<?php
if(isset($_POST['name']))
{
	$addSQL = "insert into model(name, dev_type_id) values (?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("si", $_POST['name'], $_POST['dev_type']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Model List</title>
</head>

<body>
<table>
<tr><th>ID</th><th>Model Name</th><th>Device type</th></tr>
<?php
$SQL = "select model.id, model.name, dev_type.name from model, dev_type where dev_type_id = dev_type.id;";
$run = $db->prepare($SQL);
$run->execute();
$run->bind_result($i, $n, $t);
while($run->fetch())
{	
	echo "<tr><td>" . $i . 
		 "</td><td>" . $n . 
		 "</td><td>" . $t . 
		 "</td><td>";
}
$run->close();
?>
</table>
<a href="devices.php"><button type="button">Back</button></a>
<a href="new_model_form.php"><button type="button">Make New Model</button></a>
</body>
</html>