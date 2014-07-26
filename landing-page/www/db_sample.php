<?php

// This is a simple example that demonstrates how to connect to MySQL and Query

// Create connection
$con=mysqli_connect(localhost,"root","cfg2014!","test");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
  echo "<h3>Connected to MySQL!!!</h3>";
  }


// Below we have an example of an insert statement
// First, we check to see if something has been posted for insert
if($_POST[name] != "") {
// if yes, then we develop our insert sql statement
$sql="INSERT INTO table1 (Name)
VALUES
('$_POST[name]')";

// now, we execute our insert statement
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "<h3>1 record added</h3>";
}

// We will check to see if we have any existing data and print it out
// We define a string with our SQL query
$query1 = "SELECT * FROM table1";
// Using our con, we will run the query and store results into $result
$result = mysqli_query($con,$query1);
// Now, we iterate through the results and print each row
while($row = mysqli_fetch_array($result))
  {
  echo $row['ID'] . " " . $row['Name'];
  echo "<br />";
  }
  
// Close the MySQL Connection
mysqli_close($con);

?>
  
<html>
<body>
<br />
<br />
<form action="db_sample.php" method="post">
Name: <input type="text" name="name">
<input type="submit">
</form>

</body>
</html>

