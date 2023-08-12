<?php
if (!isset($_SESSION)){
  session_start();
} 
  if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
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
<?php include_once('above_hrm.php');?>
<?php //include_once('../common/menu123.php');?>
<body>
<div class="wrapper">
  <hr>
  <h3><a href="add_emp.php">Add new employee</a></h3>
  <hr>
  </div>
      <h1>List of admin staff in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'>
            
            <!--
            <tr>
              
              <td><input type="text" class="input" name="category" placeholder="work category"></td>
              <td><input type="text" class="input" name="scategory" placeholder="sub category"></td>
              <td><input type="text" class="input" name="wposition" placeholder="Work position"></td>
            </tr>
          -->
            <tr>
              
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sno</a></th>  
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Emp ID</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">ስም ከነአያት </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Full name </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sex</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Work section</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Work category</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Email</a></th>
            
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Phone</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Campus</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Update</a></th>   
                <?php
                mysqli_set_charset($con,'utf8');  
                $records = $con->query( "SELECT * From employee ORDER BY full_name");  // Use select query here
                $number_of_records= mysqli_num_rows($records);
                
               
    //$records1 = $con->query( "SELECT * From emp_basic where department=". $_SESSION['department']. order by full_name LIMIT . $this_page_starting_limit.",". $result_per_pages);

                $records1 = $con->query("SELECT * From employee where worksection='".$_SESSION['college']."' ORDER BY full_name");
          $i=1;
          while($data = $records1->fetch_assoc()){
            $records11 = $con->query("SELECT office_name From work_unit where id ='".$data['worksection']."'");
              $dataa=$records11->fetch_assoc();

              $records111 = $con->query("SELECT campus_name From campus where id ='".$data['campus']."'");
              $dataaa=$records111->fetch_assoc();

              $records112 = $con->query("SELECT soffice_name From swork_unit where id ='".$data['workcategory']."'");
              $dataa2=$records112->fetch_assoc();

          echo "<tr><td>".$i.
               "</td><td>".$data['emp_id'].
               "</td><td>".$data['fname'].
               "</td><td>".$data['full_name'].
               "</td><td>".$data['gender'].
               "</td><td>".$dataa['office_name'].
               "</td><td>".$dataa2['soffice_name'].
               "</td><td>".$data['email'].
               "</td><td>".$data['phone'].
               "</td><td>".$dataaa['campus_name'].
               "</td><td><u><a name='edit1' href='edit_emp.php?emp_idd=".$data['emp_id']."'>Edit</a>|| <a name='more' href='emp_more.php?emp_id=".$data['emp_id']."'>More detail</a></u></td>".
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