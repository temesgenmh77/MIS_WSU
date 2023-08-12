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

  if(isset($_POST['update_emp'])){
    $eid = $_POST['emp_id'];
    $fname  = $_POST['fname'];
    $full_name  = $_POST['afname'];
    $dob = $_POST['dob'];
    $sex = $_POST['gender'];
    $salary = $_POST['salary'];
    $level = $_POST['wlevel'];

    $wsection = $_POST['college'];
    $wcategory = $_POST['department'];
    $wposition = $_POST['wposition'];
    $disablity = $_POST['disable'];
    $hired = $_POST['hired'];
    $edu_level = $_POST['level'];
    $edu_type = $_POST['specialized'];
    
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nationality = $_POST['nation'];
    $region = $_POST['region'];
    $nation = $_POST['nations'];

    $work = $_POST['status'];
    $category = $_POST['category'];
    $campus = $_POST['campus'];

    $sql = "UPDATE employee set fname='$fname',full_name='$afname', dob='$dob', gender='$sex',disability='$disablity', edu_type='$edu_type', edu_level='$edu_level',hiredate='$hired',worksection='$wsection', workcategory='$wcategory', workposition='$wposition', level='$level', salary='$salary',  nationality='$nationality', region='$region', nations='$nation', email='$email', phone='$phone', emp_cat='$emp_cat', campus='$campus', work_status='$work'";
    
    if($con->query($sql)){
      echo "Employee Successful Added!";
      header("Location:view_employee.php");
    }else{echo "Error!!!".$con->error;}
  }

      $eid ="";
    $afname  ="";
    $fname  ="";
    $dob = "";
    $sex ="";
    $salary ="";
    $level ="";

    $wsection = "";
    $wcategory = "";
    $wposition = "";
    $disablity = "";
    $hired = "";
    $edu_level = "";
    $edu_type = "";
    
    $phone = "";
    $email = "";
    $nationality = "";
    $region = "";
    $nations = "";

    $work = "";
    $emp_cat = "";
    $campus = "";



