<?php
if (!isset($_SESSION)){
  session_start();
} 
if(!isset($_SESSION['role']) && $_SESSION['role'] != "Admin"){
    header("Location:/MIS/index.php");
  }
?><?php include_once("common/dbconnect.php");
  if(isset($_POST['add_position'])){    
    $name =    $_POST['position_name'];
    $level =   $_POST['level'];
    $desc  =   $_POST['description'];
    $resp  =   $_POST['responsible'];
    $category =$_POST['category'];
    $status =  $_POST['status1'];
    $email  =  $_POST['email'];
    $phone =   $_POST['phone'];
    $Office_mobile = $_POST['Office_mobile'];
    $block =   $_POST['block_code'];
    $room = $_POST['room_num'];

    $sql = "insert into position (position_name, description, level, responsible_to,category,office_email,office_phone,mobile,status) values('$name','$desc','$level','$resp','$category','$email','$phone','$Office_mobile','$block','$room','$status')";
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
  <form action="position.php" method="POST">
    <div class="title">
      Record position Form
    </div>
    <div class="form">

       <div class="inputfield">
          <label>Position name</label>
           <input type="text" class="input" name="position_name">
       </div> 

       <div class="inputfield">
          <label>Description</label>
           <input type="text" class="input" name="description">
       </div>

        <div class="inputfield">
          <label>Level</label>
          <div class="custom_select">
            <select name="level">

                <?php
                  $records = $con->query( "SELECT id,position_type From position_type");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['id'] ."'>" .$data['position_type'] ."</option>";  // displaying data in option menu
                  } 
                ?>          
            </select>
          </div>
       </div>  
      
        <div class="inputfield">
          <label>Resposible to</label>
          <div class="custom_select">
            <select name='responsible' id="responsible" onchange="showCustomer(this.value)">
              <option disabled selected>Select College/School </option>
                <?php
                  $records = $con->query( "SELECT position_id,position_name From position where level='Director' or level='President' or level='Vice president' or level='Dean'");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['position_id'] ."'>" .$data['position_name'] ."</option>";  // displaying data in option menu
                  } 
                ?>  
            </select>
        </div>
      </div>

      

       <div class="inputfield">
          <label> Category</label>
          <div class="custom_select">
            <select name="category">
              <option value="">Select</option>
              <option value="ACSP">Academic staff position</option>
              <option value="ADMSP">Admin staff Position</option>
              <option value="CLSP">Clinical staff Position</option>
            </select>
          </div>
       </div>

       <div class="inputfield">
          <label>Office_email</label>
           <input type="text" class="input" name="email">
       </div>

       <div class="inputfield">
          <label>Office_phone</label>
           <input type="text" class="input" name="phone">
       </div>

       <div class="inputfield">
          <label>Office_mobile</label>
           <input type="text" class="input" name="Office_mobile">
       </div>


       <div class="inputfield">
          <label>Campus name</label>
           <input type="text" class="input" name="campus">
       </div>

       <div class="inputfield">
          <label>Block code</label>
           <input type="text" class="input" name="block_code">
       </div>

       <div class="inputfield">
          <label>Office number</label>
           <input type="text" class="input" name="room_num">
       </div>

       <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" value="1" name="status1" id="status1">
            <span class="checkmark"></span>
          </label>
          <p>Position Active</p>
       </div>

   <div class="inputfield">
       <table width="100%"><tr>
          <td> <input type="submit" value="Add" class="btn" name="add_position"></td>
          <td> <input type="submit" value="Update" class="btn" name="edit"></td>
          <td> <input type="submit" value="Delete" class="btn" name="delete"></td>
        </tr></table>
      </div>
  </div>
</form>
</div>
</div>

<?php include_once("below.php");?>
</body>
</html>