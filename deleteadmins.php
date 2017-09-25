<?php

include('connection.php');

$admin_id = $_GET['admin_id'];
$query = "delete from tb_admin where admin_id = '$admin_id'";

if(mysql_query($query)){
echo "<script>window.open('manage_admins.php?deleted=member has been deleted!','_self')</script>";
}
?>
