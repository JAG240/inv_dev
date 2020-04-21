<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Driver Pick Up Log</title>
</head>

<body>
<?php echo "<form method=\"POST\" action=\"../job_details.php/?id=" . $id . "\">" ?>
Start Mileage: <br>
<input type="number" name="start" required><br>
End Mileage: <br>
<input type="number" name="end" required><br>
Arrival at Pickup Location Time: <br>
<input type="time" name="arrive" required><br>
Departure from Pickup Location Time: <br>
<input type="time" name="depart" required><br>
Number of Containers Collected: <br>
<input type="number" name="con" required><br>
<br><input type="submit">
</form>
</body>
</html>