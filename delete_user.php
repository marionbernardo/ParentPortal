<?php

include('connection.php');


$uid = $_GET['uid'];


$query = "delete from tb_users where uid='$uid'";

if(mysql_query($query)){
echo "<script>window.open('view_users.php?deleted=user has been deleted!','_self')</script>";
}
?>