<h2><center>Announcements</h2></center><br>
		<div id="over">
		 <div class="table-responsive">  	
						  <table class="table">
						<thead>
		<tr>
			<th>What</th>
			<th>When</th>
			<th>Where</th>
			<th>Photo</th>
			<th>Delete</th>
		</thead>	
		</tr>
		
			<?php
			include("connection.php");
		$query = "select * from tb_announcements";	
		$run = mysql_query($query);
	while ($row=mysql_fetch_array($run)){
		$anid = $row[0];
		$what = $row[1];
		$w_hen = $row[2];
		$w_here  = $row[3];
		$photo  = $row[4];	
		?>
		
		<tbody>
		<tr>		
		<td><?php echo $what; ?></td>
		<td><?php echo $w_hen; ?></td>
		<td><?php echo $w_here; ?></td>
		<td><?php echo "&nbsp;&nbsp;<img src='".$row['ann_photo']."' height = '50px' width= '60px'";?></td>
		<td><a href='deleteann.php?anid=<?php echo $anid;?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		</tr>
		</tbody>
			<?php } ?>
			
	</table>