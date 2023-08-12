<?php include_once("dbconnect.php");

if(isset($_POST['edit1'])){
    $id1 = $_GET['id1'];
    echo $id1; 


        $records = $con->query( "SELECT * From rooms where id='".$id1."'");  // Use select query here 
        $cid = "";
        while($data = mysqli_fetch_array($records))
        {
          echo "Cool";
         echo  $data['block_code'] ."   " .$data['block_name'] ;  // displaying data in option menu

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style_form.css">
  <link rel="stylesheet" type="text/css" href="table.css">
</head>
<body class="bb">
<?php include_once("above_facility.php");?>
<div id="menu"><?php //include_once("menu123.php");?></div>

  


<div class="wrapper">  
  <form action="add_room.php" method="POST">
    <div class="title">
      Record Block Form
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
              <option value="1">Office</option>
              <option value="2">Store</option>
              <option value="3">Class rome</option>
              <option value="4">Dormtery</option>
              <option value="5">toilet</option>
              <option value="6">medical room</option>
              <option value="7">Meeting Hall</option>
              <option value="8">Workshop</option>
              <option value="9">Laboratory</option>
              <option value="10">Cafe</option>
              <option value="11">Cafteria</option>
              <option value="12">Other</option>               
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
<?php include_once("below.php");?>
</body>
</html>