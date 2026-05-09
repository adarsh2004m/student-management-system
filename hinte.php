<?php 
include 'conn.php';
session_start();
 $te=$_SESSION['user'];
$st=1;
$f=0;
if(isset($_POST['save'])){
				extract($_POST);
				$l=sizeof($p);
				for($i=0;$i<$l;$i++){
				$e1=$e[$i];
				$p1=$p[$i];
				 $s="update tbl_internal set mark='$p1',total='$t' where email='$e1' and temail='$te' and subid='$sub1' and status='$st'";
				 
				 
				$q=mysqli_query($con,$s);
				if($q){
				
				}
				else{
				$f=1;
				break;
				
				}
				
				}
				if($f==0){
				$_SESSION['m1']="5";
				header("Location:eint.php");
				
				}
				else{
				 $_SESSION['m1']="1";
				header("Location:eint.php");
				}

}
?>