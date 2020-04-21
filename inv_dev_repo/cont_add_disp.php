<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Add Disposition</title>
</head>

<body>
<?php
if(isset($_POST['devdisp']))
{
?>

<form method="POST" action="../cont_sec_hdd.php/?id=<?php echo $id; ?>">
<table>
<tr><th>Device Serial</th><th>Intial Disposition</th><?php
if(isset($_POST['hdd0']))
{
	echo "<th>Hard Drive Serial</th><th>Intial Disposition</th><th>This Device has a second hard drive</th>";
}?>
</tr>
<?php
for($x = 0; $_POST['num'] > $x; $x++)
{
	echo "<tr><td>" . $_POST['dev' . $x] . "</td><td>" .
		"<select name=\"dev_disp" .$x . "\">";
	$sql ="select id, station from location;";
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($i, $n);
	while($run->fetch())
	{
		echo "<option value=\"" . $i . "\""; if($i == $_POST['devdisp']){echo "selected";}  echo ">" . $n . "</option>";
	}
	$run->close();
	echo "</select></td>";
	echo "<input type=\"hidden\" value=\"" . $_POST['dev' . $x] . "\" name=\"dev" . $x . "\">";
	if(isset($_POST['hdd0']))
	{
		echo "<td>" . $_POST['hdd'.$x] . "</td><td>" . 
		"<select name=\"hdd_disp" . $x . "\">";
		$run = $db->prepare($sql);
		$run->execute();
		$run->bind_result($i, $n);
		while($run->fetch())
			{
			echo "<option value=\"" . $i . "\""; if($i == $_POST['hdddisp']){echo "selected";}  echo ">" . $n . "</option>";
			}
		$run->close();
		echo "</select></td>";
		echo "<input type=\"hidden\" value=\"" . $_POST['hdd'.$x] . "\" name=\"hdd" . $x . "\">";
		echo "<td><input type=\"checkbox\" value=\"add_hdd" . $x . "\" name=\"sec_hdd" . $x . "\"></td>";
	}
	echo "</tr>";
}
?>
</table><br>
<input type="hidden" value=<?php echo "\"" . $_POST['type'] . "\"" ?> name="type">
<input type="hidden" value="<?php echo $_POST['model']; ?>" name="model">
<input type="hidden" value="<?php echo $_POST['num']; ?>" name="num">
<br><input type="submit">
</form>
<?php
}
else
{
?>
<form method="POST" action="../cont_add_disp.php/?id=<?php echo $id ?>">
Enter the default disposition for these devices:<br>
<select name="devdisp">
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
echo "</select>";
for($x = 0; $_POST['num'] > $x; $x++)
{
	echo "<input type=\"hidden\" value=\"" . $_POST['dev' . $x] . "\" name=\"dev" . $x . "\">";
}
?>
<br>
<?php if(isset($_POST['hdd0']))
{
	echo "Enter the default disposition for these hard drives:<br>";
	echo "<select name=\"hdddisp\">";
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($i, $n);
	while($run->fetch())
	{
		echo "<option value=\"" . $i . "\">" . $n . "</option>";
	}
	$run->close();
	echo "</select>";
	for($y = 0; $_POST['num'] > $y; $y++)
	{
		echo "<input type=\"hidden\" value=\"" . $_POST['hdd' . $y] . "\" name=\"hdd" . $y . "\">";
	}
}
?>
<br>
<?php

?>
<input type="hidden" value=<?php echo "\"" . $_POST['type'] . "\"" ?> name="type">
<input type="hidden" value="<?php echo $_POST['model']; ?>" name="model">
<input type="hidden" value="<?php echo $_POST['num']; ?>" name="num">
<br><input type="submit">
</form>
<?php
}
?>
</body>
</html>