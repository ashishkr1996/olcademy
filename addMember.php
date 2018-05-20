<?php
	$mid=$_GET['id'];
	$tname=$_GET['tname'];
	$status="1";
	$con=mysqli_connect('localhost','root','','demo') or die("error");
	$insert=mysqli_query($con,"INSERT INTO memberid (id,teamname,status) VALUES ('$mid','$tname','$status')");
	if($insert==1)
	{
		echo "<script> alert($insert+' Member Id inserted');window.location='admin.php';</script>";
	}
	else
	{
		echo "<script> alert('error');window.location='admin.php';</script>";	
	}
	mysqli_close($con);
?>