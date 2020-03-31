<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Report Details</title>
</head>

<body>
<table>
<?php
$sql = "select report.id, station, comments, report_date  from report, location
		where location_id = location.id
		and report.id = ?;";
$run = $db->prepare($sql);
$run->bind_param("i", $id);
$run->execute();
$run->bind_result($i, $s, $c, $d);
while($run->fetch())
{
	echo "<tr><th>Report ID</th><td>" . $i . "</td></tr>" .
		 "<tr><th>Station</th><td>" . $s . "</td></tr>" . 
		 "<tr><th>Comment</th><td>" . $c . "</td></tr>". 
		 "<tr><th>Date Created</th><td>" . $d . "</td></tr>";
}
$run->close();
?>
</table>
<h3>Devices used in this report</h3>
<table>
<tr><th>Device Serial</th><th>Purpose</th></tr>
<?php
$sql = "select dev_serial, dev_use from dev_report, purpose
		where purpose_id = purpose.id
		and report_id = ?;";
$run = $db->prepare($sql);
$run->bind_param("i", $id);
$run->execute();
$run->bind_result($ds, $du);
while($run->fetch())
{
	echo "<tr><td><a href=\"../device_details.php/?id=" . $ds . "\">" . $ds .
		 "</a></td><td>" . $du . 
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="../reports.php"><button type="button">Back</button></a>
</body>
</html>