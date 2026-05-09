<?php
session_start(); 
include 'conn.php';
extract($_POST);
$s2="insert into tbl_subject (dpid,semester,subname) values('$d','$s','$sub')";
$s1="select * from tbl_subject where dpid='$d' and semester='$s' and subname='$sub'";
$q=mysqli_query($con,$s1);
if(mysqli_num_rows($q)>0){
$_SESSION['m1']="2";
header("Location:sadd.php");
}
else{
if(mysqli_query($con,$s2)){
$_SESSION['m1']="0";
header("Location:sadd.php");

}
else
{
$_SESSION['m1']="1";
header("Location:sadd.php");

}
}

?>