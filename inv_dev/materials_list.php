<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['class']))
{
	$addSQL = "insert into material(name, class) values (?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("si", $_POST['name'], $_POST['class']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Materials List</title>
</head>

<body>
<table>
<tr><th>Material ID</th><th>Name</th><th>Class</th></tr>
<?php
$matSQL = "select material.id, material.name, mat_class.name from material, mat_class where material.class = mat_class.id;";
$matRun = $db->prepare($matSQL);
$matRun->execute();
$matRun->store_result();
$matRun->bind_result($i, $n, $c);
while($matRun->fetch())
{
	echo "<tr><td>" . $i . 
		 "</td><td>" . $n . 
		 "</td><td>" . $c . 
		 "</td></tr>";
}
$matRun->close();
?>
</table>
<br><a href="containers.php"><button type="button">Back</button></a> 
<a href="new_material_form.php"><button type="button">Create New Material</button></a>
</body>
</html>