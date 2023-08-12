<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "Head")){
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<?php
include_once("../common/dbconnect.php");
?>
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

<body class="bb">
<?php include_once('above_head.php');?>
<?php //include_once('../common/menu123.php');?>
<body>
<div class="wrapper">
  <hr>
  <h3><a href="add_staff.php">Add new staff</a></h3>
  <hr>
  </div>
      <h1>Detail of a staff in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sno</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Full name </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">College</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Department</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Email</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Phone</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Acad.rank</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Date of birth</a></th>  
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">hired date</a></th>   
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sex</a></th></tr>
                <?php
                  
                $records = $con->query( "SELECT * From emp_basic where department='".$_SESSION['department']."'");  // Use select query here
                $number_of_records= mysqli_num_rows($records);
                
               
    //$records1 = $con->query( "SELECT * From emp_basic where department=". $_SESSION['department']. order by full_name LIMIT . $this_page_starting_limit.",". $result_per_pages);

                $records1 = $con->query("SELECT * From emp_basic where emp_id ='".$_GET['emp_idd']."'");
    
    $i=1;
          while($data = $records1->fetch_assoc()){
          echo "<tr><td>".$i."</td><td>".$data['full_name'].
               "</td><td>".$data['college'].
               "</td><td>".$data['department'].
               "</td><td>".$data['email'].
               "</td><td>".$data['phone'].
               "</td><td>".$data['rank'].
               "</td><td>".$data['dob'].
               "</td><td>".$data['hired_date'].
               "</td><td>".$data['sex'].
               "</td></tr><tr>";
?>
            
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Disable </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">edu level </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Category</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Nationality</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Region</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Elip</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">HDP</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Campus</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Work status</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Update</a></th>   
      </tr>      

<?php

               echo "<tr><td>".$data['Disability'].
               "</td><td>".$data['level'].
               "</td><td>".$data['category'].
               "</td><td>".$data['nation'].
               "</td><td>".$data['region'].
               "</td><td>".$data['elip'].
               "</td><td>".$data['hdp'].
               "</td><td>".$data['campus_id'].
               "</td><td>".$data['work_status'].
               

               "</td><td><u><a name='edit1' href='edit_staff.php?emp_idd=".$data['emp_id']."'>Edit</a>|| <a name='edit1' href='more_detail.php?emp_idd=".$data['emp_id']."'>More detail</a></u></td>".
               "</tr>";
               $i++;
          }
        echo "</table>";
                ?>
                
              <br><br>
  </div>
</div>
<?php include_once('../common/below.php');?>
</body>
</html>