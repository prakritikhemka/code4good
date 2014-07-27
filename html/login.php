<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>login</title></head>
<body>
<?php
$db=mysqli_connect("localhost","root","","hadoop");
			if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
			$usn = mysqli_real_escape_string($db, $_POST['usn']);
			$_SESSION['usn']=$usn;
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$query="select password from student where usn='".$usn."'";
			$result=mysqli_query($db,$query);
			if (!$result) {
				exit("ERROR!!!");
			}
			$num_rows=mysqli_num_rows($result);
			if($num_rows==0)
				print("<b>INVALID USN</b>");
			else
			{
			$row=mysqli_fetch_array($result);
			if($row['password']==$password)
				header('Location:home.php');
			else
				print "<br><b>invalid credentials</b>";
			}	
				mysqli_close($db);
?>
</body>
</html>
