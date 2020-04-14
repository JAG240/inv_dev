<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Order Details</title>
</head>

<body>
<table>
<?php
$sql = "select ebay_orders.id, order_id, item_num, item_title, sold_price, ebay_tax, quantity, ship_cost, ship_ser.name, pp_trans_id, ebay_orders.name, ebay_orders.address, ebay_orders.city,
ebay_orders.state, ebay_orders.zip, tracking, import_date, username, buyer.name, buyer.id
from ebay_orders, buyer, ship_ser
where ebay_orders.buyer_id = buyer.id
and ebay_orders.ship_ser_id = ship_ser.id
and ebay_orders.id = ?;";

$run = $db->prepare($sql);
$run->bind_param("i", $id);
$run->execute();
$run->bind_result($i, $oi, $in, $it, $sp, $et, $q, $sc, $ss, $pp, $on, $oa, $oc, $os, $oz, $t, $id, $u, $bn, $bi);
while($run->fetch())
{
	echo "<tr><th>Order ID</th><td>" . $oi . "</td></tr>" . 
		 "<tr><th>Item Number</th><td>" . $in . "</td></tr>" . 
		 "<tr><th>Item Title</th><td>" . $it . "</td></tr>" . 
		 "<tr><th>Sold Price</th><td>" . $sp . "</td></tr>" . 
		 "<tr><th>eBay Tax</th><td>" . $et . "</td></tr>" . 
		 "<tr><th>Quantity</th><td>" . $q . "</td></tr>" . 
		 "<tr><th>Total Price</th><td>" . (($q * $sp) + $et) . "</td></tr>" .
		 "<tr><th>Shipping Cost</th><td>" . $sc . "</td></tr>" . 
		 "<tr><th>Shipping Method</th><td>" . $ss . "</td></tr>" . 
		 "<tr><th>PayPal Transaction ID</th><td>" . $pp . "</td></tr>" . 
		 "<tr><th>Shipping Name</th><td>" . $on . "</td></tr>" . 
		 "<tr><th>Shipping Address</th><td>" . $oa . ", " . $oc . ", " . $os . " " . $oz ."</td></tr>" . 
		 "<tr><th>Tracking Number</th><td>" . $t . "</td></tr>" . 
		 "<tr><th>Shipping Date</th><td>" . $id . "</td></tr>" . 
		 "<tr><th>Buyer Username</th><td>" . $u . "</td></tr>" . 
		 "<tr><th>Buyer Name</th><td><a href=\"../buyer_details.php/?id=" . $bi . "\">" . $bn . "</a></td></tr>";
}
$run->close();
?>
</table>
<br><a href="../order_search.php"><button type="button">Back</button></a>
</body>
</html>