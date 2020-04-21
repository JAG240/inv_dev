<?php
require "db.php";
include_once("navbar.html");
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New Model Form</title>
</head>

<body>
<form method="POST" action="model_list.php">
Enter the name of the model: <br>
<input type="text" name="name" required><br>
Select the device type: <br>
<select name="dev_type">
<?php
$sql = "select id, name from dev_type;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $n);
while($run->fetch())
{
	echo "<option value=\"" .$i . "\">" . $n ."</option>"; 
}
$run->close();
?>
</select><br>
<br><input type="submit">
</form>
</body>
</html>