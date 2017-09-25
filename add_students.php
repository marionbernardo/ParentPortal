<?php
session_start();
if(!$_SESSION['adminun']){
header("location: adminlogin.php");
}
?>
<html>
	<head>
		<!--title php dynamic-->
			<title>
				Add Students
			</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
<style>
.sidebar {
			height: 1600px;
}
#back {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}
div#header {
	width: 100%;
	height: 100px;
	background-color: #2c3e50;
	margin: 0 auto;
}
#pics {
	float:left;
	padding: 10px;
	display: inline-block;
	border: 1px solid gray;
	width: 100%;
	height: auto;
	margin-left: 0px;
	border-radius: 1px;
	background-color: white;
}
</style>
	<script>
		function submitBday () {
		    var Q4A = " ";
		    var Bdate = document.getElementById('bday').value;
		    var Bday = +new Date(Bdate);
		    Q4A += ~~ ((Date.now() - Bday) / (31557600000));
		   document.getElementById('age').value = Q4A;
		}
	</script>
	</head>


	<body>
		<div id="header">
			<div class="logo"><a href="adminchangepass.php">Welcome : <span id="admin"><u><?php echo $_SESSION['adminun']; ?></u></span></a>
				<span id="logout"><font color="white"><a href="logout.php"><input type="button" id="blo" value="Logout"></a></font></span>
			</div>
		</div>
	
		<div id="container">
			<div class="sidebar">
				<ul id="nav">
					<li><a href="adminpanel.php"><i class="fa fa-dashboard" style="font-size:20px; color:white"></i>  Dashboard</a></li>
					<li><a href="manage_admins.php"><i class="fa fa-user" style="font-size:20px; color:white"></i>  Admin Management</a></li>
					<li><a href="mstudents.php" class="selected"><i class="fa fa-group" style="font-size:20px; color:white"></i>  Student Management</a></li>
					<li><a href="manage_student_balance.php"><i class="fa fa-google-wallet" style="font-size:20px; color:white"></i>   Lendger Management</a></li>
					<li><a href="grade_menu.php"><i class="fa fa-bar-chart" style="font-size:20px; color:white"></i>  Grade Management</a></li>
					<li><a href="cms.php"><i class="fa fa-qrcode" style="font-size:20px; color:white"></i>  CMS</a></li>
					<li><a href=""><i class="fa fa-cogs" style="font-size:20px; color:white"></i>  Setting</a></li>	
				</ul>

			</div>
			<div class="content">
				<h1>Add Student</h1>
	
				<div id="box">
					<div class="box-top">
					<ol class="breadcrumb">
				<li><a href ="adminpanel.php">Dashboard</a></li>   
				<li><a href ="manage_admins.php">Admin Management</a></li>
				<li class="active">Student Management</a></li>
				</ol>
					</div>
					
				<form action="add_students.php" method="POST">
				<div id="pics">
					<div class="box-panel">
						<div id="adform">
						<p align="left"><a href="mstudents.php"><input type="button" value="Back" id="back"></a></p>
						<p id="fhead"><img src="logo.png" alt="" width="10%" height="10%"><br>
						<b>Little Child Jesus Christian Academy</b><br>
						</p>
							<br>
						<br>
						
					<b><p align='left'>ADD NEW STUDENT</p></b>
					<br>
						<p align="left">
							<b>Information of a Student</b><Br>
							<table border=0>
								<tr>
									<td><input type="text" name="fname" required></td>
									<td><input type="text" name="mname"  required></td>
									<td><input type="text" name="lname" required></td>
									<td><input type="text" name="extname"></td>
								</tr>
								
								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									<td>Extension Name(optional)</td>
								</tr>
								
								<tr>
									<td><input type="date" name="date" id="bday" onchange="submitBday()"></td>

									<td><input type="text"  value="" name="age" id="age" readonly></p></td>

									<td><select name="grade" required>
										<option value=""></option>
										<option value="Nursery">Nursery</option>
										<option value="JuniorKindergarten">Junior Kindergarten</option>
										<option value="SeniorKindergarten">Senior Kindergarten</option>
										  <option value="1">Grade 1</option>
										  <option value="2">Grade 2</option>
										  <option value="3">Grade 3</option>
										  <option value="4">Grade 4</option>
										  <option value="5">Grade 5</option>
										  <option value="6">Grade 6</option>
										  <option value="7">Grade 7</option>
										  <option value="8">Grade 8</option>
										  <option value="9">Grade 9</option>
										  <option value="10">Grade 10</option>
										</select>
									</td>		
								<td><select name="section" required>
										<option value=""></option>
										<option value="Blue">Blue</option>
										<option value="Green">Green</option>
										<option value="White">White</option>
										  <option value="Yellow">Yellow</option>
										</select>
									</td>			
								<td><input type="text" name="schoolyear" required></td>
								<td></td>
								</tr>
								<tr>
									<td>Birthday</td>
									<td>Age</td>
									<td>Grade/Level</td>
									<td>Section</td>
									<td>School Year</td>
								</tr>
							
							<tr>
								<td><b><br>Address</b></td>
							</tr>

							<tr>
								<td><input type="text" name="street" required></td>
								<td><input type="text" name="barangay" required></td>
								<td><input type="text" name="town" required></td>
								<td></td>
								<td><input type="number" name="cpnumber" required></td>
							</tr>

								<tr>
									<td>Street</td>
									<td>Barangay</td>
									<td>Town</td>
									<td></td>
									<td>Contact #</td>
								</tr>

								<tr>
									
									<td><input type="radio" name="sex" value="male" checked> Male
										<input type="radio" name="sex" value="female"> Female</td>
									<td><input type="text" name="nation" required></td>
									<td><input type="text" name="religion" required></td>
								</tr>


								<tr>
									
									<td>Gender</td>
									<td>Nationality</td>
									<td>Religion</td>
								</tr>


							
							</table>
							<br><br>
							<table border=0>
								<tr>
									<td><b>Parent information</b></td>
								</tr>
								<tr>
									<td><br><b>Father's info<b></td>
									
								</tr>

								<tr>
									<td><input type="text" name="fathf" required></td>
										<td><input type="text" name="fathm" required></td>
											<td><input type="text" name="fathl" required></td>
											<td><input type="text" name="fextname"></td>
								</tr>

								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									<td>Extension Name(optional)</td>
								</tr>

								<tr>
									<td><input type="text" name="fstreet" required></td>
								<td><input type="text" name="fbarangay" required></td>
								<td><input type="text" name="ftown" required></td>
								<td></td>
								<td><input type="number" name="fcpnumber" required></td>
								</tr>

								<tr>
									<td>Street</td>
									<td>Barangay</td>
									<td>Town</td>
									<td></td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="frelig" required></td>
									<td><input type="text" name="fnation" required></td>
									<td><input type="text" name="foccup" required></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>Nationality</td>
									<td>Occupation</td>
								</tr>

								<tr>
									<td><br><b>Mother's Info</b></td>
								</tr>

								<tr>
									<td><input type="text" name="mothf" required></td>
										<td><input type="text" name="mothm" required></td>
											<td><input type="text" name="mothl" required></td>
											
								</tr>

								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
								
								</tr>

								<tr>
									<td><input type="text" name="mstreet" required></td>
								<td><input type="text" name="mbarangay" required></td>
								<td><input type="text" name="mtown" required></td>
								<td></td>
								<td><input type="number" name="mcpnumber" required></td>
								</tr>

								<tr>
									<td>Street</td>
									<td>Barangay</td>
									<td>Town</td>
									<td></td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="mrelig" required></td>
									<td><input type="text" name="mnation" required></td>
									<td><input type="text" name="moccup" required></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>Nationality</td>
									<td>Occupation</td>
								</tr>

							</table>


							<table>
								<tr>
									<td><b>Others<br><br></b></td>
								</tr>

								<tr>
									<td>SCHOOL PREVIOUSLY ATTENDED: </td>
									<td><input type="text" name="school_prev" id="other"></td>
								</tr>

								<tr>
									<td>FROM WHAT SOURCE DID YOU LEARN THIS SCHOOL: </td>
									<td><input type="text" name="what_source" id="other"></td>
								</tr>


								<tr>
									<td>Allergies / Illnesses: </td>
									<td><input type="text" name="allergies" id="other"></td>
								</tr>

								
							</table>
							
							<table>
								<tr>

									<td><br><br>
										
										<input type="text" name="datetoday"  value=<?php $date = date('m/d/Y');
										echo $date;?> readonly></td>
								</tr>
									<tr>
										<td>Date</td>
									</tr>

							</table>
							
							<p align="right"><input type="submit" name="submit" id="submit" value="Submit"></p>
						</p>

							</div>
	</form>			
	</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php 

