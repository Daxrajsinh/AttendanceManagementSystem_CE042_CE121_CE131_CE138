<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

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
  
  <link rel="stylesheet" type="text/css" href="../css/main.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

<header>

<h1 class="first" style="font-family:Acme; color:white;"> <span style="font-size:80px;color:springgreen;">A</span>TTENDANCE <span style="font-size:80px;color:springgreen;">M</span>ANANGEMENT <span style="font-size:80px;color:springgreen;">S</span>YSTEM</h1>
  <div class="navbar" style="background-color:grey; color:black;">
  <a href="index.php" style="text-decoration:none; width:12%;">Home</a>
  <a href="students.php" style="text-decoration:none; width:12%;">Students</a>
  <a href="teachers.php" style="text-decoration:none; width:12%;">Faculties</a>
  <a href="attendance.php" style="text-decoration:none; width:12%;">Attendance</a>
  <a href="report.php" style="text-decoration:none; width:12%;">Report</a>
  <a href="../logout.php" style="text-decoration:none; width:12%;">Logout</a>

</div>

</header>

<center>

<div class="row" style="font-size : 20px">

  <div class="content">
    <h2>Teacher List</h2><br>
    
    <table class="table table=stripped">
        <thead>  
          <tr>
            <th scope="col">Teacher ID</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Email</th>
            <th scope="col">Course</th>
          </tr>
        </thead>

      <?php

        $i=0;
        $tcr_query = mysqli_query($link, "SELECT * FROM teachers order by tc_id asc");
        while($tcr_data = mysqli_fetch_array($tcr_query)){
          $i++;

        ?>
          <tbody>
              <tr>
                <td><?php echo $tcr_data['tc_id']; ?></td>
                <td><?php echo $tcr_data['tc_name']; ?></td>
                <td><?php echo $tcr_data['tc_dept']; ?></td>
                <td><?php echo $tcr_data['tc_email']; ?></td>
                <td><?php echo $tcr_data['tc_course']; ?></td>
              </tr>
          </tbody>

          <?php } ?>
          
    </table>

  </div>

</div>

</center>

</body>
</html>
