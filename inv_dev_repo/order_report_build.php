<?php
require "db.php";
require "db2.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Order Report Build</title>
</head>

<body>
<?php
if(!isset($_POST['input']))
{
$orders = json_decode($_POST['orders']);
$sql = "select id, name from ship_ser;";
$buySQL = "select id from buyer where username = ?;";
$x = 0;

echo "<table class=\"tableFormat\"><tr><th>Ship to Name</th><th>Order Number</th><th>Shipment Method</th><th>Shipping Cost</th><th>Tracking Number</th><th>Order has Additional Tracking</tr>";
echo "<form method=\"POST\" action=\"order_report_build.php\">";
foreach($orders as $o)
{	
	echo "<tr><td>" . $o[8] . "</td><td>" . $o[0] . "</td><td><select name=\"m_ship" . $x . "\" required>";
	
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($id, $n);
	while($run->fetch())
	{
		echo "<option value=\"" . $id . "\">" . $n . "</option>";
	}
	$run->close();
	
	echo "</select></td><td>" . "<input type=\"number\" step=\"0.01\" name=\"cost" . $x . "\" required></td><td>" . "<input type=\"text\" name=\"track" .$x . "\" required></td><td>". 
	"<input type=\"checkbox\" name=\"add" . $x . "\" value=\"" . $x ."\">" . "</td></tr>";
	
	$x++;
}
echo"</table>";
echo "<input name=\"orders\" type=\"hidden\" value=\"" . htmlspecialchars(json_encode($orders)) . "\">"
?>
<input type="submit" name="input">
</form>
<?php 

$newSQL = "insert into buyer(username, name, email, address, city, state, zip) values (?, ?, ?, ?, ?, ?, ?);";

foreach($orders as $o)
{
	$run3 = $db->prepare($buySQL);
	$run3->bind_param("s", $o[1]);
	$run3->execute();
	$run3->store_result();
	$run3->bind_result($u);
	if($run3->num_rows == 0)
	{
		$username = $o[1];
		$name = $o[2];
		$email = $o[3];
		$address = $o[4];
		$city = $o[5];
		$state = $o[6];
		$zip = $o[7];
		
		$run2 = $db2->prepare($newSQL);
		$run2->bind_param("sssssss", $username, $name, $email, $address, $city, $state, $zip);
		$run2->execute();
		$run2->close();
	}
	$run3->close();
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
else
{
$x = 0;
$orders = json_decode($_POST['orders']);
$buySQL = "select id from buyer where username = ? limit 1;";
$addSQL = "insert into ebay_orders(order_id, item_num, item_title, sold_price, ebay_tax, quantity, ship_cost, ship_ser_id, buyer_id, pp_trans_id, name, address, city, state, zip, tracking, import_date)
values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, curdate());";

foreach($orders as $o)
{	
	$sold = floatval(str_replace("$", "", $o[16]));
	$tax = floatval(str_replace("$", "", $o[17]));
	$itemNum = intval($o[13]);
	$quantity = intval($o[15]);
	$username = $o[1];
	$order = $o[0];
	$pp = $o[19];
	$title = $o[14];
	$shipName = $o[8];
	$shipAdd = $o[9];
	$shipCity = $o[10];
	$shipState = $o[11];
	$shipZip = $o[12];
	
	$run = $db->prepare($buySQL);
	$run->bind_param("s", $o[1]);
	$run->execute();
	$run->bind_result($id);
	while($run->fetch())
	{
		$run2 = $db2->prepare($addSQL);
		$run2->bind_param("sisddidiisssssss", $order, $itemNum, $title, $sold, $tax, $quantity, $_POST['cost' .$x], $_POST['m_ship' .$x], $id, $pp, $shipName, $shipAdd, $ShipCity, $shipState, $shipZip, $_POST['track' .$x]);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
	$x++;
}

$addTrack = array();
$i = 0;
$sql = "select id, name from ship_ser;";

foreach($orders as $o)
{
	if(isset($_POST['add' . $i]))
	{
		array_push($addTrack, $o);
	}
	$i++;
}
if(count($addTrack) != 0){echo "<table class=\"tableFormat\"><tr><th>Ship to Name</th><th>Order Number</th><th>Shipment Method</th><th>Shipping Cost</th><th>Tracking Number</th><th>Order has Additional Tracking</tr>";}
echo "<form method=\"POST\" action=\"order_report_build.php\">";

$x=0;

foreach($addTrack as $t)
{
	echo "<tr><td>" . $t[8] . "</td><td>" . $t[0] . "</td><td><select name=\"m_ship" . $x . "\" required>";
	
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($id, $n);
	while($run->fetch())
	{
		echo "<option value=\"" . $id . "\">" . $n . "</option>";
	}
	$run->close();
	
	echo "</select></td><td>" . "<input type=\"number\" step=\"0.01\" name=\"cost" . $x . "\" required></td><td>" . "<input type=\"text\" name=\"track" .$x . "\" required></td><td>". 
	"<input type=\"checkbox\" name=\"add" . $x . "\" value=\"" . $x ."\">" . "</td></tr>";
	
	$x++;
}
echo"</table>";
echo "<input name=\"orders\" type=\"hidden\" value=\"" . htmlspecialchars(json_encode($orders)) . "\">";
if(count($addTrack) != 0){echo "<input type=\"hidden\" name=\"addTrack\" value=\"" . htmlspecialchars(json_encode($addTrack)) . "\"><input type=\"submit\" name=\"input\"></form>";}
else{echo "<a href=\"ebay_orders.php\"><button type=\"button\">Back to Orders</button></a>";}
}
?>
</body>
</html>