mysql_connect("localhost","root","");
mysql_select_db("thesis");

if(isset($_POST['submit'])) {

	$f = $_POST['fname'];
	$m = $_POST['mname'];
	$l = $_POST['lname'];
	$ext = $_POST['extname'];
	$age = $_POST['age'];
	$grade = $_POST['grade'];
	$section = $_POST['section'];
	$schoolyear = $_POST['schoolyear'];
	$st = $_POST['street'];
	$brgy = $_POST['barangay'];
	$town = $_POST['town'];
	$cno = $_POST['cpnumber'];
	$bdate = $_POST['date'];
	$sex = $_POST['sex'];
	$nation = $_POST['nation'];
	$rel = $_POST['religion'];


	$fathf = $_POST['fathf'];
	$fathm = $_POST['fathm'];
	$fathl = $_POST['fathl'];
	$fext = $_POST['fextname'];
	$fstreet = $_POST['fstreet'];
	$fbrgy = $_POST['fbarangay'];
	$ftown = $_POST['ftown'];
	$fcp = $_POST['fcpnumber'];
	$frel = $_POST['frelig'];
	$fnation = $_POST['fnation'];
	$foccup = $_POST['foccup'];



	$mothf = $_POST['mothf'];
	$mothm = $_POST['mothm'];
	$mothl = $_POST['mothl'];
	
	$mstreet = $_POST['mstreet'];
	$mbrgy = $_POST['mbarangay'];
	$mtown = $_POST['mtown'];
	$mcp = $_POST['mcpnumber'];
	$mrel = $_POST['mrelig'];
	$mnation = $_POST['mnation'];
	$moccup = $_POST['moccup'];

	$school_prev = $_POST['school_prev'];
	$what_source = $_POST['what_source']; 
	$allergies = $_POST['allergies'];

	$datetoday = $_POST['datetoday'];
	$dates = date("M/d/Y");
	$time = time();
	
 $password = substr(md5(uniqid(rand(), true)), 8, 8);
 $student_no = rand(0,1000000000);



		$query = "insert into tb_students(student_no,firstname,middlename,lastname,age,grade_level,section,schoolyear,address,contact_no,birthday,sex,nationality,religion
			,father_name,father_address,father_contact,father_religion,
			father_nationality,father_occup,mother_name,mother_address,mother_contact
			,mother_religion,mother_nationality,mother_occup,school_prev,what_source,allergies,date_today,student_username,student_password,student_pic) values 
		('$student_no','$f','$m','$l $ext','$age','$grade','$schoolyear','$st $brgy $town','$cno','$bdate','$sex','$nation','$rel','$fathf $fathm $fathl $fext'
			,'$fstreet $fbrgy $ftown','$fcp','$frel','$fnation'
			,'$foccup','$mothf $mothm $mothl','$mstreet $mbrgy $mtown','$mcp','$mrel','$mnation'
			,'$moccup','$school_prev','$what_source','$allergies','$datetoday','$student_no','LCJCA$password','studentpor_image/neutral.jpg')";


			
	if(mysql_query($query))
		{
		
		echo "<script>alert('Add Successfully');</script>";

	}
}

?>