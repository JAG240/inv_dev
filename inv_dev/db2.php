<?php

$db2 = new mysqli("localhost", "root", "", "inv_dev");

if($db->connect_error)
{
	die("Connection to Datebase Failed: " + $db->connect_error);
}

?> 