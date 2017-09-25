<p align="center"><h2>School Facilities</h2></p><br>
		<div id="over">
<div class="table-responsive">  	
						  <table class="table">
						<thead>
		<tr>
			<th>Facility Name</th>
			<th>Description</th>
			<th>Picture</th>
			<th>Delete</th>	
		</tr>
		</thead>
		
<?php
	include("connection.php");

	$query = "select * from tb_facilities";	
	$run = mysql_query($query);
		
		while ($row=mysql_fetch_array($run)){
		$fid = $row[0];
		$facility_name = $row[1];
		$facility_desc = $row[2];
		$facility_photo  = $row[3];

?>
    
	<tbody>
	<tr>
	<td><?php echo $facility_name; ?></td>
	<td><?php echo $facility_desc; ?></td>
	<td><?php echo "&nbsp;&nbsp;<img src='".$row['facility_photo']."' height = '50px' width= '60px'";?></td>
	<td><a href='deletefac.php?fid=<?php echo $fid;?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		</tr>
		</tbody>
		
			<?php } ?>
			
	</table>