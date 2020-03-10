<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Transfer Material</title>
</head>

<body>
<?php echo "<form method=\"POST\" action=\"../job_details.php/?id=" . $id ."\">"; ?>
Select a Container: <br>
<select name="cont_id">
<?php
$cSQL = "select container.id, material.name from container, disposition, material
		 where container.disp_id = disposition.id
		 and container.mat_id = material.id
		 and container.disp_id = 1;";
$cRun = $db->prepare($cSQL);
$cRun->execute();
$cRun->store_result();
$cRun->bind_result($i, $m);
while($cRun->fetch())
{
	echo "<option value=\"" . $i ."\">" . $i . ": " . $m . "</option>";
}
$cRun->close();
?>
</select><br>
Enter the Quantity: <br>
<input type="number" name="quantity"><br>
Enter the Weight: <br>
<input type="number" name="weight" step="0.01" required><br>
<br><input type="submit">
</form>
</body>
</html>