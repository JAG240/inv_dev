<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Scan Device to Container</title>
</head>

<body>
<form method="POST" action="../cont_add_disp.php/?id=<?php echo $id; ?>">
Select the devices model: <br>
<select name="model">
<?php
$sql = "select id, name from model where dev_type_id = ?;";
$run = $db->prepare($sql);
$run->bind_param("i", $_POST['type']);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<option value=\"" . $i . "\">" . $n . "</option>";
}
$run->close();
?>
</select><br>
<table>
<tr><th>Enter the device serial:</th>
<?php
if(isset($_POST['rec_hdd']))
{
	echo "<th>Enter the hard drive serial:</th>";
}
?></tr>
<?php
for($x = 0; $_POST['num'] > $x; $x++)
{
	echo "</tr><td><input type=\"text\" name=\"dev" . $x . "\"></td>";
	if(isset($_POST['rec_hdd']))
	{
		echo "<td><input type=\"text\" name=\"hdd" . $x . "\"></td>";
	}
	echo "</tr>";
}
?>
</table>
<input type="hidden" value=<?php echo "\"" . $_POST['type'] . "\"" ?> name="type">
<input type="hidden" value=<?php echo "\"" . $_POST['num'] . "\"" ?> name="num">
<input type="submit">
</form>
</body>
</html>