
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
<body class="bb">
<?php include_once("above_hrm.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper"> <a href="work_label.php"> Add new work position</a>
</div>
          <h1>List of work positions in WSU</h1>
            
         <div class="table-responsive" id="program_data">
            <input type='hidden' id='sort' value='asc'>
              <table class='customers' width='100%' cellpadding='10'><tr>
                <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id"> code</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="college">Position name</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="department_id">Level</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="program_name">Salary</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="edu_level">Description</a></th>
                        <th>Update</th></tr>

               <?php
               include_once("../common/dbconnect.php");
               mysqli_set_charset($con,'utf8');
               $sql = "SELECT * from work_position";
              $records = $con->query( $sql);
                // Use select query here 
              if($records->num_rows>0){
            while($data = mysqli_fetch_array($records))//->fetch_aassoc())
            {
                echo "<tr><td>".$data['id']."</td><td>".$data['code']."</td><td>".$data['work_position']."</a></td><td>".$data['salary']."</td><td>".$data['level']."</td><td>".$data['description']."</td><td><u>Edit</u></td></tr>";
            } 
            echo "</table>";
          }else echo "No record available";
  ?>
  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>