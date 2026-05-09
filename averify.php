<?php 
session_start();
include 'conn.php';
extract($_POST);
$st=1;
if(isset($_POST['approve'])){
$ss="update tbl_att set status='$st' where temail='$te' and dpid='$d' and sem='$ss1'";
if(mysqli_query($con,$ss)){
$_SESSION['m1']="6";
header("Location:verifya.php");

}
else{
$_SESSION['m1']="1";
header("Location:verifya.php");


}}
?>