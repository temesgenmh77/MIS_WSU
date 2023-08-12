

<?php include_once("common/dbconnect.php");

  if(isset($_POST['update_account'])){
    $empid = $_POST['empid'];
    $username = $_POST['uname'];
    $password  = $_POST['pass'];
    $repassword  = $_POST['repass'];
    $category= $_POST['category'];
    $createdate = $_POST['cdate'];
    $status = $_POST['status'];
    
    $sql = "update account set username='".$username."', password='".$password."', category='".$category."', status='".$status."' WHERE emp_id='$empid'";
    if ($password == $repassword) {
        if(!$con->query($sql)){
          echo "Error.............".$con->error;
        }else{"A user updated successfully!"; header("Location:view_user.php");} 
    }else {echo "Your password mismatch!";}
  }
  
  $idd = $_GET['idd'];
  $sql = "SELECT * from account where id='$idd'";
  $records = $con->query($sql);
  $row = $records->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="my_css/table.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="my_css/jquery.min.js"></script>
  
</head>
<body  class="bb">
<?php include_once("above.php");?>
<div id="menu"><?php //include_once("common/menu123.php");?></div>
<div class="wrapper">
    <div class="title">
      Add user account Form
    </div>
    <form action="edit_user.php" method="POST">

    <div class="form">
       <div class="inputfield">
          <label>Employee ID</label>
          <input type="text" class="input" class="btn"name="empid" value="<?php echo $row['emp_id']; ?>">
       </div>  
      
       <div class="inputfield">
          <label>Username</label>
          <input type="text" class="input" name="uname"  value="<?php echo $row['username']; ?>">
       </div>

       <div class="inputfield">
          <label>Password </label>
          <input type="password" class="input" class="btn"name="pass"  value="<?php echo $row['password']; ?>">
       </div>

       <div class="inputfield">
          <label>Confirm password </label>
          <input type="password" class="input" class="btn"name="repass">
       </div>


      <div class="inputfield">
          <label>Category</label>
          <div class="custom_select">
            <select name='category' id="category">
              <option disabled selected>Select user type </option>
                <?php
                  $records = $con->query( "SELECT id,category From user_type");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                     if($data['id']==$row['category']){
                      echo "<option value='". $data['id'] ."' selected='selected'>" .$data['category'] ."</option>";
                  }
                    else{
                      echo "<option value='". $data['id'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
                    }
                      
                  } 
                ?>  
            </select>
        </div>
      </div>
      
       <div class="inputfield">
          <label>Created date</label>
          <input type="text" class="input" name="cdate"  value="<?php echo $row['create_date']; ?>">
       </div>
       <div class="inputfield">
          <label>Status</label>
          <div class="custom_select">
            <select name="status">
              <option value="">Select user status</option>
              <option value="1" <?php if($row['status']=="1") echo 'selected="selected"';?>>Active</option>
              <option value="0" <?php if($row['status']=="0") echo 'selected="selected"';?>>Deactivated</option>              
            </select>
          </div>
       </div>

    <div class="inputfield">
       <table width="100%"><tr>
          <td> <input type="submit" value="Register" class="btn" name="update_account"></td>
          
        </tr></table>
      </div>
  </div>
</form>
</div>
<?php include_once("common/below.php");?>
</body>
</html>
