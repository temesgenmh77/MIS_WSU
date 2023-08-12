<?php
  session_start();
  if(!isset($_SESSION['role']) && $_SESSION['role'] != "Head"){
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
      <h1>List of staff in WSU</h1>     
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
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Update</a></th>   
                <?php
                  
                $records = $con->query( "SELECT * From emp_basic where department='".$_SESSION['department']."'");
                  // Use select query here
                $number_of_records= mysqli_num_rows($records);
                
               
    //$records1 = $con->query( "SELECT * From emp_basic where department=". $_SESSION['department']. order by full_name LIMIT . $this_page_starting_limit.",". $result_per_pages);

                $sql="SELECT * From emp_basic where department ='".$_SESSION['department']."'";
                $records1 = $con->query("SELECT * From emp_basic where department ='".$_SESSION['department']."'");
                echo 
    
    $i=1;
          while($data = $records1->fetch_assoc()){
          echo "<tr><td>".$i."</td><td>".$data['full_name'].
               "</td><td>".$data['college'].
               "</td><td>".$data['department'].
               "</td><td>".$data['email'].
               "</td><td>".$data['phone'].
               "</td><td>".$data['rank'].
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