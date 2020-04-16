<?php
require "db.php";
include_once("navbar.html");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Bug Reported</title>
</head>

<body>
<?php
$name = $_POST['name'];
$comment = $_POST['comment'];

$sql = "insert into bug(name, comments) values (?, ?);";
$run = $db->prepare($sql);
$run->bind_param("ss", $name, $comment);
$run->execute();
$run->close();
?>
<h2>I'll be checking on this issue as soon as possible. Thank you for the feedback!<h2>
<br><a href="index.php"><button type="button">Return Home</button></a>
</body>
</html>