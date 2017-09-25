<?php
error_reporting(0);

?>
<html>
	<head>
		<title>
		Admin Panel | LCJCA
		</title>
			<link rel="icon" type="image" href="logo.png">
<style>
select {
height: 2em;
	font-size: 11pt;
	border-radius: 3px;
	border: 1px solid #95a5a6;
	margin-left: 8px;
	margin-top: 10px;
}

body {
	font-family: segoe UI;
}

input[type=text]{
	height: 2em;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #ecf0f1;
	border-bottom: 1px solid #95a5a6;
	margin-left: 10px;
	margin-top: 10px;
	font-size: 11pt;
}

#tbcenter {
	padding: 10px;
	margin-left: 300px;
	background-color:#ecf0f1;
	width:800px;
	border: 1px solid black;
}

table td {
	text-align: center;
	font-size: 9pt;
}

input[type=submit] {
	margin-left: 0px;
	margin-top: 8px;
	height: 3em;
	width: 7em;
	background-color: #2980b9;
	border-radius: 5px;
	color: #fff;
	border: 1px solid gray;
	font-weight: bold;
}

input[type=submit]:hover {
	opacity: 0.9;
	cursor: pointer;
}

#un {

	background: #ecf0f1;
	border-bottom: 1px solid #ecf0f1;
	color:#ecf0f1;
}

#s-pic img{
	display: inline-block;
	float: left;
	border: 1px solid black;
	border-radius: 4px;
	margin-left: 400px;
	
}
#s-top{
	display: inline-block;
	float: left;
	margin-top: 10px;
	
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
</style>
</head>
<body>

