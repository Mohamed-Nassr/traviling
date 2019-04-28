<?php
session_start();
require_once 'person.php';
$db=new person();
if(isset($_POST['Register'])){
if($db->Login($_POST['Emil'],$_POST['password']))
	{				$_SESSION['email']=$_POST['Emil'];
		if(strstr($_POST['Emil'], 'HTTT.com'))
			header('Location: Home.php');
		else if(strstr($_POST['Emil'], 'admin.com'))
			header('Location:Home_admin.php');
		else if(strstr($_POST['Emil'], 'manager.com'))
			header('Location:managerdesign.php');
		else 
			header('Location:rep.php');

	}
	else
	{
		echo '<script> alert("Sorry password or Email not valid") </script>';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>login</title>
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
			height: 400px;
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
			height: 30px;
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
		.linkforget
		{
			margin-left: auto;
		}
		body
		{
			background: url(back.jpg);
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
	<form class="form"  method="POST">
		<label class="lab1"  >LogIn</label> <br>
		<label>Email :</label>
		<input class="equal" type="text" name="Emil" required="required" placeholder="email@HTTT.com" minlength="12" maxlength="50">
		<br>
		<label>PassWord :</label>
		<input type="password" required="required" name="password" placeholder="enter your password Here" minlength="8" maxlength="20">
		<br>
		<input class="button" type="submit" name="Register" value="LogIn">	
		<br>
		<a href="forget.php" >Forget Password</a>
	<br>
		<a class="linkforget" href="index.php">Create Account</a>
	<br>

</form>

	</body>
</html>	