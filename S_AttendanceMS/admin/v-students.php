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
        $result = mysqli_query($link, "INSERT INTO admininfo(username,password,email,fname,phone,type) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
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
      <div class="navbar" style="background-color:grey;">
        <a href="signup.php" style="text-decoration:none; width:20%;">Create Users</a>
        <a href="index.php" style="text-decoration:none; width:20%;">Add Student/Teacher</a>
        <a href="v-students.php" style="text-decoration:none; width:20%;">View Students</a>
      <a href="v-teachers.php" style="text-decoration:none; width:20%;">View Teachers</a>
        <a href="../logout.php" style="text-decoration:none; width:20%;">Logout</a>
      </div>

    </header>

<center>
<h1>All Students</h1>

<div class="content" style="font-size : 15px">

  <div class="row">
   
    <table class="table table-striped table-hover">
      
        <thead>
        <tr>
          <th scope="col">Registration No.</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Email</th>
        </tr>
        </thead>
     <?php
       
       $i=0;
       
       $all_query = mysqli_query($link, "SELECT * from students ORDER BY st_id asc");
       
       while ($data = mysqli_fetch_array($all_query)) {
         $i++;
       
       ?>
  
       <tr>
         <td><?php echo $data['st_id']; ?></td>
         <td><?php echo $data['st_name']; ?></td>
         <td><?php echo $data['st_dept']; ?></td>
         <td><?php echo $data['st_batch']; ?></td>
         <td><?php echo $data['st_sem']; ?></td>
         <td><?php echo $data['st_email']; ?></td>
       </tr>
  
       <?php 
            } 
              
        ?>
      </table>
    
  </div>
    

</div>

</center>

</body>
<!-- Body ended  -->

</html>
