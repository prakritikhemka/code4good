<?php
$dbhost='localhost';
$dbname='JPM';
$dbuser='root';
$dbpass="cfg2014!";
$conn=mysql_connect($dbhost,$dbuser,$dbpass) or die("could not connect to my sql");
mysql_select_db($dbname) or die("cannot select db");
?>