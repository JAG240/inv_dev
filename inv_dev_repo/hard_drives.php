<?php
require "db.php";
require "db2.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['start_count']))
{
	for($x = 0; $_POST['start_count'] > $x; $x++)
	{
		if(!empty($_POST['hdd' . $x]))
		{
			$add = "update device set location_id = 9, disp_id = 13 where serial = ?;";
			$run = $db->prepare($add);
			$run->bind_param("s", $_POST['hdd' . $x]);
			$run->execute();
			$run->close();
			
			$report = "insert into report(location_id, report_date, comments) values (7, curdate(), \"Hard drive sanitation begins\");";
			$run = $db->prepare($report);
			$run->execute();
			$run->close();
			
			$sel = "select id from report order by id desc limit 1;";
			$run1 = $db->prepare($sel);
			$run1->execute();
			$run1->bind_result($r);
			while($run1->fetch())
			{
				$rep = "insert into dev_report(dev_serial, report_id, purpose_id) values (?, ?, 1);";
				$run2 = $db2->prepare($rep);
				$run2->bind_param("si", $_POST['hdd' . $x], $r);
				$run2->execute();
				$run2->close();
			}
			$run1->close();
		}
	}		
}

if(isset($_POST['finish_count']))
{
	for($x = 0; $_POST['finish_count'] > $x; $x++)
	{
		if(!empty($_POST['hdd' . $x]))
		{
			$add = "update device set location_id = 8, disp_id = 14 where serial = ?;";
			$run = $db->prepare($add);
			$run->bind_param("s", $_POST['hdd' . $x]);
			$run->execute();
			$run->close();
			
			$report = "insert into report(location_id, report_date, comments) values (9, curdate(), \"Hard drive sanitation completed\");";
			$run = $db->prepare($report);
			$run->execute();
			$run->close();
			
			$sel = "select id from report order by id desc limit 1;";
			$run1 = $db->prepare($sel);
			$run1->execute();
			$run1->bind_result($r);
			while($run1->fetch())
			{
				$rep = "insert into dev_report(dev_serial, report_id, purpose_id) values (?, ?, 1);";
				$run2 = $db2->prepare($rep);
				$run2->bind_param("si", $_POST['hdd' . $x], $r);
				$run2->execute();
				$run2->close();
			}
			$run1->close();
		}
	}		
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Hard Drives</title>
</head>

<body>
<a href="unsanitized.php">Unsanitized Hard Drives</a><br>
<a href="sanitize_in_progress.php">Hard Drives Being Sanatized</a><br>
<a href="sanitized.php">Sanitized Hard Drives</a><br>
<br><a href="resale.php"><button type="button">Back</button></a>
</body>
</html>