<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<style>
		form
		{
			background-color: rgba(255,255,255,.6);
			margin: 70px auto;
			text-align: center;
			padding: 10px;
			border: 5px;
			line-height: 60px;
			width: 600px;
			height: 650px;
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
			margin-left: 0;
			width: 300px;
			height: 20px;
		}
		.ra{
			width: 100px;
			margin-left: 10px;
		}
		.equal
		{
			margin-left: 83px;
		}	
		.pas{
			margin-left: 40px;
		}
		.age
		{
			margin-left: 110px;
		}
		.country
		{
			margin-left: 35px;
			width: 300px;
		}
		.button
		{
			height:30px;
			color: blue; 
		}
		body{
			background-image:url("back.jpg"); 
			background-repeat: repeat;
			background-size: 100%; 
		}
		.lab1
		{
			color: blue;
			font-weight: bold;
			margin-left: 45px;
			font-size: 50px;
			

		}
		.phonelable
		{
			font-size: 25px;
			margin-left: 20px;
		}
		.agee
		{

		}

	</style>
	</head>
<body>
	<form class="form" id="Registration" action="#"	 method="POST">
		<label class="lab1"  > Registration</label> <br>
		<label>Name :</label>
		<input class="equal" id="Name" type="text" name="username" placeholder="enter your name Here" minlength="8" maxlength="30">
		<br>
		<label>Email :</label>
		<input class="equal" type="email" id="Email" name="Emil" placeholder="email@HTTT.com"  minlength="10"  maxlength="50">
		<br>
		<label>PassWord :</label>
		<input class="pas" type="password" id="PassWord" name="" placeholder="enter your password Here"  minlength="8"  maxlength="20">
		<br>
		<label>Re-PassWord :</label>
		<input class="repass" type="password" id="repassword" name="repassword" placeholder="enter your password Here"  minlength="8"  maxlength="20">
		<br>
		<label  class="phonelable">Phone Number :</label>
		<input type="text" name="phonenumber" id="phonenumber" placeholder="enter Phone Number Here"  minlength="11" maxlength="15">
		<br>
		<label class="agee">Age :</label>
		<input class="age" type="number" name="Age" id="age" placeholder="enter Age Here"  minlength="2"  maxlength="2">
		<br>
		<label>Gender :</label>
		<input class="ra" type="radio" name="gender" value="Male">Male
		<input class="ra" type="radio" name="gender" value="Female">Female
		<br>
		<label>Country :</label>
		<select class="country" >
			<option value="egypt">Egypt</option>
			<option value="egypt">Russia</option>
			<option value="Austria">Austria</option>
			<option value="Canada">Canada</option>	
			<option value="Cameroon">Cameroon</option>
			<option value="Germany">Germany</option>
			<option value="China">China</option>
			<option value="Colombia">Colombia</option>
			<option value="Georgia">Georgia</option>
			<option value="France">France</option>
			<option value="Maldives">Maldives</option>
			<option value="Costa Rica">Costa Rica</option>
			<option value="Brazil">Brazil</option>
			<option value="Bahrain">Bahrain</option>
			<option value="Afghanistan">Afghanistan</option>
			<option value="Ghana">Ghana</option>
			<option value="Greece">Greece</option>
			<option value="Guinea">Guinea</option>
			<option value="Yemen">Yemen</option>
			<option value="United Kingdom">United Kingdom</option>
			<option value="Israel">Israel</option>
			<option value="Italy">Italy</option>
			<option value="Japan">Japan</option>
			<option value="Kazakhstan">Kazakhstan</option>
			<option value="Liberia">Liberia</option>

		</select>
		<br>
		<input class="button" type="submit" name="Register" value="submit">
	 </form>


<script src="jquery-1.x-git.min.js"></script>
<script src="validations.js"></script>
	
	</body>

</html>