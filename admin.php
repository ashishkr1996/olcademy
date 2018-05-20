<!DOCTYPE html>
<html>
<head>
	<title> Admin Panel </title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		.bwidth{
  			width:200px;
  			margin-bottom: 10px;
  		}
  		.iwidth{
  			width:200px;
  			height:30px;
  			margin-bottom: 8px;
  			border-radius: 2px;
  			color:black;
  		}
  		
  	</style>
  	<script type="text/javascript">
  		function hide(id)
  		{
  			for(var i=0;i<4;i++)
  			{
  				var obj=document.getElementById("div_"+i).style.display='none';
  				
  			}
  			add(id);
  		}
  		function add(id)
  		{
  			document.getElementById(id).style.display="block";	
  		}
  		function idata(id)
  		{
  			document.getElementById('h1').innerHTML='Insert Details';
  			document.getElementById('button').value='Insert';
  			document.getElementById("userid").value=id;
  			$('#myModal').modal();
  		}
  		function editData(fname,lname,mob,email,uid)
  		{

  			document.getElementById('fname').value=fname;
  			document.getElementById('lname').value=lname;
  			document.getElementById('mob').value=mob;
  			document.getElementById('email').value=email;
  			document.getElementById('userid').value=uid;
  			document.getElementById('button').value='Update';
  			document.getElementById('h1').innerHTML='Update Details';
  			document.getElementById('status').value=1;
  			$('#myModal').modal();
  			//document.getElementById("fname").value=
  		}
  	</script>
  	
</head>
<body>
	<h1 style="text-align:center;">Admin Panel</h1>
	<hr>
	<div class="container" style="margin:130px 0px 0px 20px;">
		<div class="row">
			<div class="col-lg-4">
				<a href="javascript:hide('div_0')" class="btn btn-danger bwidth">Upload Details</a>
				<a href="javascript:hide('div_1')" class="btn btn-warning bwidth ">Delete</a>
				<a href="javascript:hide('div_2')" class="btn btn-primary bwidth" >Add</a>
				<a href="javascript:hide('div_3')" class="btn btn-info bwidth">Edit</a>
			</div>
			<div class="col-lg-8">
				<div id="div_0" style="display:none;border:1px solid black;text-align:center;">
					<h4 style="text-align:center;">Upload Details</h4><hr>	
					<?php
						$con=mysqli_connect('localhost','root','','demo') or die("error");
						$result=mysqli_query($con,"select * from memberid where status=1");

						while($row=mysqli_fetch_array($result))
						{
							echo "<label style='font-size:15px;'>".$row['teamname']." &nbsp<b>".$row['id']."</b></label> &nbsp&nbsp&nbsp<input type='button' class='btn btn-danger btn-sm' value='Insert Data' onclick='idata(".$row['id'].")''><br><br>";
						}
						mysqli_close($con);
					?>
				</div>

				
				<div id="div_1" style="display:none;border:1px solid black;text-align:center;">
					<h4 style="text-align:center;">Delete Member</h4><hr>
					<?php
						$con=mysqli_connect('localhost','root','','demo') or die("error");
						$result=mysqli_query($con,"select * from memberid");
						
						while($row=mysqli_fetch_array($result))
						{
							echo "<form action='delete.php'><label style='font-size:15px;'>".$row['teamname']." &nbsp<b>".$row['id']."</b></label> &nbsp&nbsp&nbsp<input type='submit' class='btn btn-warning btn-sm' value='Delete'><input type='hidden' value='".$row['id']."' name='uid'><br><br></form>";
						}
						mysqli_close($con);
					?>	
				</div>

				<div id="div_2" style="display: none; text-align:center;border:1px solid black;">
					<h4 style="text-align:center;">Add New Member</h4><hr>
					<form action="addMember.php">
						<select name="tname" class="iwidth">
							<option>Choose Team</option>
							<option>CSK</option>
							<option>RCB</option>
						</select>
						
						<input type="'text" class="iwidth" placeholder="Enter Member Id" name="id" >
						<input type="submit" value="Add Member" class="iwidth btn btn-primary">
					</form>	

				</div>
				<div id="div_3" style="display: none;text-align:center;">
					<h4 style="text-align:center;">Edit Member</h4>	<hr>
					<?php
						$con=mysqli_connect('localhost','root','','demo') or die("error");
						$result=mysqli_query($con,"select * from teamdata");
						
						while($row=mysqli_fetch_array($result))
						{
							echo "<form action=''><label style='font-size:15px;'>".$row['tname']." &nbsp<b>".$row['uid']."</b></label> &nbsp&nbsp&nbsp<input type='button' class='btn btn-warning btn-sm' value='Edit' onclick='editData(\"".$row['fname']."\",\"".$row['lname']."\",\"".$row['mob']."\",\"".$row['email']."\",".$row['uid'].")'><input type='hidden' value='".$row['uid']."' name='uid' )'><br><br></form>";
						}
						mysqli_close($con);
					?>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="container">
  		<div class="modal fade" id="myModal" role="dialog">
    		<div class="modal-dialog">
    			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 id="h1">Insert Details</h4>
        			</div>
        			<div class="modal-body" style="text-align:center;">
        			  <form action="insert.php">
        			  	
          				<input type="text" id="fname" name="fname" placeholder="Enter First Name" class="iwidth"><br>
          				<input type="text" id="lname" name="lname" placeholder="Enter Last Name" class="iwidth"><br>
          				<input type="text" id="mob" name='mob' placeholder="Enter Mobile No" class="iwidth"><br>
          				<input type="text" id="email" name='email' placeholder="Enter Email Id" class="iwidth"><br>
          				<input type="submit" id="button" value="Submit" class="btn btn-sm btn-danger iwidth">
          				<input type="hidden" id="userid" name="uid">
          				<input type="hidden" id="status" name="status" value="0">
          			  </form>
        			</div>
        			<div class="modal-footer">
          				<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        			</div>
      			</div>
      		</div>
  		</div>
  	</div>
</body>
</html>