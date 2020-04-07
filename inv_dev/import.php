<?php
require "db.php";
include_once("navbar2.html");
$id = $_GET['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <title>Import CRTL</title>
</head>

<body>
<form method="POST" action="../import_data.php" enctype="multipart/form-data">
Select a file: <br> 
<input type="file" name="CRTL" accept=".xlsx, .xls"><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br><input type="submit" name="import">
</form>

</body>
</html>