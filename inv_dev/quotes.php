<?php
require "db.php";
include_once("navbar.html");
?>
<?php
$addSQL = "insert into quote(cust_id, quote_date) values (?, curdate());";
$addRun = $db->prepare($addSQL);
$addRun->bind_param("i", $_POST['cust_id']);
$addRun->execute();
$addRun->close();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Quotes</title>
</head>

<body>
<a href="quote_form.php">Start a New Quote</a><br>
<a href="quote_device_list.php">Device List</a><br>
<a href="quote_service_list.php">Service List</a><br>
<a href="quote_search.php">Search for a Quote</a><br>
</body>
</html>