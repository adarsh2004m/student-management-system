<?php
session_start();
include 'conn.php';
$d=$_GET['d'];
$s1=$_GET['s'];
$te=$_SESSION['user'];
$st=0;
$s2="select * from tbl_internal where status='$st' and subid='$d'";
$q=mysqli_query($con,$s2);
if(mysqli_num_rows($q)){
$q2=mysqli_query($con,$s2);
$r2=mysqli_fetch_array($q2);
?> <tr><input type="text" name="te" value="<?php  echo $r2['temail'];?>" style="display:none"><th>Name</th><th>Mark</th></tr><?php
while($r=mysqli_fetch_array($q)){
$e=$r['email'];
 $s3="select * from tbl_sregister where email='$e'";
 $q1=mysqli_query($con,$s3);
 $r1=mysqli_fetch_array($q1);
?>
<tr><th><?php  echo $r1['fullname'];?></th><th><?php echo $r['mark']; ?></th></tr>
<?php }
?> <div align="right"><label>Signed by</label><p><?php  echo $r2['temail'];?></p></div><button value="approve" name="approve" class="btn btn-success" type="submit">Approve</button><?php 
}else{ echo "no data";} ?>