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
				Student Balance | LCJCA
			</title>
		<link rel="icon" type="image" href="logo.png">

<style>
input[type=text]{
	width: 5em;
	border: 0px ;
}
body {
	font-family: segoe UI;
}

#tform {
	padding: 20px;
	margin:auto;
	border: 1px solid black;
	width: 400px;
}
#forms {
	margin: auto;
	width: 400px;
	font-size: 11pt;
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
	width: 6em;
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
		<br>
		<div id="forms">
					<?php
							$student_no = $_GET['student_no'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query1 = "select * from tb_students where student_no = '$student_no'";
							$run1 = mysql_query($query1);
							
						while ($row=mysql_fetch_assoc($run1)){
						echo'<b>Name: </b>';
						echo $row['lastname'];
						echo ',';
						echo $row['firstname'];
						echo '&nbsp;';
						echo $row['middlename'];	
						echo'<br>';
						echo '<b>Student No: </b>';
						echo $row['student_no'];
						echo '<br>';
						echo'<b>Schoo Year: </b>';
						 echo $row['schoolyear'];
						
					}
					?>
					
					<form action="update_amount_pay.php?student_no=<?php echo $_GET['student_no'];?>&grade_level=<?php echo $_GET['grade_level'];?>" method="POST">
					<br>Enter amount pay <input type="number" name="amountpaid"> &nbsp;<input type="submit" name="submit" value="submit">
						
			</div>	
	<?php 

							$grade_level = $_GET['grade_level'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query = "select * from tb_tuitionfee where grade_level = '$grade_level'";
							$run = mysql_query($query);
					
							while ($row=mysql_fetch_assoc($run)){
							

						?>
							<br>
							<div id="tform">
								Grade <?php echo $row['grade_level'];?> <br>
							
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
										<td><br><br>
											<?php 

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

									<tr>
										<td><b>Amount Pay</b></td>
										<td><?php
											$student_no = $_GET['student_no'];

							mysql_connect("localhost","root","");
							mysql_select_db("thesis");	

							$query1 = "select * from tb_students where student_no = '$student_no'";
							$run1 = mysql_query($query1);
							
							while ($row=mysql_fetch_assoc($run1)){
							
					?>
						<input type="text" name="current" value=<?php echo $row['amount_pay'];?> readonly>
				<?php } ?>
				</td>
									</tr>

									<tr>
										<td><b>Outstanding Balance</b></td>
										<td>
											<?php
											$student_no = $_GET['student_no'];

											mysql_connect("localhost","root","");
											mysql_select_db("thesis");	

											$query1 = "select * from tb_students where student_no = '$student_no'";
											$run1 = mysql_query($query1);
											
											while ($row=mysql_fetch_assoc($run1)){
											
											$paid = $row['amount_pay'];

											$balance =  $sum - $paid;

											echo $balance;

						
					

								?>
									
							<?php } ?>
										</td>
									</tr>
								
								</table>

								</form>
							</div>
						<? } ?>
	<p align="center"><a href="manage_student_balance.php"><input type="button" value="Back" id="back"></a></p>
	</body>
</html>

<?php 

mysql_connect("localhost","root","");
mysql_select_db("thesis");


	if(isset($_POST['submit'])) {
		$student_no = $_GET['student_no'];
		$grade_level = $_GET['grade_level'];
		$amount = $_POST['amountpaid'];
		$current = $_POST['current'];

		$total = $amount + $current;
		$query2 = "update tb_students set amount_pay = '$total' where student_no =$student_no";

		if(mysql_query($query2)) {
			echo "<script>alert('Update Successfully'); window.location = 'update_amount_pay.php?student_no=$student_no&grade_level=$grade_level';</script>";
		}
	}


?>