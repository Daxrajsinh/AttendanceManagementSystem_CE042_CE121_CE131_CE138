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
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<!-- head ended -->

<!-- body started -->
<body>

<!-- Menus started-->
<header>

  <h1 class="first" style="font-family:Acme; color:white;"> <span style="font-size:80px;color:springgreen;">A</span>TTENDANCE <span style="font-size:80px;color:springgreen;">M</span>ANANGEMENT <span style="font-size:80px;color:springgreen;">S</span>YSTEM</h1>
  <div class="navbar" style="background-color:grey; color:black;">
  <a href="index.php" style="text-decoration:none; width:20%;">Home</a>
  <a href="students.php" style="text-decoration:none; width:20%;">Students</a>
  <a href="report.php" style="text-decoration:none; width:20%;">Report Section</a>
  <a href="account.php" style="text-decoration:none; width:20%;">My Account</a>
  <a href="../logout.php" style="text-decoration:none; width:20%;">Logout</a>

</div>

</header>
<center>

<div class="row">

  <div class="content" style="font-size : 20px">
    <h2>Student Report</h2>
    <br>
    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">

  <div class="form-group">

    <label  for="input1" class="col-sm-3 control-label">Select Subject</label>
      <div class="col-sm-4">
      <select name="whichcourse" id="input1">
         <option  value="HW-A">HARDWARE WORKSHOP A</option>
         <option  value="HW-B">HARDWARE WORKSHOP B</option>
        <option  value="PPS-II">PROGRAMMING FOR PROBLEM SOLVING</option>
        <option  value="MATHS">MATHEMATICS</option>
        <option  value="PHYSICS">PHYSICS</option>

      </select>
      </div>

  </div>

        <div class="form-group">
           <label for="input1" class="col-sm-3 control-label">Your Reg. No.</label>
              <div class="col-sm-7">
                  <input type="text" name="sr_id"  class="form-control" id="input1" placeholder="enter your reg. no." />
              </div>
        </div>
        <input type="submit" class="btn btn-danger col-md-3 col-md-offset-7" style="border-radius:0%" value="Find" name="sr_btn" />
    </form>

    <div class="content"><br></div>

    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

   <?php

    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $i=0;
     $count_pre = 0;
     
     $all_query = mysqli_query($link, "SELECT stat_id,count(*) AS countP FROM attendance WHERE attendance.stat_id='$sr_id' AND attendance.course = '$course' AND attendance.st_status='Present'");
     $singleT= mysqli_query($link, "SELECT count(*) AS countT FROM attendance WHERE attendance.stat_id='$sr_id' AND attendance.course = '$course'");
     $count_tot;
     if ($row=mysqli_fetch_row($singleT))
     {
     $count_tot=$row[0];
     }

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
       if($i <= 1){
     ?>
        

     <tbody>
      <tr>
          <td>Registration No.: </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>

      <tr>
        <td>Total Class (Days): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

	<tr>
        <td> Attendance (Percentage)</td>
        <td><?php echo ($data[1] * 100) / $count_tot , '%'; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>
  </div>

</div>

</center>

</body>


</html>
