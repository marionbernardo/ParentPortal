<html>
<head>
	<link rel="stylesheet" type="text/css" href="popup.css">
	<link rel="icon" type="image" href="logo.png">
	<link rel="stylesheet" href="subpages.css">
<title>
All Upcoming Events | LCJCA
</title>
</head>
<body >
	<div id="framecontent">
		<div class="innertube">
						<ul id="navmenu">
							<li><a href="index.php" class="selected">Home</a></li>
							<li><a href="administrators.php">Administrators</a></li>
							<li><a href="enrollmentinquiry.php" >Enrollment Inquiry</a></li>
							<li><a href="facility.php">Facilities</a></li>
							<li><a href="aboutus.php">About Us</a></li>
							<li style="float:right"><a href="studentportal/studentlogin.php">Login</a></li>
						</ul>			
		</div>
	</div>
			<?php

			session_start();
			if (isset($_SESSION['un'])) {

				include("connection.php");
					$un1 = $_SESSION['un'];
					$q = "select * from tb_users where username='$un1'";
		
					$run = mysql_query($q);
		
					while ($row=mysql_fetch_assoc($run)){

					echo "<label id='login'><a href='enrollee/new_enrollee.php'>";
					echo $row['name'];
					echo "</a></label>";

				}
			}
			else 
				if (isset($_SESSION['student_username'])) {
					include("connection.php");
					$un = $_SESSION['student_username'];
					$q = "select * from tb_students where student_username='$un'";
		
					$run = mysql_query($q);
		
					while ($row=mysql_fetch_assoc($run)){

		
					echo "<label id='login'><a href='studentportal/studentportal.php'>";
					echo $row['firstname'];
					echo '&nbsp;';
					echo $row['middlename'];
					echo '&nbsp;';
					echo $row['lastname'];
					echo "</a></label>";
				}
				}

				else 
				if (isset($_SESSION['adminun'])) {
					
					echo "<label id='login'><a href='adminpanel.php'>";
					echo $_SESSION['adminun'];
					echo "</a></label>";
				}
			

			else {
			
			echo" <label id='login' for='our-popup1'>";
		
			echo "Login";
			}

			?></label>

			<span>

				<input type="checkbox" class= "smoosh" id="our-popup1">

				<label for="our-popup1" class="overlay"></label>
				
				<div class="overlay-dialogue">
					<div id="boxtop">
						Login
						<label id="labelclose" for="our-popup1">&nbsp;&nbsp;x&nbsp;&nbsp;</label>
			</div>
		</div>
	</span>
		</div>
	</div>
<br>

<div id="maincontent">
			<div id="line">		
		<img src="finalLogo.png" alt="" width="100%" height="100%">
			</div>
			<br><br><br><br><br>
	<div id="main_div">	
		<div id="division">
				<section id="main_section">
				 <div id="box1">
				 	<div id="boxtop1"></div>
					
					<h1>All Upcoming Events</h1>
					<div id="contents">
		<?php		
		
								mysql_connect("localhost","root","");
									mysql_select_db("thesis");

										
						$query = "select * from tb_events ";
							
							
							$run = mysql_query($query);
									
								while ($row=mysql_fetch_array($run)){
									$eid = $row[0];
									$event_what = $row[1];
									$event_when = $row[2];
									$event_where  = $row[3];
									$event_photo  = $row[4];
		
								?>
								
		
					
						<div id="annform">
						<div id="announce">

						<b>What :</b> <?php echo $event_what; ?><br><br><br>
						<b>When : </b><?php echo $event_when; ?><br>
						<span id="format">(YY/MM/DD)</span><br><br>
						<b>Where : </b><?php echo $event_where; ?>
						</div>	
						<div id="photo">
						<?php echo "<img src='".$row['event_photo']."' height= '200px' width='300px'";  ?>
						</div>
						</div>
					</div>

<!--<hr noshade size="2" width="90%"></hr> -->
		
	<?php } ?>
			</div>		
			</div>		
			</section>
		</div>
	</div>
<div id="footer">
			<br><br><br>
			Copyright 2017 Little Child Jesus Christian Academy. All Rights Reserved.	
		</div>
</div>
</body>
</html>