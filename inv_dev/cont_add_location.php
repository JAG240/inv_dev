<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Assign Location to Devices</title>
</head>

<body>
<form method="POST" action="../container_details.php/?id=<?php echo $id; ?>">
<table>
<tr><th>Device Serial</th><th>Device Location</th><th>Hard Drive Serial</th><th>Hard Drive Location</th></tr>
<?php
for($x = 0; $_POST['count'] > $x; $x++)
{
	echo "<tr><td>" . $_POST['dev' . $x] . "</td><td>" .
		 "<select name=\"d_disp" . $x . "\">";
	
	$sql = "select id, station from location;";
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($i, $n);
	while($run->fetch())
	{
		echo "<option value=\"" . $i . "\""; if($i == $_POST['d_loc']){echo "selected";} echo ">" . $n . "</option>";
	}
	$run->close();
	
	echo "</select></td><td>" . $_POST['hdd' . $x] . "</td><td>" . 
		 "<select name=\"h_disp" . $x . "\">";
		 
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($i, $n);
	while($run->fetch())
	{
		echo "<option value=\"" . $i . "\""; if($i == $_POST['h_loc']){echo "selected";} echo ">" . $n . "</option>";
	}
	$run->close(); 
	
	echo "</select></td></tr>";
	echo "<input type=\"hidden\" value=\"" . $_POST['hdd' . $x] . "\" name=\"hdd" . $x . "\">";
	echo "<input type=\"hidden\" value=\"" .  $_POST['dev' . $x] . "\" name=\"dev" . $x . "\">";
}
?>
</table><br>
<input type="hidden" value="<?php echo $_POST['count'];?>" name="count">
<br><input type="submit">
</form>
</body>
</html>