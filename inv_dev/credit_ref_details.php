<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Credit Reference Details</title>
</head>
<body>
<table>
<?php
$detailSQL ="select id, name, address, city, state, zip, phone, fax from credit_ref where id = ?;";
$detailRun = $db->prepare($detailSQL);
$detailRun->bind_param("i", $id); 
$detailRun->execute();
$detailRun->bind_result($i, $n, $a, $c, $s, $z, $p, $f);
while($detailRun->fetch())
{
	echo "<tr><th>ID</th><td>" . $i . "</td></tr>" .
		 "<tr><th>Name</th><td>" . $n . "</td></tr>" .
		 "<tr><th>Address</th><td>" . $a . "</td></tr>" .
		 "<tr><th>City</th><td>" . $c . "</td></tr>" . 
		 "<tr><th>State</th><td>" . $s . "</td></tr>" . 
		 "<tr><th>Zip</th><td>" . $z . "</td></tr>" . 
		 "<tr><th>Phone</th><td>" . $p . "</td></tr>" . 
		 "<tr><th>Fax</th><td>" . $f . "</td></tr>";
}
$detailRun->close();
?>
</table>

<br><a href="../credit_ref_list.php"><button type="button">Credit Reference List</button></a>
</body>
</html>