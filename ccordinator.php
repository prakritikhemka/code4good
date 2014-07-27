<?php
session_start();
include("connect.php");
?>
<?php
if(isset($_POST['teacher_name'])){
$tm=urldecode($_POST['teacher_name']);
$tlm=urldecode($_POST['tlm']);
$seating=urldecode($_POST['seating']);
$interactive=urldecode($_POST['interactive']);
$comfort=urldecode($_POST['comfort']);
$lessonplan=urldecode($_POST['lessonplan']);
$lati=urldecode($_POST['lat']);
$long=urldecode($_POST['long']);
$q="insert into f_cc_teacher(teachername,tlm,seatingplan,interactive,comfortable,lessonplan,latitude,longitude) values ('$tm','$tlm','$seating','$interactive','$comfort','$lessonplan','$lati','$long')";
echo $q;
$result = mysql_query($q);
if($result)
echo 'done';
}

if (isset($_SESSION['id']))
{
$uid=$_SESSION['id'];
$q="select name from users where uid='$uid'";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$s=$row['name'];
echo "<center><p style='font-size:19px'>Welcome you are logged in as $s!(Coordinator)</p></center>";
echo "<p style='font-size:20px; font-weight:strong;'align='right'><a href='logout.php'>Logout</a></p>";}
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register &middot; OTH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Le styles -->
    <link href="static/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
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
	
  </head>

  <body background="img/bg.jpg">
<script type='text/javascript'src='http://maps.google.com/maps/api/js?sensor=true'></script>
<script type='text/javascript'>

navigator.geolocation.getCurrentPosition(success);

 
function success(position) {
     var lati = position.coords.latitude;
     var long = position.coords.longitude;
	document.getElementById("long").value=long;
	document.getElementById("lat").value=lati;
 
  }
</script>
    <div class="container" style="float:left; margin-left:150px;">

      <form name="cc_feedback" class="form-signin" method="post" id="user_login" action="ccordinator.php" onsubmit="return(validate());">
      
        <h2 class="form-signin-heading">CC Feedback</h2>
        <input name="teacher_name" id="teacher_name" type="text" class="input-block-level" placeholder="Teacher Name">
        
<input name="tlm" id="tlm" type="text" class="input-block-level" placeholder="TLM">
<input name="seating" id="seating" type="text" class="input-block-level" placeholder="Seating Plan">
<input name="interactive" id="interactive" type="text" class="input-block-level" placeholder="Was the classroom interactive?">
<input name="lessonplan" id="lessonplan" type="text" class="input-block-level" placeholder="is the lesson plan followed?">
<input name="comfort" id="comfort" type="text" class="input-block-level" placeholder="Were the students comfortable and confident ?">
 <input name="lat" id="long" type="hidden" class="input-block-level" >
 <input name="long" id="lat" type="hidden" class="input-block-level">

        <button class="btn btn-large btn-primary" type="submit">Submit</button><br>
      </form>

    </div> <!-- /container -->

<div class="container, form-signin" style="float:right; margin-right:300px;">
<h2> View your Area </h2>
<br/>
Select a School
<br/>
<select name="sch" id="sch" onchange="if (this.selectedIndex) doSomething();">
<?php

$q="select name, id from school";
$res=mysql_query($q);

while($row=mysql_fetch_array($res))
{
?>
<option value= "<?php echo $row['id'] ?>" > <?php echo $row['name']?></option>
<?php
}



?>


</select>
<br/>
<br/>
Teacher Name
<br/>
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


</div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="static/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/formvalidate.js"></script>
	<script type="text/javascript" src="static/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
