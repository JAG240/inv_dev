<?php
require "db.php";
include_once("navbar.html");
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New CPU Form</title>
</head>

<body>
<form method="POST" action="cpu_list.php">
Enter the model: <br>
<input type="text" name="model" required><br>
Enter the clock speed: <br>
<input type="number" step="0.1" name="clock" required><br>
<br><input type="submit">
</body>
</html>