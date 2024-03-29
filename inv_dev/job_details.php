<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<?php
if(isset($_POST['con']))
{
	$addSQL = "update job
				set start_mile = ?, end_mile = ?,
				arrival = ?, departure = ?, cont_num = ?
				where id = ?;";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("iissii", $_POST['start'], $_POST['end'], $_POST['arrive'], $_POST['depart'], $_POST['con'], $id);
	$addRun->execute();
	$addRun->close();
}

if(isset($_POST['cont_id']))
{
	$addSQL = "insert into job_transfer(job_id, cont_id, weight, quantity, trans_date) values (?, ?, ?, ?, curdate());";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("iiii", $id, $_POST['cont_id'], $_POST['weight'], $_POST['quantity']);
	$addRun->execute();
	if($addRun)
	{
		echo "<i>Successfully transferred: " . $_POST['weight'] . "lbs to container " . $_POST['cont_id'] . "</i>";
	}
	else
	{
		echo "<i>An error occured during job_transfer</i>";
	}
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Job Details</title>
</head>

<body>
<table>
<?php
$jSQL = "select job.id, truck.id, truck.size, job.pickup_date,
		 job.start_mile, job.end_mile, job.arrival, job.departure, job.cont_num, customer.name 
		 from job, quote, customer, truck
		 where job.quote_id = quote.id 
		 and quote.cust_id = customer.customer_id
		 and truck.id = job.truck_id
		 and job.id = ?;";
$jRun = $db->prepare($jSQL);
$jRun->bind_param("i", $id);
$jRun->execute();
$jRun->store_result();
$jRun->bind_result($ji, $ti, $ts, $jd, $js, $je, $ja, $jl, $c, $cn);
while($jRun->fetch())
{
	echo "<tr><th>Job ID</th><td>" . $ji . "</td></tr>" . 
		 "<tr><th>Truck ID</th><td>" . $ti . "</td></tr>" . 
		 "<tr><th>Truck Size</th><td>" . $ts . "</td></tr>" . 
		 "<tr><th>Pickup Date</th><td>" . $jd . "</td></tr>" . 
		 "<tr><th>Mileage at Start of Job</th><td>" . $js . "</td></tr>" . 
		 "<tr><th>Mileage at End of Job</th><td>" . $je . "</td></tr>" . 
		 "<tr><th>Arrival at Pickup Location Time</th><td>" . $ja . "</td></tr>" . 
		 "<tr><th>Departure from Pickup Location Time</th><td>" . $jl . "</td></tr>" . 
		 "<tr><th>Number of Containers Collected</th><td>" . $c . "</td></tr>" . 
		 "<tr><th>Customer</th><td>". $cn . "</td></tr>";
}
$jRun->close();
?>
</table>
<br>
<table>
<tr><th>Container ID</th><th>Quantity</th><th>Weight</th><th>Transfer Date</th></tr>
<?php
$tSQL = "select cont_id, quantity, weight, trans_date from job_transfer where job_id = ?;";
$tRun = $db->prepare($tSQL);
$tRun->bind_param("i", $id);
$tRun->execute();
$tRun->bind_result($ci, $cq, $cw, $cd);
while($tRun->fetch())
{
	echo "<tr><td><a href=\"../container_details.php/?id=" .$ci . "\">" . $ci . 
		 "</a></td><td>" . $cq . 
		 "</td><td>" . $cw . 
		 "</td><td>" . $cd . 
		 "</td></tr>";
}
$tRun->close();
?>
</table><br>
<br>
<h3>Devices recieved from this job</h3>
<table>
<tr><th>Device Serial</th><th>Location</th><th>Disposition</th><th>Date Received</th></tr>
<?php
$sql = "select distinct device.serial, station, disposition.name, dev_cont.trans_date
from dev_cont, container, job_transfer, device, disposition, location
where dev_cont.cont_id = container.id
and job_transfer.cont_id = container.id
and dev_cont.dev_serial = device.serial
and device.disp_id = disposition.id
and device.location_id = location.id
and job_id = ?
order by name;";
$run = $db->prepare($sql);
$run->bind_param("i", $id);
$run->execute();
$run->bind_result($dev, $sta, $disp, $date);
while($run->fetch())
{
	echo "<tr><td><a href=\"../device_details.php/?id=" . $dev . "\">" . $dev .
		 "</a></td><td>" . $sta . 
		 "</td><td>" . $disp . 
		 "</td><td>" . $date . 
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="../job_list.php"><button type="button">Back</button></a>
<?php echo " <a href=\"../DPUL.php/?id=" . $id ."\"> <button type=\"button\">Create DPUL for this Job</button></a> "; ?>
<?php echo " <a href=\"../transfer_form.php/?id=" . $id . "\"> <button type=\"button\">Transfer Material to Container</button></a> "; ?>
</body>
</html>
