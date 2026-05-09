<?php 
include 'conn.php';
session_start();
extract($_POST);
$s="delete from tbl_depart where dpid='$d'";
if(mysqli_query($con,$s)){
$_SESSION['m1']="3";
header("Location:ddelete.php");
}
else
{
$_SESSION['m1']="1";
header("Location:ddelete.php");

}
?>