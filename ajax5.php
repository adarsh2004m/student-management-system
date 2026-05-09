<?php
session_start();
include 'conn.php';
$d=$_GET['d'];
$s1=$_GET['s'];
$te=$_SESSION['user'];
$s2="select * from tbl_internal where temail='$te' and subid='$d'";
$q=mysqli_query($con,$s2);
if(mysqli_num_rows($q)){
?> <tr><th>Name</th><th>Mark</th></tr><?php
while($r=mysqli_fetch_array($q)){
$e=$r['email'];
 $s3="select * from tbl_sregister where email='$e'";
 $q1=mysqli_query($con,$s3);
 $r1=mysqli_fetch_array($q1);
?>
<tr><th><?php  echo $r1['fullname'];?></th><th><?php echo $r['mark']; ?></th></tr>
<?php }}else{ echo "no data";} ?>