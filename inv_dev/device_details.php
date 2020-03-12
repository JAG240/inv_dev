<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Device Details</title>
</head>

<body>
<table>
<?php
$sql = "select serial, rec_date, grade, dev_type.name, model.name, station, disposition.name
		from device, dev_condition, dev_type, model, location, disposition
		where type_id = dev_type.id
		and model_id = model.id
		and condition_id = dev_condition.id
		and location_id = location.id
		and disp_id = disposition.id
		and serial = ?;";
$run = $db->prepare($sql);
$run->bind_param("s", $id);
$run->execute();
$run->bind_result($s, $r, $g, $t, $m, $st, $d);
while($run->fetch())
{
	echo "<tr><th>Serial #</th><td>" . $s . "</td></tr>" .
		 "<tr><th>Date Recieved</th><td>" . $r . "</td></tr>" .
		 "<tr><th>Condition</th><td>" . $g . "</td></tr>" .
		 "<tr><th>Device Type</th><td>" . $t . "</td></tr>" .
		 "<tr><th>Model</th><td>" . $m . "</td></tr>" .
		 "<tr><th>Location</th><td>" . $st . "</td></tr>" .
		 "<tr><th>Disposition</th><td>" . $d . "</td></tr>";
}
$run->close();

$pcSQL = "select ram, cpu.model, cpu.clock_speed from device, cpu where cpu_id = cpu.id and serial = ?;";
$pcRun = $db->prepare($pcSQL);
$pcRun->bind_param("s", $id);
$pcRun->execute();
$pcRun->store_result();
$pcRun->bind_result($ram, $mod, $clo);
if($pcRun->num_rows > 0)
{
	while($pcRun->fetch())
	{
		echo "<tr><th>Ram</th><td>" . $ram . " GB </td></tr>" .
			 "<tr><th>CPU Model</th><td>" . $mod . "</td></tr>" .
			 "<tr><th>Clock Speed</th><td>". $clo . " GHz </td></tr>";
	}
}
$pcRun->close();

$custSQL = "select customer.customer_id, customer.name, job.id, job.pickup_date
			from dev_cont, container, job_transfer, job, quote, customer
			where dev_cont.cont_id = container.id
			and job_transfer.cont_id = container.id
			and job_transfer.job_id = job.id
			and job.quote_id = quote.id
			and quote.cust_id = customer.customer_id
			and dev_cont.dev_serial = ?;";
$custRun = $db->prepare($custSQL);
$custRun->bind_param("s", $id);
$custRun->execute();
$custRun->bind_result($ci, $cn, $ji, $jd);
while($custRun->fetch())
{
	echo "<tr><th>Customer ID</th><td>" . $ci . "</td></tr>" .
		 "<tr><th>Customer Name</th><td>" . $cn . "</td></tr>" .
		 "<tr><th>Job ID</th><td>" . $ji . "</td></tr>" .
		 "<tr><th>Job Pickup Date</th><td>" . $jd . "</td></tr>";
}
$custRun->close();

$parSQL = "select parent_serial from device where serial = ?;";
$parRun = $db->prepare($parSQL);
$parRun->bind_param("s", $id);
$parRun->execute();
$parRun->store_result();
$parRun->bind_result($par);
while($parRun->fetch())
{
	if(!empty($par))
	{
		echo "<tr><th>Parent Device</th><td><a href=\"../device_details.php/?id=" . $par . "\">" . $par . "</a></td></tr>";
	}
}
$parRun->close();
?>
</table>
<br><a href="../device_list.php"><button type="button">Back</button></a>
</body>
</html>
