<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Report a Bug</title>
</head>

<body>
<form method="POST" action="bug_landing.php">
Name: <br><input type="text" name="name" required><br>
Comments: <br><textarea class="big" name="comment" required></textarea><br>
<br><input type="submit">
</form>
</body>
</html>