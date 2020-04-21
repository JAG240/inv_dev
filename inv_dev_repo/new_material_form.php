<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Create New Material</title>
</head>

<body>
<form method="POST" action="materials_list.php">
Name of New Material: <br>
<input type="text" name="name" required><br>
Select New Material Class: <br>
<select name="class" required>
<?php
$cSQL = "select id, name from mat_class;";
$cRun = $db->prepare($cSQL);
$cRun->execute();
$cRun->store_result();
$cRun->bind_result($i, $n);
while($cRun->fetch())
{
	echo "<option value=\"" . $i . "\">" . $n ."</option>";
}
$cRun->close();
?>
</select>
<br><input type="submit">
</form>
</body>
</html>
