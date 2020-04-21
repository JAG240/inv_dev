<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Add Dock Contact</title>
</head>
<body>

<?php echo "<form method=\"POST\" action=\"../customer_details.php/?id=" . $id . "\">" ?>
Name: <br>
<input type="text" name="d_name"> <br>
Phone: <br>
<input type="number" name="d_phone"> <br>
<br><input type="submit">
</form>

</body>
</html>