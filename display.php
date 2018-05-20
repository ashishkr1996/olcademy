<!DOCTYPE html>
<html>
<head>
	<title>Team Members</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		.iwidth{
  			width:200px;
  			height:30px;

  		}
  	</style>
</head>
<body bgcolor="#E6E6FA">
	<h1 style="text-align:center;">Team Members Details</h1><hr>
	<center>
		<input type='button' class="btn btn-primary iwidth" value="Team 1" id="team1" onclick="viewData(this.id)">
		<input type="button" class="btn btn-warning iwidth" value="Team 2" id="team2" onclick="viewData(this.id)">
	</center>
		<script type="text/javascript">
			function viewData(id)
			{
				if(id=='team1')
				{
					document.getElementById("tmember1").style.display="block";
					document.getElementById("tmember2").style.display="none";
				}
				else
				{	
					document.getElementById("tmember2").style.display="block";
					document.getElementById("tmember1").style.display="none";
				}
			}
		</script>
		<div id="tmember1">
			<br>
			<center>
				<label style="font-size: 20px;font-family: arial;">CSK</label>
			</center>
			<hr>
		<?php
			$con=mysqli_connect('localhost','root','','demo') or die("error");
			$result=mysqli_query($con,"select * from teamdata where tname='CSK'");
			$i=1;
			while($row=mysqli_fetch_array($result))
			{

				echo "<div class='row text-center' style='border:1px solid black; color:black; font-family:arial;'  >
						<div class='col-lg-1' style='background-color:pink;'><h4><b>Member".$i."</b></h4></div><div class='col-lg-2' style='background-color:yellow;'><h4><b>Name</b>:".$row['fname']."&nbsp".$row['lname']."</h4></div><div class='col-lg-3' style='background-color:lightblue;'><h4><b>Mobile</b>:".$row['mob']."</h4></div><div class='col-lg-3' style='background-color:gray;'><h4><b>Email</b>:".$row['email']."</h4></div><div class='col-lg-3' style='background-color:silver;'><h4><b>Uid</b>:".$row['uid']."</h4></div></div>";
				$i++;
			}
		?>
		</div>
		<div style="display:none;" id="tmember2">
			<br>
			<center>
				<label style="font-size: 20px;font-family: arial;">RCB</label>
			</center>
			<hr>
			<?php
			$con=mysqli_connect('localhost','root','','demo') or die("error");
			$result=mysqli_query($con,"select * from teamdata where tname='RCB'");
			$i=1;
			while($row=mysqli_fetch_array($result))
			{

				echo "<div class='row text-center' style='border:1px solid black; color:black; font-family:arial;'  >
						<div class='col-lg-1' style='background-color:pink;'><h4><b>Member".$i."</b></h4></div><div class='col-lg-2' style='background-color:yellow;'><h4><b>Name</b>:".$row['fname']."&nbsp".$row['lname']."</h4></div><div class='col-lg-3' style='background-color:lightblue;'><h4><b>Mobile</b>:".$row['mob']."</h4></div><div class='col-lg-3' style='background-color:gray;'><h4><b>Email</b>:".$row['email']."</h4></div><div class='col-lg-3' style='background-color:silver;'><h4><b>Uid</b>:".$row['uid']."</h4></div></div>";
				$i++;
			}
		?>
		</div>
	</center>	
</body>
</html>