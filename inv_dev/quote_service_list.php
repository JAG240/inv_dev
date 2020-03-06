<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['ser_name']))
{
	$addSQL = "insert into service(name) values (?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("s", $_POST['ser_name']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Quote Services</title>
</head>

<body>
<a href="quote_service_form.php"><button type="button">Create New Quote Service</button></a><br>
<br><table>
<tr><th>ID</th><th>Name</th></tr>
<?php
$serSQL = "select id, name from service;";
$serRun = $db->prepare($serSQL);
$serRun->execute();
$serRun->store_result();
$serRun->bind_result($i, $n);
while($serRun->fetch())
{
	echo "<tr><td>" . $i .
		 "</td><td>" . $n .
		 "</td></tr>";
}
$serRun->close();
?>
</table>
<br><a href="quotes.php"><button type="button">Back</button></a>
</body>
</html>