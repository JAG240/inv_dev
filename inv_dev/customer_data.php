<?php
require "db.php";
include_once("navbar.html");
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
	}
	else
	{
		echo "Import Failed: File Type Not Supported";
	}
}
?>
</body>
</html>