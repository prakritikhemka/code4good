<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>HOME</title>
<style type="text/css">
<td.normal{border: 1px }
td.register{border: 0px; align: centre; }
</style>
</head>
<body>
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
	exit("NO COMPANY VISITS IN SHORT");
else
	{
	print "<table border=\"1\" style=\"width:500px\">";
	for($i=0;$i<$number_of_columns;$i++)
		{   print "<td>";
			print $keys[2*$i+1]."   ";
			print "</td>";
		}
	print "</tr>";
	
	for($i=0;$i<$number_of_rows;$i++)
		{print "<tr>";
		$values=array_values($row);
		for($j=0;$j<$number_of_columns;$j++)
			{
			$value=htmlspecialchars($values[2*$j+1]);
			    print "<td class=\"normal\">";
				print $value."   ";
				print "</td>";
				if($j==0)
					{$_SESSION['company']=$value;}
			}
		print "<td class=\"register\">";
		print "<form action=\"register.php\" method=\"post\"><input type=\"submit\" value=\"REGISTER\"></form>";
		print "</td>";
		print "</tr>";
		
		$row=mysqli_fetch_array($result);
		}
	print "</table>";
?>

<?php }?>
</body>
</html>