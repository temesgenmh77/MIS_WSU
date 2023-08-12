<?php
  //session_start();
  //if(!isset($_SESSION['role']) && $_SESSION['role'] != "Head"){
    //header("Location: index.php");
      //}
?>
<!DOCTYPE html>
<?php
include_once("common/dbconnect.php");
?>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
<link rel="stylesheet" type="text/css" href="my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="my_css/table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="my_css/jquery.min.js"></script>
</head>

<body class="bb">
<?php include_once('above.php');?>
<?php //include_once('common/menu123.php');?>
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
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Emp ID</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">ስም ከነአያት </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Full name </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sex</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Date of birth</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Disability</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">phone</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">email</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">nationality</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">region</a></th>
             
                <?php
                  $emp = $_GET['emp_id'];
            mysqli_set_charset($con,'utf8'); 
                $records = $con->query( "SELECT * From employee where emp_id='$emp'");  // Use select query here
                $number_of_records= mysqli_num_rows($records);
                
               
    //$records1 = $con->query( "SELECT * From emp_basic where department=". $_SESSION['department']. order by full_name LIMIT . $this_page_starting_limit.",". $result_per_pages);

                $records1 = $con->query("SELECT * From employee");
    
    //$i=1;
          while($data = $records->fetch_assoc()){

          echo "<tr><td>".$data['emp_id'].
              "</td><td>".$data['fname'].
               "</td><td>".$data['full_name'].
               "</td><td>".$data['gender'].
               "</td><td>".$data['dob'].
               "</td><td>".$data['disability'].
               "</td><td>".$data['phone'].
               "</td><td>".$data['email'].
               "</td><td>".$data['nationality'].
               "</td><td>".$data['region'].
               "</td></tr>";
            
            $wpos = $data['workposition']; 
            mysqli_set_charset($con,'utf8');           
            $recordss = $con->query( "SELECT * From work_position where id='$wpos'");
            $dataa =$recordss->fetch_assoc();

               ?>

                           <tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Education Type </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Education level </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Work position </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Level</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Salary</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Hired date</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sub category</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">employee category</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Campus</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Work status</a></th>
</tr>

              <?php
               echo "<tr><td>".$data['edu_type'].
               "</td><td>".$data['edu_level'].
               "</td><td>".$data['workposition'].
               "</td><td>".$data['level'].
               "</td><td>".$data['salary'].
               "</td><td>".$data['hiredate'].
               "</td><td>".$data['workcategory'].
               "</td><td>".$data['emp_cat'].
               "</td><td>".$data['campus'].
               "</td><td>".$data['work_status'].
               "</td></tr>";
               
          }
        echo "</table>";
                ?>
  <br><br>
  </div>
</div>
<?php include_once('common/below.php');?>
</body>
</html>