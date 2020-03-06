<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['name']))
{
	$addSQL = "insert into credit_ref(name, address, city, state, zip, phone, fax) values (?, ?, ?, ?, ?, ?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("ssssiii", $_POST['name'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['phone'], $_POST['fax']);
	$addRun->execute();
	$addRun->store_result();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Credit Reference List</title>
</head>
<body>
<ul>
<?php
$creditSQL = "select id, name from credit_ref;";
$creditRun = $db->prepare($creditSQL);
$creditRun->execute();
$creditRun->bind_result($i, $n);
while($creditRun->fetch())
{
	echo "<li><a href=\"credit_ref_details.php/?id=" . $i . "\">" . $n . "</a></li>";
}
$creditRun->close();
?>
</ul>
<a href="credit_ref_form.php"><button type="button"> Add Credit Reference </button></a>
</body>
</html>