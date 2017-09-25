<html>
	<head>
		<title>
		Admin Panel | LCJCA	
		</title>
	</head>
	<link rel="stylesheet" href="admincss/studview1.css">
	<link rel="icon" type="image" href="logo.png">
<style>
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
	<body>	
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
				<b>Full Information of a Student</b><br>
								</div>
								<div id="s-pic">
								
								<?php echo "&nbsp;&nbsp;<img src='studentportal/".$row['student_pic']."' height = '130px' width= '130px'";?><Br><Br>
								</div>
							<table border=0 align="center">
									
								<tr>
									<td><input type="text" name="fname" value="<?php echo $fname = $row['firstname'];?>"readonly></td>
									<td><input type="text" name="mname"  value="<?php echo $mname = $row['middlename'];?>"readonly></td>
									<td><input type="text" name="lname" value="<?php echo $lname = $row['lastname'];?>"readonly></td>
									
								</tr>
								
								<tr>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									
								</tr>
								
								<tr>
									<td><input type="text" name="age" value="<?php echo $age = $row['age'];?>" readonly></td>
									<td><input type="text" name="grade" value="<?php echo $grade = $row['grade_level'];?>"readonly></td>
									<td><input type="text" name="section" value="<?php echo $section = $row['section'];?>"readonly></td>
									<td><input type="text" name="schoolyear" value="<?php echo $schoolyear = $row['schoolyear'];?>"readonly></td>
									</td>
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
								<td><input type="text" name="address" value="<?php echo $street = $row['address'];?>" readonly></td>
								<td><input type="text" name="cpnumber" value="<?php echo $row['contact_no'];?>" readonly></td>
							</tr>

								<tr>
									<td>Address</td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="date" name="date" value="<?php echo $row['birthday'];?>" readonly></td>
									<td><input type="text" name="sex" value="<?php echo $row['sex'];?>" readonly></td>
									<td><input type="text" name="nation" value="<?php echo $row['nationality'];?>" readonly></td>
									<td><input type="text" name="religion" value="<?php echo $row['religion'];?>" readonly></td>
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
									<td><input type="text" name="fathf" value="<?php echo $row['father_name'];?>" readonly></td>	
								</tr>

								<tr>
									<td>Father's Name</td>	
								</tr>

								<tr>
								<td><input type="text" name="fstreet" value="<?php echo $row['father_address'];?>" readonly></td>
								<td><input type="text" name="fcpnumber" value="<?php echo $row['father_contact'];?>" readonly></td>
								</tr>

								<tr>
									<td>Address</td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="frelig" value="<?php echo $row['father_religion'];?>" readonly></td>
									<td><input type="text" name="fnation" value="<?php echo $row['father_nationality'];?>" readonly></td>
									<td><input type="text" name="foccup" value="<?php echo $row['father_occup'];?>" readonly></td>
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
									<td><input type="text" name="mothf" value="<?php echo $row['mother_name'];?>" readonly></td>			
								</tr>

								<tr>
									<td>Mother's Name</td>
								</tr>

								<tr>
								<td><input type="text" name="mstreet" value="<?php echo $row['mother_address'];?>" readonly></td>
								<td><input type="text" name="mcpnumber" value="<?php echo $row['mother_contact'];?>" readonly></td>
								</tr>

								<tr>
									<td>Address</td>
									<td>Contact #</td>
								</tr>

								<tr>
									<td><input type="text" name="mrelig" value="<?php echo $row['mother_religion'];?>" readonly></td>
									<td><input type="text" name="mnation" value="<?php echo $row['mother_nationality'];?>" readonly></td>
									<td><input type="text" name="moccup" value="<?php echo $row['mother_occup'];?>" readonly></td>
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
									<td><input type="text" name="school_prev" id="other" value="<?php echo $row['school_prev'];?>" readonly></td>
								</tr>

								<tr>
									<td>FROM WHAT SOURCE DID YOU LEARN THIS SCHOOL: </td>
									<td><input type="text" name="what_source" id="other" value="<?php echo $row['what_source'];?>" readonly></td>
								</tr>


								<tr>
									<td>Allergies / Illnesses: </td>
									<td><input type="text" name="allergies" id="other" value="<?php echo $row['allergies'];?>" readonly></td>
								</tr>

								
							</table>
							
							<table>
								<tr>

									<td><br><br>
										
										<input type="text" name="datetoday"  value="<?php echo $row['date_today'];?>" readonly>
										</td>
								</tr>
									<tr>
										<td>Date</td>
									</tr>

							</table>
							</div>
<?php }?>

<p align="center"><a href="#" onClick=window.print()>Print</a></p>
		</div>
	</body>
</html>