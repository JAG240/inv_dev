<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Manual Location and Disposition Change</title>
</head>

<body>
<form method="POST" action="../device_details.php/?id=<?php echo $id ?>">
Enter a new location: <br>
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
Enter a new disposition: <br>
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
<br><input type="submit">
</form>
</body>
</html>