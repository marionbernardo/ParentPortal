
<?php
	mysql_connect('localhost','root','');
	mysql_select_db('thesis');
	
	
	
	if(isset($_POST['submit'])){
	
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$position = $_POST['position'];


		$query = "UPDATE tb_administrators SET firstname='$fname',middlename='$mname',lastname='$lname' position='$position'   WHERE aid=$aid;

		
			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='adminboard.php';</script>";
	
	}
	}
	

	 
	
	
	
?>
