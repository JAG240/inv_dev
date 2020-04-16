<?php
require "db.php";
include_once("navbar.html");
session_start();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Login</title>
</head>

<body>
<?php
if(isset($_POST['username']))
{
	$sql = "select username, password, clear from users;";
	$run = $db->prepare($sql);
	$run->execute();
	$run->bind_result($u, $p, $c);
	while($run->fetch())
	{
		if($u == $_POST['username'])
		{
			if($p == hash_hmac("sha256", $_POST['pass'], "3l00p"))
			{
				$_SESSION['username'] = $u;
				$_SESSION['clear'] = $c;
			}
			else
			{
				session_destroy();
				echo "Password incorrect";
			}
		}
		else
		{
			session_destroy();
			echo "Username incorrect";
		}
	}
	$run->close();
	
	echo "<h2 style=\"color:green\"> Welcome " . $_SESSION['username'] . "</h2>";
	echo "<a href=\"index.php\"><button type=\"button\">Home</button></a>";
}
else
{
?>
<form method="POST" action="login.php">
Username: <br><input type="text" name="username" required><br>
Password: <br><input type="password" name="pass" required><br>
<br><input type="submit">
</form>
<?php
}
?>
</body>
</html>