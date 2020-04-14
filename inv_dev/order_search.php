<?php
require "db.php";
require "db2.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Order Search</title>
</head>

<body>
<table>
<tr><th>Order ID</th><th>Buyer Name</th><th>Buyer Username</th></tr>
<?php
$sql = "select ebay_orders.id, order_id, buyer.name, buyer.username from ebay_orders, buyer, ship_ser
where ebay_orders.buyer_id = buyer.id
and ebay_orders.ship_ser_id = ship_ser.id;";

$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $o, $b, $u);
while($run->fetch())
{
	echo "<tr><td><a href=\"order_details.php/?id=" . $i. "\">" . $o . "</td></a><td>" . $b . "</td><td>" . $u . "</td></tr>";
}
$run->close();
?>
</table>
</body>
</html>