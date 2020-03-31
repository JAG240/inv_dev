<?php
require "db.php";
include_once("navbar.html");
$x = 0;
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Sanitized Hard Drives</title>
</head>

<body>
<table>
<tr><th>Hard Drive Serial</th></tr>
<?php
$sql = "select serial from device where location_id = 8;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($s);
while($run->fetch())
{
	echo "<tr><td>" . $s . 
		 "</td></tr>";
	$x++;
	
}
$run->close();
?>
</table>
<br><a href="hard_drives.php"><button type="button">Back</button></a>
</body>
</html>