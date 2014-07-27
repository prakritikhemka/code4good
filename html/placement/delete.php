<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>HOME</title></head>
<body>
<?php
	$db=mysqli_connect("localhost","root","","placement");
	if (mysqli_connect_errno())
			exit("Failed to connect to MySQL: " . mysqli_connect_error());
	$query = mysqli_prepare($db, "DELETE FROM company WHERE company=?");
	$temp=$_POST['selected_companies'];
	$count=count($temp);
	for($i=0;$i<$count;$i++)
		{
			$str=intval($temp[$i]);
			$name=$_SESSION[$str." "];
			mysqli_stmt_bind_param($query, "s", $name);
			$result=mysqli_stmt_execute($query);
			if($result==1)
				print "Deleted successfully";
			else
				print "Deletion unsuccessfull";
		}
?>
</body>
</html>