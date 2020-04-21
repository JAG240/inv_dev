<?php
require "db.php";
include_once("navbar.html");
require_once("vendor/php-excel-reader/excel_reader2.php");
require_once("vendor/SpreadsheetReader.php");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Customer Import</title>
</head>

<body>
<?php
if(isset($_POST['import']))
{
	$allowedFiles = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
	if(in_array($_FILES['file']['type'], $allowedFiles))
	{
		$target = "uploads/".$_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], $target);
		
		$reader = new SpreadsheetReader($target);
		$sheets = count($reader->sheets());
		
		$customer = array();
		
		echo "<table class=\"tableFormat\">";
		echo "<tr><th>Name</th><th>Phone</th><th>Primary Contact</th><th>Fax</th><th>Address</th></tr>";
		foreach($reader as $r)
		{
			if($r[2] == "Vendor"){}
			else
			{
				
				$name = preg_replace("/[- V]/", "", $r[2]);
				$phone = intval(preg_replace("/[-]/", "", $r[23]));
				$pri = $r[20];
				$fax = intval(preg_replace("/[-]/", "", $r[24]));
			
				if(1 === preg_match("~[0-9]~", $r[11]))
				{
					$billAdd = $r[11];
				}
				else
				{
					$billAdd = $r[12];
				}
				
				if($billAdd == $r[11])
				{
					$billCity = $r[12];
				}
				else
				{
					$billCity = $r[13];
				}
				
				if($phone == 0 && $fax == 0 && empty($billAdd)){}
				else{
				echo "<tr><td>" . $name . "</td><td>" . $phone . "</td><td>" . $pri . "</td><td>" . $fax . "</td><td>" . $billAdd . ", " . $billCity . "</td></tr>";
				
				array_push($customer, array($name, $phone, $pri, $fax, $billAdd, $billCity));}
			}
		}
		echo "</table>";
		echo "<form method=\"POST\" action=\"customer_build.php\">";
		echo "<input type=\"hidden\" name=\"customer\" value=\"" . htmlspecialchars(json_encode($customer)) . "\">";
		echo "<input type=\"submit\"></form>";
		
	}
	else
	{
		echo "Import Failed: File Type Not Supported";
	}
}
?>
</body>
</html>