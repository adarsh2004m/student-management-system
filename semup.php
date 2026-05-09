<?php
session_start();
include 'conn.php';
extract($_POST);
$s="update tbl_sregister set csem='$to' where csem='$from' and dpid='$d' ";
if(mysqli_query($con,$s)){
$_SESSION['m1']="5";
header("Location:ups.php");


}
else{
$_SESSION['m1']="1";
header("Location:ups.php");

}
 ?>