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
<form method="POST" action="../container_details.php/?id=<?php echo $id; ?>">
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
Enter the device serial: <br>
<?php
for($x = 0; $_POST['num'] > $x; $x++)
{
	echo "<input type=\"text\" name=\"dev" . $x . "\"><br>";
}
?>
<input type="hidden" value=<?php echo "\"" . $_POST['type'] . "\"" ?> name="type">
<input type="hidden" value=<?php echo "\"" . $_POST['num'] . "\"" ?> name="num">
<input type="submit">
</form>
</body>
</html>