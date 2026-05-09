<?php 

$s=$_GET['s'];
$i=$s;
$i++;

if($i==7){
?> <?php
}
else{
?>
<option  value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>