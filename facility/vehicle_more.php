<!DOCTYPE html>
<?php 
include_once("dbconnect.php");
if(isset($_POST['add_copoun'])){
    $plate = $_POST['plate'];
    $reading  = $_POST['milage'];
    $copoun  = $_POST['copoun'];
    $amount = $_POST['amount'];
    $plan  = $_POST['plan'];
    $approved  = $_POST['approved'];
    $requested  = $_POST['requested'];
    //$datee = $_POST['datee'];

    $sql = "insert into copoun 
            (plate,reading,copoun,amount,plan,approved,requested,datee) values
            ('$plate','$reading','$copoun','$amount','$plan','$approved','$requested',curdate())" ;
    
    if($con->query($sql)){ echo "Successfully recorded";}
    else{echo "Failed to recorded".$con->error;}
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style_form.css">
</head>
<body class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php include_once("menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Add Copoun form
    </div>
    <form action="vehicle_more.php" method="POST">
    <div class="form">
        <div class="inputfield">
          <label>Plate number</label>
          <div class="custom_select">
            <select name='plate' id="plate">
              <option disabled selected>Select plate number </option>
                <?php
                  $records = $con->query( "SELECT plate From vehicle");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['plate'] ."'>" .$data['plate'] ."</option>";  // displaying data in option menu
                      //echo $data['college_id'];
                  } 
                ?>  
            </select>
          </div>
        </div>
 

       <div class="inputfield">
          <label>Current reading (km)</label>
          <input type="text" class="input" name="milage">
       </div>
       <div class="inputfield">
          <label>Copoun number</label>
          <input type="text" class="input" name="copoun">
       </div>

       <div class="inputfield">
          <label>Copoun amount</label>
          <input type="text" class="input" name="amount">
       </div>
      <div class="inputfield">
          <label>Planned travel(From - To)</label>
          <input type="text" class="input" name="plan">
       </div>
       <div class="inputfield">
          <label>Requested by</label>
          <input type="text" class="input" name="requested">
       </div>

       <div class="inputfield">
          <label>Approved by:</label>
          <input type="text" class="input" name="approved">
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_copoun">
      </div>
    </div>
  </form>
</div>
<?php include_once("below.php");?>
</body>
</html>