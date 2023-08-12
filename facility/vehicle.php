<!DOCTYPE html>
<?php 
include_once("dbconnect.php");
if(isset($_POST['vehicle'])){
    $plate = $_POST['plate'];
    $model  = $_POST['model'];
    $cc  = $_POST['cc'];
    $category = $_POST['category'];
    $year  = $_POST['year'];
    $desc  = $_POST['desc'];
    $maitenance  = $_POST['maintenance'];
    $liter = $_POST['liter'];

    $sql = "insert into vehicle 
            (id,plate,model,cc,category,year,description,maintenance,liter) values
            ('1','$plate','$model','$cc','$category','$year','$desc','$maintenance','$liter')" ;
    
    if($con->query($sql)){ echo "Successfully recorded";}
    else{echo "efficiency recorded".$con->error;}
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
      Add vehicle Form
    </div>
    <form action="vehicle.php" method="POST">
    <div class="form">
      <div class="inputfield">
          <label>Plate number</label>
          <input type="text" class="input" name="plate">
       </div>  

       <div class="inputfield">
          <label>Model number</label>
          <input type="text" class="input" name="model">
       </div>
        <div class="inputfield">
          <label>Vehicle Name</label>
          <input type="text" class="input" name="name">
       </div>  
       <div class="inputfield">
          <label>CC</label>
          <input type="text" class="input" name="cc">
       </div>

       <div class="inputfield">
          <label>Manufactured year</label>
          <input type="text" class="input" name="year">
       </div>
      

       <div class="inputfield">

          <label>Category</label>
          <div class="custom_select">
          <select name="category">
              <option value="" selected="selected" disabled="disabled">Select vehicle type</option>
              <option value="Bus">Bus</option>
              <option value="Picup">Pic Up</option>
              <option value="Hard top">Hard top</option>
              <option value="Trucker">Trucker</option>
              <option value="Ambulance">Ambulance</option>
              <option value="Tracter">Tracter</option> 
          </select>
       </div>
   </div>

       <div class="inputfield">
          <label>Description</label>
          <input type="text" class="input" name="desc">
       </div>

       <div class="inputfield">
          <label>Liter per KM</label>
          <input type="text" class="input" name="liter">
       </div>
       <div class="inputfield">
          <label>Annual manitenace date</label>
          <input type="text" class="input" namae="maintenance">
       </div>

      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="vehicle">
      </div>
    </div>
    </form>
</div>
<?php include_once("below.php");?>
</body>
</html>