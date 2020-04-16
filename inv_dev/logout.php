<?php
require "db.php";
include_once("navbar.html");
session_start();
session_destroy();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Logout</title>
</head>

<body>
<h2>You have been logged out</h2>
<br><a href="index.php"><button type="button">Home</button></a>
</body>
</html>