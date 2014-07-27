<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>HOME</title></head>
<body>
<?php
$db=mysqli_connect("localhost","root","","placement");
$usn=$_SESSION['usn'];
$company=$_SESSION['company'];
$query="INSERT INTO registration VALUES('".$usn."',FALSE,FALSE,'".$company."')";
$result=mysqli_query($db,$query);
if(!$result)
	{
		exit("U HAVE ALREADY REGISTERED");
	}

?>
</body>
</html>