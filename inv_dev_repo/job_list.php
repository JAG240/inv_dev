<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Job List</title>
</head>

<body>
<table>
<tr><th>Job ID</th><th>Customer</th><th>Pickup Date</th></tr>
<?php
$listSQL = "select job.id, customer.name, job.pickup_date from job, quote, customer
			where job.quote_id = quote.id
			and quote.cust_id = customer.customer_id;";
$listRun = $db->prepare($listSQL);
$listRun->execute();
$listRun->store_result();
$listRun->bind_result($i, $n, $d);
while($listRun->fetch())
{
	echo "<tr><td><a href=\"job_details.php/?id=".$i ."\">" . $i . 
		 "</a></td><td>" . $n . 
		 "</td><td>" . $d . 
		 "</td></tr>";
}
$listRun->close();
?>
</table>
<br><a href="jobs.php"><button type="button">Back</button></a>
</body>
</html>