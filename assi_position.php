<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Admin"){
    header("Location:/MIS/index.php");
  }
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="my_css/table.css">

</head>
<body class="bb">
<?php 
    include_once("above.php");?>
<div id="menu"><?php //include_once("common/menu123.php");?></div>


 <div class="wrapper">
<hr>
<a href="add_assigned_pos.php" style= "font-size: 25px; padding-bottom: 20px; text-decoration: none;">Add new Assigned position</a>
<hr>
</div>
<div>
<br>               
      <h1>List of employees in position</h1>
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Employee ID</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Position ID</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Term started </a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="level">Term End</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="responsible">Description</a></th>
              
                    
                        <th>Update</th></tr>
        <?php
        include_once("common/dbconnect.php");
            $records = $con->query( "SELECT * From ass_position");  // Use select query here 
            while($data = mysqli_fetch_array($records))
            {
                echo "<tr><td>".$data['id']."</td><td>".$data['emp_id']."</td><td>".$data['pos_id']."</td><td>".$data['start_date']."</td><td>".$data['end_date']."</td><td>".$data['description']."</td><td><u>Edit</u></td></tr>";
            }
          echo "</table>";
        ?>
  </table></div>
<?php include_once("common/below.php");?>
</body>
</html>