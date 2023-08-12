<?php
if (!isset($_SESSION)){
  session_start();
} 
  if(!isset($_SESSION['role']) && $_SESSION['role'] != "HRM"){
    header("Location:../index.php");
  }
?>


<?php include_once("../common/dbconnect.php");
  
  if(isset($_POST['update_category'])){    
    mysqli_set_charset($con,'utf8');    
    $oname = $_POST['code'];
    $description = $_POST['name'];
    $id = $_POST['code1'];

    $sql = "UPDATE work_unit set office_name='$oname', description='$description' where id='$id'";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }else {echo "Category Successful added!";header("Location:view_category.php");}
  }
  $id = $_GET['idd'];
  $sql = "SELECT * from work_unit WHERE id='$id'";
  mysqli_set_charset($con,'utf8');
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
    $office = $row['office_name']; 
    $desc =  $row['description'];
    $id =  $row['id'];

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
  <form action="edit_category.php" method="POST">
    <div class="title">
      Update work category Form
    </div>
    <div class="form">
      <input type="text" class="input" hidden = "hidden" name="code1" value="<?php echo $id; ?>">
       <div class="inputfield">
          <label>ዋና የሥራ ክፍል</label>
           <input type="text" class="input" name="code" value="<?php echo $office; ?>">
       </div>
       <div class="inputfield">
          <label>ማብራርያ</label>
           <input type="text" class="input" name="name"  value="<?php echo $desc;?>">
       </div>
      <div class="inputfield">
        <input type="submit" value="Update category" class="btn" name="update_category">
      </div>
    </div>
  </form>


  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>