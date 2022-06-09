<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>


<?php
include('connect.php');

  try{

      if(isset($_POST['signup'])){

        if(empty($_POST['email'])){
          throw new Exception("Email cann't be empty.");
        }

          if(empty($_POST['uname'])){
             throw new Exception("Username cann't be empty.");
          }

            if(empty($_POST['pass'])){
               throw new Exception("Password cann't be empty.");
            }
              
              if(empty($_POST['fname'])){
                 throw new Exception("Username cann't be empty.");
              }
                if(empty($_POST['phone'])){
                   throw new Exception("Username cann't be empty.");
                }
                  if(empty($_POST['type'])){
                     throw new Exception("Username cann't be empty.");
                  }

        $result = mysqli_query($link, "INSERT INTO admininfo(username,password,email,fname,phone,type) VALUES('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
        $success_msg="Signup Successfully!";

  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">

  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../css/main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
      <div class="navbar" style="background-color:grey">
        <a href="signup.php" style="text-decoration:none; width:20%;">Create Users</a>
        <a href="index.php" style="text-decoration:none; width:20%;">Add Student/Teacher</a>
        <a href="v-students.php" style="text-decoration:none; width:20%;">View Students</a>
        <a href="v-teachers.php" style="text-decoration:none; width:20%;">View Teachers</a>
        <a href="../logout.php" style="text-decoration:none; width:20%;">Logout</a>
      </div>

    </header>

<center>
  <br>
<h1>Create User</h1>
<p>    <?php
    if(isset($success_msg)) echo $success_msg;
    if(isset($error_msg)) echo $error_msg;
     ?>
</p>

<div class="content" style="font-size : 20px">

  <div class="row">
   
    <form method="post" class="form-horizontal col-md-6 col-md-offset-3">

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-7">
            <input type="text" name="email"  class="form-control" id="input1" placeholder="your email" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Username</label>
          <div class="col-sm-7">
            <input type="text" name="uname"  class="form-control" id="input1" placeholder="choose username" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-7">
            <input type="password" name="pass"  class="form-control" id="input1" placeholder="choose a strong password" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-7">
            <input type="text" name="fname"  class="form-control" id="input1" placeholder="your full name" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-7">
            <input type="text" name="phone"  class="form-control" id="input1" placeholder="your phone number" />
          </div>
      </div>


      <div class="form-group" class="radio">
      <label for="input1" class="col-sm-3 control-label">Role</label>
      <div class="col-sm-7">
        <label>
          <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
        </label>
            <label>
          <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
        </label>
        <label>
          <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
        </label>
      </div>
      </div>

      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Signup" name="signup" />
    </form>
  </div>
    

</div>

</center>

</body>
</html>
