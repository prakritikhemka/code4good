<!DOCTYPE html>
<?php
include("connect.php");
?>
<?php
if(isset($_POST['name'])){
$name=($_POST['name']);
$pass=urldecode($_POST['password']);
$type=urldecode($_POST['type']);
$q="insert into users(name,password,type) values ('$name','$pass','$type')";
echo $q;	
$res=mysql_query($q);
if($res)
echo 'entry added';
}

?>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
$(function ()  
{ $("#add").modal();  
});  
</script>
</head>

<body>

    <!-- Navigation -->
  
           
            <!-- Collect the nav links, forms, and other content for toggling -->
           <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
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
      <ul class="nav navbar-nav">
      
	<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add user</h4>
      </div>
      <div class="modal-body">
        <div class="container">
    <div class="row">
        <form action="admin.php" method="post">
            
                <input name="name" id="name" type="text" class="input-block-level" placeholder="Name">
                <input name="password" id="password" type="text" class="input-block-level" placeholder="password">
                    
                   
<select id="type" name="type">
  <option value="teacher" name="type">Teacher</option>
  <option value="trainer" name="type">Trainer</option>
  <option value="ccordinator"name="type">Cluster Coordinator</option>
 
</select>
<button class="btn btn-large btn-primary" type="submit">Submit</button><br>
 </form>

                </div>
                
       
        
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
        
          
      </ul>
      <form class="navbar-form navbar-left" method="post">
          <input type="text" id="Search" name="Search" placeholder="Search">
          <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
    </div>
        
         
     
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <div class="intro-header">

            <div class="container">
		 <div class="row">
                <div class="col-lg-12">
			 <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://cloud.saplumira.com/open?key=53D45EFD5EC5787CE10000000A4E4243&type=HANALYTIC" class="btn btn-default btn-lg"><span class="network-name">Teacher's review</span></a>
                            </li>
							<li>
                                <a href="https://cloud.saplumira.com/open?key=53D4DD8E5EC5787CE10000000A4E4243&type=HANALYTIC" class="btn btn-default btn-lg"><span class="network-name">State Wise</span></a>
                            </li>
                            <li>
                                <a href="https://cloud.saplumira.com/open?key=53D48F495EC5787CE10000000A4E4243&type=HANALYTIC" class="btn btn-default btn-lg"> <span class="network-name">Teacher's review</span></a>
                            </li>
							<li>
                                <a href="https://cloud.saplumira.com/open?key=53D4699B75F3787CE10000000A4E4243&type=HANALYTIC" class="btn btn-default btn-lg"> <span class="network-name">Class wise</span></a>
                            </li>
							<li>
                                <a href="https://cloud.saplumira.com/open?key=53D49AF675F3787CE10000000A4E4243&type=HANALYTIC" class="btn btn-default btn-lg"> <span class="network-name">Subject wise</span></a>
                            </li>
							
			</ul>
		</div>
		</div>


        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

<div class="content-section-a">

        <div class="container" id="Schools">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    
		<table id="schoolTable" border="1" style="background-color:white;table-layout: fixed;" 
			class="table table-bordered">
		<tr>

		<td><!-- Button trigger modal -->

<?php
if(isset($_POST['Search'])){
$q= "select * from users where name = '".mysql_real_escape_string($_POST['Search'])."'";
$res = mysql_query($q);
$row = mysql_fetch_assoc($res);
echo '		<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Search Results</div>
  <div class="panel-body">
  </div>
  <ul class="list-group">'.$row['name'].'<br/>'.$row['type'].'<br/>'.$row['doj'].'
  </ul>
</div>';
}
?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">School Assessment</div>
  <div class="panel-body">
  </div>
  <ul class="list-group">
  <?php
$q= "select * from school";
$res = mysql_query($q);
while($row = mysql_fetch_assoc($res)){
    echo '<li class="list-group-item">'.$row['name'].'&nbsp;'.$row['location'].'</li>';
   }
  
  ?>
  </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
		</tr>
		<tr>
			<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

		</tr>
		</table>
                    
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

<div class="content-section-b">

        <div class="container" id="Trainers">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    
		<table id="schoolTable" border="1" style="background-color:white;table-layout: fixed;" 
			class="table table-bordered">
		<tr>

		<td><!-- Button trigger modal -->

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Trainer Assessment</div>
  <div class="panel-body">
  </div>
  <ul class="list-group">
  <?php
$q= "select * from users where type='trainer'";
$res = mysql_query($q);
while($row = mysql_fetch_assoc($res)){
    echo '<li class="list-group-item">'.$row['name'].'&nbsp;'.$row['location'].'</li>';
   }
  
  ?>
  </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
		</tr>
		<tr>
			<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

		</tr>
		</table>
                    
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <!-- Page Content -->

   
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="list-inline">
                        <li>
                            <a href="#home">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>

</body>

</html>