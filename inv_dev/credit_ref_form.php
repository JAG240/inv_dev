<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New Cedit Reference Form</title>
</head>

<body>

<form method="POST" action="credit_ref_list.php">
Reference Name: <br>
<input type="text" name="name" required> <br>
Address: <br>
<input type="text" name="address" required> <br>
City: <br>
<input type="text" name="city" required> <br>
State: <br>
<select name="state" required> <br>
<option value="PA" selected>PA</option>
</select> <br>
Zip: <br>
<input type="number" name="zip" required> <br>
Phone: <br>
<input type="number" name="phone" required> <br>
Fax: <br>
<input type="number" name="fax"> <br>
<br>
<input type="submit">
</form>

<br><a href="credit_ref_list.php"><button type="button">Credit Reference List</button></a>
</body>
</html>