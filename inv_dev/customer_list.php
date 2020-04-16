<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['name']))
{	
	$addSQL = "insert into customer(name, phone, primary_contact, website, fax, email, referred, billing_add, physical_add, city, state, zip, po_box, tax_exempt, federal_tax, duns, start_date, comp_type_id) values
	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, curdate(), ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("sississssssisiiii", $_POST['name'], $_POST['phone'], $_POST['contact'], $_POST['website'],
 $_POST['fax'], $_POST['mail'], $_POST['refer'], $_POST['billing'], $_POST['physical'], $_POST['city'], $_POST['state'],
 $_POST['zip'], $_POST['PO'], $_POST['tax'], $_POST['fed'], $_POST['duns'], $_POST['type']);
$addRun->execute();
$addRun->store_result();
$addRun->close();
}
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Customer List</title>
</head>
<body>
<table class="tableFormat">
<tr><th>Customers</th></tr>
<?php 

$tableSQL = "Select customer_id, name
			from customer
			order by name asc;";
$tableRun = $db->prepare($tableSQL);
$tableRun->execute();
$tableRun->bind_result($id, $name);
while($tableRun->fetch())
{
	echo "<tr><td><a href=\"customer_details.php/?id=" . $id . "\">" . $name . "</a></td></tr>";
}
$tableRun->close();
?>
</table>
<a href="customer_form.php"><button type="button"> Add New Customer </button></a> 
<a href="customer_import.php"><button type="button">Import New Customers</button></a><br>
<br><a href="customers.php"><button type="button">Back</button></a>
</body>
</html>
