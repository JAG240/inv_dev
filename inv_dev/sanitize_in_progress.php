<?php
require "db.php";
include_once("navbar.html");
$x = 0;
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Sanitization In Progress Hard Drives</title>
</head>

<body>
<form method="POST" action="hard_drives.php">
<table>
<tr><th>Hard Drive Serial</th><th>Finish Sanitization</th></tr>
<?php
$sql = "select serial from device where location_id = 9;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($s);
while($run->fetch())
{
	echo "<tr><td>" . $s . 
		 "</td><td>" . "<input type=\"checkbox\" value=\"" . $s . "\" name=\"hdd" . $x . "\">" . 
		 "</td></tr>";
	$x++;
	
}
$run->close();
?>
</table>
<input type="hidden" value="<?php echo $x; ?>" name="finish_count">
<br><input type="submit">
</form>
</body>
</html>