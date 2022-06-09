<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php
    include('connect.php');
    try{
      
    if(isset($_POST['att'])){

      $course = $_POST['whichcourse'];

      foreach ($_POST['st_status'] as $i => $st_status) {
        
        $stat_id = $_POST['stat_id'][$i];
        $dp = date('Y-m-d');
        $course = $_POST['whichcourse'];
        
        $stat = mysqli_query($link, "INSERT INTO attendance(stat_id,course,st_status,stat_date) VALUES('$stat_id','$course','$st_status','$dp')");
        
        $att_msg = "Attendance Recorded.";

      }



    }
  }
  catch(Execption $e){
    $error_msg = $e->$getMessage();
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">

  <!-- All Fonts -->
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
    <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
    <br>

    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center> 
    
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

     <div class="form-group">

                <label>Enter Batch</label>
                <input type="text" name="whichbatch" id="input2" placeholder="Eg. A1, A2, B3...">
              </div>
               
     <input type="submit" class="btn btn-danger col-md-2 col-md-offset-5" style="border-radius:0%" value="Search" name="batch" />

    </form>

    <div class="content"></div>
    <form action="" method="post">

      <div class="form-group">

        <label >Select Subject</label>
              <select name="whichcourse" id="input1">
              <option  value="HW-A">HARDWARE WORKSHOP A</option>
         <option  value="HW-B">HARDWARE WORKSHOP B</option>
        <option  value="PPS-II">PROGRAMMING FOR PROBLEM SOLVING</option>
        <option  value="MATHS">MATHEMATICS</option>
        <option  value="PHYSICS">PHYSICS</option>
              </select>

      </div>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Reg. No.</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['batch'])){

     $i=0;
     $radio = 0;
     $batch = $_POST['whichbatch'];
     $all_query = mysqli_query($link, "SELECT * FROM students WHERE students.st_batch = '$batch' order by st_id asc");

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     ?>
  <body>
     <tr>
       <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
       <td>
         <label>Present</label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" checked>
         <label>Absent </label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" >
       </td>
     </tr>
  </body>

     <?php

        $radio++;
      } 
}
      ?>
    </table>

    <center><br>
    <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Save!" name="att" />
  </center>

</form>
  </div>

</div>

</center>

</body>
</html>
