<?php
$dbhost='http://ec2-54-254-226-79.ap-southeast-1.compute.amazonaws.com/';
$dbname='JPM';
$dbuser='root';
$dbpass="cfg2014!";
$conn=mysql_connect($dbhost,$dbuser,$dbpass) or die("could not connect to my sql");
mysql_select_db($dbname) or die("cannot select db");
?>