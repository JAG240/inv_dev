<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Add Credit Reference to Customer</title>
</head>
<body>

<?php echo "<form method=\"POST\" " . "action=\"../customer_details.php/?id=" . $id . "\">" ?>
<select name="cred_id">
<?php

$crSQL = "select id, name from credit_ref;";
$crRun = $db->prepare($crSQL);
$crRun->execute();
$crRun->store_result();
$crRun->bind_result($i, $n);
while($crRun->fetch())
{
	echo "<option value=\"" . $i . "\">" . $n . "</option>";
}
$crRun->close();
?>
</select>
<input type="submit">
</body>
</html>