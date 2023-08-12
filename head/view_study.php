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
  <h3><a href="on_study.php">Add new staffs on study</a></h3>
  <hr>
  </div>
      <h1>List of staff on study</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sno</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Full name </a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">College</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Department</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Educational level</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">University</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Country</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Started date</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Finish date</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Study status</a></th> 
            <th><a class="column_sort"  href="#"  data-order="desc" id="name">Update</a></th>  

                <?php
                  
                
            $records1 = $con->query("SELECT * From on_study where department_id ='".$_SESSION['department']."'");
            if(!$records1){
              echo "Errrrrrrrrrrrrrrrr".$con->error;
            }

        $i=1;
        if ($records1->num_rows > 0)
          while($data = $records1->fetch_assoc()){
            
            $rec1=$con->query(" SELECT full_name from emp_basic where emp_id='".$data['emp_id']."'");
            $data1=$rec1->fetch_assoc();

          echo "<tr><td>".$i."</td><td>".$data1['full_name'].
               "</td><td>".$data['college_id'].
               "</td><td>".$data['department_id'].
               "</td><td>".$data['edu_level'].
               "</td><td>".$data['study_uni'].
               "</td><td>".$data['country'].
               "</td><td>".$data['start_date'].
               "</td><td>".$data['end_date'].
               "</td><td>".$data['complete'].
               "</td><td><u><a name='edit1' href='edit_study.php?emp_idd=".$data['emp_id']."'>Edit</a></u></td>".
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