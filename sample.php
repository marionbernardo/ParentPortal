<html>
<body>
<form action="sample.php" method="POST" enctype="multipart/form-data">
	</form>
</body>
<?php

	mysql_connect("localhost","root","");
	mysql_select_db("thesis");
	$query = "select * from tb_administrators";
		
		$run = mysql_query($query);
	
	while ($row=mysql_fetch_array($run)){
		$aid = $row[0];
		$firstname = $row[1];
		$middlename = $row[2];
		$lastname = $row[3];
		$position  = $row[4];
		$otherinfo = $row[5];
		$picture = $row[6];

		
		echo "&nbsp;&nbsp;<img src='".$row['picture']."' height = '250px' width= '275px'";
		
		}


?>
</form>
</body>
</html>