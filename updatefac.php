
<?php

	include("adminfacility.php");
	mysql_connect('localhost','root','');
	mysql_select_db('thesis');
	
	
	
	if(isset($_POST['update'])){

	$id = $_POST['faci'];
	$facilityname = $_POST['facname'];
	$desc = $_POST['ndesc'];

		$query = "UPDATE tb_facilities SET facility_name='$facilityname',facility_desc='$desc'  WHERE fid=$id";

		
			if(mysql_query($query)) {
	
	echo "<script>alert('Update succesfully');window.location='adminfacility.php';</script>";
	
	}
	}
	

	 
	
	
	
?>
