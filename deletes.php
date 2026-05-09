<?php
session_start();
include 'conn.php';
extract($_POST);
$s1="delete from tbl_subject where dpid='$d' and semester='$s' and subid='$sub'";
if(mysqli_query($con,$s1)){

$_SESSION['m1']="3";
header("Location:sdelete.php");
}
else{
$_SESSION['m1']="1";
header("Location:sdelete.php");
}
?>