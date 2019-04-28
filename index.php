<?php
session_start();
require_once 'Customer.php';
$obj=new Customer();
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$name=	filter_var($_POST['username'],FILTER_SANITIZE_STRING);
		$phone=	filter_var(	$_POST['phonenumber'],FILTER_SANITIZE_NUMBER_INT);
		$pass=	filter_var(	$_POST['password'],FILTER_SANITIZE_NUMBER_INT);
		$repass=filter_var(	$_POST['repassword'],FILTER_SANITIZE_NUMBER_INT);
		$email=	filter_var(	$_POST['Email'],FILTER_SANITIZE_EMAIL);
		$age=filter_var($_POST['Age'],FILTER_SANITIZE_NUMBER_INT);
		$hashpass=sha1($pass);
		$hash2=sha1($repass);
		
		if (isset($_POST['Register'])) {
		
			foreach ($_POST['country'] as $selected) {
				
					$country=$selected;
				
				}
				$ger=$_POST['gender'];
				if ($ger=='Male') {
				
				$gend='Male';
				}
					else if ($ger=='Female') {
				
				$gend='Female';
				}
				  if( $obj->setCountry($country) && $obj->setname($name)&&  $obj->setphone($phone) &&
    $obj->setemail($email) &&
   $obj->checkpass($hashpass,$hash2) &&
   $obj->setage($age)&& $obj->setgender($gend))
   {
   
    $_SESSION['email']= $obj->insertDB();
   
   	 header('Location:Home.php');
  
   }
   else
   {
   	echo'<script> alert("Invalid Email") </script>';
   }

				
			}

		
			
	

	}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/file.css">
	</head>
<body>


<div class="container">
	<h1 class="text-center">Registration</h1> <br>
	<form class="f" action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label>Name :</label>
		
		<input class="uname form-control" type="text" required="required" name="username" placeholder="enter your name Here" >
		
		<div class="alert alert-danger csal">
			'the length of name must be lager than 8 and less than 30"
		</div>
		<br>
		
		<label>Email :</label>
		<input class="ue form-control" type="email" name="Email" required="required" placeholder="email@HTTT.com" >
		<div class="usere alert alert-danger">
			" Email must be contain @HTTT.com"
		</div>
		<br>
		
		<label>PassWord :</label>
		
		<input class="pa form-control" type="password" required="required" name="password" placeholder="enter your password Here"  >
		<div class="psere alert alert-danger">
			"the length of name must be lager than 8 and less than 30 "
		</div>
		<br>
		
		<label>Re-PassWord :</label>
		
		<input class="rpa form-control" type="password" required="required" name="repassword" placeholder="enter your password Here"  
		>
		<div class="repass alert alert-danger">
			"the length of name must be lager than 8 and less than 30 and the same above"
		</div>
		<br>
		
		<label  class="phonelable">Phone Number :</label>
		
		<input type="text" class="ph form-control" required="required" name="phonenumber" placeholder="enter Phone Number Here"
		 >
		<div class="phone alert alert-danger">
			" the length of phone Number must be lager than 10 and less than 20"
		</div>
		<br>
		
		<label class="agee">Age :</label>
		
		<input class="ag form-control" type="number" required="required" name="Age" placeholder="enter Age Here"  
		 >

		<div class="age alert alert-danger">
			"the AGAE must be larger than 19"
		</div>
		<br>
		
		<label>Gender :</label>
		
		<input class="r" type="radio" required="required" name="gender" value="Male">Male
		<input class="r" type="radio" required="required" name="gender" value="Female">Female
		<br>
		<br>
		
		
		<label>Country :</label>
		<select class="con form-control" required="required" name="country[]">
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

		<div class="coun alert alert-danger">
			"You Must Select The Country"
		</div>
		
		<br>
		<input class="btn btn-block btn-success" type="submit" name="Register" value="S U  B M I T">
	 
	 </form>
</div>
<script src="js/jquery-1.x-git.min.js"></script>

<script src="js/12.js"></script>
<script src="js/jq.js"></script>
	</body>

</html>


	