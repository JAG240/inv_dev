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
<input type="text" name="name" required><br>
Phone Number: <br>
<input type="number" name="phone" required><br>
Primary Contact: <br>
<input type="text" name="contact" required><br>
Website: <br>
<input type="URL" name="website"><br>
Fax: <br>
<input type="number" name="fax"><br>
Email: <br>
<input type="email" name="mail" required><br>
Referred by: <br>
<input type="text" name="refer"><br>
Billing Address: <br>
<input type="text" name="billing" required><br>
Physical Address: <br>
<input type="text" name="physical" required><br>
City: <br>
<input type="text" name="city" required><br>
State: <br>
<select name="state" required>
<option value="PA" selected>PA<option>
</select><br>
Zip Code: <br>
<input type="number" name="zip" required><br>
P.O. Box: <br>
<input type="text" name="PO"><br>
Tax Exempt Number: <br>
<input type="number" name="tax"><br>
Federal Tax ID: <br>
<input type="number" name="fed" required><br>
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