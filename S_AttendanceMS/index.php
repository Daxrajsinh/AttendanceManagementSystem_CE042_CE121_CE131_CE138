<?php

if(isset($_POST['login']))
{
	try{
		if(empty($_POST['username'])){
			throw new Exception("Username is required!");
			
		}
		if(empty($_POST['password'])){
			throw new Exception("Password is required!");
			
		}

		include ('connect.php');

		$row=0;
		$result=mysqli_query($link, "SELECT * FROM admininfo WHERE username='$_POST[username]' AND password='$_POST[password]' AND type='$_POST[type]'");

		$row=mysqli_num_rows($result);

		if($row>0 && $_POST["type"] == 'teacher'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: teacher/index.php');
		}

		else if($row>0 &&  $_POST["type"] == 'student'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: student/index.php');
		}

		else if($row>0 && $_POST["type"] == 'admin'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: admin/index.php');
		}

		else{
			throw new Exception("Username,Password or Role is wrong, try again!");
			
			header('location: login.php');
		}
	}

	catch(Exception $e){
		$error_msg=$e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title class="first">Attendance Management System</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
</head>
<style>
	* {
		font-family: 'El Messiri', sans-serif;
	}
	.first {
    background-color:#171717;
		padding:15px;
		font-size:50px;
		margin:0px;
		letter-spacing:2px;
	}
  </style>
<body>
	<center>

<header>

 <center> 
<h1 class="first" style="font-family:Acme; color:white;"> <span style="font-size:80px;color:springgreen;">A</span>TTENDANCE  &nbsp<span style="font-size:80px;color:springgreen;">M</span>ANANGEMENT &nbsp<span style="font-size:80px;color:springgreen;">S</span>YSTEM</h1>
</center>
</header>

<h3 style="margin-bottom:0px"> Login Panel</h3>

<?php
if(isset($error_msg))
{
	echo $error_msg;
}
?>

<div class="content">
	<div class="row" style="font-size : 20px">

		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<div class="form-group">
			    <label for="input1" class="col-sm-3 control-label">Username :</label>
			    <div class="col-sm-7">
			      <input type="text" name="username"  class="form-control" id="input1" placeholder="Your Username" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-3 control-label">Password :</label>
			    <div class="col-sm-7">
			      <input type="password" name="password"  class="form-control" id="input1" placeholder="Your Password" />
			    </div>
			</div>


			<div class="form-group" class="radio">
			<label for="input1" class="col-sm-3 control-label">Login As:</label>
			<div class="col-sm-6"><br>
			  <label>
			    <input type="radio" name="type" id="optionsRadios1" value="admin" checked> Admin &nbsp
			  </label>
			  	  <label>
			    <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher  &nbsp
			  </label>
			  <label>
			    <input type="radio" name="type" id="optionsRadios1" value="student"> Student 
			  </label>
			</div>
			</div><br>
			<input type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="border-radius:0%" value="Login" name="login" />
		</form>
	</div>
</div>

</center>
</body>
</html>	