<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Issue OS</title>
</head>

<body>
<form method="POST" action="../ebay_details.php/?id=<?php echo $id ?>">
MAR: <br>
<input type="number" name="mar" required><br>
OS: <br>
<select name="name">
<option value="Windows 10 Home">Windows 10 Home</option>
<option value="Windows 10 Pro">Windows 10 Pro</option>
<option value="Ubuntu">Ubuntu</option>
</select><br>
<br><input type="submit">
</form>
</body>
</html>