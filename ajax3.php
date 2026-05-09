<?php 
include "conn.php";
$s=$_GET['s'];
$d=$_GET['d'];
$s1="select * from tbl_subject where dpid='$d' and semester='$s'";
$q=mysqli_query($con,$s1);
?><option value="">select subject</option><?php
while($r=mysqli_fetch_array($q)){


?><option value="<?php echo $r['subid'];?>"><?php  echo $r['subname'];?></option>
<?php } ?>