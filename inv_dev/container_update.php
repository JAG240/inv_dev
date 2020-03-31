<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Manual Container Update</title>
</head>

<body>
<form method="POST" action="../device_details.php/?id=<?php echo $id; ?>">
Select container: <br>
<select name="cont">
<?php
$sql = "select container.id, name from container, material
		where mat_id = material.id
		and disp_id = 1;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<option value=\"" . $i . "\">" . $i . ": " . $n . "</option>";
}
$run->close();
?>
</select><br>
<br><input type="submit">
</body>
</html>