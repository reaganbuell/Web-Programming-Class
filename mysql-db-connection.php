<?php

print <<<TOP
<html>
<head>
<title> Database Access </title>
</head>
<body>
<h3> Database Access </h3>
TOP;

$host = "spring-2018.cs.utexas.edu";
$user = "rbuell";
$pwd = "+pAUaglMn2";
$dbs = "cs329e_rbuell";
$port = "3306";

$mysqli = new mysqli($host, $user, $pwd, $dbs);

if ($mysqli->connect_errno)
{
  die("mysqli_connect failed: " . mysqli_connect_errno());
}

print "Connected to ". $mysqli->host_info . "\n";

$mysqli->close();

print <<<BOTTOM
</body>
</html>
BOTTOM;
?>