<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$check = 0;
$newCount = 0;
?>
<?php
for($i = 0; $_POST['num'] > $i; $i++)
{
	if(isset($_POST['add_hdd' . $i]))
	{
		$newCount++;
	}
}
?>
<?php
for($x = 0; $_POST['num'] > $x; $x++)
{
	$sql = "insert into device(serial, type_id, model_id, rec_date, location_id, disp_id) values (?, ?, ?, curdate(), ?, 3);";
	$run = $db->prepare($sql);
	$run->bind_param("siii", $_POST['dev'.$x], $_POST['type'], $_POST['model'], $_POST['dev_disp'.$x]);
	$run->execute();
	$run->close();
	
	$contSQL = "insert into dev_cont(dev_serial, cont_id, trans_date) values (?, ?, curdate());";
	$contRun = $db->prepare($contSQL);
	$contRun->bind_param("si", $_POST['dev' . $x], $id);
	$contRun->execute();
	$contRun->close();
	
	if(!empty($_POST['hdd'.$x]))
	{
		$hsql = "insert into device(serial, type_id, model_id, parent_serial, rec_date, location_id, disp_id) values (?, 5, 10, ?, curdate(), ?, 3);";
		$run = $db->prepare($hsql);
		$run->bind_param("ssi", $_POST['hdd'.$x], $_POST['dev'.$x], $_POST['hdd_disp'.$x]);
		$run->execute();
		$run->close();
		
		$contSQL = "insert into dev_cont(dev_serial, cont_id, trans_date) values (?, ?, curdate());";
		$contRun = $db->prepare($contSQL);
		$contRun->bind_param("si", $_POST['hdd' . $x], $id);
		$contRun->execute();
		$contRun->close();
	}
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Second Hard Drive Capture</title>
</head>

<body>
<?php
for($z = 0; $_POST['num'] > $z; $z++)
{
	if(!empty($_POST['add_hdd'.$z]) || isset($_POST['sec_hdd'.$z]))
	{
		$check = 1;
	}
}
if($check == 1)
{
?>
<table>
<tr><th>Device Serial</th><th>Addtional Hard Drive Serial</th><th>Is there another hard drive</th></tr>
<form method="POST" action="../cont_sec_hdd.php/?id=<?php echo $id; ?>"> 
<?php
for($y = 0; $_POST['num'] > $y; $y++)
{
	if(isset($_POST['sec_hdd'.$y]) )
	{
		echo "<tr><td>" . $_POST['dev'.$y] . "</td><td>" .
			 "<input type=\"text\" name=\"add_hdd" . $y . "\"><input type=\"hidden\" value=\"" . $_POST['dev' . $y] . "\" name=\"dev" . $y . "\">" . " </td><td>".
			 "<input type=\"checkbox\" value=\"" . $y . "\" name=\"add_hdd" . $y . "\"></td></tr>";
	}
	if(isset($_POST['add_hdd' . $y]))
	{
		echo "<tr><td>" . $_POST['dev'.$y] . "</td><td>" .
			 "<input type=\"text\" name=\"add_hdd" . $y . "\"><input type=\"hidden\" value=\"" . $_POST['dev' . $y] . "\" name=\"dev" . $y . "\">" . " </td><td>".
			 "<input type=\"checkbox\" value=\"" . $y . "\" name=\"add_hdd" . $y . "\"></td></tr>";
	}
}
echo "</table>";
echo "<input type=\"hidden\" value=\"" . $_POST['num'] . "\" name=\"num\">";
echo "<input type=\"submit\">";
}
else
{
	echo "<a href=\"../container_details.php/?id=" . $id . "\"><button type=\"button\">Back to container</button></a>";
}
?>
</body>
</html>