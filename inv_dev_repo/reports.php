<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Reports</title>
</head>

<body>
<table>
<tr><th>Report ID</th><th>Station</th><th>Report Date</th></tr>
<?php
$sql = "select report.id, station, report_date from report, location where report.location_id = location.id;";
$run = $db->prepare($sql);
$run->execute();
$run->bind_result($i, $s, $d);
while($run->fetch())
{
	echo "<tr><td><a href=\"report_details.php/?id=" . $i . "\">" . $i . 
		 "</td><td>" . $s . 
		 "</td><td>" . $d . 
		 "</td></tr>";
}
$run->close();
?>
</table>
<br><a href="resale.php"><button type="button">Back</button></a>
</body>
</html>