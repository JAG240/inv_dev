<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$tp = 0;
$tw = 0;

if(isset($_POST['dev']))
{
	$addSQL = "insert into dev_list(quote_id, dev_id, quantity, price) values (?, ?, ?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("iiid", $id, $_POST['dev'], $_POST['quantity'], $_POST['price']);
	$addRun->execute();
	$addRun->close();
}
	
if(isset($_POST['ser']))
{
	$addSQL = "insert into ser_list(quote_id, ser_id, quantity, price) values (?, ?, ?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("iiid", $id, $_POST['ser'], $_POST['quantity'], $_POST['price']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Quote Details</title>
</head>

<body>
<table>
<tr><th>Name</th><th>Weight</th><th>Quantity</th><th>Price</th><th>Total Price</th><th>Total Weight</th></tr>
<?php
$devSQL = "select quote_dev.name, quote_dev.weight, dev_list.quantity, dev_list.price, (dev_list.price * dev_list.quantity), (dev_list.quantity * quote_dev.weight)
			from quote_dev, dev_list
			where dev_list.quote_id = ?
			and quote_dev.id = dev_list.dev_id;";
$devRun = $db->prepare($devSQL);
$devRun->bind_param("i", $id);
$devRun->execute();
$devRun->store_result();
$devRun->bind_result($dn, $dw, $dq, $dp, $dtp, $dtw);
while($devRun->fetch())
{
	echo "<tr><td>" . $dn . 
		 "</td><td>" . $dw . 
		 "</td><td>" . $dq .
		 "</td><td>" . $dp . 
		 "</td><td>" . $dtp . 
		 "</td><td>" . $dtw . 
		 "</td></tr>";
	$tp += $dtp;
	$tw += $dtw;
}
$devRun->close();

$serSQL = "select service.name, ser_list.price, ser_list.quantity, (ser_list.quantity * ser_list.price)
			from ser_list, service
			where ser_list.quote_id = ?
			and ser_list.ser_id = service.id;";
$serRun = $db->prepare($serSQL);
$serRun->bind_param("i", $id);
$serRun->execute();
$serRun->store_result();
$serRun->bind_result($sn, $sp, $sq, $stp);
while($serRun->fetch())
{
	echo "<tr><td>" . $sn . 
		 "</td><td> 0 </td><td>" .
		 $sq . "</td><td>" . 
		 $sp . "</td><td>" . 
		 $stp . "</td><td>" . 
		 " 0 </td></tr>";
	$tp+=$stp;
}
$serRun->close();

echo "<tr><td></td><td></td><td><td></td><td>" . $tp . "</td><td>" . $tw . "</td></tr>";
?> 
</table>
<br><a href="../quotes.php"><button type="button">Back</button></a> 
<?php echo " <a href=\"../quote_add_device.php/?id=" . $id . "\"> <button type=\"button\">Add Device</button></a>"; ?>
<?php echo " <a href=\"../quote_add_service.php/?id=" . $id . "\"> <button type=\"button\">Add Service</button></a>"; ?>
<?php echo " <a href=\"../create_job.php/?id=" . $id . "\"> <button type=\"button\">Create Job</button></a>"; ?>
</body>
</html>