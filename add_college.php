<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Admin"){
    header("Location:/MIS/index.php");
  }
?><?php include_once("common/dbconnect.php");
  if(isset($_POST['add_college'])){
    $college_name = $_POST['college_name'];
    $college_id = $_POST['college_code'];
    $b  =$_POST['band'];
    $c  = $_POST['campus'];
    $y = $_POST['year']; 
    $sql = "insert into college (college_id, college_name, band, campus, year) values('$college_id','$college_name','$b','$c','$y')";
    if(!$con->query($sql)){
      echo "Successful".$con->error;
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
<body class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php //include_once("common/menu123.php");?></div>
<form method="POST" action="add_college.php">
<div class="wrapper">
    <div class="title">
      Add college of School Form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>College/School Name</label>
          <input type="text" class="input" name="college_name">
       </div>  

        <div class="inputfield">
          <label>College/School code</label>
          <input type="text" class="input" name="college_code">
       </div>  
      
       <div class="inputfield">
          <label>Band</label>
          <div class="custom_select">
            <select name="band">
              <option value="">Select</option>
              <option value="male">Engineering</option>
              <option value="1">Natural and computational science</option>
              <option value="female">Agriculture and veterniary science</option>
              <option value="female">Social science and humanitarian</option>
              <option value="female">Medicine and public health</option>
              <option value="female">Other</option>
            </select>
          </div>
       </div>  
    <div class="inputfield">
          <label>Campus</label>
          <div class="custom_select">
            <select name='campus' id="campus">
              <option><---Select campus---> </option>
                <?php
                  $records = $con->query( "SELECT id,campus_name From campus");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['id'] ."'>" .$data['campus_name'] ."</option>";  // displaying data in option menu
                      
                  } 
                ?>  
            </select>
          </div>
        </div>

       <div class="inputfield">
          <label>Year of started</label>
          <input type="text" class="input" name="year">
       </div>  

      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_college">
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
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">College name</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">College code</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">campus</a></th>
                  <th><a class="column_sort"  href="#"  data-order="desc" id="responsible">Band</a></th>
                    <th><a class="column_sort"  href="#"  data-order="desc" id="office email">Year of start</a></th>
                        <th>Update</th></tr>
              <?php
                  $records = $con->query( "SELECT * From college");  // Use select query here 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['id']."</td><td>".$data['college_name']."</td><td>".$data['college_id']."</td><td>".$data['band']."</td><td>".$data['campus']."</td><td>".$data['year']."</td><td><u><a name='edit1' href=department.php?id=".$data['college_id']." >Edit</a></u></td></tr>";
                  }
                echo "</table>";
              ?>
  </div>
</div>

<?php include_once("common/below.php");?>
</body>
</html>