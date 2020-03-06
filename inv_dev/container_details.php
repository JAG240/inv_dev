<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$job_weight = 0;
$job_quantity = 0;
$cont_weight = 0;
$cont_quantity = 0;
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
	echo "<tr><td>" . $ji .
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
<h3>Transfers from Containers</h3>
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
?> 
</body>
</html>





















