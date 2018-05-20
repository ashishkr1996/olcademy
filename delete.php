<?php
	$uid=$_GET['uid'];
	//echo $uid;
	$con=mysqli_connect('localhost','root','','demo') or die("error");
	$delete=mysqli_query($con,"delete from memberid where id=".$uid);
	$delete1=mysqli_query($con,"delete from teamdata where uid=".$uid);
	if($delete==1||$delete1==1)
		echo "<script>alert($uid+'is deleted');window.location='admin.php';</script>";
?>