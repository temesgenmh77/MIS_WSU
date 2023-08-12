<?php
  session_start();
  if(!isset($_SESSION['role']) && $_SESSION['role'] != "Head"){    
    header("Location: ../index.php");
      }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../my_css/jquery.min.js"></script>
  
</head>
<body  class="bb">
  <?php include_once("../common/dbconnect.php");?>
<?php include_once("above_head.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
<hr>  <h3><a href="efficiency.php">Add new efficiency</a></h3>  <hr>
</div>
      <div>        
            <h1>List of staff efficiency in WSU</h1>
         <div class="table-responsive" id="program_data">
            <input type='hidden' id='sort' value='asc'>
      <table class='customers' width='100%' cellpadding='10'><tr>
      <th><a class="column_sort" href="#" data-order="desc" id="id">Emp ID</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="college">College</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="college">Department</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="department_id">Year</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="program_name">Semester</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="edu_level">Result</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="modality">Comment</a></th>
      <th><a class="column_sort" href="#" data-order="desc" id="modality">Updated date</a></th>      
        <th>Update</th></tr>
      <?php
        $records = $con->query( "SELECT * From staff_efficiency where department='".$_SESSION['department']."'");  // Use select query here 
            while($data = mysqli_fetch_array($records))
            {

              $recordss = $con->query( "SELECT * From emp_basic where emp_id='".$data['emp_id']."'");
              $dataa = $recordss->fetch_assoc();

                echo "<tr><td>".$data['emp_id']."</td><td>".$dataa['full_name']."</td><td>".$data['college']."</td><td>".$data['department']."</td><td>".$data['year']."</td><td>".$data['semester']."</td><td>".$data['staff_efficiency']."</td><td>".$data['Comment']."</td><td>".$data['updated_date']."</td><td><u><a name='edit1' href='update_program.php?pid=".$data['id']."'>Edit</a></u></td></tr>";
            } 
            echo "</table>";
      ?>
  </div>
<?php include_once("../common/below.php");?>
</body>
</html>