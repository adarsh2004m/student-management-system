<?php 
include 'conn.php';
session_start();
$te=$_SESSION['user'];
$st=0;
$f=0;
if(isset($_POST['save'])){
				extract($_POST);
				$l=sizeof($p);
				for($i=0;$i<$l;$i++){
				$e1=$e[$i];
				$p1=$p[$i];
				$s1="select * from tbl_att where email='$e1' and sem='$cs'";
				$q1=mysqli_query($con,$s1);
				if(mysqli_num_rows($q1)>0){
					$f=1;
					break;

				}
				 $s="insert into tbl_att values('$e1','$d','$cs','$t','$p1','$te','$st')";
				$q=mysqli_query($con,$s);
				if($q){
				
				}
				else{
				$f=1;
				break;
				
				}
				
				}
				if($f==0){
				$_SESSION['m1']="0";
				header("Location:aatt.php");
				
				}
				else{
				 $_SESSION['m1']="1";
				header("Location:aatt.php");
				}

}
?>