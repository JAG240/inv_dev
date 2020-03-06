<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New Container Material</title>
</head>

<body>
<form method="POST" action="new_container_form.php">
What Class of Material? <br>
<?php
$matSQL = "select id, name from mat_class;";
$matRun = $db->prepare($matSQL);
$matRun->execute();
$matRun->store_result();
$matRun->bind_result($i, $n);
while($matRun->fetch())
{
	echo "<input type=\"radio\" name=\"class\" value=\"" . $i . "\">" . $n . "</input><br>";
}
$matRun->close();
?>
<br><input type="submit">
</form>
</body>
</html>