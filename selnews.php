<p align="center"><h2>News</h2></p><br>
		<div id="over">
	<table border=0  width="100%" align="center">
	
		<tr>
		
			<th>News Title</th>
			<th>Date and Time</th>
			<th>Reporter</th>
			<th>News Content</th>
			<th>Delete</th>
			
		</tr>
		
			<?php
			include("connection.php");
	
	
	
		$query = "select * from tb_news";
		
		$run = mysql_query($query);
		
	while ($row=mysql_fetch_array($run)){
		$nid = $row[0];
		$news_title = $row[1];
		$news_date_time = $row[2];
		$news_reporter = $row[3];
		$news_content = $row[4];
		$news_photo = $row[5];
		
		
		?>
		<tr align='center'>
		
		<td id="tb1"><?php echo $news_title; ?></td>
		<td id="tb1"><?php echo $news_date_time; ?></td>
		<td id="tb1"><?php echo $news_reporter; ?></td>
		<td id="tb1"><?php echo $news_content; ?></td>
	
		<td id="tb1"><?php echo "&nbsp;&nbsp;<img src='".$row['news_photo']."' height = '50px' width= '60px'";?></td>
		<td id="tb1"><a href='deletenews.php?nid=<?php echo $nid;?>' onclick="return confirm('Are you sure you want to delete?')"><input type="button" id="del" value="Delete"></a></td>
		</tr>
		
			<?php } ?>
			
	</table>