<?php
require "db.php";
require "db2.php";
include_once("navbar.html");
require_once("vendor/php-excel-reader/excel_reader2.php");
require_once("vendor/SpreadsheetReader.php");
$id = $_POST['id'];
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
$MOU = json_decode($_POST['MOU']);
$SW = json_decode($_POST['SW']);
$CLO = json_decode($_POST['CLO']);
$SPK = json_decode($_POST['SPK']);
$DX = json_decode($_POST['DX']);
$SRV = json_decode($_POST['SRV']);
$RAD = json_decode($_POST['RAD']);
$WAV = json_decode($_POST['WAV']);
$WAP = json_decode($_POST['WAP']);
$KVM = json_decode($_POST['KVM']);
$CP = json_decode($_POST['CP']);
$VCR = json_decode($_POST['VCR']);

$sql = "select id from model where name like ? limit 1;";
$insert = "insert into model(name, dev_type_id) value (?, ?);";

foreach($DT as $dt)
{
	$type = 1;
	$name = $dt[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($LT as $lt)
{
	$type = 2;
	$name = $lt[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($TAB as $tab)
{
	$type = 6;
	$name = $tab[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($AIO as $aio)
{
	$type = 15;
	$name = $aio[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($PRT as $prt)
{
	$type = 3;
	$name = $prt[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($LCD as $lcd)
{
	$type = 7;
	$name = $lcd[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($PRJ as $prj)
{
	$type = 8;
	$name = $prj[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($TV as $tv)
{
	$type = 10;
	$name = $tv[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($VAC as $vac)
{
	$type = 26;
	$name = $vac[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($DVD as $dvd)
{
	$type = 19;
	$name = $dvd[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($MIS as $mis)
{
	$type = 11;
	$name = $mis[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($KEY as $key)
{
	$type = 12;
	$name = $key[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($MOU as $mou)
{
	$type = 13;
	$name = $mou[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($SW as $sw)
{
	$type = 14;
	$name = $sw[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($CLO as $clo)
{
	$type = 16;
	$name = $clo[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($SPK as $spk)
{
	$type = 17;
	$name = $spk[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($DX as $dx)
{
	$type = 18;
	$name = $dx[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($SRV as $srv)
{
	$type = 21;
	$name = $srv[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($RAD as $rad)
{
	$type = 20;
	$name = $rad[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($WAV as $wav)
{
	$type = 22;
	$name = $wav[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($WAP as $wap)
{
	$type = 23;
	$name = $wap[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($KVM as $kvm)
{
	$type = 24;
	$name = $kvm[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	 
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($CP as $cp)
{
	$type = 25;
	$name = $cp[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

foreach($VCR as $vcr)
{
	$type = 9;
	$name = $vcr[0];
	$run = $db->prepare($sql);
	$run->bind_param("s", $name);
	$run->execute();
	$run->store_result();
	if($run->num_rows > 0)
	{
		while($run->fetch())
		{
			//echo "Exsist: " . $id . "<br>";
		}
	}
	else
	{
		$run2 = $db2->prepare($insert);
		$run2->bind_param("si", $name, $type);
		$run2->execute();
		$run2->close();
	}
	$run->close();
	
}

$DT2 = json_decode($_POST['DT']);
$LT2 = json_decode($_POST['LT']);
$HD2 = json_decode($_POST['HD']);
$TAB2 = json_decode($_POST['TAB']);
$AIO2 = json_decode($_POST['AIO']);
$PRT2 = json_decode($_POST['PRT']);
$LCD2 = json_decode($_POST['LCD']);
$PRJ2 = json_decode($_POST['PRJ']);
$TV2 = json_decode($_POST['TV']);
$VAC2 = json_decode($_POST['VAC']);
$DVD2 = json_decode($_POST['DVD']);
$MIS2 = json_decode($_POST['MIS']);
$KEY2 = json_decode($_POST['KEY']);
$MOU2 = json_decode($_POST['MOU']);
$SW2 = json_decode($_POST['SW']);
$CLO2 = json_decode($_POST['CLO']);
$SPK2 = json_decode($_POST['SPK']);
$DX2 = json_decode($_POST['DX']);
$SRV2 = json_decode($_POST['SRV']);
$RAD2 = json_decode($_POST['RAD']);
$WAV2 = json_decode($_POST['WAV']);
$WAP2 = json_decode($_POST['WAP']);
$KVM2 = json_decode($_POST['KVM']);
$CP2 = json_decode($_POST['CP']);
$VCR2 = json_decode($_POST['VCR']);

$addDev = "insert into device(serial, type_id, model_id, rec_date, location_id, disp_id) values (?, ?, ?, curdate(), 999, 999);";
$addHDD = "insert into device(serial, type_id, model_id, rec_date, location_id, disp_id, parent_serial) values (?, 5, 10, curdate(), 999, 999, ?);";
$cont = "insert into dev_cont(dev_serial, cont_id, trans_date) values (?, ?, curdate());";

foreach($DT2 as $d)
{
	$m = $d[0];
	$ds = $d[1];
	$hd = $d[2];
	$type = 1;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		if(!empty($hd))
		{
			$hdd = $db2->prepare($addHDD);
			$hdd->bind_param("ss", $hd, $ds);
			$hdd->execute();
			$hdd->close();
		}
		
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
		
		if(!empty($hd))
		{
			$hddCont = $db2->prepare($cont);
			$hddCont->bind_param("si", $hd, $id);
			$hddCont->execute();
			$hddCont->close();
		}
	}
	$model->close();
}

foreach($LT2 as $l)
{
	$m = $l[0];
	$ds = $l[1];
	$hd = $l[2];
	$type = 2;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$hdd = $db2->prepare($addHDD);
		$hdd->bind_param("ss", $hd, $ds);
		$hdd->execute();
		$hdd->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
		
		$hddCont = $db2->prepare($cont);
		$hddCont->bind_param("si", $hd, $id);
		$hddCont->execute();
		$hddCont->close();
	}
	$model->close();
}

foreach($AIO2 as $a)
{
	$m = $a[0];
	$ds = $a[1];
	$hd = $a[2];
	$type = 15;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$hdd = $db2->prepare($addHDD);
		$hdd->bind_param("ss", $hd, $ds);
		$hdd->execute();
		$hdd->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
		
		$hddCont = $db2->prepare($cont);
		$hddCont->bind_param("si", $hd, $id);
		$hddCont->execute();
		$hddCont->close();
	}
	$model->close();
}

foreach($TAB2 as $t)
{
	$m = $t[0];
	$ds = $t[1];
	$type = 6;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($CP2 as $c)
{
	$m = $c[0];
	$ds = $c[1];
	$type = 25;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($PRT2 as $p)
{
	$m = $p[0];
	$ds = $p[1];
	$type = 3;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($LCD2 as $l)
{
	$m = $l[0];
	$ds = $l[1];
	$type = 7;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($PRJ2 as $p)
{
	$m = $p[0];
	$ds = $p[1];
	$type = 8;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($VCR2 as $v)
{
	$m = $v[0];
	$ds = $v[1];
	$type = 9;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($TV2 as $tv)
{
	$m = $tv[0];
	$ds = $tv[1];
	$type = 10;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($VAC2 as $vac)
{
	$m = $vac[0];
	$ds = $vac[1];
	$type = 26;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($DVD2 as $d)
{
	$m = $d[0];
	$ds = $d[1];
	$type = 27;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($MIS2 as $i)
{
	$m = $i[0];
	$ds = $i[1];
	$type = 11;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($KEY2 as $k)
{
	$m = $k[0];
	$ds = $k[1];
	$type = 12;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($MOU2 as $u)
{
	$m = $u[0];
	$ds = $u[1];
	$type = 13;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($SW2 as $sw)
{
	$m = $sw[0];
	$ds = $sw[1];
	$type = 14;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($CLO2 as $c)
{
	$m = $c[0];
	$ds = $c[1];
	$type = 16;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($SPK2 as $k)
{
	$m = $k[0];
	$ds = $k[1];
	$type = 17;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($DX2 as $x)
{
	$m = $x[0];
	$ds = $x[1];
	$type = 18;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($SRV2 as $r)
{
	$m = $r[0];
	$ds = $r[1];
	$type = 21;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($RAD2 as $rad)
{
	$m = $rad[0];
	$ds = $rad[1];
	$type = 20;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($WAV2 as $w)
{
	$m = $w[0];
	$ds = $w[1];
	$type = 22;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($WAP2 as $w)
{
	$m = $w[0];
	$ds = $w[1];
	$type = 23;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($KVM2 as $kvm)
{
	$m = $kvm[0];
	$ds = $kvm[1];
	$type = 24;
	$model = $db->prepare($sql);
	$model->bind_param("s", $m);
	$model->execute();
	$model->bind_result($mod);
	while($model->fetch())
	{
		$dev = $db2->prepare($addDev);
		$dev->bind_param("sii", $ds, $type, $mod);
		$dev->execute();
		$dev->close();
		
		$devCont = $db2->prepare($cont);
		$devCont->bind_param("si", $ds, $id);
		$devCont->execute();
		$devCont->close();
	}
	$model->close();
}

foreach($HD2 as $hd)
{
	$ds = $hd[0];
	$type = 5;
	$mod = 10;
	
	$dev = $db2->prepare($addDev);
	$dev->bind_param("sii", $ds, $type, $mod);
	$dev->execute();
	$dev->close();
	
	$devCont = $db2->prepare($cont);
	$devCont->bind_param("si", $ds, $id);
	$devCont->execute();
	$devCont->close();

}
?>

<h3 style="color:green">CRTL Imported: Please verify devices are in container</h3><br>
<br><a href="container_details.php/?id=<?php echo $id; ?>"><button type="button">Return to container</button></a>
</body>
</html>