<?php
//This application is developed by www.webinfoipedia.com. || Copyright 2011.
//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..

$db=mysqli_connect("localhost","root","","cfg2014!");
if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}	
//connect the database
//
//??require_once("db.php");

//Enter the headings of the excel columns

//$query="select * from company";
//$result=mysqli_query($db,$query);
//Mysql query to get records from datanbase
//You can customize the query to filter from particular date and month etc...Which will depends your database structure.

/*
$type=$_GET['id'];
$name=$_GET['company'];
if($type=='pl')
$query="SELECT S.USN,S.NAME,S.SEM,S.BRANCH,S.DEGREE,S.CGPA FROM registration AS R, student AS S WHERE S.USN=R.USN AND R.COMPANY='".$name."' AND R.PLACED=TRUE";
else if($type=='np')
$query="SELECT S.USN,S.NAME,S.SEM,S.BRANCH,S.DEGREE,S.CGPA FROM registration AS R, student AS S WHERE S.USN=R.USN AND R.COMPANY='".$name."' AND R.PLACED=FALSE";
else if($type=='at')
$query="SELECT S.USN,S.NAME,S.SEM,S.BRANCH,S.DEGREE,S.CGPA FROM registration AS R, student AS S WHERE S.USN=R.USN AND R.COMPANY='".$name."' AND R.ATTENDANCE=TRUE";
else if($type=='na')
$query="SELECT S.USN,S.NAME,S.SEM,S.BRANCH,S.DEGREE,S.CGPA FROM registration AS R, student AS S WHERE S.USN=R.USN AND R.COMPANY='".$name."' AND R.ATTENDANCE=FALSE";
else if($type=='all')
$query="SELECT S.USN,S.NAME,S.SEM,S.BRANCH,S.DEGREE,S.CGPA FROM registration AS R, student AS S WHERE S.USN=R.USN AND R.COMPANY='".$name."'";

*/
$contents="trainer,teachername,date,area,score\n";
$areas=array('planning','set-induction','questioning','communication','conceptual','classroom','black-board','use-of-teaching-aids','students-learning');
$query ="SELECT * from f_train_teacher"; 

$user_query = mysqli_query($db,$query);

while($row = mysqli_fetch_array($user_query))
{
for($i=0;$i<9;$i++)
{
$contents.=$row['from'].",";
$contents.=$row['teachername'].",";
$contents.="0".",";
$contents.=$areas[$i].",";
$contents.=$row[$areas[$i]]."\n";


}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=Student".date('d-m-Y').".csv");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
?>