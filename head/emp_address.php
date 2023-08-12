<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "Head")){
    header("Location: ../index.php");
  }
?>
<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_address'])){
    $eid = $_POST['eid'];
    $natio  = $_POST['nation'];
    $region = $_POST['region'];
    $iemail = $_POST['iemail'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];
    $sql = "insert into address (emp_id,nationality,region,iemail,email,phone) values('$eid','$natio','$region','$iemail','$email','$phone')";
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
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">

</head>
<body class="bb">
  <?php include_once("above_head.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
  <form method="POST" action="emp_address.php">
    <div class="title">
      Registration Bsic Info
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Employee ID</label>
          <input type="text" class="input" name="eid">
       </div>
       <div class="inputfield">
          <label>Nationality</label>
          <input type="text" class="input" name="nation">
       </div>  
        <div class="inputfield">
          <label>Region</label>
          <div class="custom_select">
            <select name="region">
              <option value="">Select</option>
              <option value="Amh">Amhara</option>
              <option value="Oro">Oromia</option>
              <option value="SNNPR">Souther Nation</option>
              <option value="Oro">Harar</option>
              <option value="Amh">Afar</option>
              <option value="Oro">Somali</option>
              <option value="Amh">Sidama</option>
              <option value="Oro">Benishangul Gumuz</option>
              <option value="SNNPR">Addis Ababa</option>
              <option value="Oro">DireDawa</option>
              <option value="Amh">Gambella</option>
              <option value="Oro">Tigray</option>
            </select>
          </div>
       </div>

        <div class="inputfield">
          <label>Institutional Email</label>
          <input type="text" class="input" name="iemail">
       </div>

        <div class="inputfield">
          <label>Other Email</label>
          <input type="text" class="input" name="email">
       </div>

      <div class="inputfield">
          <label>Phone Number</label>
          <input type="phone" class="input" name="phone">
       </div>

      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_address">
      </div>
    </div>
  </form>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>