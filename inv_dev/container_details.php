<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$job_weight = 0;
$job_quantity = 0;
$cont_weight = 0;
$cont_quantity = 0;
$out_weight = 0;
$out_quant = 0;
?>
<?php
if(isset($_POST['dest_id']))
{
	$addSQL = "insert into cont_transfer(source_cont, dest_cont, quantity, weight, trans_date) values (?, ?, ?, ?, curdate());";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("iiii", $id, $_POST['dest_id'], $_POST['quantity'], $_POST['weight']);
	$addRun->execute();
	if($addRun)
	{
		echo "<i>Sucessfully transferred " . $_POST['weight'] . " lbs from " . $id . " to " . $_POST['dest_id'] . "</i>";
	}
	else
	{
		echo "<i>Failed to complete a transfer</i>";
	}
	$addRun->close();
}
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == 1)
{
	$clSQL = "update container set disp_id = 2 where id = ?;";
	$clRun = $db->prepare($clSQL);
	$clRun->bind_param("i", $id);
	$clRun->execute();
	$clRun->close();
}
?>
<?php
if(isset($_POST['model']))
{
	for($x = 0; $_POST['num'] > $x; $x++)
	{
		if(!empty($_POST['dev' . $x]))
		{
			$devSQL = "insert into device(serial, type_id, model_id, rec_date, location_id, disp_id) values (?, ?, ?, curdate(), 5, 3)";
			$devRun = $db->prepare($devSQL);
			$devRun->bind_param("sii", $_POST['dev' . $x], $_POST['type'], $_POST['model']);
			$devRun->execute();
			$devRun->close();
			
			$contSQL = "insert into dev_cont(dev_serial, cont_id, trans_date) values (?, ?, curdate());";
			$contRun = $db->prepare($contSQL);
			$contRun->bind_param("si", $_POST['dev' . $x], $id);
			$contRun->execute();
			$contRun->close();
		}
	}
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Container Details</title>
</head>

<body>
<h2><?php echo "Container # " . $id; ?></h2>
<table>
<?php 
$mSQL = "select material.name, container.created, mat_class.name, disposition.name 
		 from container, material, mat_class, disposition
		 where container.mat_id = material.id
		 and material.class = mat_class.id
         and container.disp_id = disposition.id
		 and container.id = ?;";
$mRun = $db->prepare($mSQL);
$mRun->bind_param("i", $id);
$mRun->execute();
$mRun->store_result();
$mRun->bind_result($mn, $cc, $mc, $d);
while($mRun->fetch())
{
	echo "<tr><th>Material</th><td>" . $mn . "</td></tr>" .
		 "<tr><th>Container Created</th><td>". $cc . "</td></tr>" .
		 "<tr><th>Container Class</th><td>" . $mc . "</td></tr>" . 
		 "<tr><th>Disposition</th><td>" . $d . "</td></tr>";
}
$mRun->close();
?>
</table>
<h3>Transfers from Job</h3>
<table>
<tr><th>Job ID</th><th>Customer</th><th>Quantity</th><th>Date Transferred</th><th>Weight</th></tr>
<?php 
$tSQL = "select job_transfer.trans_date, job_transfer.quantity , job.id, customer.name, job_transfer.weight
		 from job_transfer, job, quote, customer
		 where cont_id = ?
		 and job_transfer.job_id = job.id
		 and job.quote_id =  quote.id
		 and quote.cust_id =  customer.customer_id;";
$tRun = $db->prepare($tSQL);
$tRun->bind_param("i", $id);
$tRun->execute();
$tRun->store_result();
$tRun->bind_result($td, $tq, $ji, $cn, $tw);
while($tRun->fetch())
{
	echo "<tr><td><a href=\"../job_details.php/?id=" . $ji . "\">" . $ji .
		 "</td><td>" . $cn . 
		 "</td><td>" . $tq .
		 "</td><td>" . $td . 
		 "</td><td>" . $tw . 
		 "</td></tr>";
	$job_weight += $tw;
	$job_quantity += $tq;
}
$tRun->close();
?>
<tr><td></td><td></td><td><?php echo $job_quantity; ?></td><td></td><td><?php echo $job_weight; ?></td></tr>
</table>
<br>
<table>
<h3>Transfers from Other Containers</h3>
<tr><th>Source Container</th><th>Quantity</th><th>Date Transferred</th><th>Weight</th></tr>
<?php
$cSQL = "select source_cont, quantity, weight, trans_date from cont_transfer where dest_cont = ?;";
$cRun = $db->prepare($cSQL);
$cRun->bind_param("i", $id);
$cRun->execute();
$cRun->bind_result($cs, $cq, $cw, $cd);
while($cRun->fetch())
{
	echo "<tr><td><a href=\"../container_details.php/?id=".$cs."\">" . $cs .
		 "</a></td><td>" . $cq . 
		 "</td><td>" . $cd . 
		 "</td><td>" . $cw . 
		 "</td></tr>";
	$cont_weight += $cw;
	$cont_quantity += $cq;
}
$cRun->close();
?>
<tr><td></td><td><?php echo $cont_quantity; ?></td><td></td><td><?php echo $cont_weight; ?></td></tr>
</table>
<br>
<table>
<h3>Transfers out of this Container</h3>
<tr><th>Destination Container</th><th>Quantity</th><th>Transfer Date</th><th>Weight</th></tr>
<?php
$tranSQL = "select dest_cont, quantity, weight, trans_date from cont_transfer where source_cont = ?;";
$tranRun = $db->prepare($tranSQL);
$tranRun->bind_param("i", $id);
$tranRun->execute();
$tranRun->bind_result($dc, $qu, $we, $trd);
while($tranRun->fetch())
{
	echo "<tr><td><a href=\"../container_details.php/?id=" . $dc . "\">" . $dc . 
		 "</a></td><td>" . $qu . 
		 "</td><td>" . $trd . 
		 "</td><td>" . $we . 
		 "</td></tr>";
	$out_weight += $we;
	$out_quant += $qu;
}
$tranRun->close();
?>
<tr><td></td><td><?php echo $out_quant ?></td><td></td><td><?php echo $out_weight ?></td></tr>
</table>
<br>
<?php 
echo "<h4>Current Weight: " . ($cont_weight + $job_weight - $out_weight) . "</h4>";
echo "<h4>Current Quantity: " . ($cont_quantity +  $job_quantity - $out_quant) . "</h4>";
?>
<br><a href="../container_list.php"><button type="button">Container List</button></a>
<?php 
$checkSQL = "select disp_id, class from container, material
			 where mat_id = material.id
			 and container.id = ?;";
$checkRun = $db->prepare($checkSQL);
$checkRun->bind_param("i", $id);
$checkRun->execute();
$checkRun->bind_result($di, $cl);
while($checkRun->fetch())
{
	if($di == 1 && $cl == 2)
	{
		echo " <a href=\"../cont_transfer_form.php/?id=" . $id . "\"> <button type=\"button\">Transfer Material to Another Container</button></a>"; 
	}
}
$checkRun->close();
?> 
<?php
$closeSQL = "select disp_id from container where id = ?;";
$closeRun = $db->prepare($closeSQL);
$closeRun->bind_param("i", $id);
$closeRun->execute();
$closeRun->bind_result($cld);
while($closeRun->fetch())
{
	if($cld == 1)
	{
		echo " <a href=\"../container_details/?id=" . $id . "&action=1\"> <button type=\"button\">Close This Container</button></a>";
	}
}
?>
<br>
<br><?php echo " <a href=\"../cont_add_device.php/?id=" . $id . "\"> <button type=\"button\">Add Devices</button></a>"; ?>
<?php
$devchSQL = "select id from dev_cont where cont_id = ?;";
$devch = $db->prepare($devchSQL);
$devch->bind_param("i", $id);
$devch->execute();
$devch->store_result();
if($devch->num_rows > 0)
{
	echo " <a href=\"../container_devices.php/?id=". $id . "\"> <button type=\"button\">Devices in this Container</button></a>";
}
$devch->close();
?>
</body>
</html>





















