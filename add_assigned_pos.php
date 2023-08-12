<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Admin"){
    header("Location:/MIS/index.php");
  }
?>

<?php include_once("common/dbconnect.php");
  if(isset($_POST['Assigned'])){    
    $emp_id =    $_POST['emp_id'];
    $cat_id =   $_POST['cat_id'];
    $pos_id =   $_POST['pos_id'];
    $ass_date  =   $_POST['start_date'];
    $end_date  =   $_POST['end_date'];
    $description =$_POST['description'];
    $sql = "insert into ass_position (emp_id, category, pos_id, start_date, end_date, description) values('$emp_id', '$cat_id', '$pos_id','$ass_date','$end_date','$description')";
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
  <form action="add_assigned_pos.php" method="POST">
    <div class="title">
      Record Assigned position Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>Employee ID</label>
           <input type="text" class="input" name="emp_id">
       </div> 


        <div class="inputfield">
          <label>Level</label>
          <div class="custom_select">
            <select name="cat_id">
                <option value="" disabled="disabled" selected="selected">Select position type</option>
                <?php
                  $records = $con->query( "SELECT id, position_type From position_type");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['position_type'] ."'>" .$data['position_type'] ."</option>";  // displaying data in option menu
                  } 
                ?>  
            </select>
          </div>
       </div>  
        <div class="inputfield">
          <label>Position name</label>
          <div class="custom_select">
            <select name="pos_id">
                <option value="" disabled="disabled" selected="selected">Position name</option>

                <?php
                  $records = $con->query( "SELECT position_id, position_name From position");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['position_name'] ."'>" .$data['position_name'] ."</option>";  // displaying data in option menu
                  } 
                ?>  
        
            </select>
          </div>
       </div>  


       <div class="inputfield">
          <label>Date Assigned</label>
           <input type="date" class="input" name="start_date">
       </div>

       <div class="inputfield">
          <label>End Date</label>
           <input type="date" class="input" name="end_date">
       </div>

       <div class="inputfield">
          <label>Description</label>
           <textarea name="description" class="input"></textarea> 
       </div>

   <div class="inputfield">
       <table width="100%"><tr>
          <td> <input type="submit" value="Add" class="btn" name="Assigned"></td>
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