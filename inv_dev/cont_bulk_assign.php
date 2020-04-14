<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$count = 0;
for($x = 0; $_POST['num'] > $x; $x++)
{
	if(!empty($_POST['dev' . $x]))
	{
		$count++;
	}
}
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Bulk Update</title>
</head>
<body>
<form method="POST" action="../container_devices.php/?id=<?php echo $id ?>">
<?php
for($i = 0;$_POST['num'] > $i; $i++)
{
	if(!empty($_POST['dev' . $i]))
	{
		echo "<input type=\"hidden\" value=\"" . $_POST['dev' . $i] . "\" name=\"dev" . $i . "\">";
	}
}
?>
Enter the location: <br>
<select name="loc">
<?php
$sql = "select id, station from location;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $s);
while($run->fetch())
{
	echo "<option value=\"" . $i . "\">" . $s . "</option>";
}
$run->close();
?>
</select><br>
Enter the disposition: <br>
<select name="disp">
<?php
$sql2 = "select id, name from disposition;";
$run2 = $db->prepare($sql2);
$run2->execute();
$run2->bind_result($d, $n);
while($run2->fetch())
{
	echo "<option value=\"" . $d . "\">" . $n . "</option>";
}
$run2->close();
?>
</select><br>
Enter container: <br>
<select name="cont">
<?php
$sql3 = "select container.id, name from container, material where mat_id = material.id and container.disp_id = 1;";
$run3 = $db->prepare($sql3);
$run3->execute();
$run3->bind_result($id, $na);
while($run3->fetch())
{
	echo "<option value=\"" . $id . "\">". $id . " : " . $na . "</option>";
}
$run3->close();
?>
</select><br>
<input type="hidden" value="<?php echo $_POST['num']; ?>" name="num">
<br><input type="submit">
</form>
</body>
</html>