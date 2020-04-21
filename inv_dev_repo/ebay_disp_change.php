<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Ebay Device Disposition Change</title>
</head>

<body>
<form method="POST" action="../ebay_details.php/?id=<?php echo $id; ?>">
New Disposition: <br>
<select name="newDisp">
<option value="4">Testing</option>
<option value="5">Waiting for parts</option>
<option value="6">Deploying OS</option>
<option value="9">Building Up</option>
<option value="14">In Storage</option>
</select><br>
<br><input type="submit">
</form>
</body>
</html>