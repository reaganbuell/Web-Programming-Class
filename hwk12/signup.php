<?php

$8 = $_POST["8"];
$9 = $_POST["9"];
$10 = $_POST["10"];
$11 = $_POST["11"];
$12 = $_POST["12"];
$1 = $_POST["1"];
$2 = $_POST["2"];
$3 = $_POST["3"];
$4 = $_POST["4"];
$5 = $_POST["5"];


$fh = fopen('signup.txt','r');
while ($line = fgets($fh)) {
    $8 = $line;
}
fclose($fh);

echo $8

?>