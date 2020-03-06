<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Add Service to Quote</title>
</head>

<body>
<?php echo "<form method=\"POST\" action=\"../quote_details.php/?id=" . $id . "\">" ?>
Service: <br>
<select name="ser">
<?php 
$serSQL = "select id, name from service;";
$serRun = $db->prepare($serSQL);
$serRun->execute();
$serRun->store_result();
$serRun->bind_result($i, $n);
while($serRun->fetch())
{
	echo "<option value=\"" .$i ."\">" . $n ."</option>";
}
$serRun->close();
?>
</select><br>
Quantity: <br>
<input type="number" name="quantity" required><br>
Price Per Unit: <br>
<input type="number" name="price" step="0.01" required><br>
<br><input type="submit">
</form>
</body>
</html>