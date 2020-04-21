<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Create a New Quote Device</title>
</head>

<body>
<form method="POST" action="quote_device_list.php">
New Device Name: <br>
<input type="text" name="dev_name" required><br>
New Device Weight: <br>
<input type="number" name="dev_weight" step="0.01" required><br>
<br><input type="submit">
</form>
</body>
</html>