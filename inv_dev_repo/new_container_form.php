<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Create New Container</title>
</head>

<body>
<form method="POST" action="container_list.php">
Select a Material <br>
<select name="mat">
<?php
$mSQL = "select id, name from material where class = ?;";
$mRun = $db->prepare($mSQL);
$mRun->bind_param("i", $_POST['class']);
$mRun->execute();
$mRun->store_result();
$mRun->bind_result($i, $n);
while($mRun->fetch())
{
	echo "<option value=\"". $i ."\">" . $n . "</option>";
}
$mRun->close();
?>
</select>
<br><input type="submit">
</form>
</body>
</html>