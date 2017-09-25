<?php    
    include('config.php');
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "select * from userdata where username='$user' and password='$pass'";
        $r = mysql_query($query);
        if(mysql_num_rows($r) == 1){
            $row = mysql_fetch_assoc($r);
            $_SESSION['level'] = $row['level'];
            $_SESSION['id'] = $row['username'];
            $_SESSION['name'] = $row['fname'].' '.$row['lname'];
            header('location:'.$row['level'].'');
        }else{
            header('location:index.php?login=0');
        }
    }

    if(isset($_SESSION['level'])){
        header('location:'.$_SESSION['level'].'');   
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>LCJCA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Custom styles for this template -->
  
  <link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="popup.css">
		<link rel="stylesheet" href="subpages.css">
		
<style>
.right{
    float:right;
}

.left{
    float:left;
}
</style>
  
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home</a>
		  <a class="navbar-brand" href="administrators.php">Administrators</a>
		  <a class="navbar-brand" href="enrollmentinquiry.php">Enrollment Inquiry</a>
		 <a class="navbar-brand" href="facility.php">Facilities</a>
	    <a class="navbar-brand" href="aboutus.php">About Us</a>
		  
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" action="index.php" method="POST">
            <div class="form-group">
                <?php if(isset($_GET['login'])): ?>
                    <label class="text-danger">Invalid Username/Password</label>&nbsp;
                <?php endif; ?>
            </div>
            <div class="form-group">
              <input type="text" placeholder="ID No." class="form-control" name="user" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-success" name="submit">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
       <img src="finalLogo.png" alt="" width="100%" height="100%">
      </div>
    </div>
	
	    <div class="container">
	<div id="main_div">	
		<div id="division">
				<section id="main_section">
				 <div id="box1">
				 	<div id="boxtop1"></div>
				 	<div id="vcontent">
					
					<p align="center"><font size="4"><b>Vision</b></font></p>
					<br>Little Child Jesus Christian Academy shall  challenge its students to know Jesus Christ as Lord to love others
					as themselves, and to grow in wisdom, knowledge and skills in order that they may serve God with Virtue,
					 Character and Obedience of Christ in all areas of life.</font>

					<p align="center"><font size="4"><br><br><b>Mission</b></font></p>
					<br>Little Child Jesus Christian Academy Cabiao, Nueva Ecija, Inc,
					is a private non-sectarian christian school that exists to assist the christian community
					in providing a christian environment in which faith can be integrated with learning to offer high quality
					education  for its students from pre-school to highschool.</font></p>

					<span class="left"><font size="4"><br><br><b>Core Values</b></font>
					<br><b>E</b>-xcellence
					<br><b>S</b>-tewardship
					<br><b>P</b>-assion
					<br><b>I</b>-nnovation
					<br><b>R</b>-eaching out
					<br><b>I</b>-ntegrity
					<br><b>T</b>-ransparency and Trust in God
					<br>
					<br>
					</span>
				
					
					<span class="right"><font size="4"><br><br><b>Contact Us</b></font>
					<br>Little Child Jesus Christian Academy<br>
					Cabiao, Nueva Ecija, Inc.<br>
					Duhat Street, Polilio, Cabiao, Nueva Ecija<br>
					Government Recognition No. S-009 s. 2015<br>
					Contact Nos.: 044-958-3342/0942-425-2098/0916-533-4050
					</span>
					</div	
					</div>		
				</section>
		</div>
	</div>
<br>
        <div class="col-md-4">
          <h3 class="center"><i class="fa fa-users fa-5x"></i></h3>
          <p><strong>Student Module</strong></p>
          <p>Student will login using their ID no and password to view their grades and lendger.</p>
          
        </div>
        <div class="col-md-4">
          <h3 class="center"><i class="fa fa-table fa-5x"></i></h3>
          <p><strong>Admin Module</strong></p>
          <p>Administrator Module has all the priviledge of the system. The admin can manage the students and faculty information.</p>
         
       </div>
        <div class="col-md-4">
          <h3 class="center"><i class="fa fa-tasks fa-5x"></i></h3>
          <p><strong>Faculty Module</strong></p>
          <p>Faculty Module will be able to view their assigned class and view the students on that class.</p>
          
        </div>
      </div>
	
  <hr>

      <footer>
        <p>&nbsp;&nbsp;&nbsp;Copyright 2017 Little Child Jesus Christian Academy. All Rights Reserved.</p>
      </footer>
    </div> <!-- /container -->
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>