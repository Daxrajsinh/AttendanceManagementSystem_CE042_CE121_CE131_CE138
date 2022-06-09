<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

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

</head>

<body>

<header>

<h1 class="first" style="font-family:Acme; color:white;"> <span style="font-size:80px;color:springgreen;">A</span>TTENDANCE <span style="font-size:80px;color:springgreen;">M</span>ANANGEMENT <span style="font-size:80px;color:springgreen;">S</span>YSTEM</h1>
  <div class="navbar" style="background-color:grey; color:black;">
  <a href="index.php" style="text-decoration:none; width:17%;">Home</a>
  <a href="students.php" style="text-decoration:none; width:17%;">Students</a>
  <a href="report.php" style="text-decoration:none; width:17%;">Report Section</a>
  <a href="account.php" style="text-decoration:none; width:17%;">My Account</a>
  <a href="../logout.php" style="text-decoration:none; width:17%;">Logout</a>

</div>

</header>

<center>

<div class="row" style="font-size : 20px">
    <div class="content">
    
    <img src="../img/att.png" width="100px">
    
    <div>
      <h3>Logged In Successfully !</h3>
      <h3>Welcome to Home Page</h3></div>
    </div>

</div>

</center>

</body>
</html>
