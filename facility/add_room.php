<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_room'])){
    
    $code = $_POST['code'];
    $rname =   $_POST['name'];
    $purpose =$_POST['purpose'];
    $desc =$_POST['description'];
    $floors =  $_POST['floors'];
    $status  =  $_POST['status1'];
    $block_code  =  $_POST['block'];
    $sql = "insert into rooms (r_code, room_name,block_code, purpose, description,floor,status) values('$code','$rname','$block_code','$purpose','$desc','$floors','$status')";
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
<?php include_once("above_facility.php");?>
<div id="menu"><?php include_once("../common/menu123.php");?></div>

<div class="wrapper">  
  <form action="add_room.php" method="POST">
    <div class="title">
      Record room form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Room code</label>
           <input type="text" class="input" name="code">
       </div>
       <div class="inputfield">
          <label>Room name</label>
           <input type="text" class="input" name="name">
       </div>
      <div class="inputfield">
          <label>Purpose</label>
          <div class="custom_select">
            <select name="purpose">
              <option value="">Select category</option>
              <option value="Office">Office</option>
              <option value="Store">Store</option>
              <option value="Class room">Class room</option>
              <option value="Dormitory">Dormitory</option>
              <option value="Medical room">Medical room</option>
              <option value="Meeting Hall">Meeting Hall</option>
              <option value="Workshop">Workshop</option>
              <option value="Laboratory">Chemistry Laboratory</option>
              <option value="Laboratory">Biology Laboratory</option>
              <option value="Laboratory">Physics Laboratory</option>
              <option value="Laboratory">ELL Laboratory</option>
              <option value="Laboratory">Engineering Laboratory</option>
              <option value="Laboratory">Computer Laboratory</option>
              <option value="Laboratory">Geology Laboratory</option>
              <option value="Cafe">Cafe</option>
              <option value="Cafteria">Cafteria</option>
              <option value="Library">Library</option>
              <option value="Library">Pharmacy</option>
              <option value="Library">Clinic</option>
              <option value="Toilet">Toilet</option>               
            </select>
          </div>
       </div>

       <div class="inputfield">
          <label>Description</label>
           <input type="text" class="input" name="description">
       </div>

       <div class="inputfield">
          <label>Floor</label>
           <input type="text" class="input" name="floors">
       </div>
      <div class="inputfield">
        <label>Block_code </label>
          <div class="custom_select">
            <select name='block' id="block">
              <option disabled selected>Select block </option>
                <?php
                  $records = $con->query( "SELECT block_code,block_name From block");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['block_code'] ."'>" .$data['block_name'] ."</option>";  // displaying data in option menu
                  } 
                ?>  
           </select>
        </div>
      </div>

       <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" value="1" name="status1" id="status1">
            <span class="checkmark"></span>
          </label>
          <p>Free/occupied</p>
       </div>
      <div class="inputfield">
       <table width="100%"><tr>
          <td> <input type="submit" value="Add" class="btn" name="add_position"></td>
          <td> <input type="submit" value="Update" class="btn" name="edit"></td>
          <td> <input type="submit" value="Delete" class="btn" name="delete"></td>
        </tr></table>
      </div>
  </div>
</form>

  <hr>
  <hr>
  <br>               
      <h1>List of rooms in WSU</h1>     
        <div class="table-responsive" id="program_data">
         <input type='hidden' id='sort' value='asc'>
          <table class='customers' width='100%' cellpadding='10'><tr>
            <th><a class="column_sort"  href="#"  data-order="desc" id="id">Room code</a></th>
              <th><a class="column_sort"  href="#"  data-order="desc" id="name">Room name</a></th>
                <th><a class="column_sort"  href="#"  data-order="desc" id="level">Purpose</a></th>
                  <th><a class="column_sort"  href="#"  data-order="desc" id="responsible">Floor</a></th>
                     <th><a class="column_sort"  href="#"  data-order="desc" id="office email">Block code</a></th>
                        <th>Update</th></tr>
              <?php
                  $records = $con->query( "SELECT * From rooms");  // Use select query here 
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<tr><td>".$data['r_code']."</td><td>".$data['room_name']."</td><td>".$data['purpose']."</td><td>".$data['floor']."</td><td>".$data['block_code']."</td><td><u><a name='edit1' href=add_room.php?id=".$data['id']." >Edit</a></u></td></tr>";
                  }
                echo "</table>";
              ?>
  </div>
<?php include_once("../common/below.php");?>
</body>
</html>