<form action="update_full_detail.php" method="POST">
								
							<?php 

							$student_no = $_GET['student_no'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query = "select * from tb_students where student_no = '$student_no'";
							$run = mysql_query($query);
							
						while ($row=mysql_fetch_assoc($run)){
							

						?>
							<div id="tbcenter">		
						<p align="left"><a href="mstudents.php"><input type="button" value="Back" id="back"></a></p>
								<div id="s-top">
								<br><br><br><br><b>Update Information of a Student</b><br>
								</div>
								<div id="s-pic">
								<?php echo "&nbsp;&nbsp;<img src='studentportal/".$row['student_pic']."' height = '130px' width= '130px'";?><br><br>
								</div>
							<table border=0 align="center">
									<tr>
										<td><input type="text"  id="un" name="un" value="<?php echo $row['student_username']; ?>" readonly></td>
									</tr>
									
									<tr>
										<td><input type="text" name="stdno" value="<?php echo $row['student_no'];?>" readonly></td>
									</tr>
									<tr>
										<td>Student number</td>
									</tr>
								<tr>
									<td><input type="text" name="fname" value="<?php echo $fname = $row['firstname'];?>"></td>
									<td><input type="text" name="mname"  value="<?php echo $mname = $row['middlename'];?>"></td>
									<td><input type="text" name="lname" value="<?php echo $lname = $row['lastname'];?>"></td>
									
								</tr>
								
								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									
								</tr>
								
								<tr>
									<td><input type="text" name="age" value="<?php echo $age = $row['age'];?>" ></td>
									
									<td><select name="grade">
										<option value=""><?php echo $grade_level = $row['grade_level'];?></option>
										 <option value="Nursery">Nursery</option>
										  <option value="JuniorKindergarten">JuniorKindergarten</option>
										   <option value="SeniorKindergarten">SeniorKindergarten</option>
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
									<td><select name ="section">
									<option value = "" ><?php echo $section = $row ['section'];?></option>
									<option value ="Blue">Blue</option>
									<option value ="Green">Green</option>
									<option value ="White">White</option>
									<option value ="Yellow">Yellow</option>
									</select>
									</td>
									
								<td><input type="text" name="schoolyear"  value="<?php echo $schoolyear = $row['schoolyear'];?>" ></td>
								<td></td>
								</tr>

								<tr>
									<td>Age</td>
									<td>Grade/Level</td>
									<td>Section</td>
									<td>School Year</td>
								</tr>
							
							<tr>
								<td></td>
							</tr>

							<tr>
								<td><input type="text" name="address" value="<?php echo $street = $row['address'];?>" ></td>
								
								<td><input type="text" name="cpnumber" value="<?php echo $row['contact_no'];?>" ></td>
							</tr>

								<tr>
									
									
									<td>Address</td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="date" name="date" value="<?php echo $row['birthday'];?>" ></td>
									<td><input type="text" name="sex" value="<?php echo $row['sex'];?>" ></td>
									<td><input type="text" name="nation" value="<?php echo $row['nationality'];?>" ></td>
									<td><input type="text" name="religion" value="<?php echo $row['religion'];?>" ></td>
								</tr>


								<tr>
									<td>Birthday</td>
									<td>Gender</td>
									<td>Nationality</td>
									<td>Religion</td>
								</tr>


							
							</table>
							<br><br>
							<table border=0>
								<tr>
									<th><b>Parent information</b></th>
								</tr>
								<tr>
									<th><br>Father's info</th>
									
								</tr>

								<tr>
									<td><input type="text" name="fathf" value="<?php echo $row['father_name'];?>" ></td>
										
								</tr>

								<tr>
									<td>Father's Name</td>
									
								</tr>

								<tr>
									<td><input type="text" name="fstreet" value="<?php echo $row['father_address'];?>" ></td>
								
							
								<td><input type="text" name="fcpnumber" value="<?php echo $row['father_contact'];?>" ></td>
								</tr>

								<tr>
									<td>Address</td>
									
		
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="frelig" value="<?php echo $row['father_religion'];?>" ></td>
									<td><input type="text" name="fnation" value="<?php echo $row['father_nationality'];?>" ></td>
									<td><input type="text" name="foccup" value="<?php echo $row['father_occup'];?>" ></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>Nationality</td>
									<td>Occupation</td>
								</tr>

								<tr>
									<th><br><b>Mother's Info</b></th>
								</tr>

								<tr>
									<td><input type="text" name="mothf" value="<?php echo $row['mother_name'];?>" ></td>
									
											
								</tr>

								<tr>
									<td>Mother's Name</td>
									
								
								</tr>

								<tr>
									<td><input type="text" name="mstreet" value="<?php echo $row['mother_address'];?>" ></td>
								
								<td><input type="text" name="mcpnumber" value="<?php echo $row['mother_contact'];?>" ></td>
								</tr>

								<tr>
									<td>Address</td>
								
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="mrelig" value="<?php echo $row['mother_religion'];?>" ></td>
									<td><input type="text" name="mnation" value="<?php echo $row['mother_nationality'];?>" ></td>
									<td><input type="text" name="moccup" value="<?php echo $row['mother_occup'];?>" ></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>Nationality</td>
									<td>Occupation</td>
								</tr>

							</table>


							<table>
								<tr>
									<th><b>Others<br><br></b></th>
								</tr>

								<tr>
									<td>SCHOOL PREVIOUSLY ATTENDED: </td>
									<td><input type="text" name="school_prev" id="other" value="<?php echo $row['school_prev'];?>" ></td>
								</tr>

								<tr>
									<td>FROM WHAT SOURCE DID YOU LEARN THIS SCHOOL: </td>
									<td><input type="text" name="what_source" id="other" value="<?php echo $row['what_source'];?>" ></td>
								</tr>


								<tr>
									<td>Allergies / Illnesses: </td>
									<td><input type="text" name="allergies" id="other" value="<?php echo $row['allergies'];?>" ></td>
								</tr>

								
							</table>
							
							<table>
								<tr>

									<td><br><br>
										
										<input type="text" name="datetoday"  value="<?php echo $row['date_today'];?>" readonly>
										</td>
								</tr>
									<tr>
										<td>Date modified</td>
									</tr>

							</table>
							<p align="center"><input type="submit" name="submit" value="Update"></p>
							</div>


<?php }?>


		</div>

		</form>
	</body>
</html>

<?php 

mysql_connect("localhost","root","");
mysql_select_db('thesis');

if(isset($_POST['submit'])) {
	$f = $_POST['fname'];
	$m = $_POST['mname'];
	$l = $_POST['lname'];
	$age = $_POST['age'];
	$grade = $_POST['grade'];
	$section =$_POST['section'];
	$address = $_POST['address'];
	$cno = $_POST['cpnumber'];
	$bdate = $_POST['date'];
	$sex = $_POST['sex'];
	$nation = $_POST['nation'];
	$rel = $_POST['religion'];

	$fathf = $_POST['fathf'];
	$fstreet = $_POST['fstreet'];
	$fcp = $_POST['fcpnumber'];
	$frel = $_POST['frelig'];
	$fnation = $_POST['fnation'];
	$foccup = $_POST['foccup'];

	$mothf = $_POST['mothf'];
	$mstreet = $_POST['mstreet'];
	$mcp = $_POST['mcpnumber'];
	$mrel = $_POST['mrelig'];
	$mnation = $_POST['mnation'];
	$moccup = $_POST['moccup'];
	$school_prev = $_POST['school_prev'];
	$what_source = $_POST['what_source'];
	$allergies = $_POST['allergies'];
	$datetoday = $_POST['datetoday'];
	$un = $_POST['un'];
	$student_no = $_POST['student_no'];
	



$query ="update tb_students set firstname = '$f',middlename = '$m',lastname ='$l',age = '$age',
grade_level = '$grade',section = '$section' ,address = '$address',contact_no = '$cno',birthday = '$bdate',sex = '$sex',nationality = '$nation',religion ='$rel'
,father_name ='$fathf',father_address = '$fstreet',father_contact = '$fcp',father_religion ='$frel',father_nationality = '$fnation',
father_occup = '$foccup',mother_name ='$mothf',mother_address = '$mstreet',mother_contact = '$mcp',mother_religion ='$mrel',mother_nationality = '$mnation',
mother_occup = '$moccup',school_prev ='$school_prev',what_source ='$what_source',allergies ='$allergies',date_today ='$datetoday' where student_no = '$student_no'";





if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='mstudents.php';</script>";
	
	}
	}

?>