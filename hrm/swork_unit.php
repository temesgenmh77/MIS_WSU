<?php include_once("../common/dbconnect.php");
  if(isset($_POST['add_sunit'])){    

    
    $soname  = $_POST['sunit'];
    $description = $_POST['description'];
    $sql = "insert into swork_unit (soffice_name,description) 
                                    values('$soname','$description')";
    if(!$con->query($sql)){
      echo "Error: ".$con->error;
    }else {echo "Employement category Successful added!";header("Location:view_subcategory.php");}
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MIS Institutional data </title>
    <link rel="stylesheet" href="my_css/style.css">
    <link rel="stylesheet" href="../my_css/style_menu.css">
    <link rel="stylesheet" type="text/css" href="../my_css/table.css">
    <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="logo.ico" rel="icon" type="image/favicon.ico"/>
    <link href="my_css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  
  
  
</head>
<body class="bb">
<?php include_once("above_hrm.php");?>
<div id="menu"><?php //include_once("../common/menu123.php");?></div>
<div class="wrapper">
  <form action="swork_unit.php" method="POST">
    <div class="title">
      Record Sub category work Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>የሚሰሩበረ ዘርፍ</label>
           <input type="text" class="input" name="sunit">
       </div>

       <div class="inputfield">
          <label>ማብራርያ</label>
           <input type="text" class="input" name="description">
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_sunit">
      </div>
    </div>
  </form>

  </div>
</div>
<?php include_once("../common/below.php");?>
</body>
</html>