<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Create Job</title>
</head>

<body>
<form method="POST" action="../jobs.php">
<?php echo "<input type=\"hidden\" value=\"" . $id . "\" name=\"q\">";  ?>
Truck: <br>
<select name="truck" required>
<?php
$tSQL = "select id, size from truck;";
$tRun = $db->prepare($tSQL);
$tRun->execute();
$tRun->store_result();
$tRun->bind_result($i, $s);
while($tRun->fetch())
{
	echo "<option value=\"" . $i . "\">" . $i . ": size = " . $s . "</option>";
}
$tRun->close();
?>
</select><br>
Pickup Date: <br>
<input type="date" name="pick" required>
<input type="submit">
</form>
</body>
</html>