<?php include_once("common/dbconnect.php");
  if(isset($_POST['add_depart'])){
    $code= $_POST['code'];
    $department = $_POST['name'];
    $college = $_POST['college'];
    $hodid  = $_POST['hod_id'];
    $year  =$_POST['year'];     
    $sql = "insert into department (id, department_id, department_name, college_id, hod_id, year) values(1,'$code','$department','$college','$hodid','$year')";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>  
  <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="my_css/table.css">

</head>
<body>
<?php include_once("above.php");?>
<?php //include_once("common/menu123.php");?>
<div class="wrapper">
  <form method="POST" action="department.php">
    <div class="title">
      Add Department Form
    </div>
    <div class="form">
      <div class="inputfield">
          <label>Department code</label>
          <input type="text" class="input" name="code">
       </div>  
       <div class="inputfield">
          <label>Department name</label>
          <input type="text" class="input" name="name">
       </div>
       <div class="inputfield">
          <label>College</label>
          <div class="custom_select">
            <select name='college' id="college">
              <option disabled selected>Select College/School </option>
                <?php
                  $records = $con->query( "SELECT college_id,college_name From college");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['college_id'] ."'>" .$data['college_name'] ."</option>";  // displaying data in option menu
                      
                  } 
                ?>  
            </select>
          </div>
        </div>
        

       <div class="inputfield">
          <label>head id number</label>
          <input type="text" class="input" name="hod_id">
       </div>


       <div class="inputfield">
          <label>Start year</label>
          <input type="text" class="input" name="year">
       </div>

       
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_depart">
      </div>
    </div>
    </form>


<hr>
  <hr>
  <br>               
      <h1>List of College  in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
    <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="id">Department code</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="name">department name</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="level">college ID</a></th>
    <th><a class="column_sort"  href="#"  data-order="desc" id="office email">Year of start</a></th>  <th>Update</th></tr>
              <?php
                  $records = $con->query( "SELECT * From department");  // Use select query here 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['id']."</td><td>".$data['department_id']."</td><td>".$data['department_name']."</td><td>".$data['college_id']."</td><td>".$data['year']."</td><td><u><a name='edit1' href=department.php?id=".$data['college_id']." >Edit</a></u></td></tr>";
                  }
                echo "</table>";
              ?>
  </div>
</div>
<?php include_once("common/below.php");?>
</body>
</html>