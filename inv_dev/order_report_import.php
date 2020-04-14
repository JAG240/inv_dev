<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Order Report Import</title>
</head>

<body>
<form method="POST" action="order_report_verify.php" enctype="multipart/form-data">
<input type="file" name="file" accept=".csv"><br>
<br><input type="submit" name="submit">
</form><br>
<br><a href="ebay_orders.php"><button type="button">Back</button></a>
</body>
</html>