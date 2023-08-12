
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
<div class="wrapper"> <a href="swork_unit.php"> Add new work sub category</a>
</div>
          <h1>List of work sub category in WSU</h1>
            
         <div class="table-responsive" id="program_data">
            <input type='hidden' id='sort' value='asc'>
              <table class='customers' width='100%' cellpadding='10'><tr>
                <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Sub category</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="edu_level">Description</a></th>
                        <th>Update</th></tr>

               <?php
               include_once("../common/dbconnect.php");
               $sql = "SELECT * from swork_unit";
               mysqli_set_charset($con,'utf8');
              $records = $con->query( $sql);
                // Use select query here 
              if($records->num_rows>0){
            while($data = mysqli_fetch_array($records))//->fetch_aassoc())
            {
                echo "<tr><td>".$data['id']."</td><td>".$data['soffice_name']."</td><td>".$data['description']."</td><td><u>Edit</u></td></tr>";
            } 
            echo "</table>";
          }else echo "No record available";
  ?>
  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>