<?php
require "db.php";
include_once("navbar2.html");
session_start();
?>
<?php
$id = $_GET['id'];
?>
<?php
if(isset($_GET['action']) && $_GET['action'] == 1 && isset($_SESSION['clear']) && $_SESSION['clear'] == 0)
{
	$sql = "delete from customer where customer_id = ?;";
	$run = $db->prepare($sql);
	$run->bind_param("i", $id);
	$run->execute();
	$run->close();
	
	echo "  <link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">";
	echo "<h2 style=\"color:red\">Customer was deleted</h2>"; 
	echo "<a href=\"../customer_list.php\"><button type=\"button\">Back</button></a>";
}
else
{
if(isset($_POST['cred_id']))
{
	$addCredSQL = "insert into cust_credit_ref(cust_id, credit_id) values (?, ?);";
	$addCredRun = $db->prepare($addCredSQL);
	$addCredRun->bind_param("ii", $id, $_POST['cred_id']);
	$addCredRun->execute();
	$addCredRun->close();
}
?>
<?php
if(isset($_POST['d_name']))
{
	$dockAddSQL = "insert into dock_contact(name, phone, cust_id) values (?, ?, ?);";
	$dockAddRun = $db->prepare($dockAddSQL);
	$dockAddRun->bind_param("sii", $_POST['d_name'], $_POST['d_phone'], $id);
	$dockAddRun->execute();
	$dockAddRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Customer Details</title>
</head>

<body>
<table>
<?php
$detailSQL = "Select customer.customer_id, customer.name, customer.phone, customer.primary_contact, customer.website, customer.fax,
 customer.email, customer.referred, customer.billing_add, customer.physical_add, 
 customer.tax_exempt, customer.federal_tax, customer.duns, customer.start_date
 from customer
 where customer_id = ?;";
$detailRun = $db->prepare($detailSQL);
$detailRun->bind_param("i", $id);
$detailRun->execute();
$detailRun->bind_result($i, $n, $p, $c, $w, $f, $e, $r, $b, $p, $t, $fd, $dun, $sd);
while($detailRun->fetch())
{
	echo "<tr><th>ID: </th><td>" . $i . "</td></tr>" .
		 "<tr><th>Name: </th><td>" . $n ."</td></tr>" . 
		 "<tr><th>Phone #: </th><td>" . $p . "</td></tr>" . 
		 "<tr><th>Primary Contact: </th><td>" . $c . "</td></tr>" . 
		 "<tr><th>Website: </th><td>" . $w . "</td></tr>" . 
		 "<tr><th>Fax: </th><td>" . $f . "</td></tr>" . 
		 "<tr><th>Email: </th><td>" . $e . "</td></tr>" . 
		 "<tr><th>Referred By: </th><td>" . $r . "</td></tr>" . 
		 "<tr><th>Billing Address: </th><td>" . $b . "</td></tr>" . 
		 "<tr><th>Physical Address: </th><td>" . $p . "</td></tr>" . 
		 "<tr><th>Tax Exempt #: </th><td>" . $t . "</th></tr>" . 
		 "<tr><th>Federal Tax ID: </th><td>" . $fd . "</th></tr>" . 
		 "<tr><th>DUNS #: </th><td>" . $dun . "</th></tr>" . 
		 "<tr><th>Date Acquired: </th><td>" . $sd . "</td></tr>";
}
$detailRun->close();
?>
</table>
<?php
$refSQL="select credit_id, name from credit_ref
inner join cust_credit_ref on cust_credit_ref.credit_id = credit_ref.id
and cust_credit_ref.cust_id = ?;";
$refRun = $db->prepare($refSQL);
$refRun->bind_param("i", $id);
$refRun->execute();
$refRun->store_result();
if($refRun->num_rows > 0)
{
	$refRun->bind_result($cred_i, $cred_n);
	echo "<h3>Credit References</h3>";
	while($refRun->fetch()){
	echo "<ul>" . 
		 "<li><a href=\"../credit_ref_details.php/?id=" . $cred_i . "\">" . $cred_n . "</a></li>"; 
	}
}
$refRun->close();
?>

<?php
$dockSQL = "select name, phone from dock_contact where cust_id = ?;";
$dockRun = $db->prepare($dockSQL);
$dockRun->bind_param("i", $id);
$dockRun->execute();
$dockRun->store_result();
$dockRun->bind_result($dn, $dp);
if($dockRun->num_rows > 0)
{
	echo "<h3>Dock Contact</h3>";
	echo "<table>";
	while($dockRun->fetch())
	{
		echo "<tr><th>" . $dn . ":</th><td>" . $dp . "</td></tr>";
	}
	echo "</table>";
}


?>

<br><a href="../customer_list.php"><button type="button">Customer List</button></a>
<?php echo "<a href=\"../add_credit_ref.php/?id=" . $id ."\">" ?><button type="button">Add Credit Reference</button></a>
<?php echo "<a href=\"../dock_contact_form.php/?id=" . $id . "\">" ?><button type="button">Add Dock Contact</button></a>
<?php
if(isset($_SESSION['clear']) && $_SESSION['clear'] == 0)
{
	echo "<br><br><a href=\"../customer_details.php/?id=" . $id . "&action=1\"><button type=\"button\">Delete this customer</button></a>";
}
}
?>
</body>
</html>