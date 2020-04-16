<?php
require "db.php";
include_once("navbar.html");
session_start();
//echo hash_hmac("sha256", "eL00p-admin", "3l00p", false);
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Home Page</title>
</head>

<body>
<a href="customers.php">Customers</a><br>
<a href="quotes.php">Quotes</a><br>
<a href="jobs.php">Jobs</a><br>
<a href="containers.php">Containers</a><br>
<a href="devices.php">Devices</a><br>
<a href="resale.php">Resale Activities</a><br>
<br>
<?php
if(isset($_SESSION['username']))
{
	echo "<a href=\"logout.php\"><button type=\"button\">Logout</button></a>";
}
else
{
	echo "<a href=\"login.php\"><button type=\"button\">Login</button></a>";
}
?>
</body>
<?php
include_once("footer_bug.html");
?>
</html>