<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bharti Foundation - Training assessment</title>



    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="css/landing-page.css" rel="stylesheet">
	

    <!-- Custom Fonts -->

    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<link href="css/custom.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->


</head>



<body>

	
	
<?php
include("connect.php");
session_start();
if(isset($_POST['user_name']))
{
$q = "select * from users where username = '".mysql_real_escape_string($_POST['user_name'])."'";
$res = mysql_query($q) or die("wrong query");
$row = mysql_fetch_assoc($res);
	if(!empty($row))
	{
		if($_POST['password']==$row['password'])
		{
			$_SESSION['username']=$_POST['user_name'];
			$_SESSION['id']= $row['uid'];
			$type= $row['type'];
			header('Location:'.$type.'.php');
			
		}
		else
		{
			echo '<centre><font color="red">wrong password</font></centre>';
		
		}
	}
	else
	{
		echo '<centre><font color="red">invalid username</font></centre>';
		
	}
	
	}

	else
	{
	?>



    <!-- Navigation -->

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

               

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">

                    <li>

                        <a href="http://www.bhartifoundation.org/home/About%20us/About%20Bharti%20Foundation/PG_AboutBhartiFoundation">About</a>

                    </li>

                    <li>

                        <a href="http://www.bhartifoundation.org/wps/wcm/connect/BhartiFoundation/bhartifoundation/globallinks/contactus/pg_contactus">Contact</a>

                    </li>

                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </div>

        <!-- /.container -->

    </nav>



    <!-- Header -->

    <div class="intro-header">



        <div class="container">



            <div class="row">

                <div class="col-lg-12">

                    <div class="intro-message">

                        <h1>Bharti Foundation</h1>

                        <h3>Training Assessment</h3>

                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><span class="network-name">Teacher</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"> <span class="network-name">Trainer</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><span class="network-name">Cluster Coordinator</span></a>
                            </li>
			     <li>
                                <a href="#" class="btn btn-default btn-lg"><span class="network-name">Admin</span></a>
                            </li>
                        </ul>

		   <form name="login" class="form-signin" method="post" id="user_login">
        <h2 class="form-signin-heading">User Login</h2>
<br/>
        Username: <input name="user_name" id="user_name" type="text" class="input-block-level" placeholder="User Name"><br/>
        Password: <input name="password" id="password" type="password" class="input-block-level" placeholder="Password"><br/>
		<input type="hidden" name="step" value="1" /> <br />
        <button class="btn btn-large btn-primary" type="submit">Log in</button>
		
      </form>
			</div>
			

                    </div>

                </div>

            </div>



        </div>

        <!-- /.container -->



    </div>

    <!-- /.intro-header -->



    <!-- Page Content -->



   

    <!-- Footer -->

   



    <!-- jQuery Version 1.11.0 -->

    <script src="js/jquery-1.11.0.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="js/bootstrap.min.js"></script>

<?php
}
?>

</body>



</html>
