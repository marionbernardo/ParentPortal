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
				Admin Teacher |  LCJCA
			</title>
		<link rel="icon" type="image" href="logo.png">
		<link rel="stylesheet" type="text/css" href="admincss/admin.css">			
</head>
<style>
div#header {
	width: 100%;
	height: 100px;
	background-color: #2c3e50;
	margin: 0 auto;
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
	<body>
	<form action="insertgrade.php" method="POST">
			<div id="tbcenter">
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
									<td><select name ="grading" required>
									<option value =""></option>
									<option value ="First">First</option>
									<option value ="Second">Second</option>
									<option value ="Third">Third</option>
									<option value ="Fourth">Fourth</option>
									</select>
									</td>
							<br>
							Grade <?php echo $row['grade_level'];?><br>
							Section <?php echo $row['section'];?><br>
							grading <?php echo $row['grade_level'];?>&nbsp;
							<input type="submit" name="submit" id="submit" value="Submit">
					<br><br>
					
						<div id="over">
					<table border=0 id="studetails" width="100%" align="center">
					
						<tr>
								<th>Student No</th>
								<th>Name</th>
								<th>Subject Description</th>
										<th>Professor</th>
										<th>First Grading</th>
										<th>Second Grading</th>
										<th>Third Grading</th>
										<th>Fourth Grading</th>
										<th>Average</th>
										<th>Remarks</th>												
						</tr>
						<tr align='center'>
						
							<td id="tb1"></td>
							<td id="tb1"></td>
							
						</tr>
									
</form>
</body>
</html>