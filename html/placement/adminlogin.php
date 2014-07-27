<?php session_start();?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1 //EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>admin_login</title></head>
<body>
<?php
$db=mysqli_connect("localhost","root","","placement");
			if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
			$id = mysqli_real_escape_string($db, $_POST['id']);
			$_SESSION['id']=$id;
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$query="select password from admin where id='".$id."'";
			$result=mysqli_query($db,$query);
			if (!$result) {
				exit("ERROR!!!");
			}
			$num_rows=mysqli_num_rows($result);
			if($num_rows==0)
				exit("<br><b>INVALID ID</b>");
			$row=mysqli_fetch_array($result);
			
			if($row['password']!=$password)
				exit("<br> <b> INVALID PASSWORD</b>");
			
			header('Location:adminhome.php');
			
				
				
				mysqli_close($db);
?>
</body>
</html>
