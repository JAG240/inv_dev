<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Order Dashboard</title>
</head>

<body>
<?php
$total_sold = 0;
$total_cost = 0;
$fed_sold = 0;
$fed_cost = 0;
$us_sold = 0;
$us_cost = 0;
$sql = "select sold_price, ship_cost from ebay_orders;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($s, $c);
while($run->fetch())
{
	$total_sold += $s;
	$total_cost += $c;
}
$run->close();
echo "<h2>Total</h2>";
echo "<b>Total of sold product:</b><br> $". $total_sold . "<br>";
echo "<b>Total of shipping cost:</b><br> $" . $total_cost . "<br>";
echo "<b>Percent of shipping:</b><br> " . number_format(($total_cost / $total_sold) * 100, 2) . "%<br>";

$sql = "select sold_price, ship_cost from ebay_orders where ship_ser_id = ?
union
select sold_price, ship_cost from ebay_orders where ship_ser_id = ?;";
$s1 = 1;
$s2 = 2;
$s3 = 3;
$s4 = 4;

$run = $db->prepare($sql);
$run->bind_param("ii", $s1, $s2);
$run->execute();
$run->bind_result($s, $c);
while($run->fetch())
{
	$fed_sold += $s;
	$fed_cost += $c;
}
$run->close();
echo "<h2>FedEx</h2>";
echo "<b>Total sold and shipped by FedEx:</b><br> $" . $fed_sold . "<br>";
echo "<b>Total cost of shipping FedEx:</b><br> $" . $fed_cost . "<br>";
echo "<b>Percent of shipping:</b><br> " . number_format(($fed_cost / $fed_sold) * 100, 2) . "%<br>";

$run = $db->prepare($sql);
$run->bind_param("ii", $s3, $s4);
$run->execute();
$run->bind_result($s, $c);
while($run->fetch())
{
	$us_sold += $s;
	$us_cost += $c;
}
$run->close();
echo "<h2>USPS</h2>";
echo "<b>Total sold and shipped by USPS:</b><br> $" . $us_sold . "<br>";
echo "<b>Total cost of shipping USPS:</b><br> $" . $us_cost . "<br>";
echo "<b>Percent of shipping:</b><br> " . number_format(($us_cost / $us_sold) * 100, 2) . "%<br>";

?>
<br><a href="ebay_orders.php"><button type="button">Back</button></a>
</body>
</html>