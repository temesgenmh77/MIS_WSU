<?php
  session_start();
  if(!(isset($_SESSION['role'])) && ($_SESSION['role'] != "Head")){
    header("Location: ../index.php");
  }
?>

<?php include_once("../common/dbconnect.php");
   
   if (isset($_POST['update'])) {
    
    $sql = "update emp_basic set 
            full_name='".$_POST['fname']."', 
            dob='".$_POST['dob']."', 
            hired_date='".$_POST['hired']."', 
            sex='".$_POST['gender']."', 
            college='".$_POST['college']."', 
            department='".$_POST['department']."', 
            Disability='".$_POST['disable']."', 
            level='".$_POST['level']."', 
            rank='".$_POST['rank']."', 
            category='".$_POST['category']."', 
            nation='".$_POST['nation']."', 
            region='".$_POST['region']."', 
            email='".$_POST['email']."', 
            phone='".$_POST['phone']."',  
            elip='".$_POST['elip']."', 
            hdp='".$_POST['hdp']."', 
            work_status='".$_POST['status']."', 
            campus_id='".$_POST['campus']."' where emp_id='".$_POST['emp_id']."'";
      if($con->query($sql)){
        echo "Staff Successful Updated!";
        header("Location:view_staff.php");
     }else{echo "Error!!!".$con->error;}
  }

