<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Add Device to Quote</title>
</head>

<body>
<?php echo "<form method=\"POST\" action=\"../quote_details.php/?id=" . $id . "\">"; ?>
Device: <br>
<select name="dev" required>
<?php
$devSQL = "select id, name from quote_dev;";
$devRun = $db->prepare($devSQL);
$devRun->execute();
$devRun->store_result();
$devRun->bind_result($i, $n);
while($devRun->fetch())
{
	echo "<option value=\"". $i . "\">" . $n . "</option>";
}
$devRun->close();
?>
</select><br>
Quantity: <br>
<input type="number" name="quantity" required><br>
Price Per Unit: <br>
<input type="numer" name="price" step="0.01" required><br>
<br><input type="submit">
</form>
</body>
</html>