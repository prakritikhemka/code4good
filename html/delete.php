<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>HOME</title></head>
<body>
<?php
	print "<br>are u sure u want to delete the following company details?<br>";
	$temp=$_POST['selected_companies'];
	$count=count($temp);
	for($i=0;$i<$count;$i++)
		{
			//$string=implode(',',$temp[$i]);
			//print"<br>".$string;*/
			$str=intval($temp[$i]);
			print $_SESSION[$str." "]."<br>";
		}
	print "count=".$count."<br>from session variable<br>";
		for($i=0;$i<$_SESSION['num_rows'];$i++)
			print "<br>".$_SESSION[$i." "];
	/*
	$db=mysqli_connect("localhost","root","","placement");
	if (mysqli_connect_errno())
			exit("Failed to connect to MySQL: " . mysqli_connect_error());
	$query="insert into company values ('".$_POST['COMPANY']."','".$_POST['CTC']."','".$_POST['DATE']."')";
	$result=mysqli_query($db,$query);
	if(!$result)
		exit("ERROR!!!");
	else
		print "COMPANY DETAILS ADDED";
	print "</body></html>";
	}*/
?>
</body>
</html>