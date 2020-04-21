<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Container Transfer</title>
</head>

<body>
<?php echo "<form method=\"POST\" action=\"../container_details/?id=" . $id . "\">" ?>
<select name="dest_id">
<?php
$cSQL = "select container.id, name from container, material where disp_id = 1 and mat_id = material.id";
$cRun = $db->prepare($cSQL);
$cRun->execute();
$cRun->bind_result($i, $n);
while($cRun->fetch())
{
	echo "<option value=\"" . $i . "\">" . $n ."</option>";
}
$cRun->close();
?>
</select><br>
Enter a quantity: <br>
<input type="number" name="quantity"><br>
Enter the weight: <br>
<input type="number" step="0.01" name="weight"  required><br>
<br><input type="submit">
</form>
</body>
</html>