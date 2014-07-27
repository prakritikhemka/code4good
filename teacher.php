<?php
session_start();
include("connect.php");
?>
<?php
if(isset($_POST['trainername'])){
$trainername=($_POST['trainername']);
$meaningful=urldecode($_POST['meaning']);
$engaging=urldecode($_POST['engaging']);
$effectiveness=urldecode($_POST['effectiveness']);
$questioned=urldecode($_POST['questioned']);
$clear=urldecode($_POST['clear']);
$pace=urldecode($_POST['pace']);
$keylearning=urldecode($_POST['key_learning']);
$suggest=urldecode($_POST['suggest']);
$q="insert into f_teacher_train(trainername,meaning,engaging,effectiveness,question,clear,pace,key_learning,suggestion)
 values ('$trainername','$meaningful','$engaging','$effectiveness','$questioned','$clear','$pace','$keylearning','$suggest')";
$result = mysql_query($q);
$msg="Successful :) ";
if($result)
echo "<script type=text/javascript> alert('$msg'); </script>";

}

if (isset($_SESSION['id']))
{
$uid=$_SESSION['id'];
$q="select name from users where uid='$uid'";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$s=$row['name'];
echo "<center><p style='font-size:19px'>Welcome you are logged in as $s!(Teacher)</p></center>";
echo "<p style='font-size:20px; font-weight:strong;'align='right'><a href='logout.php'>Logout</a></p>";
}

?>
<!DOCTYPE HTML>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <title>Teacher</title>
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
     .form-signin input[type="text"] {
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

   <div class="container">
     <div class="span8">

     <form name="register" class="form-signin" method="post" id="user_login" action="teacher.php">
     
       <h2 class="form-signin-heading">Trainer Feedback</h2>
<input name="trainername" id="clear" type="text" class="input-block-level" placeholder="Trainer name">
<input name="location" id="location" type="text" class="input-block-level" placeholder="Training Location"></br>
       
	<label>Were the Activities,group work,discussions were useful and enaging? </label>   
       <input name="engaging" id="engaging" type="text" class="input-block-level" ></br>
       
	<label>Was the facilitator was suportive? </label>   

       <input name="supportive" id="supportive" type="text" class="input-block-level"></br>
       
	<label>Did the Facilitator questioned,probed,challenged the participants to draw  responses? </label>   
       <input name="questioned" id="questioned" type="text" class="input-block-level" ></br>
       
	<label>Was the Placement was clear? </label>   
<input name="clear" id="clear" type="text" class="input-block-level" ></br>
       
	<label>Was the Pace of the presentation was consistent </label>   
<input name="pace" id="pace" type="text" class="input-block-level" ></br>
       
	<label>Can the Learning of the session can be used/applied ?</label>
   
<input name="used" id="used" type="text" class="input-block-level" ></br>
       
	<label>Mention key learning which you will incorporate ?</label>
<input name="keylearning" id="keylearning" type="text" class="input-block-level" >
<input name="suggest" id="suggest" type="text" class="input-block-level" placeholder="Any suggestions">
       <button class="btn btn-large btn-primary" type="submit">Submit</button><br>
     </form>
</div>
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
