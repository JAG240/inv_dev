<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New Quote</title>
</head>

<body>
<form method="POST" action="quotes.php">
Select a Customer: <br>
<select name="cust_id">
<?php
$custSQL = "select customer_id, name from customer;";
$custRun = $db->prepare($custSQL);
$custRun->execute();
$custRun->store_result();
$custRun->bind_result($i, $n);
while($custRun->fetch())
{
	echo "<option value=\"". $i . "\">" . $n . "</option>";
}
?>
</select><br>
<br><input type="submit">
</form>
</body>
</html>