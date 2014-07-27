<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>HOME</title></head>
<body>
<form action="delete.php" method="post">
<?php
$db=mysqli_connect("localhost","root","","placement");
if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
$query="select * from company";
$result=mysqli_query($db,$query);
if(!$result)
	{
		exit("ERROR!!!");
	}
$row=mysqli_fetch_array($result);
$number_of_rows=mysqli_num_rows($result);
$number_of_columns=mysqli_num_fields($result);
$keys=array_keys($row);
if($number_of_rows==0)
	exit("NO COMPANY DETAILS ENTERED");
else
	{
	for($i=0;$i<$number_of_columns;$i++)
		print $keys[2*$i+1]."   ";
	print "<br>";
	$_SESSION['num_rows']=$number_of_rows;
	$_SESSION['num_cols']=$number_of_columns;
	for($i=0;$i<$number_of_rows;$i++)
		{
		$values=array_values($row);
		print "<input type=\"checkbox\" name=\"selected_companies[]\" value=".$i."/>";
		for($j=0;$j<$number_of_columns;$j++)
			{
			$value=htmlspecialchars($values[2*$j+1]);
				print $value."   ";
				if($j==0) 
					{$_SESSION[$i." "]=$value;  }
			}
		print "<br>";
		$row=mysqli_fetch_array($result);
		}
		print"<br><input type=\"submit\" value=\"DELETE SELECTED\">";
?>
</form>
<form action="add.php" method="post">
<input type="submit" value="ADD NEW">
</form>
<?php }?>
</body>
</html>