<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "Head")){
    header("Location: ../index.php");
  }
?>

<?php include_once("../common/dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
</head>
<body class="bb">
<?php include_once("above_head.php"); ?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
    <div class="">
      <table width="100%">
        <tr><td>
          <a href="view_details.php?college=College/Schools"> College/Schools</a></td><td>
          <a href="view_details.php?block=Blocks">Blocks</a></td><td>
          <a href="view_details.php?vehicle=Vehicle">Vehicle</a></td><td>
          <a href="view_details.php?id=Construction">Construction</a></td><td>
          <a href="view_details.php?id=Appartment">Appartments</a></td>
        </tr>
      </table>
    </div> 
    <hr>
<hr>
<br>          
<?php
if(isset($_GET['college'])){
?>     
      <h1>List of position in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Colleges and Schools name</a></th></tr>
          <?php
                $records = $con->query( "SELECT * From college");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td><a href='view_details.php?data=".$data['college_id']."'>".$data['college_name']."</a></td></tr>";
                  }
                  echo"</table>";

                }
              }
            
            
if(isset($_GET['block'])){
              ?>
                      <h1>List of Blocks in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Block code</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Block name</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Campus</a></th>
          </tr>
          <?php
          $i = 1;
          $campus[0]="";
          $campus_id[0]="";
          $records = $con->query( "SELECT * From campus");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                    $campus[$i] =$data['id'];
                    $campus_id[$i]=$data['campus_name']; 
                    $i++;
                
                  }
                }


                $records = $con->query( "SELECT * From block");  // Use select query here
                if($records){ 
                  
                  while($data = mysqli_fetch_array($records))
                  {
                   
                      echo "<tr><td><a href='view_details.php?block_code=".$data['block_code']."'>".$data['block_code']."</a></td><td>".$data['block_name']."</td><td>".$campus_id[$data['campus']]."</td></tr>";
                  }
                  echo"</table>";
                }
              }

if(isset($_GET['block_code'])){
?>
    <h1>List of Rooms in block <?php echo $_GET['block_code'];?></h1> 
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Room code</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Room name</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Purpose</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Floor</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Status</a></th>
          </tr>
          <?php

                $records = $con->query( "SELECT * From rooms where block_code='".$_GET['block_code']."'");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['r_code']."</td><td>".$data['room_name']."</td><td>".$data['purpose']."</td><td>".$data['floor']."</td><td>".$data['status']."</td></tr>";
                  }
                  echo"</table>";
                }
              }

if(isset($_GET['vehicle'])){
?>
  
                      <h1>List of Vehicles in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Plate nuber</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Model</a></th>

            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Category</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">CC</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Mnf date</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Liter/KM </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">maintenance</a></th>
          </tr>
          <?php

                $records = $con->query( "SELECT * From vehicle");  // Use select query here
                if($records){ 
                  
                  while($data = mysqli_fetch_array($records))
                  {
                   
                      echo "<tr><td><a href='view_details.php?plate=".$data['plate']."'>".$data['plate']."</a></td><td>".$data['model']."</a></td><td>".$data['category']."</a></td><td>".$data['cc']."</a></td><td>".$data['year']."</td><td>".$data['liter']."</td><td>".$data['maintenance']."</td></tr>";
                  }
                  echo"</table>";
                }
              }

if(isset($_GET['plate'])){
?>
    <h1>Details of vehicle with Plate: <?php echo $_GET['plate'];?></h1> 
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Plate</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Reading</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Copoun number</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="id">Amount</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="id">Travel destination</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="id">Description</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="id">Date</a></th>
          </tr>
          <?php

                $records = $con->query( "SELECT * From copoun where plate='".$_GET['plate']."'");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {

                      echo "<tr><td>".$data['plate']."</td><td>".$data['reading']."</td><td>".$data['copoun']."</td><td>".$data['amount']."</td><td>".$data['plan']."</td><td>".$data['requested']."</td><td>".$data['datee']."</td></tr>";
                  }
                  echo"</table>";
                }
              }

