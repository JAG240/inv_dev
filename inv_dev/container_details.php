<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
$weight = 0;
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
<tr><th>Job ID</th><th>Customer</th><th>Date Transferred</th><th>Weight</th></tr>
<?php 
$tSQL = "select transfer.trans_date, job.id, customer.name, transfer.weight
		 from transfer, job, quote, customer
		 where cont_id = ?
		 and transfer.job_id = job.id
		 and job.quote_id =  quote.id
		 and quote.cust_id =  customer.customer_id;";
$tRun = $db->prepare($tSQL);
$tRun->bind_param("i", $id);
$tRun->execute();
$tRun->store_result();
$tRun->bind_result($td, $ji, $cn, $tw);
while($tRun->fetch())
{
	echo "<tr><td>" . $ji .
		 "</td><td>" . $cn . 
		 "</td><td>" . $td . 
		 "</td><td>" . $tw . 
		 "</td></tr>";
	$weight += $tw;
}
$tRun->close();
?>
<tr><td></td><td></td><td></td><td><?php echo $weight; ?></td></tr>
</table>
<br><a href="../container_list.php"><button type="button">Back</button></a>
</body>
</html>