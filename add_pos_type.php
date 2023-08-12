<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Admin"){
    header("Location:/MIS/index.php");
  }
?><?php include_once("common/dbconnect.php");
  if(isset($_POST['add_type'])){    
    $type =    $_POST['type'];
    $allowance =   $_POST['allow'];
    $card  =   $_POST['card'];
    $term  =   $_POST['term'];
    $description =$_POST['description'];
   
    

    $sql = "insert into position_type (id,position_type,term,position_allowance,card_amount,description) values('1','$type','$term','$allowance','$card','$description')";
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
  <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="my_css/table.css">

</head>
<body class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php //include_once("common/menu123.php");?></div>

<div class="wrapper">
  <form action="position_type.php" method="POST">
    <div class="title">
      Record position type Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>Position type</label>
           <input type="text" class="input" name="type">
       </div> 
       <div class="inputfield">
          <label>Term in year</label>
           <input type="text" class="input" name="term">
       </div>
       <div class="inputfield">
          <label>Alloance</label>
           <input type="text" class="input" name="allow">
       </div>

       <div class="inputfield">
          <label>Card</label>
           <input type="text" class="input" name="card">
       </div>

       <div class="inputfield">
          <label>Description</label>
           <input type="text" class="input" name="description">
       </div>

   <div class="inputfield">
       <table width="100%"><tr>
          <td> <input type="submit" value="Add" class="btn" name="add_type"></td>
          <td> <input type="submit" value="Update" class="btn" name="edit"></td>
          <td> <input type="submit" value="Delete" class="btn" name="delete"></td>
        </tr></table>
      </div>
  </div>
</form>
</div>
</div>
<?php include_once("common/below.php");?>
</body>
</html>