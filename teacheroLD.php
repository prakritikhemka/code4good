<?php
session_start();
include("connect.php");
?>
<?php
if(isset($_POST['trainername'])){
$trainername=($_POST['trainername']);
$session=urldecode($_POST['session']);
$faci=urldecode($_POST['faci']);
$location=urldecode($_POST['location']);
$meaningful=urldecode($_POST['meaningful']);
$engaging=urldecode($_POST['engaging']);
$supportive=urldecode($_POST['supportive']);
$questioned=urldecode($_POST['questioned']);
$clear=urldecode($_POST['clear']);
$pace=urldecode($_POST['pace']);
$used=urldecode($_POST['used']);
$keylearning=urldecode($_POST['keylearning']);
$suggest=urldecode($_POST['suggest']);
$q="insert into f_teacher_train(trainername,question) values ('$trainername','$question')";
echo $q;
$result = mysql_query($q);
if($result)
echo 'done';

}
?>
<!DOCTYPE HMTL>
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

 <body>
<?php
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

     <form name="register" class="form-signin" method="post" id="user_login" action="teacher.php">
     
       <h2 class="form-signin-heading">Trainer Feedback</h2>
<input name="trainername" id="clear" type="text" class="input-block-level" placeholder="trainer name">
<input name="location" id="location" type="text" class="input-block-level" placeholder="Training Location">
       
	   
       <input name="engaging" id="engaging" type="text" class="input-block-level" placeholder="Activities,group work,discussions were useful and enaging">
       <input name="supportive" id="supportive" type="text" class="input-block-level" placeholder="Facilitator was suportive">
       <input name="questioned" id="questioned" type="text" class="input-block-level" placeholder="Facilitator questioned,probed,challenged the participants to drwa our responses">
<input name="clear" id="clear" type="text" class="input-block-level" placeholder="Placement was clear">
<input name="pace" id="pace" type="text" class="input-block-level" placeholder="Pace of the presentation was consistent">
<input name="used" id="used" type="text" class="input-block-level" placeholder="Learning of the session can be used/applied">
<input name="keylearning" id="keylearning" type="text" class="input-block-level" placeholder="Mention key learning which you will incorporate">
<input name="suggest" id="suggest" type="text" class="input-block-level" placeholder="Any suggestions">
       <button class="btn btn-large btn-primary" type="submit">Submit</button><br>
     </form>

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
