<?php
if (!isset($_SESSION)){
  session_start();
} 
  if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MIS Institutional data </title>
    <link rel="stylesheet" href="my_css/style.css">
    <link rel="stylesheet" href="../my_css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="../my_css/table.css">
    <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="logo.ico" rel="icon" type="image/favicon.ico"/>
    <link href="my_css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  
  
  
</head>
<body class="bb">
<?php include_once("above_hrm.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper"> <a href="work_unit.php"> Add new work category</a>
</div>
          <h1>List of work category in WSU</h1>
            
         <div class="table-responsive" id="program_data">
            <input type='hidden' id='sort' value='asc'>
              <table class='customers' width='100%' cellpadding='10'><tr>
                <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Category</a></th>
            
            <th><a class="column_sort"  href="#"  data-order="desc" id="edu_level">Description</a></th>
                        <th>Update</th></tr>

               <?php
               include_once("../common/dbconnect.php");
               mysqli_set_charset($con,'utf8');
               $sql = "SELECT * from work_unit";
              $records = $con->query( $sql);
                // Use select query here 
              if($records->num_rows>0){
            while($data = mysqli_fetch_array($records))//->fetch_aassoc())
            {
                echo "<tr><td>".$data['id']."</td><td>".$data['office_name']."</td><td>".$data['description']."</td><td> <a name='edit1' href='edit_category.php?idd=".$data['id']."'>Edit</a>|| <a name='edit11' href='more_detail.php?emp_idd=".$data['id']."'>More detail</a></u></td></tr>";
            } 
            echo "</table>";
          }else echo "No record available";
  ?>
  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>