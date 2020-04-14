<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Order Report Verfication</title>
</head>

<body>
<?php
if(isset($_POST['submit']))
{
	$fileName = $_FILES['file']['tmp_name'];
	
	$orders = array();
	
	echo "<table class=\"tableFormat\"><tr><th>Order Number</th><th>Username</th><th>Buyer Name</th><th>Buyer Email</th><th>Buyer Address</th><th>Ship to Name</th><th>Ship to address</th><th>Item Number</th><th>Item Title</th><th>
	Quantity</th><th>Sold Price</th><th>eBay Collected Tax</th><th>Total Price</th><th>PapPal Trans ID</th></tr>";
	if($_FILES['file']['size'] > 0)
	{
		$file = fopen($fileName, "r");
		
		while(($col = fgetcsv($file, 10000, ",")) !== FALSE)
		{
			if(preg_match("/[0-9][0-9][0-9][0-9]/", $col[0]))
			{
				echo "<tr><td>" . $col[1] . "</td><td>" . $col[2] . "</td><td>" . $col[3] . "</td><td>" . $col[4] . "</td><td>" . $col[6] . ", " . $col[8] . ", " . $col[9] . " " . $col[10] . "</td><td>" .
				$col[12] . "</td><td>" . $col[14] . ", " . $col[16] . ", " . $col[17] . " " . $col[18] . "</td><td>" . $col[20] . "</td><td>" . $col[21] . "</td><td>" . $col[24] . "</td><td>" . $col[25] . 
				"</td><td>" . $col[28] . "</td><td>" . $col[29] . "</td><td>" . $col[41] ."</td></tr>";
				
//order #[0], username[1], b_name[2], b_email[3], b_address[4], b_city[5], b_state[6], b_zip[7], s_name[8], s_address[9], s_city[10], s_state[11], s_zip[12], item num[13], item title[14], quantity[15], sold[16], tax[17], total[18], paypal[19]
			array_push($orders, array($col[1], $col[2], $col[3], $col[4], $col[6], $col[8], $col[9], $col[10], $col[12], $col[14], $col[16], $col[17], $col[18], $col[20], $col[21], $col[24],$col[25], $col[28], $col[29], $col[41]));
			}
		}
	}
	echo "</table><form method=\"POST\" action=\"order_report_build.php\">";
	echo "<input type=\"hidden\" name=\"orders\" value=\"" . htmlspecialchars(json_encode($orders)) . "\">";
	echo "<br><input type=\"submit\"></form>";
	
}
else
{
	echo "No file was recieved";
}
?>
</body>
</html>