$eid = "";
        $fname  = "";
        $dob = "";
        $sex = "";
        $college = "";
        $department= "";
        $disablity = "";
        $hired = "";
        $level = "";
        $rank = "";
        $phone = "";
        $email = "";
        $nation = "";
        $region = "";
        $uname = "";
        $password = "";
        $work = "";
        $pid = "";
        $category = "";
        $elip = "";
        $hdp = "";
        $campus = "";



  if(isset($_GET['emp_idd'])){
    $id=explode(":", $_GET['emp_idd']);
    
    $id1 = $id[0];

    $sql = "select * from emp_basic where emp_id='".$id[0]."'";
    //$sql1 = "select * from position where position_id='".$id[1]."'";

  //  $record1 = $con->query($sql1);
  //  $pos_name ="";
  //  $posid = "";
  //  while($record21=mysqli_fetch_array($record1)){
  //    $pos_name =$record21['position_name'];
  //    $posid = $record21['position_id'];

    //}
    
    $record11 = $con->query($sql);
    if($record11){
    while($record=mysqli_fetch_array($record11)){
        $eid = $record['emp_id'];
        $fname  = $record['full_name'];
        $dob = $record['dob'];
        $sex = $record['sex'];
        $college = $record['college'];
        $department= $record['department'];
        $disablity = $record['Disability'];
        $hired = $record['hired_date'];
        $level = $record['level'];
        $rank = $record['rank'];
        $phone = $record['phone'];
        $email = $record['email'];
        $nation = $record['nation'];
        $region = $record['region'];
      
        $work = $record['work_status'];
     
        $category = $record['category'];
        $elip = $record['elip'];
        $hdp = $record['hdp'];
        $campus = $record['campus_id'];
      }
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>
</head>

<body class="bb">
<?php include_once('above_head.php');?>
<?php //include_once('../common/menu123.php');?>
<form action="edit_staff.php" method="POST">
<div class="wrapper">
    <div class="title">
      Registration staff basic Info
    </div>

    <div class="form">
      <div class="inputfield">
      <table width="100%" style="text-align: center;">
        <tr><td style="padding: 20px; margin-left: 0;">
          <label>Employee ID</label></td> 
             <td><input type="text" class="input" name="emp_id" id="emp_id" value="<?= $eid;?>"></td><td>
          <label>Date of birth  </label></td><td>
          <input type="text" class="input" name="dob" id='dob' value="<?= $dob;?>"></td>
        </tr>

        <tr><td>
          <label>Full Name</label></td><td>
          <input type="text" class="input" name="fname" value="<?= $fname; ?>"></td><td>
          <label>Hired date  </label></td><td>
          <input type="text" class="input" name="hired" value="<?= $hired?>"></td>
        </tr>     
        <tr><td style="padding: 20px; margin-left: 0; margin-top: 10px; margin-bottom: 10px;">
          <label>Gender</label></td><td>
          <input type="Radio" class="input" name="gender" value="M" <?php if($sex=='Male'){?> checked<?php } ?>>Male
          <input type="Radio" class="input" name="gender" value="F" <?php if($sex=='Female'){?> checked<?php } ?>>Female </td><td>     
          <label>Disablity</label></td><td>
          <input type="Radio" class="input" name="disable" value="Yes" <?php if($disablity=='Yes'){?> checked<?php } ?>>Yes
          <input type="Radio" class="input" name="disable" value="No" <?php if($disablity=='No'){?> checked<?php } ?> >No
          </td></tr>
         <tr><td  style="padding: 20px; margin-left: 0;"> <label>College</label></td><td>
          <div class="custom_select">
            <select name='college' id="college" onchange="showCustomer(this.value)">
              <option disabled selected >Select College/School </option>
                <?php
                  $records = $con->query( "SELECT college_id,college_name From college");  
                  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                    if($college==$data['college_id']){
                      echo "<option value='". $data['college_id'] ."' selected='selected'>" .$data['college_name'] ."</option>";
                  }
                    else{
                      echo "<option value='". $data['college_id'] ."'>" .$data['college_name'] ."</option>";  // displaying data in option menu
                    }
                      
                  } 
                ?>  
            </select>
        </div>
        </td><td>
          <label>Department</label></td><td>
          <div class="custom_select" id="department1"> <select name='department'> <option disabled="disabled" selected="selected"> Select department</option>
                <?php
              $records = $con->query( "SELECT department_id,department_name From department where college_id='".$college."'" );  // Use select query here 
                  $cid = "";

                  while($data = mysqli_fetch_array($records))
                  {
                    if(($department == $data['department_id']))
                      echo "<option selected='selected' value='". $data['department_id'] ."'>" .$data['department_name'] ."</option>";  // displaying data in option menu
                    else
                    echo "<option value='". $data['department_id'] ."'>" .$data['department_name'] ."</option>";  // displaying data in option menu
                        
                  }
                 
                ?>
            </select>
          </div>
        </td></tr>

    <tr><td style="padding: 20px; margin-left: 0;">
          <label>Employee Category</label></td><td>
            <div class="custom_select">
            <Select name="category" >
              <option value="" disabled="disabled">Select category</option>
              <option value="Academic" <?php if($category=="Academic") echo 'selected="selected"';?>>Academic staff</option>
              <option value="TA" <?php if($category=="TA") echo 'selected="selected"';?>>Technical Assistant</option>
              <option value="Admin" <?php if($category=="Admin") echo 'selected="selected"';?>>Administrative staff</option>
              <option value="Clinical" <?php if($category=="Clinical") echo 'selected="selected"';?>>Clinical staff</option>
              
            </Select>
        </div>
          </td>
            <td> <label>Campus</label></td>
            <td><div class="custom_select">
            <select name='campus' id="campus_id">
              <option disabled="disabled" selected="selected">Select Campus </option>
                <?php
                  $records = $con->query( "SELECT id,campus_name From campus");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                    if(($campus==$data['id']))
                      echo "<option selected='selected' value='". $data['id'] ."'>" .$data['campus_name'] ."</option>";  // displaying data in option menu
                    else
                    echo "<option value='". $data['id'] ."'>" .$data['campus_name'] ."</option>";  // displaying data in option menu
                        
                  } 
                ?>  
            </select>
        </div>
          </td>
        </tr>
        <tr><td style="padding: 20px; margin-left: 0;">
          <label>Academic rank</label></td><td>
            <div class="custom_select">
            <Select name="rank">
              <option value="" disabled="disabled">Select academic rank</option>
              <option value="GAI" <?php if($rank=="GAI") echo 'selected="selected"';?>>Graduate Assistant I</option>
              <option value="GAII" <?php if($rank=="GAII") echo 'selected="selected"';?>>Graduate Assistant II</option>
              <option value="Ass. Lecturer" <?php if($work=="Ass. Lecturer") echo 'selected="selected"';?>>Assistant Lecturer</option>
              <option value="Lecturer" <?php if($rank=="Lecturer") echo 'selected="selected"';?>>Lecturer</option>
              <option value="Ass. Prof." <?php if($rank=="Ass. Prof.") echo 'selected="selected"';?>>Assistant Professor</option>
              <option value="Asso. Prof." <?php if($rank=="Asso. Prof.") echo 'selected="selected"';?>>Associate Professor</option>
              <option value="Prof." <?php if($rank=="Prof.") echo 'selected="selected"';?>>Professor</option>
            </Select>
        </div>
          </td><td>
          <label>Educational level</label></td><td>
          <div class="custom_select">
            <select name="level">
              <option value="" disabled="disabled">Select educational level</option>
              <option value="Diploma" <?php if($level=="Diploma") echo 'selected="selected"';?>>Diploma</option>
              <option value="Degree" <?php if($level=="Degree") echo 'selected="selected"';?>>1st degree</option>
              <option value="Masters" <?php if($level=="Masters") echo 'selected="selected"';?>>2nd degree</option>
              <option value="PhD" <?php if($level=="PhD") echo 'selected="selected"';?>>3rd degree</option>               
            </select>
          </div>
          </td>
        </tr>
        <tr><td style="padding: 20px; margin-left: 0;">
           <label>HDP training</label></td><td>
          <div class="custom_select">
            <select name="hdp">
              <option value="" disabled="disabled">Select HDP status</option>
              <option value="1" <?php if($hdp=="1") echo 'selected="selected"';?> >Completed</option>
              <option value="2" <?php if($hdp=="2") echo 'selected="selected"';?> >Ongoing</option>
              <option value="3" <?php if($hdp=="3") echo 'selected="selected"';?> >Not started</option>
            </select>
          </div>
          </td><td>
          <label>ELIP training</label></td><td>
          <div class="custom_select">
            <select name="elip">
              <option disabled="disabled" value="">Select ELIP status</option>
              <option value="1" <?php if($elip=="1") echo 'selected="selected"';?> >Completed</option>
              <option value="2" <?php if($elip=="2") echo 'selected="selected"';?> >Ongoing</option>
              <option value="3" <?php if($elip=="3") echo 'selected="selected"';?> >Not started</option>
            </select>
          </div>
          </td>
        </tr>
        <tr><td  style="padding: 20px; margin-left: 0;">
          <label>Email</label></td><td>
          <input type="email" class="input" name="email" value="<?= $email;?>"></td><td>
          <label>Phone  </label></td><td>
          <input type="number" class="input" name="phone" value="<?= $phone;?>"></td>
        </tr>

        <tr><td>
          <label>Nationality</label></td><td>
          <input type="text" class="input" name="nation" value="<?= $nation;?>"></td><td>
          <label>Region  </label></td><td>
          <input type="text" class="input" name="region" value="<?= $region;?>"></td>
        </tr>
        
        <tr><td  style="padding: 20px; margin-right: 0;">
          
            <label>Current status</label></td><td>
            <div class="custom_select">
            <select name="status">
              <option value="0" >Select work status</option>
              <option value="On duty" <?php if($work=="On duty") echo 'selected="selected"'; ?>>On duty</option>
              <option value="On study" <?php if($work=="On study") echo 'selected="selected"'; ?>>On study</option>
              <option value="Both" <?php if($work=="Both") echo 'selected="selected"';?> >Both</option>
              <option value="Terminated job" <?php if($work=="Terminated job") echo 'selected="selected"'; ?>>Terminated job</option>
            </select>
          </div>      
          </td></tr>
          
</table></div>        
      <div class="inputfield">
        <input type="submit" value="Update" class="btn" name="update">
      </div>
    </div>
</div>
</form>
<?php 
include_once('../common/below.php');?>
</body>
</html>