<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>HOME</title></head>
<body>
<?php
if(!(empty($_POST['COMPANY'])&& empty($_POST['CTC'])&& empty($_POST['COMPANY'])))
	{
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
	}
else
	{
?>
<form action="add.php" method="post">
<input type="text" name="COMPANY" placeholder="COMPANY">
<input type="text" name="CTC" placeholder="CTC">
<input type="date" name="DATE" placeholder="DATE">
<input type="submit" value="ADD COMPANY">
</form>
<?php }?>
</body>
</html>