<?php
require "db.php";
include_once("navbar.html");
?>
<?php
if(isset($_POST['q']))
{
	$addSQL = "insert into job(quote_id, truck_id, pickup_date) values (?, ?, ?);";
	$addRun = $db->prepare($addSQL);
	$addRun->bind_param("iis", $_POST['q'], $_POST['truck'], $_POST['pick']);
	$addRun->execute();
	$addRun->close();
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Jobs</title>
</head>

<body>
<a href="job_list.php">Job List</a>
</body>
</html>