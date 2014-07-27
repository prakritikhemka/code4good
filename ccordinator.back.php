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
$q="insert into f_train_teacher(teachername,planning) values ('$teacher_name','$planning')";
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
    <title>Feedback</title>
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

    <div class="container">

      <form name="register" class="form-signin" method="post" id="user_login" action="ccordinator.php"">
      
        <h2 class="form-signin-heading">Feedback</h2>
        <input name="teacher_name" id="teacher_name" type="text" class="input-block-level" placeholder="Teacher Name">
        <input name="planning" id="planning" type="text" class="input-block-level" placeholder="Planning of Lesson and Curriculum">
<input name="questioning" id="questioning" type="text" class="input-block-level" placeholder="Questioning and Interaction">
<input name="communication" id="communication" type="text" class="input-block-level" placeholder="Communication Skills">
<input name="conceptual" id="conceptual" type="text" class="input-block-level" placeholder="Conceptual Clarity">
<input name="management" id="management" type="text" class="input-block-level" placeholder="Classroom Management">
<input name="induction" id="induction" type="text" class="input-block-level" placeholder="Set-induction & Closure">
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
