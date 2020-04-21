<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Create a New Quote Service</title>
</head>

<body>
<form method="POST" action="quote_service_list.php">
New Service Name: <br>
<input type="Text" name="ser_name" required> <br>
<br><input type="submit">
</body>
</html>