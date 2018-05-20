<?php
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$mob=$_GET['mob'];
	$email=$_GET['email'];
	$uid=$_GET['uid'];
	$status=$_GET['status'];
	$con=mysqli_connect('localhost','root','','demo') or die("error");

	if($status==1)
	{
		$update=mysqli_query($con,"update teamdata set fname='$fname',lname='$lname',mob='$mob',email='$email'where uid=".$uid);
		if($update==1)
		{
			echo "<script>alert($update+'row updated');window.location='admin.php';</script>";
		}
	}
	else
	{
		$tname=mysqli_query($con,"select teamname from memberid where id=".$uid);
		if($row=mysqli_fetch_array($tname))
		{
			$insert=mysqli_query($con,"INSERT INTO teamdata(fname,lname,mob,email,uid,tname) VALUES ('$fname','$lname','$mob','$email','$uid','$row[teamname]')");
			if($insert==1)
			{
				$changestatus=mysqli_query($con,"update memberid set status='0' where id=".$uid);
				if($changestatus==1)
					echo "<script> alert($insert+' Member Id inserted');window.location='admin.php';</script>";
			}
			else
			{
				echo "<script> alert('error');window.location='admin.php';</script>";	
			}		
		}	
	}
	
	
	mysqli_close($con);
?>