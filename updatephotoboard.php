

<?php 
	
include("adminboard.php");
include("connection.php");


if(isset($_POST['update'])) {


$board = $_POST['board'];
 	$file = $_FILES['file'];
	$file_name = $file['name'];
	$file_type = $file['type'];
	$file_size = $file['size'];
	$file_path = $file['tmp_name'];

	if($file_type == "video/3gp"||$file_type == "video/mp4"||$file_type == "video/avi"||$file_type == "image/gif"||$file_type == "text/css"||$file_type == "application/octet-stream"||$file_type == "text/html" ||$file_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") 
		{
			die ("<script>alert('Thats not an image');</script>");
		}
		else 
		{

	if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=1048567)
	if(move_uploaded_file ($file_path,'images/'.$file_name))

	$query1 = "UPDATE tb_administrators SET picture='images/$file_name' WHERE aid = '$board'";

	if(mysql_query($query1)) {
	
	echo "<script>alert('Update successfully!...','self');window.location='adminboard.php';</script>";
	
	}
	


}


}


?>