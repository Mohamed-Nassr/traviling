<?php
/*
require_once'registeration.php';
$reg=new registeration();
if(isset($_POST['Register']))
{
	$pass=$_POST['password'];
	$pass2=$_POST['repassword'];
	$phone=$_POST['phonenumber'];
	$emali=$_POST['email'];
	$count=$reg->setpassword($phone,$pass,$pass2,$email);
	if($count==0)
	{
		echo '<script> alert("Sorry password not matched"); </script>';
	}
		if($count==1)
	{
		echo '<script> alert("password changed successfully"); </script>';
	}

	if($count==0)
	{
		echo '<script> alert("Sorry phone number not matched"); </script>';
	}


}


*/
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forget Password</title>
	<style>
		
		form
		{
			background-color: rgba(255,255,255,.6);
			margin: 100px auto;
			text-align: center;
			padding: 10px;
			border: 5px;
			line-height: 60px;
			width: 600px;
			height: 800px;
			color: black;
			border-radius: 10px;
			border :3px solid #ddd;
		}
		label
		{
			font-size: 30px;
			margin-right: 60px; 
			
			
		}
		input
		{
			margin-left: 0px;
			width: 300px;
			height: 20px;
		}
		.equal
		{
			margin-left: 50px;
		}
		.button
		{
			height: 30px;
			color: blue;
		}

			body
		{
			background: url(back.jpg);
		} 
	.pas
		{

			margin-left: 65px;
		}
		.repass{margin-left: 20px;
		}
		.button{
			margin-top: 50px;
		}
			.lab1
		{
			color: blue;
			font-size: 50px;
			margin-left: 50px;
		}
	
	</style>
		
	
</head>
<body>

<form class="form" action="forget.php" method="POST">
		<label class="lab1"  >Reset Password</label> <br>
		
		<label  class="phonelable">Phone Number :</label>
		<input type="text" name="phonenumber" required="required" placeholder="enter Phone Number Here" maxlength="15">
		<label>PassWord :</label>
		<input class="pas" type="password" required="required" name="password" placeholder="Enter New password Here" maxlength="20">
		<br>
		<label>Re-PassWord :</label>
		<input class="repass" type="password" required="required" name="repassword" placeholder="Enter New password Here" maxlength="20">
		<br>
		<a> <input class="button" type="submit" name="Register" value="submit"> </a>

	 
</form>


</body>
</html>

