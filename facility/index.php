<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "facility")){
    header("Location: ../index.php");
  }
?>

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
  <link href="../my_css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
  <link rel="stylesheet" type="text/css" href="../my_css/style.css">
  <link rel="stylesheet" type="text/css" href="../my_css/style_menu.css"
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>

</head>
<body class="bb">
<?php include_once("above_facility.php");?>
<div id="menu"><?php include_once("../common/menu123.php");?></div>


<!--Content comes here--> content


<?php include_once("../common/below.php");?>
</body>
</html>