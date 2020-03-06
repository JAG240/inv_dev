<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Quote Search</title>
</head>

<body>
<table> 
<tr><th>Quote ID</th><th>Company Name</th><th>Quote Date</th></tr>
<?php
$qSQL = "select quote.id, customer.name, quote.quote_date from quote, customer where quote.cust_id = customer.customer_id;";
$qRun = $db->prepare($qSQL);
$qRun->execute();
$qRun->store_result();
$qRun->bind_result($i, $n, $d);
while($qRun->fetch())
{
	echo "<tr><td><a href=\"quote_details.php/?id=".$i ."\">" . $i . 
		 "</a></td><td>" . $n . 
		 "</td><td>" . $d . 
		 "</td></tr>";
}
?>
</table>

</body>
</html>