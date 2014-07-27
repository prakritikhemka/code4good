<?php
session_start();
include("connect.php");
?>
<?php
if(isset($_POST['user_name'])){
$nm=urldecode($_POST['user_name']);
$coll=urldecode($_POST['coll_name']);
$pass=urldecode($_POST['password']);
$init=1;
$q="insert into user(name,college,password) values ('$nm','$coll','$pass')";
$result = mysql_query($q);
$q2="insert into user_progress(name,no) values ('$nm','$init')";
$result2 = mysql_query($q2);
if ($result&&$result2) {
$_SESSION['user_name']=$nm;
$_SESSION['no']=1;
$_SESSION['skip']=2;
header('Location: home.php');    
}
else{
print 'Registration failed';
}
}
?>
<!DOCTYPE HMTL>
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

  <body>

    <div class="container">

      <form name="register" class="form-signin" method="post" id="user_login" action="register.php" onsubmit="return(validate());">
      
        <h2 class="form-signin-heading">User Registration</h2>
        <input name=teacher_name" id="teacher_name" type="text" class="input-block-level" placeholder="Teacher Name">
        <input name="school_name" id="school_name" type="text" class="input-block-level" placeholder="School Name">
        <input name="Planning" id="planning" type="planning" class="input-block-level" placeholder="Planning of Lesson and Curriculum">
        <input name="induction" id="induction" type="password" class="input-block-level" placeholder="Set-induction & Closure">
<input name="questioning" id="questioning" type="password" class="input-block-level" placeholder="Questioning and Interaction">
<input name="communication" id="communication" type="password" class="input-block-level" placeholder="Communication Skills">
<input name="conceptual" id="conceptual" type="password" class="input-block-level" placeholder="Conceptual Clarity">
<input name="management" id="management" type="password" class="input-block-level" placeholder="Classroom Management">
<input name="induction" id="induction" type="password" class="input-block-level" placeholder="Set-induction & Closure">
<input name="induction" id="induction" type="password" class="input-block-level" placeholder="Set-induction & Closure">
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
