<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_block'])){
    
    $code =    $_POST['code'];
    $bname  =   $_POST['name'];
    $purpose  =   $_POST['purpose'];
    $desc =$_POST['description'];
    $floors =  $_POST['floors'];
    $campus  =  $_POST['campus'];

    $sql = "insert into block (block_code, block_name, purpose,description,floors,campus) values('$code','$bname','$purpose','$desc','$floors','$campus')";
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
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
</head>
<body class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php include_once("../common/menu123.php");?></div>
<div class="wrapper">
  <form action="add_block.php" method="POST">
    <div class="title">
      Record Block Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>Block code</label>
           <input type="text" class="input" name="code">
       </div>

       <div class="inputfield">
          <label>Block name</label>
           <input type="text" class="input" name="name">
       </div>

      <div class="inputfield">
          <label>Block Category</label>
          <div class="custom_select">
            <select name="purpose">
              <option value="">Select category</option>
              <option value="1">Dormitory</option>
              <option value="2">Class</option>
              <option value="3">Class and office</option>
              <option value="4">Library</option>
              <option value="5">office</option>
              <option value="6">medical</option>
              <option value="7">Workshop</option>
              <option value="7">Hall</option>
              <option value="10">Cafe</option>
              <option value="11">Living appartment</option>
              <option value="12">Cafteria</option>
              <option value="13">Other</option>               
            </select>
          </div>
       </div>

       <div class="inputfield">
          <label>Description</label>
           <input type="text" class="input" name="description">
       </div>

       <div class="inputfield">
          <label>Number of floors</label>
           <input type="text" class="input" name="floors">
       </div>
        <div class="inputfield">
          <label>Campus </label>
          <div class="custom_select">
            <select name='campus' id="campus">
              <option disabled selected>Select campus located </option>
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
        <input type="submit" value="Register" class="btn" name="add_block">
      </div>
    </div>
  </form>


          <h1>List of programs in WSU</h1>
            
         <div class="table-responsive" id="program_data">
            <input type='hidden' id='sort' value='asc'>
              <table class='customers' width='100%' cellpadding='10'><tr>
                <th><a class="column_sort"  href="#"  data-order="desc" id="id">ID</a></th>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Block code</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="college">Block name</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="department_id">Description</a></th>
                  <th><a class="column_sort"  href="#"  data-order="desc" id="program_name">Category</a></th>
                    <th><a class="column_sort"  href="#"  data-order="desc" id="edu_level">Campus</a></th>
                        <th>Update</th></tr>

               <?php
              $records = $con->query( "SELECT * From block ");  // Use select query here 
            while($data = mysqli_fetch_array($records))
            {
                echo "<tr><td>".$data['id']."</td><td><a href='view_rooms.php?id='".$data['block_code'].">".$data['block_code']."</a></td><td>".$data['block_name']."</td><td>".$data['description']."</td><td>".$data['campus']."</td><td>"."</td><td><u>Edit</u></td></tr>";
            } 
            echo "</table>";
  ?>
  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>