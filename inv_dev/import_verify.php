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
  <title>Import Verify</title>
</head>

<body>
<?php  
$DT = json_decode($_POST['DT']);
$LT = json_decode($_POST['LT']);
$HD = json_decode($_POST['HD']);
$TAB = json_decode($_POST['TAB']);
$AIO = json_decode($_POST['AIO']);
$PRT = json_decode($_POST['PRT']);
$LCD = json_decode($_POST['LCD']);
$PRJ = json_decode($_POST['PRJ']);
$TV = json_decode($_POST['TV']);
$VAC = json_decode($_POST['VAC']);
$DVD = json_decode($_POST['DVD']);
$MIS = json_decode($_POST['MIS']);
$KEY = json_decode($_POST['KEY']);
?>
</body>
</html>