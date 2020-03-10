<?php
require "db.php";
include_once("navbar.html");
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New Device Type Form</title>
</head>

<body>
<form method="POST" action="dev_type_list.php">
Enter the name of the new device type: <br>
<input type="text" name="name" required><br>
<br><input type="submit">
</form>
</body>
</html>