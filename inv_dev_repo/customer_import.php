<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Customer Import</title>
</head>

<body>
<form method="POST" action="customer_data.php" enctype="multipart/form-data">
Select a file: <input type="file" name="file" accept=".xls, .xlsx"><br>
<br><input type="submit" name="import">
</body>
</html>