<?php
include('connect.php');
$status=$_GET['status'];
$wID=$_GET['wID'];
$sql = "UPDATE Addsuer SET status= '$status' where wID ='$wID' ";
$result = $conn->query($sql);
header('Location:http://mohammedtakrony.epizy.com/shuser.php?n1')
 ?>
