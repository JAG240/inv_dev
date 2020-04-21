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
<h2 style="color:green">Customers imported successfully</h2>
<?php
$customer = json_decode($_POST['customer']);

$sql = "insert into customer(name, phone, primary_contact, fax, billing_add) values (?, ?, ?, ?, ?);";

foreach($customer as $c)
{
	$add = $c[4] . ", " . $c[5];
	$run = $db->prepare($sql);
	echo $db->error;
	$run->bind_param("sisis", $c[0], $c[1], $c[2], $c[3], $add);
	$run->execute();
	$run->close();
}
?>
<br><a href="customers.php"><button type="button">Back</button></a>
</body>
</html>