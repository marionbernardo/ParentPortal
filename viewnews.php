
<html>
<head>


<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="popup.css">




<link rel="stylesheet" href="subpages.css">


<title>
View News | LCJCA
</title>


</head>

<body >


	<div id="framecontent">
		<div class="innertube">
						<ul id="navmenu">

							<li><a href="index.php">Home</a></li>
							<li><a href="administrators.php">Administrators</a></li>
							<li><a href="enrollmentinquiry.php" >Enrollment Inquiry</a></li>
							<li><a href="facility.php">Facilities</a></li>
							<li><a href="visionmission.php">Vision and Mission</a></li>
							<li><a href="about.php">About</a></li>
	
	
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

				<div id="selection">
						<h2>Login As</h2><br><br>
						<a href="#"><input type="button" value="New Enrollee"></a><br>
						<a href="#"><input type="button" value="Student"></a><br>
						<a href="adminlogin.php"><input type="button" value="Admin"></a>
		
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
					

		<?php		
		
								mysql_connect("localhost","root","");
									mysql_select_db("db_bcis");

										$id = $_GET['news'];
						
							$query = "select * from tb_news where nid='$id'";
							
							
								$run = mysql_query($query);
								
							while ($row=mysql_fetch_array($run)){
								$nid = $row[0];
								$news_title = $row[1];
								$news_date_time = $row[2];
								$news_reporter  = $row[3];
								$news_content  = $row[4];
								$news_photo  = $row[5];
		
								
						?>
						<h1>Latest News</h1>
		
						<div id="announce">

						 <b><?php echo $news_title; ?></b><Br>
						<span id="reporter"><?php echo $news_date_time; ?><Br>
						<span id="date">(YY/MM/DD)</span><Br>
						 <span id="reporter">by  <?php echo $news_reporter; ?></span><Br><br>
					
						<?php echo $news_content; ?>
						</div>	
						<div id="photo">
						<?php echo "<img src='".$row['news_photo']."' height= '400px' width='800px'";  ?>
						</div>
		
	<?php } ?>
						
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