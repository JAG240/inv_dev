<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Add Device to Container</title>
</head>

<body>
<form method="POST" action="../cont_scan_device.php/?id=<?php echo $id; ?>">
How many devices are you scanning in: <br>
<input type="number" name="num" required><br>
What type of device: <br>
<select name="type">
<?php
$sql = "select id, name from dev_type;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<option value=\"" . $i ."\">" . $n ."</option>";
}
$run->close();
?>
</select><br>
Check this box to receive hard drives: <br>
<input type="checkbox" name="rec_hdd" value="true">
<br><input type="submit">
</table>
</body>
</html>