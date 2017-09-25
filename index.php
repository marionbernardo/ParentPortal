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
            $_SESSION['name'] = $row['lname'].', '.$row['fname'].' '.$row['mname'];
			$_SESSION['studid'] = $row['studid'];
			$_SESSION['grade_level'] = $row['grade_level'];
			$_SESSION['sy']= $row['sy'];
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
		<link rel="stylesheet" href="home.css">
  </head>
<style>
#boxtop{
float: center;
}
#box {
	border: 1px solid gray;
	width: 300px;
	height: 250px;
	float: center;
	margin-left: 650px;
	box-shadow:5px 5px 15px rgba(0,0,0,0.2);
	margin-bottom: 15px;
	border-radius:3px;
	background-size: 422px 300px;
}
#main_div{
	margin:0px auto;
	margin-bottom:0px;
	padding:0px 0px;
	width:1100px;
	height: auto;
	border:1px solid #A9A9A9;
	border-radius: 0px;
	background-color:#fff;
	box-shadow:5px 5px 15px rgba(0,0,0,0.4);
	overflow:hidden;
}
.carousel{
	width:1100px;
	height:auto;
	overflow:hidden;
	position:relative;
	margin-left: 10px;
	margin-top: 10px;
	margin-bottom: 10px;
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
      <!-- Example row of columns -->
      <div class="row">
	  
	  <div id="main_div">
			
			<?php
			
			$query = "SELECT * from tb_websitefile where wpid=1" ;
		$run = mysql_query($query);
		while($row=mysql_fetch_array($run)){

			$img_id = $row[0];
			$image_one = $row[1];
			$image_two = $row[2];
			$image_three = $row[3];
			

			?>	
				<div class="carousel">
						  <img class='photo'  src=<?php echo $image_one; ?>  width="50%"  height="100%" alt="" />
						  <img class='photo'  src=<?php echo $image_two; ?> width="50%" height="100%" alt="" />
						  <img class='photo'  src=<?php echo $image_three; ?> width="50%" height="100%" alt="" />
						

					
<?php } ?>
	<br>	
		<div id="division">
				<section id="main_section"> 
	
						<div id="box">
							<div id="boxtop">
								 Announcements
							</div>

						<form method='post' action='viewannounce.php'>

							<div id="boxcontent">

								<?php

								
							
								$query = "select * from tb_announcements ORDER BY anid DESC";
		
									$run = mysql_query($query);
										
									while ($row=mysql_fetch_array($run)){
									$anid = $row[0];
									$ann_what = $row[1];
									$ann_when = $row[2];
									$ann_where  = $row[3];
									$ann_photo  = $row[4];
		
								?>
								
									<div id="panel">
									<?php echo $ann_what; ?>
										
									<a href='viewannounce.php?ann=<?php echo $anid; ?>' id="view">view</a>	<br>
									</div>
							<?php } ?>
							</div>
						</form>
							<div id="bottom">
								<a href="announcements.php" id="see">See all</a></span>
							</div>
						</div>

							<div id="box">
								<div id="boxtop">
									Upcoming Events
								</div>
								<div id="boxcontent">
									<?php

									
							
								$query = "select * from tb_events ORDER BY eid DESC";
									
									$run = mysql_query($query);
									
									while ($row=mysql_fetch_array($run)){
									$eid = $row[0];
									$event_what = $row[1];
									$event_when = $row[2];
									$event_where  = $row[3];
									$event_photo  = $row[4];
		
								?>
								
									<div id="panel">
									<?php echo $event_what; ?>
										
									<a href='viewevent.php?event=<?php echo $eid; ?>' id="view">view</a>	<br>
									</div>
							<?php } ?>
								</div>
							
							<div id="bottom">
							<a href="events.php" id="see">See all</a>
							</div>
							</div>	
							</div>
				</section>
				</div>
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
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
