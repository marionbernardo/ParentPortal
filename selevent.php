<h2><center>Upcoming Events</h2></center><br>
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
	
	
	
		$query = "select * from tb_events";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$eid = $row[0];
		$event_what = $row[1];
		$event_when = $row[2];
		$event_where  = $row[3];
		$event_photo  = $row[4];
		
		
		?>
		
		<tbody>
		<tr>
		<td><?php echo $event_what; ?></td>
		<td><?php echo $event_when; ?></td>
		<td><?php echo $event_where; ?></td>
		<td><?php echo "&nbsp;&nbsp;<img src='".$row['event_photo']."' height = '50px' width= '60px'";?></td>
		<td><a href='deleteevent.php?eid=<?php echo $eid;?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		</tr>
		</tbody>
		
			<?php } ?>
			
	</table>