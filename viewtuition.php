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
	width: 400px;
}
td {
	border-bottom: 1px solid #ecf0f1;
	padding-bottom: 4px;
	font-size: 11pt;
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
			<?php 

								$glevel = $_GET['grade_level'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query = "select * from tb_tuitionfee where grade_level = '$glevel'";
							
				
							$run = mysql_query($query);
							
							while ($row=mysql_fetch_assoc($run)){
							

						?>
							<br><br><br>
							<div id="tform">
								Grade <?php echo $row['grade_level'];?> <br>
								Tuition information <br>
								<br>
								<table width="100%">
									<tr>
										<td><b>Tuition Fee </b></td>
										<td><?php echo $row['tuition'];?> </td>
									</tr>
									<tr>
										<td><b>Miscellaneous</b> </td>
										<td><?php echo $row['miscellaneous'];?></td>
									</tr>
									<tr>
										<td><b>Learner's Materials</b><br>(for Nursery - Senior Kindergarten)</td>
										<td><?php echo $row['learners_materials'];?></td>
									</tr>
									<tr>
										<td><b>Playpen/Computer</b><br>(for Grade 1 - Grade 10)</td>
										<td><?php echo $row['playpen_computer'];?></td>
									</tr>
									<tr>
										<td><b>Books</b></td>
										<td><?php echo $row['books'];?></td>
									</tr>
									<tr>
										<td><b>School Materials</b></td>
										<td><?php echo $row['school_materials'];?></td>
									</tr>
									<tr>
										<td><b>Other Expenses</b></td>
										<td><?php echo $row['other_expenses'];?></td>
									</tr>
									
									<tr>
										<td><br><br>Total</td>
										<td><br><br><?php 

												$a = $row['tuition'];
												$b = $row['miscellaneous'];
												$c = $row['learners_materials'];
												$d = $row['playpen_computer'];
												$e = $row['books'];
												$f = $row['school_materials'];
												$g = $row['other_expenses'];
												

												$sum = $a + $b + $c + $d + $e + $f + $g;
												echo $sum;
										?></td>
									</tr>

								</table>
							</div>
						<? } ?>
						<p align="center"><a href="manage_tuition.php"><input type="button" value="Back" id="back"></a></p>
	</body>
</html>