if(isset($_GET['data'])){
?>
    <h1>List of Department in <?php echo $_GET['data']; ?> </h1> 
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Departments</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Programs</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Staffs</a></th>
          </tr>
          <?php
                $records = $con->query( "SELECT * From department where college_id='".$_GET['data']."'");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['department_name']."</a></td><td><a href='view_details.php?prog=".$data['department_id']."'>Programs</a></td><td><a href='view_details.php?emps=".$data['department_id']."'>Staffs</a>".
                      "</td></tr>";
                  }
                  echo"</table>";
                }
              }
    if(isset($_GET['emps'])){
              ?>
    <h1>List of Staff</h1>
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
        <table class='customers' width='100%' cellpadding='10'><tr>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">S.No</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">Full name</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sex</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">College</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">Department</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">Edu. level</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="name">Acad. rank</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="level">Status</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="level">More</a></th>
        </tr>
        <?php
          $i=1;
                $records = $con->query( "SELECT * from emp_basic where department='".$_GET['emps']."'  order by full_name");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$i."</td><td>".$data['full_name']."</td><td>".$data['sex']."</td><td>".$data['college']."</td><td>".$data['department']."</td><td>".$data['level']."</td><td>".$data['rank']."</td><td>".$data['work_status']."</td><td><u><a name='more' href=view_details.php?emp_idd=".$data['emp_id']." >More detail</a></u></td></tr>";
                      $i++;
                  }
                  echo"</table>";

                }
              }else if (isset($_GET['prog'])) {
?>
    <h1>List of Program in <?=$_GET['prog']?> department</h1>
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
        <table class='customers' width='100%' cellpadding='10'><tr>
        <th><a class="column_sort"  href="#"  data-order="desc" id="id">S.No</a></th>
        <th><a class="column_sort"  href="#"  data-order="desc" id="id">Program name</a></th>
        <th><a class="column_sort"  href="#"  data-order="desc" id="id">Education level</a></th>
         <th><a class="column_sort"  href="#"  data-order="desc" id="id">Modality</a></th>
        </tr>
        <?php
          $i=1;
                $records = $con->query( "SELECT * from program where department_id='".$_GET['prog']."'");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$i."</td><td>".$data['program_name']."</td><td>".$data['edu_level']."</td><td>".$data['modality']."</td></tr>";
                      $i++;
                  }
                  echo"</table>";
                }
              }

if(isset($_GET['emp_idd'])){

?>


       <h1>The detail  of the staff</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Full name</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sex</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">College</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Department</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Edu. level</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Acad. rank</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">Status</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">More</a></th>
          </tr>
          <?php
                $records = $con->query( "SELECT * from emp_basic where emp_id='".$_GET['emp_idd']."'");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['full_name']."</td><td>".$data['sex']."</td><td>".$data['college']."</td><td>".$data['department']."</td><td>".$data['level']."</td><td>".$data['rank']."</td><td>".$data['work_status']."</td><td><u><a name='more' href=edit_staff.php?emp_idd=".$data['emp_id'].":".$data['position_id'].">Edit</a></u></td></tr>";
                  }
                    echo"</table>";

                }

?>
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Nation</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Region</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Email</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Phone</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Position</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">ELIP</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">HDP</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">Campus</a></th>
</tr>
  <?php   
        $records = $con->query( "SELECT * from emp_basic where emp_id='".$_GET['emp_idd']."'");  // Use select query here
        if($records){ 
          while($data = mysqli_fetch_array($records))
          {
              echo "<tr><td>".$data['nation']."</td><td>".$data['region']."</td><td>".$data['email']."</td><td>".$data['phone']."</td><td>".$data['position_id']."</td><td>".$data['elip']."</td><td>".$data['hdp']."</td><td>".$data['campus_id']."</td></tr>";
          }
        echo"</table>";
      }
?>  
       <h1>The Efficiency of the staff</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Semester</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Year</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Result</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Comment</a></th>
          </tr>
          <?php
            $records = $con->query( "SELECT * from staff_efficiency where emp_id='".$_GET['emp_idd']."'");  // Use select query here
            if($records){ 
              while($data = mysqli_fetch_array($records))
              {
                  echo "<tr><td>".$data['semester']."</td><td>".$data['year']."</td><td>".$data['staff_efficiency']."</td><td>".$data['Comment']."</td></tr>";
              }
              echo"</table>";
          }

        ?>              
 <h1> On study detail</h1>     
  <div class="table-responsive" id="program_data">
   <input type='hidden' id='sort' value='asc'>
    <table class='customers' width='100%' cellpadding='10'><tr>
      <th><a class="column_sort"  href="#"  data-order="desc" id="id">Education level</a></th>
      <th><a class="column_sort"  href="#"  data-order="desc" id="id">study university</a></th>
      <th><a class="column_sort"  href="#"  data-order="desc" id="id">Country</a></th>
      <th><a class="column_sort"  href="#"  data-order="desc" id="id">Modality</a></th>
      <th><a class="column_sort"  href="#"  data-order="desc" id="id">Started date</a></th>
      <th><a class="column_sort"  href="#"  data-order="desc" id="id">End date</a></th>
          </tr>
          <?php
                $records = $con->query( "SELECT * from on_study where emp_id='".$_GET['emp_idd']."'");  // Use select query here
                if($records){ 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['edu_level']."</td><td>".$data['study_uni']."</td><td>".$data['country']."</td><td>".$data['modality']."</td><td>".$data['start_date']."</td><td>".$data['end_date']."</td></tr>";
                  }
                  echo"</table>";
              }
              else{echo "No....";}
              
            }
              ?>
<?php include_once("../common/below.php");
///////////////////////////////////////////////////// about Block
?>


</body>
</html>