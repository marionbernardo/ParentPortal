<?php

include('connection.php');


$eid = $_GET['eid'];


$query = "delete from tb_events where eid='$eid'";

if(mysql_query($query)){
echo "<script>window.open('adminevents.php?deleted=fevent has been deleted!','_self')</script>";
}
?>