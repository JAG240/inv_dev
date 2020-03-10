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
<br><a href="../job_list.php"><button type="button">Back</button></a>
<?php echo " <a href=\"../DPUL.php/?id=" . $id ."\"> <button type=\"button\">Create DPUL for this Job</button></a> "; ?>
<?php echo " <a href=\"../transfer_form.php/?id=" . $id . "\"> <button type=\"button\">Transfer Material to Container</button></a> "; ?>
</body>
</html>
