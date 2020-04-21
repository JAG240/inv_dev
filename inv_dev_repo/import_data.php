<?php
require "db.php";
include_once("navbar.html");
require_once("vendor/php-excel-reader/excel_reader2.php");
require_once("vendor/SpreadsheetReader.php");
$id = $_POST['id'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Import CRTL</title>
</head>

<body>
<h3>Verify this data is correct</h3>
<?php
if(isset($_POST['import']))
{
	$allowedFiles = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
	if(in_array($_FILES['CRTL']['type'], $allowedFiles))
	{
		$target = "uploads/".$_FILES["CRTL"]["name"];
		move_uploaded_file($_FILES["CRTL"]["tmp_name"], $target);
		
		$reader = new SpreadsheetReader($target);
		$sheets = count($reader->sheets());
		
		$DT	= array();
		$LT = array();
		$HD = array();
		$TAB = array();
		$AIO = array();
		$CP = array();
		$PRT = array();
		$LCD = array();
		$PRJ = array();
		$VCR = array();
		$TV = array();
		$VAC = array();
		$DVD = array();
		$MIS = array();
		$KEY = array();
		$MOU = array();
		$SW = array();
		$CLO = array();
		$SPK = array();
		$DX = array();
		$SRV = array();
		$RAD = array();
		$WAV = array();
		$WAP = array();
		$KVM = array();
		
		$reader->ChangeSheet(1);
		
		$i = 0;
		foreach($reader as $row)
		{
			if($i == 0)
			{
				$i = 1;
				echo "<h2>" . $row[0] . "</h2>";
				echo "<table><tr><th>Device Type</th><th>Model</th><th>Device Serial</th><th>Hard Drive Serial</th></tr>";
			}
			if($row[1] == "DT")
			{
				array_push($DT, array($row[2], $row[5], $row[6]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>";
			}
			else if($row[1] == "LT")
			{
				array_push($LT, array($row[2], $row[5], $row[6]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>";
			}
			else if($row[1] == "HD")
			{
				if(empty($row[5]) || $row[5] == ".")
				{
					$n = 6;
				}
				else
				{
					$n = 5;
				}
				array_push($HD, array($row[$n]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[1] . "</td><td>None</td><td>" . $row[$n] . "</td></tr>";
			}
			else if($row[1] == "TAB" || $row[1] == "TABLET")
			{
				array_push($TAB, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			elseif($row[1] == "AIO")
			{
				array_push($AIO, array($row[2], $row[5], $row[6]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>";
			}
			else if($row[1] == "CP" || $row[1] == "CELL PHONE")
			{
				array_push($CP, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "PRT")
			{
				array_push($PRT, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if ($row[1] == "LCD")
			{
				if(empty($row[5]))
				{
					$n = 6;
				}
				else{$n = 5;}
				array_push($LCD, array($row[2], $row[$n]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[$n] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "PROJ" || $row[1] == "PRJ")
			{
				array_push($PRJ, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "VCR")
			{
				array_push($VCR, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "TV" || $row[1] == "FTV")
			{
				array_push($TV, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "VACUUM")
			{
				array_push($VAC, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "DVD PLAY")
			{
				array_push($DVD, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "MIS EQ")
			{
				array_push($MIS, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "KEYBOARD" || $row[1] == "KB")
			{
				if($row[5] == "." || $row[5] == "MISSING")
				{
					//do nothing 
				}
				else
				{
				array_push($KEY, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
				}
			}
			else if($row[1] == "MOUSE" || $row[1] == "M")
			{
				array_push($MOU, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "SW")
			{
				array_push($SW, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "T CLOCK")
			{
				array_push($CLO, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "SPEAKERS" || $row[1] == "SPK")
			{
				array_push($SPK, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "LT DOCK" || $row[1] == "DX")
			{
				array_push($DX, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "SRV")
			{
				array_push($SRV, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "RAD" || $row[1] == "ARRAY")
			{
				array_push($RAD, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "MICROWAVE")
			{
				array_push($WAV, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "WAP")
			{
				array_push($WAP, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
			else if($row[1] == "KVM")
			{
				array_push($KVM, array($row[2], $row[5]));
				echo "<tr><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>None</td></tr>";
			}
		}
		echo "</table>";
?>
<form method="POST" action="import_verify.php">

<input type="hidden" name="DT" value="<?php echo htmlspecialchars(json_encode($DT)); ?>">
<input type="hidden" name="LT" value="<?php echo htmlspecialchars(json_encode($LT)); ?>">
<input type="hidden" name="HD" value="<?php echo htmlspecialchars(json_encode($HD)); ?>">
<input type="hidden" name="TAB" value="<?php echo htmlspecialchars(json_encode($TAB)); ?>">
<input type="hidden" name="AIO" value="<?php echo htmlspecialchars(json_encode($AIO)); ?>">
<input type="hidden" name="PRT" value="<?php echo htmlspecialchars(json_encode($PRT)); ?>">
<input type="hidden" name="LCD" value="<?php echo htmlspecialchars(json_encode($LCD)); ?>">
<input type="hidden" name="PRJ" value="<?php echo htmlspecialchars(json_encode($PRJ)); ?>">
<input type="hidden" name="TV" value="<?php echo htmlspecialchars(json_encode($TV)); ?>">
<input type="hidden" name="VAC" value="<?php echo htmlspecialchars(json_encode($VAC)); ?>">
<input type="hidden" name="DVD" value="<?php echo htmlspecialchars(json_encode($DVD)); ?>">
<input type="hidden" name="MIS" value="<?php echo htmlspecialchars(json_encode($MIS)); ?>">
<input type="hidden" name="KEY" value="<?php echo htmlspecialchars(json_encode($KEY)); ?>">
<input type="hidden" name="MOU" value="<?php echo htmlspecialchars(json_encode($MOU)); ?>">
<input type="hidden" name="SW" value="<?php echo htmlspecialchars(json_encode($SW)); ?>">
<input type="hidden" name="CLO" value="<?php echo htmlspecialchars(json_encode($CLO)); ?>">
<input type="hidden" name="SPK" value="<?php echo htmlspecialchars(json_encode($SPK)); ?>">
<input type="hidden" name="DX" value="<?php echo htmlspecialchars(json_encode($DX)); ?>">
<input type="hidden" name="SRV" value="<?php echo htmlspecialchars(json_encode($SRV)); ?>">
<input type="hidden" name="RAD" value="<?php echo htmlspecialchars(json_encode($RAD)); ?>">
<input type="hidden" name="WAV" value="<?php echo htmlspecialchars(json_encode($WAV)); ?>">
<input type="hidden" name="WAP" value="<?php echo htmlspecialchars(json_encode($WAP)); ?>">
<input type="hidden" name="KVM" value="<?php echo htmlspecialchars(json_encode($KVM)); ?>">
<input type="hidden" name="CP" value="<?php echo htmlspecialchars(json_encode($CP)); ?>">
<input type="hidden" name="VCR" value="<?php echo htmlspecialchars(json_encode($VCR)); ?>">
<input type="hidden" name="id" value="<?php  echo $id ?>">

<input type="submit">
<?php
	}
	else
	{
		echo "Import failed: File type not supported";
	}
}
?>
</body>
</html>