if(isset($_GET['emp_idd'])){
  $idd = $_GET['emp_idd'];
  mysqli_set_charset($con,"utf8");
  $record=  $con->query("SELECT * from employee where emp_id='$idd'");

  while($data = $record->fetch_assoc()){
    
    $eid = $data['emp_id'];
    $fname  = $data['fname'];
    $afname  = $data['full_name'];
    $dob = $data['dob'];
    $sex = $data['gender'];
    $salary = $data['salary'];
    $level = $data['level'];

    $wsection = $data['worksection'];
    $wcategory = $data['workcategory'];
    $wposition = $data['workposition'];
    $disablity = $data['disability'];
    $hired = $data['hiredate'];
    $edu_level = $data['edu_level'];
    $edu_type = $data['edu_type'];
    
    $phone = $data['phone'];
    $email = $data['email'];
    $nationality = $data['nationality'];
    $region = $data['region'];
    $nations = $data['nations'];

    $work = $data['work_status'];
    $emp_cat = $data['emp_id'];
    $campus = $data['campus'];
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../my_css/style_form.css">
  <link rel="stylesheet" type="text/css" href="../my_css/table.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../my_css/jquery.min.js"></script>
  
</head>

<body class="bb">
<?php include_once('above_hrm.php');?>
<?php //include_once('../common/menu123.php');?>
<form action="add_emp.php" method="POST">
<div class="wrapper">
    <div class="title">
      Registration of employee basic Info
    </div>

    <div class="form">
      <div class="inputfield">
      <table width="100%" style="text-align: center;">
        <tr><td style="padding: 20px; margin-left: 0;">
          <label><b>መለያ ቁጥር</b></label></td> 

          <?php
                  //$records = $con->query( "SELECT emp_id From emp_basic");  // Use select query here 
                  
                  //while($data = mysqli_fetch_array($records))
                  //{
                    //  $cid = $data['emp_id'];
                  //} 
                  //$data = explode("/", $cid);
                  //$data[2] = $data[2]+1; 
                  //$data[2] = "WSU/MIS/".$data[2];
                  //echo $data[2]; 
          ?>

             <td><input type="text" class="input" name="emp_id" id="emp_id" value="<?php echo $eid;?>"></td><td>
          <label><b>የትውልድ ዘመን </b> </label></td><td>
          <input type="text" class="input" name="dob" value="<?php echo $dob; ?>" placeholder="ቀን/ወር/ዓ.ም"></td>
        </tr>

        <tr><td>
          <label><b>ስም ከነአያት</b></label></td><td>
          <input type="text" class="input" name="fname" placeholder="በአማረኛ"  value="<?php echo $fname;?>"></td><td>
          <label><b>FUll name</b></label></td><td>
          <input type="text" class="input" name="afname"  value="<?php echo $afname;?>"></td>
        </tr>     

        <tr><td style="padding: 20px; margin-left: 0; margin-top: 10px; margin-bottom: 10px;">
          <label><b>ፆታ</b></label></td><td>
          <input type="Radio" class="input" name="gender" value="ወ" <?php if($sex=='ወ'){?> checked<?php } ?>>ወንድ
          <input type="Radio" class="input" name="gender" value="ሴ" <?php if($sex=='ሴ'){?> checked<?php } ?>>ሴት </td><td>     
          <label><b>አካል ጉዳት</b></label></td><td>
           <input type="Radio" class="input" name="disable" value="Yes" <?php if($disablity=='Yes'){?> checked<?php } ?>>አለ
          <input type="Radio" class="input" name="disable" value="No" <?php if($disablity=='No'){?> checked<?php } ?>>የለም
       </td></tr>

         <tr><td  style="padding: 20px; margin-left: 0;"> <label>የሥራ ክፍል</label></td><td>
          <div class="custom_select">
            <select name='college' id="college" >
              <option disabled selected>የሥራ ክፍል ይምረጡ</option>
                <?php
                mysqli_set_charset($con,'utf8');
                  $records = $con->query( "SELECT id,office_name From work_unit");  // Use select query here 
                  $cid = "";
                  

                  while($data = mysqli_fetch_array($records))
                  {
                    if($wsection==$data['id']){
                      echo "<option value='". $data['id'] ."' selected='selected'>" .$data['office_name'] ."</option>";
                  }
                    else{
                      echo "<option value='". $data['id'] ."'>" .$data['office_name'] ."</option>";  // displaying data in option menu
                    }
                      
                  } 
                ?>  




                ?>  
            </select>
        </div>
        </td><td>
          <label><b>የሚሰሩበረ ዘርፍ</b></label></td><td>
          <div class="custom_select" id="department1"> <select name='department'> 

            <option disabled="disabled" selected="selected"> የሚሰሩበረ ዘርፍ ይምረጡ</option>
              
                <?php
                mysqli_set_charset($con,'utf8');
                  $records = $con->query( "SELECT id,soffice_name From swork_unit");  // Use select query here 
                  $cid = "";

                  while($data = mysqli_fetch_array($records))
                  {
                    if($wcategory==$data['id']){
                      echo "<option value='". $data['id'] ."' selected='selected'>" .$data['soffice_name'] ."</option>";
                  }
                    else{
                      echo "<option value='". $data['id'] ."'>" .$data['soffice_name'] ."</option>";  // displaying data in option menu
                    }
                      
                  } 
                  
                ?>  
            </select>
        </div>
        </td></tr>
        <tr><td><label>የሥራ መደብ</label></td><td><div class="inputfield">
          <input type="text" class="input" name="wposition" value="<?php echo $wposition; ?>"></div></td>

          <td>

            <label>ደረጃ</label></td><td>
            <div class="custom_select">
            <select name="wlevel">
              <option value="" disabled="disabled" selected="selected">JEG ደረጃ ይምረጡ</option>
              <option value="No">No level</option>
              <option value="I" <?php if($level=="I") echo 'selected="selected"';?>>I</option>
              <option value="II" <?php if($level=="II") echo 'selected="selected"';?>>II</option>
              <option value="III" <?php if($level=="III") echo 'selected="selected"';?>>III</option>
              <option value="IV" <?php if($level=="IV") echo 'selected="selected"';?>>IV</option>
              <option value="V" <?php if($level=="V") echo 'selected="selected"';?>>V</option>
              <option value="VI" <?php if($level=="VI") echo 'selected="selected"';?>>VI</option>
             <option value="VII" <?php if($level=="VII") echo 'selected="selected"';?>>VII</option>
              <option value="VIII" <?php if($level=="VIII") echo 'selected="selected"';?>>VIII</option>
              <option value="IX" <?php if($level=="IV") echo 'selected="selected"';?>>IX</option>
              <option value="X" <?php if($level=="X") echo 'selected="selected"';?>>X</option>
              <option value="XI" <?php if($level=="XI") echo 'selected="selected"';?>>XI</option>
              <option value="XII" <?php if($level=="XII") echo 'selected="selected"';?>>XII</option>
              <option value="XIII" <?php if($level=="XIII") echo 'selected="selected"';?>>XIII</option>
              <option value="XIV" <?php if($level=="XIV") echo 'selected="selected"';?>>XIV</option>
              <option value="XV" <?php if($level=="XV") echo 'selected="selected"';?>>XV</option>
              <option value="XVI" <?php if($level=="XVI") echo 'selected="selected"';?>>XVI</option>
              <option value="XVII" <?php if($level=="XVII") echo 'selected="selected"';?>>XVII</option>
              <option value="XVIII" <?php if($level=="XVIII") echo 'selected="selected"';?>>XVIII</option>
              <option value="Other" <?php if($level=="Other") echo 'selected="selected"';?>>Other</option>

            </select>
          </div>
          </td></tr>

         <tr><td>
          <label style="padding: 10px;">ደመወዝ</label></td><td><div class="inputfield">
          <input type="text" class="input" name="salary" value="<?php echo $salary;?>"></div></td> <td>
          <label><b>የተቀጠሩበት ዘመን </b> </label></td><td>
          <input type="text" class="input" name="hired" value="<?php echo $hired;?>" placeholder="ቀን/ወር/ዓ.ም"></td>
        </tr>
</div>
    <tr><td style="padding: 20px; margin-left: 0;">
          <label>የሥራ ዘርፍ</label></td><td>
          <div class="custom_select">
            <Select name="category">
              <option value="" selected="selected" disabled="disabled">የሥራ ዘርፍ ይምረጡ</option>
              <option value="Admin" <?php if($emp_cat=="Admin") echo 'selected="selected"';?>>የአስተዳደር ዘርፍ/Admin</option>
              <option value="Clinical" <?php if($emp_cat=="Clinical") echo 'selected="selected"';?>>የሕክምና ዘርፍ/clinical</option>
            </Select>
        </div>
          </td>
            <td> <label>ግቢ</label></td>
            <td><div class="custom_select">
            <select name='campus' id="campus_id">
              <option disabled="disabled" selected="selected">ግቢ ይምረጡ</option>
                <?php
                mysqli_set_charset($con,'utf8');
                  $records = $con->query( "SELECT id,campus_name From campus");  // Use select query here 
                  $cid = "";
                  while($data = mysqli_fetch_array($records))
                  {
                    if($campus==$data['id']){
                      echo "<option value='". $data['id'] ."' selected='selected'>" .$data['campus_name'] ."</option>";
                  }
                    else{
                      echo "<option value='". $data['id'] ."'>" .$data['campus_name'] ."</option>";  // displaying data in option menu
                    }
                      
                  } 
                ?>  
            </select>
        </div>
          </td>
        </tr>
        <tr><td style="padding: 20px; margin-left: 0;">
          <label>የትምህርት ደረጃ</label></td><td>
          <div class="custom_select">
            <select name="level">
              <option value="" selected="selected" disabled="disabled">የትምህርት  ደረጃ ይምረጡ</option>
                <option value="4th"<?php if($edu_level=="below 4th") echo 'selected="selected"';?>>< 4th</option>
                <option value="4th" <?php if($edu_level=="4th") echo 'selected="selected"';?>>4th</option>
                <option value="5th" <?php if($edu_level=="5th") echo 'selected="selected"';?>>5th</option>
                <option value="6th" <?php if($edu_level=="6th") echo 'selected="selected"';?>>6th</option>
                <option value="7th" <?php if($edu_level=="7th") echo 'selected="selected"';?>>7th</option>
                <option value="8th" <?php if($edu_level=="8th") echo 'selected="selected"';?>>8th</option>
                <option value="9th" <?php if($edu_level=="9th") echo 'selected="selected"';?>>9th</option>
                <option value="10th" <?php if($edu_level=="10th") echo 'selected="selected"';?>>10th</option>
                <option value="11th" <?php if($edu_level=="11th") echo 'selected="selected"';?>>11th</option>
                <option value="12th" <?php if($edu_level=="12th") echo 'selected="selected"';?>>12th</option>
                <option value="Level-I" <?php if($edu_level=="Level-I") echo 'selected="selected"';?>>Level-I</option>
                <option value="Level-II"  <?php if($edu_level=="Level-II") echo 'selected="selected"';?>>Level-II</option>
                <option value="Level-III"  <?php if($edu_level=="Level-III") echo 'selected="selected"';?>>Level-III</option>
                <option value="Level-IV"  <?php if($edu_level=="Level-IV") echo 'selected="selected"';?>>Level-IV</option>
                <option value="Level-V"  <?php if($edu_level=="Level-V") echo 'selected="selected"';?>>Level-V</option>
                <option value="Diploma"  <?php if($edu_level=="Diploma") echo 'selected="selected"';?>>Diploma</option>
                <option value="Degree"  <?php if($edu_level=="Degree") echo 'selected="selected"';?>>Degree</option>
                <option value="Masters"  <?php if($edu_level=="Masters") echo 'selected="selected"';?>>Masters</option>
                <option value="PhD"  <?php if($edu_level=="PhD") echo 'selected="selected"';?>>PHD</option>
                <option value="MD doctor"  <?php if($edu_level=="MD doctor") echo 'selected="selected"';?>>MD doctor</option>
                <option value="MD+Speciality"  <?php if($edu_level=="MD+Speciality") echo 'selected="selected"';?>>Speciality</option>
                <option value="MD+Subspeciality"  <?php if($edu_level=="MD+Subspeciality") echo 'selected="selected"';?>>Subspeciality</option>               
            </select>
          </div>
          </td>

          <td>
          <label>የትምህርት ዓይነት</label></td><td>
          <input type="text" class="input" name="specialized" value="<?php echo $edu_type;?>"></td>

        </tr>

        <tr><td  style="padding: 20px; margin-left: 0;">
          <label>ኢ-ሜል</label></td><td>
          <input type="text" class="input" name="email" placeholder="example@wsu.edu.et" value="<?php echo $email;?>"></td><td>
          <label>ስልክ ቁጥር</label></td><td>
          <input type="text" class="input" name="phone" value="<?php echo $phone;?>"></td>
        </tr>

         <tr><td>
          <label>ዜግነት</label></td><td>
          <input type="text" class="input" name="nation"  value="<?php $data['nationality'];?>"></td><td>
          <label>ክልል  </label></td><td>
          <input type="text" class="input" name="region"  value="<?php $data['region'];?>"></td>
         </tr>

         <tr> <td><label>አሁናዊ ሁነታ</label></td><td>
            <div class="custom_select">
            <select name="status">
              <option value="0" selected="selected" disabled="disabled">አሁናዊ ሁነታ ይምረጡ</option>
              <option value="On duty"  <?php if($work=="On duty") echo 'selected="selected"';?>>በሥራ ላይ</option>
              <option value="On study"  <?php if($work=="On study") echo 'selected="selected"';?>>በትምህርት ላይ</option>
              <option value="Both"  <?php if($work=="Both") echo 'selected="selected"';?>>በሥራ ና በትምህርት ላይ</option>
              <option value="Office changed"  <?php if($work=="Office changed") echo 'selected="selected"';?>>ስራ ክፍሉን ለቋል</option>
              <option value="Terminated job"  <?php if($work=="Terminated job") echo 'selected="selected"';?>>ውል ተቋርጧል</option>
            </select>
          </div>
          </td><td><label>ብሄር/ብሄረሰብ  </label></td><td>
          <input type="text" class="input" name="nations" value="<?php $data['nations'];?>"></td></tr>
</table></div>
        
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="add_emp">
      </div>
    </div>
</div>
</form>
<?php include_once('../common/below.php');?>
</body>
</html>