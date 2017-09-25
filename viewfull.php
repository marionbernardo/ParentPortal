<html>
	<head>
		<title>
			View full size
		</title>
	</head>

	<body>
			<?php		
		
								mysql_connect("localhost","root","");
									mysql_select_db("thesis");

										$id = $_GET['facility'];
						
							$query = "select * from tb_facilities where fid='$id'";
							
							$run = mysql_query($query);
															
							while ($row=mysql_fetch_array($run)){
										$fid = $row[0];
								$facility_name = $row[1];
								$facility_desc = $row[2];
								$facility_photo  = $row[3];
		
								?>
								
		
					<?php echo "<img src='".$row['facility_photo']."' height= '500px' width='800px'";  ?>
	<?php } ?>
	</body>
</html>