<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
  }
?>

<?php include_once("../common/dbconnect.php");
  if(isset($_POST['change'])){    
    mysqli_set_charset($con,'utf8');
    $opass  =   $_POST['code'];
    $npass  =   $_POST['name'];
    $rpass = $_POST['neww'];

    /////////////////////////////////////////////////
    $emp = $_SESSION['emp_id'];
    $query = $con->query("SELECT * from account where emp_id='$emp'");
      $row = $query->fetch_assoc();
      if($row['password'] == $opass){ 
        if($npass == $rpass){
          $sql = "UPDATE account set password='$npass' where emp_id='$emp'";
          if(!$con->query($sql)){
            echo "Error: ".$con->error;
          }else {echo "Password changed successful!"; }
        }else{ echo "Your password mismatch";}
      }else{ echo "Your old password is incorrect";}
}
    

    ///////////////////////////////////////////


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" href="../my_css/style.css">
    <link rel="stylesheet" href="../my_css/style_menu.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>
</head>
<body class="bb">
<?php include_once("above_hrm.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
  <form action="forget_pass.php" method="POST">
    <div class="title">
      Change password  Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>Old password</label>
           <input type="password" class="input" name="code">
       </div>
       <div class="inputfield">
          <label>New password</label>
           <input type="password" class="input" name="name">
       </div>
              <div class="inputfield">
          <label>Repeat new password</label>
           <input type="password" class="input" name="neww">
       </div>

      <div class="inputfield">
        <input type="submit" value="Change password" class="btn" name="change">
      </div>
    </div>
  </form>


  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>