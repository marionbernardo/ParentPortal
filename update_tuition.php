<html>
	<head>
		<title>
			Tuition Fee | LCJCA
		</title>
		<link rel="icon" type="image" href="logo.png">
<style>
body {
	font-family: segoe UI;
}
#tform {
	padding: 20px;
	margin:auto;
	border: 1px solid black;
	width: 420px;
}
td {
	border-bottom: 1px solid #ecf0f1;
	padding-bottom: 4px;
	font-size: 11pt;
}
input[type=submit] {
	margin-left: 0px;
	margin-top: 8px;
	height: 2em;
	width: 5em;
	background-color: #2980b9;
	border-radius: 3px;
	color: #fff;
	border: 1px solid gray;
}

input[type=submit]:hover {
	opacity: 0.9;
	cursor: pointer;
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
.right{
    float:right;
	margin-right: 550px;
	margin-top: 3px;
}

.left{
    float:left;
	margin-left: 550px;
	margin-top: 3px;
}
</style>
</head>

<body>
<form action="manage_tuition.php" method="POST">
					<div class="box-panel">
				<br>
				<br>
					<div id="tform">
					Select a Grade level that you want to update the tuition fee.	
							<table align="center" id="table-form" cellspacing="10">
								<tr>
									<td><b>Select:</td></b>
									<td><select name=""   required>
								<option value="">--</option>
								<option value ="Nursery">Nursery</option>
								<option value ="JuniorKindergarten">JuniorKindergarten</option>
								<option value ="SeniorKindergarten">SeniorKindergarten</option>
								<option value="Grade 1">Grade 1</option>
								<option value="Grade 2">Grade 2</option>
								<option value="Grade 3">Grade 3</option>
								<option value="Grade 4">Grade 4</option>
								<option value="Grade 5">Grade 5</option>
								<option value="Grade 6">Grade 6</option>
								<option value="Grade 7">Grade 7</option>
								<option value="Grade 8">Grade 8</option>
								<option value="Grade 9">Grade 9</option>
								<option value="Grade 10">Grade 10</option>
							</select></td>
								</tr>
								<tr>
									<td><b>Tuition Fee:  </b></td>
									<td><input type="number" name="tuition" required></td>
								</tr>
								<tr>
									<td><b>Miscellaneous:  </b></td>
									<td><input type="number" name="miscellaneous" required></td>
								</tr>
								<tr>
									<td><b>Learner's Materials: </b><br>(for Nursery - Senior Kindergarten) </td>
									<td><input type="number" name="learners_materials" required></td>
								</tr>
								<tr>
									<td><b>Playpen/Computer:</b><br>(for Grade 1 - Grade 10)</td>
									<td><input type="number" name="playpen_computer" required></td>
								</tr>
								<tr>
									<td><b>Books: </b></td>
									<td><input type="number" name="books" required></td>
								</tr>
								<tr>
									<td><b>School Materials: </b></td>
									<td><input type="number" name="school_materials" required></td>
								</tr>
								<tr>
									<td><b>Other Expenses: </b></td>
									<td><input type="number" name="other_expenses"  required></td>
								</tr>
							</table>							
</div>
</div>		
		<p class="left"><input type="submit" name="submit" Value="Update"></p>
	 	<p class="right"><a href="manage_tuition.php"><input type="button" value="Back" id="back"></a></p>
		</form>	
	</body>
</html>

<?php
mysql_connect("localhost","root","");
mysql_select_db("thesis");


	if(isset($_POST['submit'])) {

		$grade = $_POST['grade'];
		$a = $_POST['tuition'];
		$b = $_POST['miscellaneous'];
		$c = $_POST['learners_materials'];
		$d = $_POST['playpen_computer'];
		$e = $_POST['books'];
		$f = $_POST['school_materials'];
		$g = $_POST['other_expenses'];
		

			$query = "update tb_tuitionfee set tuition = '$a',miscellaneous ='$b',learners_materials ='$c',playpen_computer ='$d'
			,books = '$e',school_materials = '$e',other_expenses ='$f'  where grade_level = '$grade_level'";

			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='manage_tuition.php';</script>";
	
	}
	}

?>