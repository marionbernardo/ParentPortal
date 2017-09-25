<html>
<head>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="popup.css">
		<link rel="stylesheet" href="subpages.css">


<title>
Administrators | LCJCA
</title>


</head>

<body >


	<div id="framecontent">
		<div class="innertube">
						<ul id="navmenu">

						<li><a href="index.php">Home</a></li>
							<li><a href="administrators.php" class="selected">Administrators</a></li>
							<li><a href="enrollmentinquiry.php" >Enrollment Inquiry</a></li>
							<li><a href="facility.php">Facilities</a></li>
							<li><a href="visionmission.php">Vision and Mission</a></li>
						
	
	
						</ul>
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
		<img src="line2.png" alt="" widtd="100%" height="100%">
		<div>
			<br><br><br><br><br>
	<div id="main_div">
			
	
		
		<div id="division">
				<section id="main_section">
				 <div id="box1">
				 	<div id="boxtop1"></div>
					
							<?php		
		
								mysql_connect("localhost","root","");
									mysql_select_db("thesis");

										$id = $_GET['administrator'];
						
							$query = "select * from tb_administrators where aid='$id'";
							
							$run = mysql_query($query);
															
							while ($row=mysql_fetch_array($run)){
											$aid = $row[0];
											$firstname = $row[1];
											$middlename = $row[2];
											$lastname  = $row[3];
											$position  = $row[4];
										
		
								?>
									<div id="infopic">
									<center><?php echo "<img src='".$row['picture']."' height= '300px' width='250px'";  ?></center>
										</div>
									
									<div id="infocontent">
									<b><?php echo $firstname; ?> <?php echo $middlename; ?> <?php echo $lastname; ?></b>
									<div id="pos"><?php echo $position; ?></div>
									<br>
							
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