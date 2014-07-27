<?php
session_start();
include("connect.php");
?>



<?php
if(isset($_POST['teacher_name'])){
$teacher_name=urldecode($_POST['teacher_name']);
$planning=urldecode($_POST['planning']);
$questioning=urldecode($_POST['questioning']);
$communication=urldecode($_POST['communication']);
$conceptual=urldecode($_POST['conceptual']);
$management=urldecode($_POST['management']);
$induction=urldecode($_POST['induction']);
$q="insert into f_train_teacher(teachername,planning,questioning,communication,conceptual,management,induction) values ('$teacher_name','$planning','$questioning','$communication','$conceptual','$management','$induction')";
$result = mysql_query($q);
}

?>


<!DOCTYPE HMTL>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
<!-- Le styles -->
    <link href="static/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 19px 19px;
        margin: 0 auto 10px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
	
 <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Performance');
        data.addColumn('number', 'Grade');
	var t=document.getElementById("total").value;
	
        data.addRows([
          ['Meaningfullness', eval(document.getElementById("meaning_1").value)],
          ['Pace', eval(document.getElementById("pace_1").value)],
          ['Engagement', eval(document.getElementById("engaging_1").value)],
          ['Clarity', eval(document.getElementById("clear_1").value)],
          ['Question', eval(document.getElementById("question_1").value)]
        ]);


        // Set chart options
        var options = {'title':'Feedback By Teachers',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }


    </script>

  </head>

  <body background="img/bg.jpg">
<?php
  if (isset($_GET['atten'])) {
   $r=100;
$uid=$_SESSION['id'];
$q="select name from users where uid='$uid'";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$s=$row['name'];
$n=$_GET['nam'];

if ($_GET['r1']=="yes") {$r=1;}
else {$r=0;}
$p=$_GET['atten'];
$q="insert into attendance(sessionname,name_trainer,attended,name_teacher) values ('$n','$s','$r','$p')";
$result = mysql_query($q);

}
$uid=$_SESSION['id'];
$q="select * from f_teacher_train where `to`=$uid";
$result=mysql_query($q);
$iter=1;
$total=mysql_num_rows($result);
echo "<input type='hidden' value='".$total."' id='total'/>";
while($row = mysql_fetch_array($result)) 
{
echo "<input type='hidden' value='".$row['meaning']."' id='meaning_1'/>";

echo "<input type='hidden' value='".$row['pace']."' id='pace_1'/>";

echo "<input type='hidden' value='".$row['engaging']."' id='engaging_1'/>";

echo "<input type='hidden' value='".$row['clear']."' id='clear_1'/>";

echo "<input type='hidden' value='".$row['question']."' id='question_1'/>";

}

if (isset($_SESSION['id']))
{
$uid=$_SESSION['id'];
$q="select name from users where uid='$uid'";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$s=$row['name'];
echo "Welcome you are logged in as $s!";
echo "<p align='right'><a href='logout.php'>Logout</a></p>";

}
?>
 


    <div class="container">

      <form name="register" class="form-signin" method="post" id="user_login" action="register.php" style="float:left;"> 
      
        <h2 class="form-signin-heading">Feedback</h2>
        <input name="teacher_name" id="teacher_name" type="text" class="input-block-level" placeholder="Teacher Name">
        <input name="school_name" id="school_name" type="text" class="input-block-level" placeholder="School Name">
        <input name="planning" id="planning" type="password" class="input-block-level" placeholder="Planning of Curriculum">
<input name="questioning" id="questioning" type="password" class="input-block-level" placeholder="Questioning and Interaction">
<input name="communication" id="communication" type="password" class="input-block-level" placeholder="Communication Skills">
<input name="conceptual" id="conceptual" type="password" class="input-block-level" placeholder="Conceptual Clarity">
<input name="management" id="management" type="password" class="input-block-level" placeholder="Classroom Management">
<input name="induction" id="induction" type="password" class="input-block-level" placeholder="Set-induction & Closure">
        <button class="btn btn-large btn-primary" type="submit">Submit</button><br>
      </form>

      <form name="attendance" id="attendance" class="form-signin" method="get" id="user_login" action="trainer.php" style="float:right">
      
        <h2 class="form-signin-heading">Attendance</h2>
	
Teacher Name
<select name="atten" id="atten" style="min-width:200px;">

  	<?php 

$q="SELECT name FROM users, teacher WHERE users.uid = teacher.id;";
$result = mysql_query($q);

while($row = mysql_fetch_array($result)) {
?>

<option value="<?php echo $row['name']; ?>"><?php echo $row['name'];?> </option>
<?php  

 }

?>
<br/>
</select>
<br/>
<br/>
Attended?
<br/>
Session Name: <input type="text" name="nam" id="nam"/> 
<br/>
<input type="radio" name="r1" id="r1" value="yes">Yes</input>
<input type="radio" name="r1" id="r1" value="no">No</input>      
<br/> <br/>
<input type="submit" value="Submit"></input>
</form>

<div id="chart_div" style="position: absolute; left: 420px; top: 100px; width: 100%; height: 100%;" ></div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="static/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/formvalidate.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
