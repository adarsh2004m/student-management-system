<?php 
include 'conn.php';
session_start();
$s=$_GET['s'];
$d=$_GET['d'];
$e=$_SESSION['user'];
$st=1;
$s1="select * from tbl_att where dpid='$d' and sem='$s' and status='$st'";
$q=mysqli_query($con,$s1);
if(mysqli_num_rows($q)>0){
?> <tr><th>Name</th><th>Photo</th><th>Progress</th><th style="width:45px">Percentage</th></tr><?php
while($r=mysqli_fetch_array($q)){

?>
<tr><th><?php
$e2=$r['email'];
$s2="select * from tbl_sregister where email='$e2'";
$q1=mysqli_query($con,$s2);
$r1=mysqli_fetch_array($q1);

 echo $r1['fullname']; ?></th><th><img src="<?php echo $r1['image'];?>"  class="img-size-32" ></th><th>
 <?php $pe=$r['present']/$r['total']; 
 		$pe=$pe*100;
		if($pe>=75){
 ?>
 <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: <?php  echo $pe; ?>%"></div>
                        </div>
<?php }else{ ?>

<div class="progress progress-xs">
                          <div class="progress-bar progress-bar-warning" style="width: <?php echo $pe; ?>%"></div>
                        </div>
	<?php } ?>
 </th><th> <?php 
 if($pe>=75){
 
  ?>
  <span class="badge bg-success"><?php  echo $pe;?>%</span>
  <?php }else{ ?>
  <span class="badge bg-danger"><?php  echo $pe;?>%</span>
  <?php }?>
  </th></tr>
 
<?php }}else
{ echo "no data";}
?>