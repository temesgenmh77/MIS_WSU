<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_category'])){    
    mysqli_set_charset($con,'utf8');
    $oname  =   $_POST['code'];
    $description = $_POST['name'];
    $sql = "insert into work_unit (office_name, description) values('$oname','$description')";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }else {echo "Sub category Successful added!";header("Location:view_category.php");}
  }
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
  <form action="work_unit.php" method="POST">
    <div class="title">
      Record work category Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>ዋና የሥራ ክፍል</label>
           <input type="text" class="input" name="code">
       </div>
       <div class="inputfield">
          <label>ማብራርያ</label>
           <input type="text" class="input" name="name">
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_category">
      </div>
    </div>
  </form>


  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>