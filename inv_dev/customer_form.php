<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>New Customer Form</title>
</head>

<body>

<form method="post" action="customer_list.php">
Company Name: <br>
<input type="text" name="name"><br>
Phone Number: <br>
<input type="number" name="phone"><br>
Primary Contact: <br>
<input type="text" name="contact"><br>
Website: <br>
<input type="URL" name="website"><br>
Fax: <br>
<input type="number" name="fax"><br>
Email: <br>
<input type="email" name="mail"><br>
Referred by: <br>
<input type="text" name="refer"><br>
Billing Address: <br>
<input type="text" name="billing"><br>
Physical Address: <br>
<input type="text" name="physical"><br>
P.O. Box: <br>
<input type="text" name="PO"><br>
Tax Exempt Number: <br>
<input type="number" name="tax"><br>
Federal Tax ID: <br>
<input type="number" name="fed"><br>
DUNS Number: <br>
<input type="number" name="duns"><br>
Company Type: <br>
<select name="type">
<?php 
$typeSQL = "select id, comp_type from company_type;";
$typeRun = $db->prepare($typeSQL);
$typeRun->execute();
$typeRun->bind_result($id, $type);

	while($typeRun->fetch())
	{
		echo "<option value=\"" . $id . "\">" . $type . "</option>";
	}

$typeRun->close();
?>
</select><br><br>
<input type="submit">
</form>
<br><a href="customer_list.php"><button type="button">Customer List</button></a>
</body>
</html>