<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
  }
?>



<?php include_once("../common/dbconnect.php");
   
    mysqli_set_charset($con,'utf8');

    /////////////////////////////////////////////////
    $emp = $_SESSION['emp_id'];
    $query = $con->query("SELECT * from account where emp_id='$emp'");
      $row = $query->fetch_assoc();

      

    

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
 
<body class="bb">
<?php include_once("above_head.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
  <form action="forget_pass.php" method="POST">
    <div class="title">
      View user profile
    </div>
    <div class="form">

       <div class="inputfield">
          <label>Emp id</label>
           <input type="text" class="input" name="code" value="<?php echo $_SESSION['emp_id'];?>" readonly="readonly">
       </div>

  


       <div class="inputfield">
          <label>Full name</label>
           <input type="text" class="input" name="code" value=" <?php echo $_SESSION['name'];?>" readonly="readonly">
       </div>


     <div class="inputfield">
          <label>username</label>
           <input type="text" class="input" name="code" value="<?php echo $row['username'];?>" readonly="readonly">
       </div>
       <div class="inputfield">
          <label>User role</label>
           <input type="text" class="input" name="code" value="<?php echo $row['category'];?>" readonly="readonly">
       </div>

       <div class="inputfield">
          <label> Account status</label>
           <input type="Text" class="input" name="name"  value="<?php echo $row['status'];?>" readonly="readonly">
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