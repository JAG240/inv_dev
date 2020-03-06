<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['mat']))
{
	$addSQL = "insert into container(mat_id, created, disp_id) values (?, curdate(), 1);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("i", $_POST['mat']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Container List</title>
</head>

<body>
<table>
<tr><th>Container ID</th><th>Material</th><th>Date Created</th><th>Disposition</th></tr>
<?php
$SQL = "select container.id, material.name, container.created, disposition.name 
		from container, material, disposition 
		where container.mat_id = material.id
		and container.disp_id = disposition.id
		order by disp_id asc;";
$run = $db->prepare($SQL);
$run->execute();
$run->store_result();
$run->bind_result($i, $n, $c, $d);
while($run->fetch())
{
	echo "<tr><td><a href=\"container_details.php/?id=" . $i ."\">" . $i . 
		 "</a></td><td>" . $n . 
		 "</td><td>" . $c . 
		 "</td><td>" . $d .
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="containers.php"><button type="button">Back</button></a>
</body>
</html>